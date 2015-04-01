/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * test git
 */

app.controller('UserManagerController', function ($scope, Globals, ngNotify, ngDialog, userManagerService) {

    $scope.loader = 0;
    $scope.userManagerService = userManagerService;

    userManagerService.fetchUsers(
        function (success) {
            userManagerService.users = success.data;
            $scope.loader = 1;
        }, function (error) {
            ngNotify.set(error.message, 'error');
        });
});

