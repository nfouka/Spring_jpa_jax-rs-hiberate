
var app = angular.module('myApp', []);
app.controller('customersCtrl', function($scope, $http) {
 $http.get("http://192.168.1.20:8888/medecins").then(function (response) {
      $scope.myData = response.data;
  });
});


var app2 = angular.module('myApp2', []);
app2.controller('customersCtrl2', function Ctrl($scope,$http) {
    
    
     $http.get("http://192.168.1.20:8888/medecins").then(function (response) {
      $scope.myData = response.data;
  });
    
   

});





angular.element(document).ready(function() {
  angular.bootstrap(document.getElementById("s3_container2"),['myApp2']);
});