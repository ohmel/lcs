app.service('testsService', function ($http, Globals) {

    "use strict";

    var url = Globals.rootUrl+"index.php/api/",
        tests = [],
        fetchTests = function (callback, errback) {
            $http({
                method: 'GET',
                url: url+'admission/fetchTests'
            }).success(callback).error(errback);
        },
        addTest = function(callback, errback, test){
            $http({
                method: 'POST',
                url: url+'tests/addTest',
                data: test
            }).success(callback).error(errback);
        },
        getTest = function (callback, errback, testId){
            $http({
                method: 'GET',
                url: url+'admission/getTest',
                params: {'testId': testId}
            }).success(callback).error(errback);
        };



    return {
        tests: tests,
        fetchTests: fetchTests,
        addTest: addTest,
        getTest: getTest
    };
});