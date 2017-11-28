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
        .when('/', {
            controller: 'playerCtrl',
            templateUrl: '/templates/player.html',
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

app.controller('loginCtrl',['user', '$rootScope', '$location', function (user, $rootScope, $location) {
    var ctrl = this;
    ctrl.login = function ($scope) {
        ctrl.error = null;
        var credentials = {username: ctrl.username, password: ctrl.password};
        var promise = user.login(credentials);
        promise.then(function (response) {
            if (response.data.login === 'success'){
                $rootScope.currentUser = response.data.user;
                $location.path('/');
            }
            else {
                ctrl.error = "Invalid username or password.";
            }
        })
    }
}]);

app.controller('playerCtrl', ['user', '$rootScope', function (user, $rootScope) {
    var ctrl = this;
    ctrl.card_states = [];
    user.retriveGame().
    then(function (response) {
        ctrl.game = response;
        if (response.length != 0){
            ctrl.game = response;
            // ctrl.cardsOnBoard = [{id:1}, {id:2}, {id:3}];
            // ctrl.spadeContainer = [];
            // ctrl.diamondContainer = [];
            // ctrl.clubContainer = [];
            // ctrl.heartContainer = [];
        }
        var a=10;
    });
    ctrl.checkDraggedCardOnSpades = function (index, external, type, callback) {
        return callback() == 'spades';
    };
    ctrl.checkDraggedCardOnHearts = function (index, external, type, callback) {
        return callback() == 'hearts';
    };
    ctrl.checkDraggedCardOnClubs = function (index, external, type, callback) {
        return callback() == 'clubs';
    };
    ctrl.checkDraggedCardOnDiamonds = function (index, external, type, callback) {
        return callback() == 'diamonds';
    };
    ctrl.saveGame = function () {
        var a = 10;
    };

}])

app.controller('ctrl', function ($scope) {

});

app.run(['$rootScope', '$location', '$http', function ($rootScope, $location, $http) {
    $rootScope.$on('$locationChangeStart', function (event, next, current) {
        var restrictedPage = $.inArray($location.path(), ['/login']) === -1;
        var loggedIn = $rootScope.currentUser;
        if (restrictedPage && !loggedIn) {
            $location.path('/login');
        }
    });
}]);