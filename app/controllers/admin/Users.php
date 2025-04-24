<?php
class Users extends Controller
{
    private $data, $model;

    function __construct() {
        $this->model = $this->model('admin/UsersModel'); 
        if (!$this->model) {
            die("Không thể tải model users.model.");
        }
    }
    
    function index()
    {
        $this->list_user();
    }

    function list_user() {
       
        $search = isGet() ? (!empty($_GET['search']) ? $_GET['search'] : '') : '';
        $result = $this->model->getAllUsers($search);

        if ($result === false) {
            die("Lỗi truy vấn cơ sở dữ liệu.");
        }
        // echo '<pre>';   
        // print_r($result);
        // echo '</pre>';
        $this->data['table'] = $result; 
        $this->view('/admin/users/index', [
            'table' => $this->data['table']
        ]);
    }

    public function create() {
        if (isPost()) {
            $filter = filter();
            $student_id = $filter['student_id'];

            if (!$this->model->isDuplicateKhoaId($student_id)) {
                // Lưu vào bảng users trước
                $this->model->addUser($filter);
                echo "<script>alert('Thêm người dùng thành công!')</script>";
                echo "<script>window.location.href = '/admin/users/index'</script>";
            } else {
                echo "<script>alert('Thêm ngành thất bại, trùng mã ngành!')</script>";
            }
        }
        $user = $this->model->getAllUsers();
        $khoahocs = $this->model->getAllKhoaHoc(); 
        $departments = $this->model->getAllDepartments(); 

        $classes = $this->model->getAllClasses(); 
        $this->view('/admin/users/create', [
            'user' => $user,
            'khoahocs' => $khoahocs,
            'departments' => $departments,
            'classes' => $classes
        ]);
    }

    public function edit($id = '') {
        
        if (isPost()) {
            $filter = filter(); // Lọc dữ liệu form
     
            
            
            $this->model->updateUser($id, $filter);

            
    
            echo "<script>alert('Cập nhật người dùng thành công!')</script>";
            echo "<script>window.location.href = '/admin/users/index'</script>";
        } else {
            // Lấy dữ liệu hiện tại của người dùng
            $user = $this->model->getUserById($id);
            
           
    
            // Lấy dữ liệu phụ trợ (khoa, lớp, khóa học)
            $khoahocs = $this->model->getAllKhoaHoc();
            $departments = $this->model->getAllDepartments();
            $classes = $this->model->getAllClasses();
            
           
            // Gửi dữ liệu đến View
            $this->view('/admin/users/edit', [
                'user' => $user,
                'khoahocs' => $khoahocs,
                'departments' => $departments,
                'classes' => $classes
            ]);
        }
    }
    public function delete($id = '') {

        if ($this->model->deleteUser($id)) {
            echo "<script>alert('Xóa thành công')</script>";
        } else {
            echo "<script>alert('Xóa thất bại')</script>";
        }
        echo "<script>window.location.href = '/admin/users'</script>";
    }

    public function login() {
        $this->view('/admin/users/login', []);
    }

    public function loginPost() {
        if(isPost()) {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
 
            $filter = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); // Lọc dữ liệu để tránh XSS
            $username = $filter['username'];
            $password = $filter['password'];
         
            // echo '<pre>';   
            // print_r($user);
            // echo '</pre>';
            if ($username === "admin" && $password === "admin") {
                // Đăng nhập thành công
<<<<<<< HEAD
                $_SESSION['username'] = $username;
               
                header('Location: /QLDA_HSSV/admin/users');
=======
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                
                switch ($user['role']) {
                    case 'Quản lý': 
                        header('Location: /admin/Dashboard');
                        break;
                    case 'Sinh viên': // Student
                        header('Location: /student/Trang_chu');
                        break;
                }
                exit;
>>>>>>> 82c559a68c975ba92cd746b127e4aabde6ac1458
            } else {
                // Đăng nhập thất bại
                echo "<script>alert('Tên đăng nhập hoặc mật khẩu không đúng!')</script>";
                echo "<script>window.location.href = '/admin/Users/login'</script>";
            }
        } 
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header('Location: /admin/Users/login');
    }
    function resetPassword (){
        $user = $this->model->getAllUsers();

        $this->view('/admin/users/resetPassword', ['user'=>$user]);
    }
    public function resetPasswordPost() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy và lọc dữ liệu từ form
            $filteredPost = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $username = $filteredPost['username'] ?? null;
            $oldPassword = $filteredPost['old_password'] ?? null;
            $newPassword = $filteredPost['new_password'] ?? null;
            $confirmPassword = $filteredPost['confirm_password'] ?? null;
    
            // Kiểm tra dữ liệu đầu vào
            if (!$username || !$oldPassword || !$newPassword || !$confirmPassword) {
                echo "<script>alert('Vui lòng điền đầy đủ thông tin!')</script>";
                echo "<script>window.location.href = '/admin/users/resetPassword'</script>";
                return;
            }
    
            // Lấy thông tin người dùng từ database
            $user = $this->model->getUserByUsername($username);
    
            // Kiểm tra người dùng có tồn tại và mật khẩu cũ chính xác
            if ($user && $oldPassword === $user['password']) {
                if ($newPassword === $confirmPassword) {
                    // Cập nhật mật khẩu mới trong database
                    $this->model->updatePassword($username, $newPassword);
    
                    // Hiển thị thông báo thành công
                    echo "<script>alert('Đặt lại mật khẩu thành công!')</script>";
                    echo "<script>window.location.href = '/admin/users/login'</script>";
                } else {
                    // Mật khẩu mới và xác nhận không khớp
                    echo "<script>alert('Mật khẩu mới và xác nhận mật khẩu không khớp!')</script>";
                    echo "<script>window.location.href = '/damin/users/resetPassword'</script>";
                }
            } else {
                // Sai tên đăng nhập hoặc mật khẩu cũ
                echo "<script>alert('Tên đăng nhập hoặc mật khẩu cũ không đúng!')</script>";
                echo "<script>window.location.href = '/student/damin/users/resetPassword'</script>";
            }
        } else {
            // Nếu không phải POST, chuyển hướng về trang resetPassword
            header("Location: /admin/users/resetPassword");
        }
    }
}
