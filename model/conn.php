<?php
	class Database {
		private $host = 'localhost';
		private $dbName = 'matasanos';
		private $userName = 'root';
		private $password = '123456';

		public function getConnection(){
			$this->conn = null;
			try {
				$this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbName, $this->userName, $this->password);
				$this->conn->exec("set names utf8");
			} catch(PDOException $exception){
				echo "Connection error: " . $exception->getMessage();
			}

			return $this->conn;
		}
	}
?>
