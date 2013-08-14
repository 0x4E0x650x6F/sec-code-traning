<?php
Class BlogController extends BaseController {

    public function index() {
        $this->view->blog_heading = "Blog Index";
        
        $this->setView('blog_index');
    }

    public function view() {
       $this->view->blog_heading = "Blog Heading";
       $this->view->blog_content = "Blog Content";
       $this->setView("blog_view");
    }
}
?>
