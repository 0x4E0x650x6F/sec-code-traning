<?php
/**
 * Description of Router
 * Default simple routing class used to simplify the controller acess
 * @author 0x4E0x650x6F
 */
class Router {

    private $registry;

    /*
     * @the controller path
     *
     */
    private $path;

    private $args = array();

    public  $file;

    public $controller;

    public $action;

    function  __construct($registry) {
        $this->registry = $registry;
    }

    function setPath($path) {

      if(is_dir($path) == false) {
          throw new Exception("Invalid controller Path:". $path ." ");
      }
        
      $this->path = $path;
    }
    
  public function loader()
 {
	/*** check the route ***/
	$this->getController();

	/*** if the file is not there diaf ***/
	if (is_readable($this->file) == false)
	{
		$this->file = $this->path.'/error404.php';
                $this->controller = 'error404';
	}

	/*** include the controller ***/
	include $this->file;

	/*** a new controller class instance ***/
	$class = $this->controller . 'Controller';
	$controller = new $class($this->registry);

	/*** check if the action is callable ***/
	if (is_callable(array($controller, $this->action)) == false)
	{
		$action = 'index';
	}
	else
	{
		$action = $this->action;
	}
	/*** run the action ***/
	$controller->$action();
 }


 /**
 *
 * @get the controller
 *
 * @access private
 *
 * @return void
 *
 */
private function getController() {

	/*** get the route from the url ***/
	$route = (empty($_GET['rt'])) ? '' : $_GET['rt'];
        //make shore the fist leter of the word is uppercase
        $route = ucfirst($route);
	if (empty($route))
	{
		$route = 'Index';
	}
	else
	{
		/*** get the parts of the route ***/
		$parts = explode('/', $route);
		$this->controller = ucfirst($parts[0]);
		if(isset( $parts[1]))
		{
			$this->action = $parts[1];
		}
	}

	if (empty($this->controller))
	{
		$this->controller = 'Index';
	}

	/*** Get action ***/
	if (empty($this->action))
	{
		$this->action = 'index';
	}

	/*** set the file path ***/
	$this->file = $this->path .'/'. $this->controller . 'Controller.php';
}

}
?>
