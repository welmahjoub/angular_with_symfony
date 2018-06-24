<?php

namespace UserBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use UserBundle\Entity\UserType;


class LoadUserTypeData extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
{
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $type1 = new UserType();
        $type1->setName("superadmin");
        $type1->setComment(" super utilisateur il veille au bon fonctionnement de l'appli");
        $type1->setEnabled(1);
        $manager->persist($type1);

        $type2 = new UserType();
        $type2->setName("admin");
        $type2->setComment("admin il veille au bon fonctionnement de l'appli avec des restriction");
        $type2->setEnabled(1);
        $manager->persist($type2);

        $type3 = new UserType();
        $type3->setName("daf");
        $type3->setComment(" directeur financier il accede au profomat et commande puis les valides");
        $type3->setEnabled(1);
        $manager->persist($type3);

        $type4 = new UserType();
        $type4->setName("chef-log");
        $type4->setComment("assure les activites des agents log");
        $type4->setEnabled(1);
        $manager->persist($type4);

        $type5 = new UserType();
        $type5->setName("agent-log");
        $type5->setComment(" logisticien de l'entreprise ");
        $type5->setEnabled(1);
        $manager->persist($type5);

        $type6 = new UserType();
        $type6->setName("agent");
        $type6->setComment("employe standard de l'entreprise");
        $type6->setEnabled(1);
        $manager->persist($type6);

        $type7 = new UserType();
        $type7->setName("courtier");
        $type7->setComment(" chauffeur de l'entreprise");
        $type7->setEnabled(1);
        $manager->persist($type7);


        $manager->flush();

        $this->addReference("super-type", $type1);
        $this->addReference("admin-type", $type2);
        $this->addReference("daf", $type3);
        $this->addReference("chef-type", $type4);
        $this->addReference("agentLog-type", $type5);
        $this->addReference("agent", $type6);
        $this->addReference("courtier-type", $type7);
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 1;
    }
}