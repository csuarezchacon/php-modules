(function (){
	angular.module('php-modules').config(
	['$urlRouterProvider', '$stateProvider', function($urlRouterProvider, $stateProvider) {
	$urlRouterProvider.otherwise('/home');

  $stateProvider.state('/home', {
			url: '/home',
			controller: 'HomeController',
			controllerAs: 'vmHome',
			templateUrl: 'www/pages/home/home.html'
		});
  }]);
})();
