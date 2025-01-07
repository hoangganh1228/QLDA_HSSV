<?php
class ThongtinSinhVien extends Controller {
private $data,$model;
    function __construct() {
        $this->model = $this->model('student/ThongtinSinhVienModel');
    }

    function index() {
        // Lấy dữ liệu từ model
        $sinhVienData = $this->model->getAll();
        $classes = $this->model->getAllClasses(); 
      
   
        $khoahocs = $this->model->getAllKhoaHoc(); 
        $majors = $this->model->getAllMajors(); 

        $departments = $this->model->getAllDepartments(); 
        // Trả dữ liệu ra view
        $this->view('student/ThongtinSinhVien/ThongtinSinhVien', ['sinhVienData' => $sinhVienData, 
        'khoahocs' => $khoahocs,
        'departments' => $departments,
        'classes'=>$classes,
        'majors'=>$majors
        ]);
    }
    public function edit_sinhvien($student_id = '') {
        if (isPost()) {
            $filteredPost = filter(); // Lọc dữ liệu đầu vào
            $this->model->updateSinhVien($student_id, $filteredPost); // Cập nhật thông tin sinh viên
            echo "<script>alert('Sửa thông tin sinh viên thành công')</script>";
            echo "<script>window.location.href = '/QLDA_HSSV/student/thongtinSinhVien'</script>";
        } else {
            $result = $this->model->getSinhVienById($student_id); // Lấy thông tin sinh viên theo ID
            
            if (!$result) {
                die("Không tìm thấy thông tin sinh viên.");
            }
            $sinhVienData = $this->model->getAll();
            $classes = $this->model->getAllClasses();
        $khoahocs = $this->model->getAllKhoaHoc(); 
        $majors = $this->model->getAllMajors(); 

        $departments = $this->model->getAllDepartments(); 
        $this->view('student/ThongtinSinhVien/edit_sinhvien', [
            'data' => $result,
            'sinhVienData' => $sinhVienData,
            'classes'=>$classes,
            'khoahocs' => $khoahocs,
            'departments' => $departments,
            'majors'=>$majors
        ]);
        
    }
    }
}