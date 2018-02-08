(function () {
	angular.module('mod-patient').directive('patientAdd', function() {
		return {
			restrict: 'E',
			controller: 'PatientAddController',
			controllerAs: 'vm',
			templateUrl: 'www/directive/patient-add/patient-add.html'
		}
	});
})();