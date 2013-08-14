<?php
/**
 * Description of BaseController
 *
 * @author 0x4E0x650x6F
 */
abstract class BaseController {

 /*
 * @registry object
 */
protected $registry;
protected $view;

function __construct($registry) {
	$this->registry = $registry;
    $this->view = $this->registry->template;
}

/**
 * Default controller method default controller action
 * @all controllers must contain an index method
 */
abstract function index();

protected function setView($view) {
    $this->view->getView($view);
}

}

?>
