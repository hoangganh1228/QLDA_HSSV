<?php
class Users extends Controller
{
    private $data, $model;

    function __construct() {
        $this->model = $this->model('student/UsersModel'); 
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

        $this->data['table'] = $result; 
        $this->view('/student/users/index', [
            'table' => $this->data['table']
        ]);
    }

    public function create() {
        if (isPost()) {
            $filter = filter();
            $user_id = $filter['user_id'];
            $role = $filter['role'];

            if (!$this->model->isDuplicateKhoaId($user_id)) {
                // Lưu vào bảng users trước
                $userData = [
                    'user_id' => $user_id,
                    'username' => $filter['username'],
                    'password' => $filter['password'],  
                    'role' => $role,
                    'email' => $filter['email'],
                    'phone' => $filter['phone'],
                    'created_date' => date('Y-m-d')
                ];
                $this->model->addUser($userData);
                if ($role === 'Giảng viên') {
                    $teacherData = [
                        'teacher_id' => uniqid('T'), // Tạo ID tự động cho teacher
                        'user_id' => $user_id,
                        'fullname' => $filter['fullname'],
                        'date_of_birth' => $filter['date_of_birth'],
                        'sex' => $filter['sex'],
                        'address' => $filter['address'] ?? '',
                        'department_id' => $filter['department_id']
                    ];
                    $this->model->addTeacher($teacherData);
                } else if ($role === 'Sinh viên') {
                    $studentData = [
                        'student_id' => uniqid('S'), // Tạo ID tự động cho student
                        'user_id' => $user_id,
                        'fullname' => $filter['fullname'],
                        'date_of_birth' => $filter['date_of_birth'],
                        'sex' => $filter['sex'],
                        'address' => $filter['address'] ?? '',
                        'class_id' => $filter['class_id'],
                        'khoa_hoc_id' => $filter['khoa_hoc_id']
                    ];
                    $this->model->addStudent($studentData);
                }
                echo "<script>alert('Thêm người dùng thành công!')</script>";
                echo "<script>window.location.href = '/QLDA_HSSV/student/users/index'</script>";
            } else {
                echo "<script>alert('Thêm ngành thất bại, trùng mã ngành!')</script>";
            }
        }
        $user = $this->model->getAllUsers();
        $khoahocs = $this->model->getAllKhoaHoc(); 
        $departments = $this->model->getAllDepartments(); 
        // echo '<pre>';   
        // print_r($departments);
        // echo '</pre>';
        $classes = $this->model->getAllClasses(); 
        $this->view('/student/users/create', [
            'user' => $user,
            'khoahocs' => $khoahocs,
            'departments' => $departments,
            'classes' => $classes
        ]);
    }

    public function edit($id = '') {
        if (isPost()) {
            $filteredPost = filter(); 
            $this->model->updateUser($id, $filteredPost); 
            echo "<script>alert('Sửa người dùng thành công')</script>";
            echo "<script>window.location.href = '/QLDA_HSSV/student/users'</script>";
        } else {
            $result = $this->model->getUserById($id); 
            if (!$result) {
                die("Không tìm thấy người dùng.");
            }
            $users = $this->model->getAllUsers();
            $this->view('/admin/student/edit', [
                'data' => $result,
                'users' => $users
            ]);
        }
    }
  
    
    public function delete($id = '') {
        if ($this->model->deleteUser($id)) {
            echo "<script>alert('Xóa thành công')</script>";
        } else {
            echo "<script>alert('Xóa thất bại!')</script>";
        }
        echo "<script>window.location.href = '/QLDA_HSSV/student/users'</script>";
    }

    public function login() {
        $this->view('/student/users/login', []);
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
         
            if ($user && $password === $user['password']) {
                // Đăng nhập thành công
                $_SESSION['student_id'] = $user['student_id'];
                $_SESSION['username'] = $user['username'];
                
                if($this->model->studentExists($user['student_id'])) {
                    header('Location: /QLDA_HSSV/student/Trang_chu');

                }
            } else {
                
                echo "<script>alert('Tên đăng nhập hoặc mật khẩu không đúng!')</script>";
                echo "<script>window.location.href = '/QLDA_HSSV/admin/users/login'</script>";
            }
        } 
        
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header('Location: /QLDA_HSSV/student/users/login');
    }

}
