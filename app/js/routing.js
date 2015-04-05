app.config(['$locationProvider', '$routeProvider',
    function ($locationProvider, $routeProvider) {
        $locationProvider.html5Mode(false);
        $routeProvider.
            when('/userManagement', {
                templateUrl: '../../app/js/userManager/template/userManager.html',
                controller: 'UserManagerController',
                currentRoute: 'userManagement'
            }).
            when('/addUser', {
                templateUrl: '../../app/js/userManager/template/addUser.html',
                controller: 'AddUserController',
                currentRoute: 'addUser'
            }).
            when('/enrollment', {
                templateUrl: '../../app/js/admission/template/enrollment.html',
                controller: 'AdmissionController',
                currentRoute: 'enrollment'
            }).
            when('/', {
                templateUrl: '../../app/js/admission/template/admission.html',
                controller: 'AddUserController',
                currentRoute: 'addUser'
            }).
            otherwise({
                redirectTo: '/'
            });
    }]);


