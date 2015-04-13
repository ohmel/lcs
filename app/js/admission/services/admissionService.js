app.service('admissionService', function ($http, Globals) {

    "use strict";

    var url = Globals.rootUrl+"index.php/api/",
        students = [],
        fetchStudents = function (callback, errback) {
            $http({
                method: 'GET',
                url: url+'admission/fetchStudents'
            }).success(callback).error(errback);
        },
        addStudent = function(callback, errback, student){
            $http({
                method: 'POST',
                url: url+'admission/addStudent',
                data: student
            }).success(callback).error(errback);
        };



    return {
        students: students,
        fetchStudents: fetchStudents,
        addStudent: addStudent
    };
});