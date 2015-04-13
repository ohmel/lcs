/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

app.controller('AdmissionController', function ($rootScope, $scope, Globals, ngNotify, ngDialog, admissionService, lookUpService) {
    $('i').tooltip();
    $scope.admissionService = admissionService;
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

        $scope.dateOptions = {
            formatYear: 'yy',
            startingDay: 1
        };
        $scope.isFormValid = false;
        $scope.student = {};
        $scope.address = {};
        $scope.background = {};
        $scope.educationalBackgrounds = [];
        $scope.contact = {};
        $scope.contactDetails = [];
        $scope.levels = [];
        $scope.courses = [];
        $scope.formStep = 1;

        lookUpService.fetchLevels(
            function (success) {
                $scope.levels = success.data;
            }, function (error) {
                ngNotify.set(error.message, 'error')
            });

        lookUpService.fetchCourses(
            function (success) {
                $scope.courses = success.data;
            }, function (error) {
                ngNotify.set(error.message, 'error')
            });

        $scope.checkIfCollegeLevel = function(levelId){
            if(!_.isEmpty($scope.levels)){
                var levelIdsArr = [];
                var levelIds = _.pluck($scope.levels, 'levelId');

                _.each(levelIds, function(id){
                    levelIdsArr.push(parseInt(id));
                });

                var index = _.indexOf(levelIdsArr, parseInt(levelId), true);
                var levelType = $scope.levels[index]['levelType'];
                if(levelType == 1){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

        // function to submit the form after all validation has occurred
        $scope.submitForm = function (isValid) {
            $scope.isFormValid = isValid;
            // check to make sure the form is completely valid
            if (!_.isEmpty($scope.student) && !_.isEmpty($scope.address) && !_.isEmpty($scope.educationalBackgrounds)&& !_.isEmpty($scope.contactDetails)) {
                var studentDetails = {};
                studentDetails.student = $scope.student;
                studentDetails.address = $scope.address;
                studentDetails.educationalBackgrounds = $scope.educationalBackgrounds;
                studentDetails.contactDetails = $scope.contactDetails;
                admissionService.addStudent(function(success){
                    ngNotify.set("Successfully Added new Applicant!", 'success');
                }, function(error){
                    ngNotify.set(error.data, 'error');
                },studentDetails);
            } else {
                ngNotify.set("You might have missed something in the form...", 'error');
            }

        };

        $scope.addBackground = function(background){
            if(!isEmpty(background) && background.educ_school_name && background.educ_school_address){
                $scope.educationalBackgrounds.push(background);
                $scope.background = {'background_school_type': 'High School'};
                ngNotify.set("Added new Educational Background", 'success');
            }else{
                ngNotify.set("You might have missed something in the form...", 'error');
            }
        }

        $scope.addContact = function(contact){
            if(!isEmpty(contact) && contact.contact_name && contact.contact_mobile && contact.contact_address &&  contact.contact_tel){
                $scope.contactDetails.push(contact);
                $scope.contact = {'contact_relationship': 'Mother'};
                ngNotify.set("Added new Emergency Contact Details", 'success');
            }else{
                ngNotify.set("You might have missed something in the form...", 'error');
            }
        }

        $scope.setFormStep = function (step) {
            $scope.formStep = step;
        }

        //DATE PICKER SCOPE SETUP
        // Disable weekend selection

        $scope.disabled = function (date, mode) {
            return ( mode === 'day' && ( date.getDay() === 0 || date.getDay() === 6 ) );
        };
        $scope.open = function ($event) {
            $event.preventDefault();
            $event.stopPropagation();

            $scope.opened = true;
        };

        $scope.formats = ['yyyy-MM-dd', 'yyyy/MM/dd', 'dd.MM.yyyy', 'shortDate'];
        $scope.format = $scope.formats[0];


    }

});

