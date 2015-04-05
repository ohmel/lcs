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
        addUser = function(callback, errback, students){
            $http({
                method: 'POST',
                url: url+'user/addUser',
                data: students
            }).success(callback).error(errback);
        };



    return {
        students: students,
        fetchStudents: fetchStudents,
        addUser: addUser
    };
});