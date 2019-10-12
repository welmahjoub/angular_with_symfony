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
        .otherwise({ redirectTo: '/'});


});