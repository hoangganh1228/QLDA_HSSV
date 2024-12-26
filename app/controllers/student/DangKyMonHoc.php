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
       $user = $this->model->getAllUsers();
        

        $this->view('student/DangKyMonHoc', [
            'user'=>$user,
            'DangKyData' => $DangKyData,
            'majors' => $majors,
            'subjects' => $subjects,
            'semesters' => $semesters,
            'khoa_hoc' => $khoa_hoc
        ]);
    }

    function updateStatus() {
        // Đặt header trả về JSON
        header('Content-Type: application/json; charset=utf-8');
        
        // Lấy dữ liệu JSON từ request
        $input = json_decode(file_get_contents('php://input'), true);
    
        // Kiểm tra nếu không có danh sách reg_ids
        if (empty($input['reg_ids']) || !is_array($input['reg_ids'])) {
            echo json_encode([
                'success' => false,
                'message' => 'Danh sách reg_ids là bắt buộc và phải là một mảng hợp lệ.'
            ]);
            return;
        }
    
        $reg_ids = $input['reg_ids'];
        
        // Biến lưu trạng thái thành công và thất bại
        $successCount = 0;
        $failedCount = 0;
    
        // Lặp qua từng reg_id để cập nhật trạng thái
        foreach ($reg_ids as $reg_id) {
            if ($this->model->updateStatus($reg_id)) {
                $successCount++;
            } else {
                $failedCount++;
            }
        }
    
        // Trả về kết quả
        if ($failedCount === 0) {
            echo json_encode([
                'success' => true,
                'message' => "Cập nhật trạng thái thành công cho $successCount mục."
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => "Cập nhật trạng thái thất bại cho $failedCount mục. Thành công $successCount mục."
            ]);
        }
    }
    
    
}
?>
