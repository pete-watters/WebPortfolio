'use strict';


// Declare app level module which depends on filters, and services
angular.module('myApp', ['myApp.filters', 'myApp.services', 'myApp.directives', 'myApp.controllers']).
  config(['$routeProvider', function($routeProvider) {
    $routeProvider.when('/home', {templateUrl: 'partials/home.html', controller: 'HomeCtrl'});
    
    /**/
    $routeProvider.when('/freeBets', {templateUrl: 'partials/freeBets.html', controller: 'GeneralCtrl'});
    $routeProvider.when('/betCalculator', {templateUrl: 'partials/widgets/betCalculator.html', controller: 'BetCalculatorCtrl'});
    $routeProvider.when('/liveScore', {templateUrl: 'partials/liveScore.html', controller: 'GeneralCtrl'});
    $routeProvider.when('/liveOdds', {templateUrl: 'partials/liveOdds.html', controller: 'GeneralCtrl'});
    $routeProvider.when('/games', {templateUrl: 'partials/games.html', controller: 'GeneralCtrl'});
    $routeProvider.when('/forum', {templateUrl: 'partials/forum.html', controller: 'GeneralCtrl'});
    $routeProvider.when('/news', {templateUrl: 'partials/news.html', controller: 'GeneralCtrl'});

    $routeProvider.otherwise({redirectTo: '/home'});
  }]);
