<?php
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");

  include_once '../conn.php';
  include_once '../object/patient-object.php';

  $database = new Database();
  $db = $database->getConnection();
  $patient = new Patient($db);

  $resp = $patient->add();

  echo json_encode($resp);

?>
