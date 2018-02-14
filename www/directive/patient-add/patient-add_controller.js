(function() {
	angular.module('mod-patient').controller('PatientAddController', [ '$http', function($http) {
		var vm = this;

		vm.clearForm = function() {
			vm.patFName = "";
			vm.patLName = "";
			vm.patRut = "";
			vm.patRutDV = "";
			vm.patAge = "";
			
			getBenefitList();
			getSexList();
		};
		vm.addPatient = function() {
			inData = $.param({
				patFName: vm.patFName,
				patLName: vm.patLName,
				patRut: vm.patRut,
				patRutDV: vm.patRutDV,
				patAge: vm.patAge,
				patBenId: vm.patBenId,
				patSex: vm.patSex
			});

			$http({
				url: "model/query/patient_add.php", 
				method: "POST",
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
				data: inData
			}).success(function(data, status, headers, config) {
				alert("Insertado");
			}).error(function(data, status, headers, config) {
				alert(data.errMsg);
			});
		};
		
		function getBenefitList() {
			if (!vm.benefitList) {
				$http.post("model/query/benefit-type_get.php").then(function (rs) {
					vm.benefitList = rs.data.benefitList;
					vm.patBenId = vm.benefitList[0].bet_id;
				});
			} else {
				vm.patBenId = vm.benefitList[0].bet_id;
			}
		};
		function getSexList() {
			if (!vm.sexList) {
				vm.sexList = [{'id': 'MASCULINO', 'value': 'Masculino'}, {'id': 'FEMENINO', 'value': 'Femenino'}];
				vm.patSex = 'MASCULINO';
			} else {
				vm.patSex = 'MASCULINO';
			}
		};
	}]);
})();