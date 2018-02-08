(function (){
	angular.module('php-modules').config(
	['$urlRouterProvider', '$stateProvider', function($urlRouterProvider, $stateProvider) {

		$stateProvider.state('/home', {
			url: '/home',
			controller: 'HomeController',
			controllerAs: 'vmHome',
			templateUrl: 'www/pages/home/home.html'
		});
  }]);
})();
