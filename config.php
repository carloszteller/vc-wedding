<?php
	define('DBHOST', 'localhost');
	define('DBUSER', 'username');
	define('DBPASS', 'password');
	define('DB', 'vc_wedding');
	
	class Database {
		private $dbHost = DBHOST;
		private $dbUser = DBUSER;
		private $dbPass = DBPASS;
		private $db = DB;
		
		public $connect;
		
		public function dbConnect() {
			$this->connect = new mysqli($this->dbHost, $this->dbUser, $this->dbPass, $this->db) or die(mysqli_connect_error());
			
			return $this->connect;
		}
	}
?>