/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

app.controller('TestsController', function ($rootScope, $scope, Globals, ngNotify, ngDialog, admissionService, testsService, lookUpService, $route, $routeParams, $location) {
    $('i').tooltip();
    $scope.admissionService = admissionService;
    $scope.testsService = testsService;
    $scope.globals = Globals;
    $scope.route = $route;
    var currentRoute = $rootScope.currentRoute;
    var hasOwnProperty = Object.prototype.hasOwnProperty;
    $scope.tests = [];
    $scope.test = {};
    //alert(currentRoute);
    function isEmpty(obj) {

        // null and undefined are "empty"
        if (obj == null) return true;

        // Assume if it has a length property with a non-zero value
        // that that property is correct.
        if (obj.length > 0)    return false;
        if (obj.length === 0)  return true;

        // Otherwise, does it have any properties of its own?
        // Note that this doesn't handle
        // toString and valueOf enumeration bugs in IE < 9
        for (var key in obj) {
            if (hasOwnProperty.call(obj, key)) return false;
        }

        return true;
    }

    if (currentRoute == "/tests") {
        testsService.fetchTests(
            function (success) {
                $scope.tests = success.data;
                ngNotify.set("Successfully loaded all Tests", 'info');
            }, function (error) {
                ngNotify.set(error.message, 'error');
            });
    }

    if (currentRoute == "/makeTest") {

    }

    if(currentRoute == "/viewTest/:testId"){
        testsService.getTest(
            function (success) {
                $scope.test = success.data;
                ngNotify.set("Successfully loaded "+$scope.test.test_name+" Test", 'info');
            }, function (error) {
                ngNotify.set(error.message, 'error');
            }, $route.current.params.testId);
    }


});

