app.service('studentMonitoringService', function ($http, Globals) {

    "use strict";

    var url = Globals.rootUrl+"index.php/api/",
        students = [],
        fetchStudents = function (callback, errback) {
            $http({
                method: 'GET',
                url: url+'admission/fetchStudents'
            }).success(callback).error(errback);
        };



    return {
        students: students,
        fetchStudents: fetchStudents,
    };
});