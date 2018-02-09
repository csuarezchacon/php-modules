(function() {
	angular.module('mod-patient').controller('PatientAddController', [ '$http', function($http) {
		var vm = this;

		vm.patFName = "";
		vm.patLName = "";
		vm.patRut = "";
		vm.patRutDV = "";
		vm.patAge = "";
		vm.patSex = "";
		vm.patBenId = "";

		benefitList();

		function benefitList() {
			$http.post("model/query/benefit-type_get.php").then(function (rs) {
				vm.benefitList = rs.data.benefitList;
				vm.patBenId = vm.benefitList[0].bet_id;
			});
		};

		vm.addPatient = function() {
			alert(vm.patBenId);
		};
	}]);
})();