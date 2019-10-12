app.controller("ProductCtrl", function ($scope,$location,$interval,$timeout) {


    // Controlle d'authentification du user
    try {
        $scope.session=JSON.parse(window.localStorage.getItem("user_session"));
    }catch (error){ }

    if(!$scope.session){
        window.location.href="../"
    }
    $scope.user = $scope.session.user;
    //



    $scope.addProduct = function (data) {

    };



});