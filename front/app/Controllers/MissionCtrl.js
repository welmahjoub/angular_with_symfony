app.controller("MissionCtrl", function ($scope,MissionFactory,$location,$interval,$timeout,$q, $http) {
    try {
        $scope.session=JSON.parse(window.localStorage.getItem("user_session"));
    }catch (error){ }

    if(!$scope.session){
        window.location.href="../"
    }
    $scope.user = $scope.session.user;

    var testdemande =[];

    for(var i=0  ; i<=16 ; i++ ){
        var obj = { indice:i};
        testdemande.push(obj);
    }
    MissionFactory.LoadMissions($scope.user.token);

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