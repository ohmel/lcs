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

    if (currentRoute == "/addStudent") {
        $scope.student = {};
        $scope.address = {};
        $scope.formStep = 1;
        // function to submit the form after all validation has occurred
        $scope.submitForm = function (isValid) {

            // check to make sure the form is completely valid
            if (isValid) {
                ngNotify.set("Form Successfull", 'success');
            } else {
                ngNotify.set("Error on Form", 'error');
            }

        };

        $scope.setFormStep = function(step){
            $scope.formStep = step;
        }

        //DATE PICKER SCOPE SETUP


        // Disable weekend selection
        $scope.disabled = function (date, mode) {
            return ( mode === 'day' && ( date.getDay() === 0 || date.getDay() === 6 ) );
        };

        $scope.toggleMin = function () {
            $scope.minDate = $scope.minDate ? null : new Date();
        };
        $scope.toggleMin();

        $scope.open = function ($event) {
            $event.preventDefault();
            $event.stopPropagation();

            $scope.opened = true;
        };

        $scope.dateOptions = {
            formatYear: 'yy',
            startingDay: 1
        };

        $scope.formats = ['yyyy-MM-dd', 'yyyy/MM/dd', 'dd.MM.yyyy', 'shortDate'];
        $scope.format = $scope.formats[0];


    }

});

