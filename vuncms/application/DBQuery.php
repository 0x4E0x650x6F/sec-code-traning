<?php 
	
	/*
		Database Query Abstraction Class mysql
		@author 0x4E0x650x6F
		03\02\10 
	*/

	class DBQuery {
	
		private $db = null;
		protected $registry;
		
		function __construct($registry) {
			
			$this->registry = $registry;
	        $this->db = $this->registry->db;	
		
		} 
		
		public function dbSelect($table, $fieldname=null, $id=null) {
			
			$sql ="SELECT * FROM `$table` WHERE `$fieldname`=:id";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(':id', $id);
			
			$stmt->execute();
			
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		
		public function costumQuery($sql) {
			
			return $this->db->query($sql);
		}
		
		public function dbInsert($table, $values) {
			
			$fieldnames = array_keys($values[0]);
			$size = sizeof($fieldnames);
			$i = 1;
			$sql = "INSERT INTO $table";
			$fields = '('.implode(' ,',$fieldnames) .')';
			$bound = '(:'.implode(', :',$fieldnames) .')';
			$sql .= $fields.'VALUES'.$bound;
			
			$stmt = $this->db->prepare($sql);
			foreach($values as $vals)
			{
				$stmt->execute($vals);
			}
			
		}
		
		public function dbUpdate($table, $fieldname, $value, $pk, $id) {
			
			$sql = "UPDATE `$table` SET `$fieldname`='{$value}' WHERE `$pk` = :id";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(':id', $id, PDO::PARAM_STR);
			$stmt->execute();
			
		}
		
		public function dbDelete($table, $fieldname, $id) {
			
			$sql = "DELETE FROM `$table` WHERE `$fieldname` = :id";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(':id', $id, PDO::PARAM_STR);
			
			$stmt->execute();
		}
		
	}

?>