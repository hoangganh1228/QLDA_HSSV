<?php
  class Dashboard extends Controller {
    public function index() {
        if (session_status() === PHP_SESSION_NONE) {
          session_start();
        }
        // Kiểm tra nếu người dùng chưa đăng nhập
        if (!isset($_SESSION['user_id'])) {
            header('Location: /QLDA_HSSV/admin/users/login');
            exit();
        }

        // Xác định vai trò của người dùng
        $role = $_SESSION['role'];

        // Lấy thông tin để hiển thị trên dashboard
        $data = [
            'username' => $_SESSION['username'],
            'role' => $role,
            'message' => "Chào mừng bạn, {$_SESSION['username']}!",
        ];

        // Hiển thị view chung
        $this->view('/admin/dashboard/index', $data);
    }
  }
?>