/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

app.controller('AdmissionController', function ($rootScope, $scope, Globals, ngNotify, ngDialog, admissionService) {
    $('i').tooltip();
    $scope.admissionService = admissionService;
    $scope.globals = Globals;
    var currentRoute = $rootScope.currentRoute;

    if (currentRoute == "/enrollment") {
        admissionService.fetchStudents(
            function (success) {
                admissionService.students = success.data;
                $scope.loader = 1;
                ngNotify.set("Successfully loaded all Applicants", 'info');
            }, function (error) {
                ngNotify.set(error.message, 'error');
            });
    }

    if(currentRoute == "/addStudent"){
        $scope.student = [];
        // function to submit the form after all validation has occurred
        $scope.submitForm = function(isValid) {

            // check to make sure the form is completely valid
            if (isValid) {
                alert('our form is amazing');
            }

        };
    }

});

