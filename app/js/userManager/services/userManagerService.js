app.service('userManagerService', function ($http,
                                            ngNotify) {

    "use strict";

    var url = "http://localhost/lcs/index.php/api/user/",
        users = [],
        fetchUsers = function (callback, errback) {
            $http({
                method: 'GET',
                url: url + 'fetchUsers',
            }).success(callback).error(errback);
        };


    return {
        users: users,
        fetchUsers: fetchUsers
    };
});