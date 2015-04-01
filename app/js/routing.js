app.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
      when('/userManagement', {
        templateUrl: '../../app/js/userManager/template/userManager.html',
        controller: 'UserManagerController'
      }).
      otherwise({
        redirectTo: '/error'
      });
  }]);


