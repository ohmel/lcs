/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

app.controller('AdmissionController', function($scope, Globals, ngNotify, ngDialog, admissionService) {
    $('i').tooltip();
    $scope.admissionService = admissionService;
    admissionService.fetchStudents(
        function (success) {
            admissionService.students = success.data;
            $scope.loader = 1;
            ngNotify.set("Successfully loaded all students", 'info');
        }, function (error) {
            ngNotify.set(error.message, 'error');
        });
});

