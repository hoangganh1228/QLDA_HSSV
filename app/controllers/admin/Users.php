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
        $result = $this->model->getAllUsers();

        if ($result === false) {
            die("Lỗi truy vấn cơ sở dữ liệu.");
        }

        $this->data['table'] = $result; 
        $this->view('/admin/users/index', [
            'table' => $this->data['table']
        ]);
    }

    public function create() {
        if (isPost()) {
            $filteredPost = filter();
            

            if (!$this->model->isDuplicateKhoaId($filteredPost['user_id'])) {
                $this->model->addUser($filteredPost);
                echo "<script>alert('Thêm người dùng thành công!')</script>";
                echo "<script>window.location.href = '/QLDA_HSSV/admin/users/index'</script>";
            } else {
                echo "<script>alert('Thêm ngành thất bại, trùng mã ngành!')</script>";
            }
        }
        $user = $this->model->getAllUsers();
        $this->view('/admin/users/create', ['user' => $user]);
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
         
            $user = $this->model->getUserByUsername($username);
            // echo '<pre>';   
            // print_r($user);
            // echo '</pre>';
            if ($user && $password === $user['password']) {
                // Đăng nhập thành công
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                echo '<pre>';   
                print_r($_SESSION);
                echo '</pre>';
               
                header('Location: /QLDA_HSSV/admin/dashboard/index');
            } else {
                // Đăng nhập thất bại
                echo "<script>alert('Tên đăng nhập hoặc mật khẩu không đúng!')</script>";
                echo "<script>window.location.href = '/QLDA_HSSV/admin/users/login'</script>";
            }
        } 
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header('Location: /QLDA_HSSV/admin/users/login');
    }

}
