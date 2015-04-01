app.service('userManagerService', function ($http, Globals) {

    "use strict";

    var url = Globals.rootUrl+"index.php/",
        users = [],
        fetchUsers = function (callback, errback) {
            $http({
                method: 'GET',
                url: url+'api/user/fetchUsers'
            }).success(callback).error(errback);
        };


    return {
        users: users,
        fetchUsers: fetchUsers
    };
});