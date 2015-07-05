var app = angular.module('myApp', []);
       app.controller('customersCtrl', 
	   function($scope, $http) {
       $http.get("connection.js")
       .success(function(response) {$scope.names = response.records;});
});