<?php

/**
 * Description of Template
 * class determins template Structure
 * 
 * @author 0x4E0x650x6F
 */

class Template {

/*
 * @the registry
 * @access private
 */
  private $registry;

  /*
   * @variables array
   * @access private 
   */
  private $vars = array();

  /**
   * @constructor
   * @access prublic
   * @return void
   */
   function  __construct($registry) {
        $this->registry = $registry;
   }
   
   /**
    * @set undefined vars
    * @param Sting $index
    * @param mixed $value
    * return void
    */
   public function  __set($index,  $value) {
        $this->vars[$index] = $value;
   }

  function getView($name) {
	$path = __SITE_PATH . '/views' . '/' . $name . '.phtml';

	if (file_exists($path) == false)
	{
		throw new Exception('Template not found in '. $path);
		return false;
	}

	// Load variables
	foreach ($this->vars as $key => $value)
	{
		$$key = $value;
	}

	include ($path);
}
   
}
?>
