
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

      $resp = array("out_cod" => "0000", "out_msg" => "Registrado");
      
      $in_fname = "4";
      $in_lname = "4";
      $in_rut = "4";
      $in_rut_dv = "4";
      $in_age = "4";
      $in_sex = "4";
      $in_bet_id = "1";

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
