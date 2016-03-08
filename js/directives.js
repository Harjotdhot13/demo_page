//custom directive
pageInfoBaseControllers.directive('customwidget', function(){
	return {
		restrict: 'A', // A is or attribute 
		templateUrl: '../demo_page/partialviews/widgetview.html'
	};
});
