/**
 * Created by Sandeep on 27-11-2017.
 */
var app = angular.module('playingCards',['dndLists', 'pcHelper', 'ngRoute']);
app.config(function ($routeProvider, $locationProvider) {
    $routeProvider
        .when('/login', {
            controller: 'loginCtrl',
            templateUrl: '/templates/login.html',
            controllerAs: 'ctrl'
        })
});

app.controller('homeCtrl',function ($scope, $http) {
    $scope.login = function ($scope) {

    }
});
// function loginCtrl($scope, $route, $routeParams, $location, user) {
//     $scope.login = function ($scope) {
//         var credentials = {username: $scope.username, password: $scope.password};
//         var promise = user.login(credentials);
//         var a;
//     }
//
// }

app.controller('loginCtrl',['user', function (user) {
    var ctrl = this;
    ctrl.login = function ($scope) {
        var credentials = [{username: ctrl.username, password: ctrl.password}];
        user.login(credentials);
    }
}]);

app.controller('ctrl', function ($scope) {
    $scope.cardsOnBoard = [{id:1}, {id:2}, {id:3}];
    $scope.spadeContainer = [];
    $scope.diamondContainer = [];
    $scope.clubContainer = [];
    $scope.heartContainer = [];
});