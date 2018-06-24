<?php

namespace UserBundle\DataFixtures\ORM;


use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use UserBundle\Entity\User;
use UserBundle\Entity\UserType;


class LoadUserData extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
{
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {

        $user =  new User();
        $user->setName("Olbys");
        $user->setSurname("Smiley");
        $user->setContact("04688271");
        $user->setEmail("olbys@mail.com");
        $user->setPassword(password_hash("super",PASSWORD_BCRYPT));
        $user->setSalt(md5(uniqid()));
        $user->setJob("Informatic engineer");
        $user->setUserType($this->getReference("super-type"));
        $user->setCreatedAT(new \DateTime());
        $manager->persist($user);

        $user1 =  new User();
        $user1->setName("Ray");
        $user1->setSurname("Soleil");
        $user1->setContact("04688271");
        $user1->setEmail("ray@mail.com");
        $user1->setPassword(password_hash("res-log",PASSWORD_BCRYPT));
        $user1->setSalt(md5(uniqid()));
        $user1->setJob("Informatic engineer");
        $user1->setUserType($this->getReference("admin-type"));
        $user1->setCreatedAT(new \DateTime());
        $manager->persist($user1);


        $manager->flush();

        $this->addReference("super",$user);
        $this->addReference("admin", $user1);


    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 2;
    }
}