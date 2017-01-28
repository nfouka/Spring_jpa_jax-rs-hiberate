

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope) {
    $scope.firstName = "John";
    $scope.lastName = "Doe";
});



var app = angular.module('myAppHttp', []);
app.controller('customersCtrl', function($scope, $http) {
  $http.get("http://192.168.1.20:8888/medecins").then(function (response) {
      $scope.myData = response.data;
  });
});


