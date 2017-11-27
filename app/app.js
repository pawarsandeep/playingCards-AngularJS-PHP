/**
 * Created by Sandeep on 11/26/2017.
 */

var app = angular.module('pcHelper',['dndLists', 'ngRoute', 'ngCookies']);


app.service('game', ['$http', function ($http) {

}]);

app.service('user',['$http', function ($http) {
    var user = {};
    user.account = {};
    sync: user.login = function (credentials) {
        return $http.post('/rest-api/login.php', credentials).
        then(function (response) {
            if(response.status == 200){
                console.log(response.data);
            }
        })
    }
    return user;
}])



