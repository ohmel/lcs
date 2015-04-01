app.config(['$locationProvider', '$routeProvider',
    function ($locationProvider, $routeProvider) {
        $locationProvider.html5Mode(false);
        $routeProvider.
            when('/userManagement', {
                templateUrl: '../../app/js/userManager/template/userManager.html',
                controller: 'UserManagerController'
            }).
            otherwise({
                redirectTo: '/error'
            });
    }]);


