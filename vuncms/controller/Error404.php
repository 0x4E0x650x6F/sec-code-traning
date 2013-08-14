<?php
Class error404Controller extends BaseController {

    public function index() {
        $this->view->blog_heading = "Error 404";
        $this->setView('error404');
    }
}

?>
