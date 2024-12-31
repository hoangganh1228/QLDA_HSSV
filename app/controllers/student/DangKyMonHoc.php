<?php

class DangKyMonHoc extends Controller {
    private $model;

    function __construct() {
        $this->model = $this->model('student/DangKyMonHocModel');
    }

    function index() {
        checkPermission(['Sinh viên']);
       

        // Lấy danh sách các reg_id mà sinh viên đã đăng ký
        // $registeredSubjects = $this->model->getRegisteredSubjects($student_id);
        $DangKyData = $this->model->getAll();
        $majors = $this->model->getAllNganh();
        $subjects = $this->model->getAllMon();
        $semesters = $this->model->getAllKi();
        $khoa_hoc = $this->model->getAllKhoaHoc();
       $user = $this->model->getAllUsers();
       $studentSubject = $this->model->getAllSubjectCredit();

        

        $this->view('student/DangKyMonHoc', [
            'user'=>$user,
            'DangKyData' => $DangKyData,
            'majors' => $majors,
            'subjects' => $subjects,
            'semesters' => $semesters,
            'khoa_hoc' => $khoa_hoc,
            'studentSubject'=>$studentSubject,
            // 'registeredSubjects'=>$registeredSubjects,
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
            // Gọi hàm addStudentSubject trong model
            if ($this->model->isRegistered($studentId,$regId)) {
                echo json_encode(['success' => false, 'message' => 'Môn học đã được đăng ký.']);
                return;
            }
            $insertResult = $this->model->addStudentSubject($studentId, $regId);
    
            if (!$insertResult) {
                echo json_encode(['success' => false, 'message' => "Lỗi khi đăng ký môn học có reg_id: $regId"]);
                return;
            }
    
            // Thêm dữ liệu vào bảng grades
            $addGradeResult = $this->model->addGrades($studentId, $regId);
    
            if (!$addGradeResult) {
                echo json_encode(['success' => false, 'message' => "Lỗi khi thêm điểm vào bảng grades cho reg_id: $regId"]);
                return;
            }
            // $updateStatusResult = $this->model->updateStatus($regId, 'đã đăng ký');
        }
    
        echo json_encode(['success' => true, 'message' => 'Đăng ký tất cả thành công']);
    }
    
    
    
    
    
}

?>
