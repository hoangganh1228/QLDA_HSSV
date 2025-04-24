<?php
class Tuition extends Controller
{
    private $data, $model;

    function __construct() {
        $this->model = $this->model('student/TuitionModel'); 
        if (!$this->model) {
            die("Không thể tải model users.model.");
        }
    }
    
    function index()
    {
        $this->viewTuition();
    }


    public function viewTuition() {
    
        $student_id = $_SESSION['student_id'];
        $semester_id = isset($_GET['hoc_ky']) ? $_GET['hoc_ky'] : null;
        $semesters = $this->model->getAllSemesters();
        $users = $this->model->getAllUsers();
        $Registration = $this->model->getAllDki();


        $infoUser = $this->model->getInfo($student_id);
        // echo '<pre>';   
        // print_r($infoUser);
        // echo '</pre>';
        $tuitionDetails = [];
        if ($semester_id) {
            if ($semester_id === 'all') {
                // Lấy học phí của tất cả các kỳ
                foreach ($semesters as $semester) {
                    $this->model->insertTuitionBySemester($student_id, $semester['semester_id']);
                }
                $tuitionDetails = $this->model->getAllTuitionDetails($student_id);
                // echo '<pre>';   
                // print_r($tuitionDetails);
                // echo '</pre>';
            } else {
                // Lấy học phí của kỳ cụ thể
                $this->model->insertTuitionBySemester($student_id, $semester_id);
                $tuitionDetail = $this->model->getTuitionDetailsBySemester($student_id, $semester_id);
                if ($tuitionDetail) {
                    $tuitionDetails[] = $tuitionDetail;
                }
            }
        }
    
        $this->view('/student/tuition/index', [
            'semesters' => $semesters,
            'tuitionDetails' => $tuitionDetails,
            'infoUser' => $infoUser,
            'user'=>$users,
            'Registration'=>$Registration,
        ]);
    }

    public function payTuition() {
        if(isPost()) {
            $filter = filter();
            // echo '<pre>';   
            // print_r($filter);
            // echo '</pre>';
            $student_id = $filter['student_id'];
            $payment_amount = $filter['payment_amount'];
            $owingSemesters = $this->model->getTuitionASC($student_id);
            echo '<pre>';   
            print_r($owingSemesters);
            echo '</pre>';

            foreach ($owingSemesters as $semester) {
                $remainingAmount = $semester['total'] - $semester['paid'];
            
                if ($payment_amount <= 0) break; // Nếu không còn tiền để thanh toán
            
                if ($payment_amount >= $remainingAmount) {
                    $data = ['paid' => $semester['total']];
                    $this->model->updateTuitionPaid($semester['semester_id'], $data); // Sử dụng semester_id
                    $payment_amount -= $remainingAmount;
                } else {
                    $data = ['paid' => $semester['paid'] + $payment_amount];
                    $this->model->updateTuitionPaid($semester['semester_id'], $data); // Sử dụng semester_id
                    $payment_amount = 0;
                }
            }
            

            // Gửi thông báo hoặc chuyển hướng
            if ($payment_amount > 0) {
                echo "<script>alert('Thanh toán xong. Số dư thừa: " . number_format($payment_amount) . " VND');</script>";
            } else {
                echo "<script>alert('Thanh toán thành công!');</script>";
            }

            // Redirect hoặc trả về view
            header('Location: /student/tuition/viewTuition/?hoc_ky=all');
            exit();
            }
    }
}