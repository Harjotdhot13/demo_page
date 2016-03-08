/*global window:false, angular:false, Gauge:false*/

/**
 * angular-ChartNew.js version 0.1
 * License: MIT.
 * Copyright (C) 2014, (Flexxia Corp.)
 */

(function(angular) {
    'use strict';
  //alert('working');
  angular.module('chartnewjs', [])
  .directive('chartnewjs', [function() {
    return {
      restrict: 'AC',
      link: function($scope, $element) {
        // Data for charts

      }
    };
  }]);

})(window.angular);
