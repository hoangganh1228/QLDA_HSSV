<?php
  class Dashboard extends Controller {
    private $model;

    function __construct()
    {
        $this->model = $this->model('admin/UsersModel');
    }
    public function index() {
        if (session_status() === PHP_SESSION_NONE) {
          session_start();
        }
      


        // Lấy thông tin để hiển thị trên dashboard
        $data = [
            'username' => $_SESSION['username'],
           
            'message' => "Chào mừng bạn, {$_SESSION['username']}!",
        ];
        $user = $this->model->getAllUsers();
        // Hiển thị view chung
        $this->view('/admin/dashboard/index',  $data);
        // $this->view('/admin/dashboard/index', ['user'=>$user]);

    }
  }
?>