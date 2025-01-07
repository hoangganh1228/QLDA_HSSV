<?php

class DangKyMonHoc extends Controller {
    private $model;

    function __construct() {
        $this->model = $this->model('student/DangKyMonHocModel');
    }

    function index() {

        $DangKyData = $this->model->getAll();
        $majors = $this->model->getAllNganh();
        $subjects = $this->model->getAllMon();
        $semesters = $this->model->getAllKi();
        $khoa_hoc = $this->model->getAllKhoaHoc();
       
        

        $this->view('student/DangKyMonHoc', [
            
            'DangKyData' => $DangKyData,
            'majors' => $majors,
            'subjects' => $subjects,
            'semesters' => $semesters,
            'khoa_hoc' => $khoa_hoc
        ]);
    }
  
    public function registerAll() {
        header('Content-Type: application/json');
    
        // Lấy thông tin student_id từ session
        if (!isset($_SESSION['username'])) {
            echo json_encode(['success' => false, 'message' => 'Session không hợp lệ']);
            return;
        }
        $studentUsername = $_SESSION['username'];
    
        // Gọi model và lấy thông tin sinh viên
        $student = $this->model->getStudentByUsername($studentUsername);
    
        if (!$student) {
            echo json_encode(['success' => false, 'message' => 'Không tìm thấy thông tin sinh viên']);
            return;
        }
    
        $studentId = $student['student_id'];
    
        // Lấy dữ liệu regIds từ request
        $data = json_decode(file_get_contents("php://input"), true);
    
        if ($data === null) {
            echo json_encode(['success' => false, 'message' => 'Dữ liệu JSON không hợp lệ']);
            return;
        }
    
        $regIds = $data['regIds'] ?? [];
    
        if (empty($regIds)) {
            echo json_encode(['success' => false, 'message' => 'Không có môn học nào để đăng ký']);
            return;
        }
    
        // Xử lý từng môn học và gọi addStudentSubject
        foreach ($regIds as $regId) {
            if ($this->model->isRegistered($studentId,$regId)) {
                echo json_encode(['success' => false, 'message' => 'Môn học đã được đăng ký.']);
                return;
            }
            // Gọi hàm addStudentSubject trong model
            $insertResult = $this->model->addStudentSubject($studentId, $regId);
    
            if (!$insertResult) {
                echo json_encode(['success' => false, 'message' => "Lỗi khi đăng ký môn học có reg_id: $regId"]);
                return;
            }
            $insertResult = $this->model->addGrades($studentId, $regId);
    
            if (!$insertResult) {
                echo json_encode(['success' => false, 'message' => "Lỗi khi đăng ký môn học có reg_id: $regId"]);
                return;
            }
        }
    
        echo json_encode(['success' => true, 'message' => 'Đăng ký tất cả thành công']);
    }
    
    
    
    
}

?>
