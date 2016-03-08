/*
 * This controller will take care of parsing the data from json file
 */
// json file url with arguments
var jsonFileUrl = 'inc/json/source.json';
var pageInfoBaseControllers = angular.module('pageInfoBase', ['chart.js', 'gaugejs', 'chartnewjs', 'ngMaterial', 'datatables', 'ngResource']);
// var pageInfoBaseControllers = angular.module('pageInfoBase',  ['gaugejs', 'chartnewjs', 'ngMaterial', 'datatables', 'ngResource']);
pageInfoBaseControllers.controller('PageInfoBaseController', ['$scope', '$http', 'getTasks', function($scope, $http, getTasks) {
   $scope.loading = true;
   $http.get(jsonFileUrl).success(function(data) {
      $scope.landingPageData = data;
   }).catch(function(err) {
      // Log error somehow.
   }).finally(function() {
      // Hide loading spinner whether our call succeeded or failed.
      $scope.loading = false;
   });
   // function to capture the pageWidgets,pageCharts
   $scope.captureimg = function(pageChart, id) {
         var chartId = 'pageChart' + pageChart + '-' + id; //e.g:-(pageChart0-1)
         var buttonId = '#pageChartSaveBtn-' + id;
         // jQuery to hide save button while saving the image.
         jQuery(buttonId).css("display", "none");
         html2canvas(document.getElementById(chartId), {
            onrendered: function(canvas) {
               var a = document.createElement('a');
               //toDataURL defaults to png, so we need to request a jpeg, then convert for file download.
               a.href = canvas.toDataURL("image/jpeg").replace("image/jpeg", "image/octet-stream");
               a.download = 'JPG' + chartId + '.png';
               a.click();
               //  var img = canvas.toDataURL("image/png");
               // window.open(img);
               // document.body.appendChild(canvas);
            },
            // height:2000,
            // width: 384
         });
         //to show save button after saving the image.
         jQuery(buttonId).css("display", "block");
      }
      // // function to capture the widgets
      // $scope.capturewidget = function(pageWidgets, id) {
      //   var widgetId = 'pageWidgets' + '-' + id;
      //   var buttonId = '#pageWidgetsSaveBtn-' + id;
      //   // jQuery to hide save button while saving the image.
      //   jQuery(buttonId).css("display", "none");
      //   html2canvas(document.getElementById(widgetId), {
      //     onrendered: function(canvas) {
      //       var a = document.createElement('a');
      //       a.href = canvas.toDataURL("image/jpeg").replace("image/jpeg", "image/octet-stream");
      //       a.download = 'JPG' + widgetId + '.png';
      //       a.click();
      //     },
      //     // height:2000,
      //     // width: 384
      //   });
      //   //to show save button after saving the image.
      //   jQuery(buttonId).css("display", "block");
      // }
   $scope.loadGraph = function(data, id, type, legend) {
      if (type == "Bar" && id == 100) {
         var ChartOptions = {
            animation: true,
            responsive: true,
            responsiveMinHeight: 150,
            responsiveMaxHeight: 280,
            bezierCurveTension: 0.1,
            annotateDisplay: true,
            annotateClassName: "my11001799tooltip",
            datasetStrokeWidth: 2,
            inGraphDataTmpl: '<%=v6+"%"%>',
            datasetFill: false,
            pointDotRadius: 6,
            maxBarWidth: 25,
            barStrokeWidth: 18,
            // graphMin : 0,
            // graphMax : 100,
            legend: true,
            legendBorders: false,
            legendFontColor: '#000',
            legendFontFamily: 'Roboto,\'Helvetica Neue\',sans-serif',
            // bar chart- Number - Spacing between each of the X value sets
            barValueSpacing: 50,
            // doughnut chart - Number - The percentage of the chart that we cut out of the middle
            percentageInnerCutout: 99,
            yAxisMinimumInterval: 1,
         }
      } else {
         var ChartOptions = {
            animation: true,
            responsive: true,
            responsiveMinHeight: 280,
            responsiveMaxHeight: 400,
            bezierCurveTension: 0.1,
            annotateDisplay: true,
            annotateClassName: "my11001799tooltip",
            datasetStrokeWidth: 2,
            inGraphDataTmpl: '<%=v6+"%"%>',
            annotateDisplay: true,
            annotateLabel: '<%=v1+" - "+v2+": "+v3%>',
            datasetFill: false,
            pointDotRadius: 6,
            // graphMin : 0,
            // graphMax : 100,
            legend: true,
            legendBorders: false,
            legendFontColor: '#000',
            legendFontFamily: 'Roboto,\'Helvetica Neue\',sans-serif',
            // bar chart- Number - Spacing between each of the X value sets
            barValueSpacing: 20,
            // doughnut chart - Number - The percentage of the chart that we cut out of the middle
            percentageInnerCutout: 99,
            yAxisMinimumInterval: 1,
         }
      }
      // window.onload = function () {
      if (id) {
         $scope.drawTheChart(data, ChartOptions, id, type);
      } else {
         console.log('error');
      }
      // }
   }
   $scope.drawTheChart = function(ChartData, ChartOptions, ChartId, ChartType) {
      // var landingPageProgramsByRegion = new Chart(document.getElementById(ChartId).getContext("2d"))'.'+ChartType+(ChartData,ChartOptions);
      eval('var myLine = new Chart(document.getElementById(ChartId).getContext("2d")).' + ChartType + '(ChartData, ChartOptions);document.getElementById(ChartId).getContext("2d").stroke();')
   }
}]);
pageInfoBaseControllers.directive('flexxiachartjs', function() {
   return {
      restrict: 'A',
      scope: {
         drawTheChart: '&callbackFn'
      },
      link: function(scope, element, attrs) {
         attrs.type = attrs.type;
         attrs.id = attrs.id;
         attrs.data = attrs.data;
         attrs.options = attrs.options;
         var ChartOptions = {
            animation: true,
            responsive: true,
            responsiveMinHeight: 150,
            responsiveMaxHeight: 280,
            bezierCurveTension: 0.1,
            annotateDisplay: true,
            annotateClassName: "my11001799tooltip",
            datasetStrokeWidth: 2,
            inGraphDataTmpl: '<%=v6+"%"%>',
            datasetFill: false,
            pointDotRadius: 6,
            maxBarWidth: 25,
            barStrokeWidth: 18,
            // graphMin : 0,
            // graphMax : 100,
            legend: true,
            legendBorders: false,
            legendFontColor: '#000',
            legendFontFamily: 'Roboto,\'Helvetica Neue\',sans-serif',
            // bar chart- Number - Spacing between each of the X value sets
            barValueSpacing: 50,
            // doughnut chart - Number - The percentage of the chart that we cut out of the middle
            percentageInnerCutout: 99,
            yAxisMinimumInterval: 1,
         }
         element.attr('id', attrs.id);
         eval('var myLine = new Chart(document.getElementById(' + attrs.id + ').getContext("2d")).' + attrs.type + '(' + attrs.data + ', ' + attrs.options + ');document.getElementById(' + attrs.id + ').getContext("2d").stroke();')
      }
   };
});
pageInfoBaseControllers.controller('GaugeJsController', ['$scope', '$timeout', function($scope, $timeout) {
   $scope.animationTime = 10;
   $scope.maxValue = 100;
}]);
/* to get async json */
pageInfoBaseControllers.service('getTasks', function($http) {
   return {
      getJson: function() {
         return $http.get(jsonFileUrl, function(response) {
            alert('working');
            return response.data;
         });
      }
   }
});
/* Top Rated Speaker controller */
pageInfoBaseControllers.controller('LandingPageTopRatedDatatables', AngularWayCtrl);

function AngularWayCtrl($http, $scope, $resource, DTOptionsBuilder, DTColumnDefBuilder, DTDefaultOptions) {
   // var vm = this;
   // vm.persons = [];
   angular.element(document).ready(function() {
      $http.get(jsonfileUrl).success(function(data) {
         $scope.topRatedSpeakers = data.tableTopRatedSpeakers;
         $scope.topRatedPrograms = data.tableTopAccreditedProgram;
      });
   });
   $scope.dtOptions = {
      paginationType: 'full_numbers',
      bInfo: false,
      // sDom: '<"top">rt<"bottom"flp><"clear">',
      language: {
         "zeroRecords": "<i style='font-size: 20px;' class='fa fa-refresh fa-spin'></i>",
         "searchPlaceholder": "SEARCH",
         "sSearch": "",
         "oPaginate": {
            "sFirst": "",
            "sLast": "",
            "sNext": "<span class='fa fa-caret-right color-00a9e0'></span>",
            "sPrevious": "<span class='fa fa-caret-left color-00a9e0'></span>",
         },
         "sLengthMenu": ' <select>' + '<option value="10">SHOW 10</option>' + '<option value="20">SHOW 20</option>' + '<option value="30">SHOW 30</option>' + '<option value="40">SHOW 40</option>' + '<option value="50">SHOW 50</option>' + '<option value="-1">SHOW All</option>' + '</select> '
      },
   };
}