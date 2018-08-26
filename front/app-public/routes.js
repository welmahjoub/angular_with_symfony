var app_public = angular.module('publicApp', ['ngRoute']);

app_public.config(function($routeProvider) {
    $routeProvider
        .when('/', {
            templateUrl: 'register.html',
            controller: 'DemandesCtrl'
        })
        .when('/register', {
            templateUrl: 'register.html',
            controller: 'DemandesCtrl'
        })
        .otherwise({ redirectTo: '/'});

});