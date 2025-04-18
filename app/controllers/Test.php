<?php
class Test extends Controller {
    private $model, $view;
    public function __construct() {
        $this->model = $this->model("TestModel");
        $this->view = $this->view("TestView",[]);
    }
    public function index() {
        $this->model->them();
    }
}