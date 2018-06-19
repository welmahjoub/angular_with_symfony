var app = angular.module('myApp', ['ngRoute']);

app.config(function($routeProvider) {
    $routeProvider
        .when('/', {
            templateUrl: 'home.html',
            controller: 'HomeCtrl'
        })
        .when('/demandes', {
            templateUrl: '../panel/demandes/list.html',
            controller: 'SidebarCtrl'
        })
        .otherwise({ redirectTo: '/'});

});