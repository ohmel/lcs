/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

app.controller('StudentMonitoringController', function ($rootScope, $scope, Globals, ngNotify, ngDialog, studentMonitoringService, lookUpService) {
    $('i').tooltip();
    $scope.studentMonitoringService = studentMonitoringService;
    $scope.globals = Globals;
    var currentRoute = $rootScope.currentRoute;
    var hasOwnProperty = Object.prototype.hasOwnProperty;

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


    if (currentRoute == "/studentMonitorings") {

    }

});

