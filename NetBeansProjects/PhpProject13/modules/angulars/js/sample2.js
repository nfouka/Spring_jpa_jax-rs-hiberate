

var app = angular.module('myAppHttp', []);
app.controller('customersCtrl', function($scope, $http) {
  $http.get("http://192.168.1.20:8888/medecins").then(function (response) {
      $scope.myData = response.data;
  });
});



