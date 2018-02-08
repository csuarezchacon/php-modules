(function() {
	angular.module('php-modules').controller('HomeController', [
		'$stateParams', function($stateParams) {
			var vm = this;
			alert("home");
			vm.saludo = 'DESKTOP!!!';
		}
	]);
})();
