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
        checkPermission(['Quản lý']);
        $search = isGet() ? (!empty($_GET['search']) ? $_GET['search'] : '') : '';
        $result = $this->model->getAllUsers($search);
        if ($result === false) {
            die("Lỗi truy vấn cơ sở dữ liệu.");
        }

        $this->data['table'] = $result; 
        $this->view('/admin/users/index', [
            'table' => $this->data['table']
        ]);
    }

    public function create() {
        checkPermission(['Quản lý']);
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
                        'teacher_id' => 'T' . time() . mt_rand(1000, 9999), // Tạo ID tự động cho teacher
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
                        'student_id' => 'S' . time() . mt_rand(1000, 9999), // Tạo ID tự động cho student
                        'user_id' => $user_id,
                        'fullname' => $filter['fullname'],
                        'date_of_birth' => $filter['date_of_birth'],
                        'sex' => $filter['sex'],
                        'address' => $filter['address'],
                        'class_id' => $filter['class_id'],
                        'khoa_hoc_id' => $filter['khoa_hoc_id']
                    ];
                    $this->model->addStudent($studentData);
                }
                echo "<script>alert('Thêm người dùng thành công!')</script>";
                echo "<script>window.location.href = '/QLDA_HSSV/admin/users/index'</script>";
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
        $this->view('/admin/users/create', [
            'user' => $user,
            'khoahocs' => $khoahocs,
            'departments' => $departments,
            'classes' => $classes
        ]);
    }

    public function edit($id = '') {
        checkPermission(['Quản lý']);
        
        if (isPost()) {
            $filter = filter(); // Lọc dữ liệu form
            $newRole  = $filter['role']; // Vai trò hiện tại của người dùng
            $currentUser = $this->model->getUserById($id);
            $currentRole = $currentUser['role'];
     
            
            // Cập nhật thông tin chung trong bảng users
            $userData = [
                'username' => $filter['username'],
                'password' => $filter['password'],
                'email' => $filter['email'],
                'phone' => $filter['phone'],
                'role' => $newRole
            ];
            $this->model->updateUser($id, $userData);
            // Cập nhật vào bảng phụ dựa vào vai trò
            if($newRole !== $currentRole) {
                if ($currentRole === 'Giảng viên') {
                    $this->model->deleteTeacherByUserId($id);
                } elseif ($currentRole === 'Sinh viên') {
                    $this->model->deleteStudentByUserId($id);
                }

                // Thêm dữ liệu mới vào bảng phụ của vai trò mới
                if ($newRole === 'Giảng viên') {
                    $teacherData = [
                        'teacher_id' => 'T' . time() . mt_rand(1000, 9999),
                        'user_id' => $id,
                        'fullname' => $filter['fullname'],
                        'date_of_birth' => $filter['date_of_birth'],
                        'sex' => $filter['sex'],
                        'address' => $filter['address'],
                        'department_id' => $filter['department_id']
                    ];
                    $this->model->addTeacher($teacherData);
                } elseif ($newRole === 'Sinh viên') {
                    $studentData = [
                        'student_id' => 'S' . time() . mt_rand(1000, 9999),
                        'user_id' => $id,
                        'fullname' => $filter['fullname'],
                        'date_of_birth' => $filter['date_of_birth'],
                        'sex' => $filter['sex'],
                        'address' => $filter['address'],
                        'class_id' => $filter['class_id'],
                        'khoa_hoc_id' => $filter['khoa_hoc_id']
                    ];
                    $this->model->addStudent($studentData);
                }
            }
    
            echo "<script>alert('Cập nhật người dùng thành công!')</script>";
            echo "<script>window.location.href = '/QLDA_HSSV/admin/users/index'</script>";
        } else {
            // Lấy dữ liệu hiện tại của người dùng
            $user = $this->model->getUserById($id);
            // Lấy thông tin từ bảng phụ theo vai trò
            if ($user['role'] === 'Giảng viên') {
                $extraData = $this->model->getTeacherByUserId($id);

            } else if ($user['role'] === 'Sinh viên') {
                $extraData = $this->model->getStudentByUserId($id);
            } else {
                $extraData = [];
            }
            // echo '<pre>';   
            // print_r($extraData);
            // echo '</pre>';
    
            // Lấy dữ liệu phụ trợ (khoa, lớp, khóa học)
            $khoahocs = $this->model->getAllKhoaHoc();
            $departments = $this->model->getAllDepartments();
            $classes = $this->model->getAllClasses();
            
            // echo '<pre>';   
            // print_r($departments);
            // echo '</pre>';

            // Gửi dữ liệu đến View
            $this->view('/admin/users/edit', [
                'user' => $user,
                'extraData' => $extraData,
                'khoahocs' => $khoahocs,
                'departments' => $departments,
                'classes' => $classes
            ]);
        }
    }

    public function delete($id = '') {
        checkPermission(['Quản lý']);

        if ($this->model->deleteUser($id)) {
            echo "<script>alert('Xóa thành công')</script>";
        } else {
            echo "<script>alert('Xóa thất bại')</script>";
        }
        echo "<script>window.location.href = '/QLDA_HSSV/admin/users'</script>";
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
                
                switch ($user['role']) {
                    case 'Quản lý':
                        header('Location: /QLDA_HSSV/admin/dashboard/index');
                        break;
                    case 'Giảng viên': // Teacher
                        header('Location: /QLDA_HSSV/teacher/dashboard/index');
                        break;
                    case 'Sinh viên': // Student
                        header('Location: /QLDA_HSSV/student/');
                        break;
                }
                exit;
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
                echo "<script>window.location.href = '/QLDA_HSSV/admin/users/resetPassword'</script>";
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
                    echo "<script>window.location.href = '/QLDA_HSSV/admin/users/login'</script>";
                } else {
                    // Mật khẩu mới và xác nhận không khớp
                    echo "<script>alert('Mật khẩu mới và xác nhận mật khẩu không khớp!')</script>";
                    echo "<script>window.location.href = '/QLDA_HSSV/damin/users/resetPassword'</script>";
                }
            } else {
                // Sai tên đăng nhập hoặc mật khẩu cũ
                echo "<script>alert('Tên đăng nhập hoặc mật khẩu cũ không đúng!')</script>";
                echo "<script>window.location.href = '/QLDA_HSSV/student/damin/users/resetPassword'</script>";
            }
        } else {
            // Nếu không phải POST, chuyển hướng về trang resetPassword
            header("Location: /QLDA_HSSV/admin/users/resetPassword");
        }
    }
}
