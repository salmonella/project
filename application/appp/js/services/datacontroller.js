'use strict';
    app.controller('datacontroller', function($scope,$http) {
    	$scope.activation=null;
    	$scope.datafetch = function() {
    		$http.get("data/datafetch.php").success(function(response) {$scope.student = response;});
    	}