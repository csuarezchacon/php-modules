<?php
	include '../conn.php';
	include '../error-handler.php';
	
	try {
		$conn = new PDO("mysql:host=$serv;dbname=$dbnm", $user, $pass);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stat = 'Conectado';

		$in_fname = $_POST['patFName'] ? "'" . $_POST['patFName'] . "'" : 'null';
		$in_lname = $_POST['patLName'] ? "'" . $_POST['patLName'] . "'" : 'null';
		$in_rut = $_POST['patRut'] ? "'" . $_POST['patRut'] . "'" : 'null';
		$in_rut_dv = $_POST['patRutDV'] ? "'" . $_POST['patRutDV'] . "'" : 'null';
		$in_age = $_POST['patAge'] ? "'" . $_POST['patAge'] . "'" : 'null';
		$in_sex = $_POST['patSex'] ? "'" . $_POST['patSex'] . "'" : 'null';
		$in_bet_id = $_POST['patBenId'] ? "'" . $_POST['patBenId'] . "'" : 'null';

		$sqlPatientAdd = "call patientAdd(
			{$in_fname},
			{$in_lname},
			{$in_rut},
			{$in_rut_dv},
			{$in_age},
			{$in_sex},
			{$in_bet_id});";
		$conn->exec($sqlPatientAdd);
		
		$stat = "Paciente registrado";
	} catch (PDOException $e) {
		http_response_code(500);
		$stat = json_encode(errorHandler($e));
		//$stat = errorHandler($e);
	}

	echo $stat;
	$conn = null;
?>