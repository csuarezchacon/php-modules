(function() {
	angular.module('php-modules').controller('HomeController', [
		'$stateParams', function($stateParams) {
			var vm = this;
			vm.saludo = 'DESKTOP!!!';
		}
	]);
})();