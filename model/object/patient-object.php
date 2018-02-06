
<?php
	class Patient{
		private $conn;
		private $tableName = 'patient';

		public $id;
		public $fname;
    public $lname;
    public $rut;
    public $rut_dv;
    public $age;
    public $sex;
    public $bet_id;

		public function __construct($db) {
			$this->conn = $db;
		}

		function add(){

		$in_fname = $_POST['patFName'];
		$in_lname = $_POST['patLName'];
		$in_rut = $_POST['patRut'];
		$in_rut_dv = $_POST['patRutDV'];
		$in_age = $_POST['patAge'];
		$in_sex = $_POST['patSex'];
		$in_bet_id = $_POST['patBenId'];

      $resp = array("out_cod" => "0000", "out_msg" => "Registrado " . $in_fname);

      $sqlCanPat = "select count(1) from patient pat where pat.pat_rut = '" . $in_rut . "';";
      $stmt = $this->conn->prepare($sqlCanPat);
      $stmt->execute();

      $val = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($val['count(1)'] == 0) {
        $sqlPatAdd = "call patientAdd(
          {$in_fname},
          {$in_lname},
          {$in_rut},
          {$in_rut_dv},
          {$in_age},
          {$in_sex},
          {$in_bet_id});";
        $stmt = $this->conn->prepare($sqlPatAdd);
        $stmt->execute();

      } else if ($val["count(1)"] == 1) {
        $resp = array("out_cod" => "1000", "out_msg" => "Paciente ya existe ");
      } else {
        $resp = array("out_cod" => "1001", "out_msg" => "Error desconocido ");
      }

			return $resp;
		}
	}
?>
