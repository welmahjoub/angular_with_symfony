app.controller("MissionCtrl", function ($scope,MissionFactory,$location,$interval,$timeout,$q, $http) {
    try {
        $scope.session=JSON.parse(window.localStorage.getItem("user_session"));
    }catch (error){ }

    if(!$scope.session){
        window.location.href="../"
    }
    $scope.user = $scope.session.user;

    var testdemande =[];

<<<<<<< HEAD

    MissionFactory.LoadMissions($scope.user.token);
=======
    for(var i=0  ; i<=16 ; i++ ){
        var obj = { indice:i};
        testdemande.push(obj);
    }
    testdemande= MissionFactory.LoadMissions($scope.user.token);
>>>>>>> 4f713b2a394328a1b5815164634d0d0d9a6fcd20

    $scope.waitDemandes = testdemande;


    $timeout(function(){
        $("#datatable-buttons").DataTable({
            dom: "Bfrtip",
            buttons: [{
                extend: "copy",
                className: "btn-md"
            }, {
                extend: "csv",
                className: "btn-md"
            }, {
                extend: "excel",
                className: "btn-md"
            }, {
                extend: "pdf",
                className: "btn-md"
            }, {
                extend: "print",
                className: "btn-md"
            }],
            responsive: !0
        });
    },3000)



});