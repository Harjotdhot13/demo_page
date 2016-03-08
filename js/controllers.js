// controller
var jsonFileUrl = 'inc/json/source.json';
var pageInfoBaseControllers = angular.module('pageInfoBase', ['gaugejs', 'chartnewjs', 'ngMaterial', 'datatables', 'ngResource']);
pageInfoBaseControllers.controller('PageInfoBaseController', ['$scope', '$http', function($scope, $http) {
   console.log('working controller');
   $scope.loading = true;
   $http.get(jsonFileUrl).success(function(data) {
      $scope.landingPageData = data;
   })
}]);