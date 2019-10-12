var app = angular.module('App', ['ngRoute']);

app.config(function($routeProvider) {
    $routeProvider
        .when('/', {
            templateUrl: 'accueil.html',
            controller: 'HomeCtrl'
        })
        .when('/missions', {
            templateUrl: 'missions/list.html',
            controller: 'MissionCtrl'
        })
        .when('/mission/create', {
            templateUrl: 'missions/add.html',
            controller: 'ProductCtrl'
        })
        .otherwise({ redirectTo: '/'});

    $httpProvider.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
    $httpProvider.defaults.transformRequest.unshift(function (data, headersGetter) {
        var key, result = [];

        if (typeof data === "string")
            return data;

        for (key in data) {
            if (data.hasOwnProperty(key))
                result.push(encodeURIComponent(key) + "=" + encodeURIComponent(data[key]));
        }
        return result.join("&");
    });


});