/**
 * @file
 * Contains the definition of the behaviour jsTestRedWeight.
 */

(function ($, Drupal, drupalSettings) {

  'use strict';

  /**
   * Attaches the JS test behavior to weight div.
   */


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

})(jQuery, Drupal, drupalSettings);
