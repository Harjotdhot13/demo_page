var app = angular.module('MyApp.controllers', []).
var jsonFileUrl = 'inc/json/source.json';

var pageInfoBaseControllers = angular.module('pageInfoBase',  ['chart.js', 'gaugejs', 'chartnewjs', 'ngMaterial', 'datatables', 'ngResource']);
// var pageInfoBaseControllers = angular.module('pageInfoBase',  ['gaugejs', 'chartnewjs', 'ngMaterial', 'datatables', 'ngResource']);
pageInfoBaseControllers.controller('PageInfoBaseController', ['$scope', '$http', 'getTasks', function ($scope, $http, getTasks) {

  $scope.loading = true;
  $http.get(jsonFileUrl).success(function(data) {
  $scope.landingPageData = data;
  }).catch(function (err) {
    // Log error somehow.
  })
  .finally(function () {
    // Hide loading spinner whether our call succeeded or failed.
    $scope.loading = false;
  });