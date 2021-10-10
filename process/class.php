<?php
if(!isset($_SESSION))
{
	session_start();
}
	require 'config.php'; 
	class db_class
	{
		public $host = db_host;
		public $user = db_user;
		public $pass = db_pass;
		public $dbname = db_name;
		public $conn;
		public $error;
 
		public function __construct()
			{
			$this->connect();
			}
 
		public function connect()
			{
			return $conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
			// if(!$this->conn)
			// 	{
			// 	$this->error = "Fatal Error: Can't connect to database".$this->conn->connect_error;
			// 	return false;
			// 	}
			}

		
		
	}
?>