var app = angular.module('publicApp', ['ngRoute']);

app.config(function($routeProvider) {
    $routeProvider
        .when('/public-demandes', {
            templateUrl: '../panel/public/demandes.html',
            controller: 'RegisterCtrl'
        })
        .when('/public-register', {
            templateUrl: '../panel/public/register.html',
            controller: 'WaitDemandeCtrl'
        })
        .otherwise({ redirectTo: '/'});

});