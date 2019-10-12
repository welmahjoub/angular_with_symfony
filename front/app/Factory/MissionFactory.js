app.factory("MissionFactory", function ($q, $http) {

    var factory = {
        // list of missions
        LoadMissions: function (token) {
            var deferred = $q.defer();
            $http.post(BASE_URL + "/api/mission/all/", token).then(function (data, status) {
                deferred.resolve(data);
            }).catch(function (data) {
                deferred.reject("Impossible de recuperer les missions");
            });
            return deferred.promise;
        },

        AddMissions: function (data) {
            var deferred = $q.defer();
            $http.post(BASE_URL + "/api/missions/create", data).then(function (data, status) {
                deferred.resolve(data);
            }).catch(function (data) {
                deferred.reject("Impossible de recuperer les missions");
            });
            return deferred.promise;
        }
    };
        
       


    return factory;
});