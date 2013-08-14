<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * @author 0x4E0x650x6F
 */

require_once 'DBQuery.php';

class BaseModel {

    protected $registry;
    private $dbQuery;
    
    protected $_tableName;
    protected $_primaryKey;
    
    private $tbname;
    
    function __construct($registry) {
    	
		$this->registry = $registry;
		$this->dbQuery = new DBQuery($this->registry);
		
    }
    
    function fetchAll() {
    	$sql  = "SELECT * FROM ";
    	$sql .= $this->_tableName;
    	
    	$records = $this->dbQuery->costumQuery($sql);
		$rows = $records->fetchAll(PDO::FETCH_ASSOC);
		
		return $rows;	
    }
    
    function printTablename() {
    	return $this->tbname;	
    }
    
    
}

?>
