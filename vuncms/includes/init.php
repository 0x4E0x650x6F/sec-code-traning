<?php

include __SITE_PATH. '/application/'. 'BaseController.php';
include __SITE_PATH. '/application/'. 'BaseModel.php';
include __SITE_PATH. '/application/'. 'Registry.php';
include __SITE_PATH. '/application/'. 'Router.php';
include __SITE_PATH. '/application/'. 'Template.php';
include __SITE_PATH. '/application/'. 'LoadSetup.php';
include __SITE_PATH. '/application/'. 'DataBase.php';

/*** auto load model classes ***/
//function __autoload($class_name) {
//	
//    $filename = strtolower($class_name) . '.php';
//    $file = __SITE_PATH . '/model/' . $filename;
//
//    if (file_exists($file) == false)
//    {
//       return false;
//    }
//  include ($file);
//}

/*** a new registry object ***/
 $registry = new registry;
 $loadSetup = new LoadSetup("config.xml");


 /** 
  * contains information about the database Connection
  * @var 
  */
 
 $dbInfo = array (
 	'hostname' => $loadSetup->getHostName(),
 	'dbName'   => $loadSetup->getDbName(),
 	'username' => $loadSetup->getUsername(),
 	'pwd'      => $loadSetup->getPassword()
 );
 
 /*** create the database registry object ***/
 $registry->db = dataBase::getInstance($dbInfo);

 ?>
