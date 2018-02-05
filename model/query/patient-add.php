<?php
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");

  include_once '../conn.php';
  include_once '../object/patient-object.php';

  $database = new Database();
  $db = $database->getConnection();
  $patient = new Patient($db);

  $stmt = $patient->add();
  $num = $stmt->rowCount();

  if ($num>0) {
    echo json_encode(array("message" => "ok"));
  } else {
    echo json_encode(array("message" => "error"));
  }
?>
