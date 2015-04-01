/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

app.controller('UserManagerController', function ($scope, Globals, ngNotify, ngDialog, userManagerService) {

    $scope.foo = "Hello World!!";
    $scope.userManagerService = userManagerService;

    userManagerService.fetchUsers(
        function (success) {
            userManagerService.users = success.data;
        }, function (error) {
            ngNotify.set(error.message, 'error');
        });
});

