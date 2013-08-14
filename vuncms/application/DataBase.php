<?php
	/*
		Database Class created to mysql
		@author 0x4E0x650x6F
		03\02\10 
	*/
	class DataBase {
	
		private static $instance 	 = null;
		
		private static $username 	 = null;
		private static $password 	 = null;
		private static $hostname 	 = null;
		private static $databaseName = null;
		
		public function __construct() {
			
		}
		
		public function setUsername($user) {
			self::$username = $user;
		}
			
		public function setPassword($pwd) {
			self::$password = $pwd;
		}
		
		public function setDatabaseName($dbName) {
			self::$databaseName = $dbName;
		}
		
		public function setHostname($hostname) {
			self::$hostname = $hostname;
		}
		
		
		public static function getInstance($sessionInfo) {
			
			if(!is_array($sessionInfo)) {
				echo "[ERROR] - getInstance value must be array";
			} 
			try {
					if(!self::$instance) 
					{
						self::$instance = new PDO("mysql:host=".$sessionInfo['hostname'].";dbname=".$sessionInfo['dbName'], $sessionInfo['username'], $sessionInfo['pwd']);
						self::$instance-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					}
					return self::$instance;
					
				} catch (PDOException $e) {
						
						print "Error!: " . $e->getMessage() . "<br/>";
						die();
				}
		}
		
		private function __clone() {
			
		}
	
	}
	
?>