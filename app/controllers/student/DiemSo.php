<?php
class DiemSo extends Controller {
    private $model;

    function __construct() {
        $this->model = $this->model('student/DiemSoModel');
    }

    function index() {
        checkPermission(['Sinh viên']);

        // Truy vấn để JOIN 3 bảng: credit_registration, semesters, và grades
       $ResultData = $this->model->getAll();
       $semester = $this->model->getAllKi();
       $Registration = $this->model->getAlldki();
       $user = $this->model->getAllUsers();
       $student = $this->model->getAllstudent();
       $subjects = $this->model->getAllSubject();

   



        
        // Trả kết quả ra view
        $this->view('student/DiemSo', ['ResultData' => $ResultData,'semester'=>$semester,'Registration'=>$Registration,'user'=>$user,'student'=>$student,'subjects'=>$subjects]);
    }
    function getGradesBySemester($semester_id) { $reg_id = '12345'; // Thay bằng ID sinh viên thực tế hoặc lấy từ session
         if ($semester_id === 'all') { 
            $grades = $this->model->getAll();
         } else 
         { 
            $grades = $this->model->getGradesBySemester($reg_id, $semester_id);
         } 
         echo json_encode($grades); 
        }
}
?>
