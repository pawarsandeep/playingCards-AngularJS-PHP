/**
 * Created by Sandeep on 11/26/2017.
 */

var app = angular.module('pcHelper',['dndLists', 'ngRoute', 'ngCookies']);

app.service('user',['$http', '$rootScope', function ($http, $rootScope) {
    var user = {};
    user.account = {};
    sync: user.login = function (credentials) {
        return $http.post('/rest-api/login.php', credentials).
        then(function (response) {
            if(response.status == 200){
                console.log(response.data);
                return response;
            }
        })
    }

    user.retriveGame = function () {
        return $http.post('/rest-api/retrive-game.php', $rootScope.currentUser.user_id).
            then(function (response) {
                if (response.status==200){
                    console.log(response.data);
                    return response.data;
                }
        })
    };

    user.saveGame = function(game){
        return $http.post('/rest-api/save-game.php', game).
            then(function (response) {
                if(response.status == 200){
                    console.log(response.data);
                }
        })
    };
    return user;
}])
