
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

      $in_fname = "4";
      $in_lname = "4";
      $in_rut = "4";
      $in_rut_dv = "4";
      $in_age = "4";
      $in_sex = "4";
      $in_bet_id = "1";

			$query = "insert into patient (
    		pat_fname,
        pat_lname,
        pat_rut,
        pat_rut_dv,
        pat_age,
        pat_sex,
        bet_id ) values (
          {$in_fname},
          {$in_lname},
          {$in_rut},
          {$in_rut_dv},
          {$in_age},
          {$in_sex},
          {$in_bet_id});";

			$stmt = $this->conn->prepare($query);

			$stmt->execute();

			return $stmt;
		}
	}
?>
