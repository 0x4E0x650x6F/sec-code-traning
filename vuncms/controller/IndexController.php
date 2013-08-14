<?php

require_once __SITE_PATH.'/model/PeopleModel.php';
 
Class indexController extends BaseController {
  
	
  public function index() {
	
  	   $animal = new PeopleModel($this->registry);
  	   
  	   $rows = $animal->fetchAll();
  	   
    $this->view->welcome ="Welcome";
		$this->view->users = $rows;
        $this->setView('index');
    }
}

?>
