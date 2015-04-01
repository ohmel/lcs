/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * test git
 */

app.controller('AddUserController', function ($rootScope, $scope, Globals, ngNotify, ngDialog, userManagerService) {

    $scope.loader = 0;
    $scope.userManagerService = userManagerService;
    $scope.user = {};

    $scope.setRoute = function (currentRoute) {
        $rootScope.route = currentRoute;
    }
});

