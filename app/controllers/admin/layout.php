<?php
    class Layout extends Controller
    {
        private $model;

        function __construct()
        {
            $this->model = $this->model('admin/UsersModel');
        }
        function index()
        {
            $user = $this->model->getAllUsers();
            $khoahocs = $this->model->getAllKhoaHoc(); 
            $departments = $this->model->getAllDepartments(); 
            // echo '<pre>';   
            // print_r($departments);
            // echo '</pre>';
            $classes = $this->model->getAllClasses(); 
            $this->view('admin/layout', ['user' => $user,
            'khoahocs' => $khoahocs,
            'departments' => $departments,
            'classes' => $classes]);
            
        }
        // function resetPassword (){
        //     $user = $this->model->getAllUsers();

        //     $this->view('/student/users/resetPassword', ['user'=>$user]);
        // }
        // public function logout() {
        //     session_start();
        //     session_unset();
        //     session_destroy();
        //     header('Location: /student/users/login');
        // }
        // public function resetPasswordPost() {
        //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //         // Lấy và lọc dữ liệu từ form
        //         $filteredPost = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        //         $username = $filteredPost['username'] ?? null;
        //         $oldPassword = $filteredPost['old_password'] ?? null;
        //         $newPassword = $filteredPost['new_password'] ?? null;
        //         $confirmPassword = $filteredPost['confirm_password'] ?? null;
        
        //         // Kiểm tra dữ liệu đầu vào
        //         if (!$username || !$oldPassword || !$newPassword || !$confirmPassword) {
        //             echo "<script>alert('Vui lòng điền đầy đủ thông tin!')</script>";
        //             echo "<script>window.location.href = '/student/users/resetPassword'</script>";
        //             return;
        //         }
        
        //         // Lấy thông tin người dùng từ database
        //         $user = $this->model->getUserByUsername($username);
        
        //         // Kiểm tra người dùng có tồn tại và mật khẩu cũ chính xác
        //         if ($user && $oldPassword === $user['password']) {
        //             if ($newPassword === $confirmPassword) {
        //                 // Cập nhật mật khẩu mới trong database
        //                 $this->model->updatePassword($username, $newPassword);
        
        //                 // Hiển thị thông báo thành công
        //                 echo "<script>alert('Đặt lại mật khẩu thành công!')</script>";
        //                 echo "<script>window.location.href = '/student/users/login'</script>";
        //             } else {
        //                 // Mật khẩu mới và xác nhận không khớp
        //                 echo "<script>alert('Mật khẩu mới và xác nhận mật khẩu không khớp!')</script>";
        //                 echo "<script>window.location.href = '/Trang_chu/resetPassword'</script>";
        //             }
        //         } else {
        //             // Sai tên đăng nhập hoặc mật khẩu cũ
        //             echo "<script>alert('Tên đăng nhập hoặc mật khẩu cũ không đúng!')</script>";
        //             echo "<script>window.location.href = '/student/Trang_chu/resetPassword'</script>";
        //         }
        //     } else {
        //         // Nếu không phải POST, chuyển hướng về trang resetPassword
        //         header("Location: /student/users/resetPassword");
        //     }
        // }
        
        
        
        
    }
?>