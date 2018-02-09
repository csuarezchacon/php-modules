<?php
	include '../conn.php';
	include '../error-handler.php';

	try {
		$conn = new PDO("mysql:host=$serv;dbname=$dbnm", $user, $pass);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$stmt = $conn->prepare("select bet_id, bet_name from benefit_type"); 
		$stmt->execute();

		$benefitList = array();
		$i = 0;
		foreach($stmt->fetchAll() as $row) {
			$benefitList[$i] = array('bet_id' => $row['bet_id'], 'bet_name' => $row['bet_name']);
			$i = $i + 1;
		}

		$resp = array('benefitList' => $benefitList, 'respCod' => 0, 'respMsg' => 'OK');
		
	} catch (PDOException $e) {
		$err = errorHandler($e);
		$resp = array('benefitList' => array(), 'respCod' => $err['errCod'], 'respMsg' => $err['errMsg']);
	}

	$conn = null;

	echo json_encode($resp);
?>