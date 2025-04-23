<?php
class DangKyMonHoc extends Controller {
    private $data, $model;

    function __construct() {
        $this->model = $this->model('admin/DangKyMonHocModel'); // Sử dụng model DangKyMonHocModel
        if (!$this->model) {
            die("Không thể tải model DangKyMonHocModel.");
        }
    }

    function index() {
        $this->list_dangky();
    }

    // Hiển thị danh sách đăng ký môn học
    function list_dangky() {
        // Kiểm tra nếu có tham số tìm kiếm từ GET
        $search = isGet() ? (!empty($_GET['search']) ? $_GET['search'] : '') : '';
    
        // Lấy tất cả thông tin đăng ký môn học từ model
        $result = $this->model->getAll($search);
    
        // Kiểm tra kết quả trả về từ truy vấn
        if ($result === false) {
            die("Lỗi truy vấn cơ sở dữ liệu.");
        }
    
        // Lấy danh sách ngành học, môn học, học kỳ, và khóa học từ model
        $majors = $this->model->getAllNganh();
        $subjects = $this->model->getAllMon();
        $semesters = $this->model->getAllKi();
        $khoa_hoc = $this->model->getAllKhoaHoc();
        $user = $this->model->getAllUsers() ;// Đảm bảo bạn có phương thức này trong model
    
        // Truyền dữ liệu ra view
        $this->data['table'] = $result;
        $this->view('/admin/DangKyMonHoc/List_DangKyMonHoc', [
            'table' => $this->data['table'],
            'majors' => $majors,
            'subjects' => $subjects,
            'semesters' => $semesters,
            'khoa_hoc' => $khoa_hoc,
            'user'=>$user
        ]);
    }
    

    // Thêm đăng ký môn học
    public function add_dangky() {
        if (isPost()) {
            $filteredPost = filter();
            if (!$this->model->isDuplicateRegId($filteredPost['reg_id'])) {
                $this->model->addDangKyMonHoc($filteredPost);
                echo "<script>alert('Thêm đăng ký thành công!')</script>";
                echo "<script>window.location.href = '/admin/DangKyMonHoc/'</script>";
            } else {
                echo "<script>alert('Thêm đăng ký thất bại, trùng mã đăng ký!')</script>";
            }
        }
        $majors = $this->model->getAllNganh();
        $subjects = $this->model->getAllMon();
        $semesters = $this->model->getAllKi();

        $khoa_hoc = $this->model->getAllKhoaHoc();

        $this->view('/admin/DangKyMonHoc/add_dangky', ["majors"=>$majors,"subjects"=>$subjects, "semesters"=>$semesters,"khoa_hoc"=>$khoa_hoc]);
    }

    // Sửa thông tin đăng ký môn học
    public function edit_dangky($id = '') {
        if (isPost()) {
            $filteredPost = filter();
            $this->model->updateDangKyMonHoc($id, $filteredPost);
            echo "<script>alert('Sửa đăng ký thành công')</script>";
            echo "<script>window.location.href = '/admin/DangKyMonHoc/'</script>";
        } else {
            $result = $this->model->getDangKyById($id);
            if (!$result) {
                die("Không tìm thấy thông tin đăng ký.");
            }
            $majors = $this->model->getAllNganh();
            $subjects = $this->model->getAllMon();
            $semesters = $this->model->getAllKi();
    
            $khoa_hoc = $this->model->getAllKhoaHoc();
            $this->view('/admin/DangKyMonHoc/edit_dangky', [
                'data' => $result,"majors"=>$majors,"subjects"=>$subjects, "semesters"=>$semesters,"khoa_hoc"=>$khoa_hoc
            ]);
        }
    }

    // Xóa thông tin đăng ký môn học
    public function delete_dangky($id = '') {
        if ($this->model->deleteDangKyMonHoc($id)) {
            echo "<script>alert('Xóa thành công')</script>";
        } else {
            echo "<script>alert('Xóa thất bại')</script>";
        }
        echo "<script>window.location.href = '/admin/DangKyMonHoc/'</script>";
    }
}
