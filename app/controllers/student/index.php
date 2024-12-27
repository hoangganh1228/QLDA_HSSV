<?php
class index extends Controller {
    private $model, $view;
    public function __construct() {
        $this->model = $this->model("TestModel");
        $this->view = $this->view("student/index",[]);
    }
    public function index() {
        $this->model->them();
      
    }
}