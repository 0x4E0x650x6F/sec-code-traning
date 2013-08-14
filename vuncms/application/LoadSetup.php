<?php
/**
 * Description of LoadConfig
 * default configuration
 * @author 0x4E0x650x6F
 */
Class LoadSetup {

	private $_xml;
	private $_path;
	public  $hostname;
	public  $username;
	public  $password;
	public  $dbname;
	public  $dbtype;

	public function __construct($filename) {
		$this->_path = __SITE_PATH.'\config\\';
		$this->_path .= $filename;
		if ( ! $this->_xml = simplexml_load_file($this->_path) )
		{
			echo"Error: loading xml configuration file";
		}

	}

	function getPath() {
		return $this->_path;
	}
	function getHostName() {
		return $this->_xml->database->hostname;
	}

	function getPortNumber() {
		return $this->_xml->database->port;
	}

	function getDbName() {
		return $this->_xml->database->dbname;
        }

	function getUsername() {
		return $this->_xml->database->username;
	}
	function getPassword() {
		return $this->_xml->database->password;
	}
	function getDbtype() {
		return $this->_xml->database->dbtype;
	}
}
?>
