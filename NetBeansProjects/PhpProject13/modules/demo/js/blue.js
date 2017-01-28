/**
 * @file
 * Contains the definition of the behaviour jsTestBlueWeight.
 */

(function ($, Drupal, drupalSettings) {

var app = angular.module('myApp', []);
app.controller('customersCtrl', function($scope, $http) {
  $http.get("customers.php").then(function (response) {
      $scope.myData = response.data.records;
  });
});

$(".progress div").each(function () {
    var display = $(this),
        currentValue = parseInt(display.text()),
        nextValue = $(this).attr("data-values"),
        diff = nextValue - currentValue,
        step = (0 < diff ? 1 : -1);
    if (nextValue == "0") {
        $(display).css("padding", "0");
    } else {
        $(display).css("color", "#fff").animate({
            "width": nextValue + "%"
        }, "slow");
    }

    for (var i = 0; i < Math.abs(diff); ++i) {
        setTimeout(function () {
            currentValue += step
            display.html(currentValue + "%");
        }, 20 * i);
    }
});


var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope) {
    $scope.count = 0;
    $scope.myFunction = function() {
        $scope.count++;
    }
});

   
})(jQuery, Drupal, drupalSettings);
