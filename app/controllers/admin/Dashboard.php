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
<<<<<<< HEAD
      
=======
        // Kiểm tra nếu người dùng chưa đăng nhập
        if (!isset($_SESSION['user_id'])) {
            header('Location: /admin/Users/login');
            exit();
        }
>>>>>>> 82c559a68c975ba92cd746b127e4aabde6ac1458


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