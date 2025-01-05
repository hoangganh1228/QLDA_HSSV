<?php
class Tuition extends Controller
{
    private $data, $model;

    function __construct() {
        $this->model = $this->model('admin/TuitionModel'); 
        if (!$this->model) {
            die("Không thể tải model users.model.");
        }
    }
    
    function index()
    {
        $this->list_tuition();
    }

    function list_tuition() {
        $search = isGet() ? (!empty($_GET['search']) ? $_GET['search'] : '') : '';
        $result = $this->model->getAllTuitions($search);
        if ($result === false) {
            die("Lỗi truy vấn cơ sở dữ liệu.");
        }

        $this->data['table'] = $result; 
        $this->view('/admin/tuition/index', [
            'table' => $this->data['table']
        ]);
    }

    public function create() {

        if (isPost()) {
          $filteredPost = filter();
          if (!$this->model->isDuplicateTuitionId($filteredPost['user_id'])) {
            $this->model->addTuition($filteredPost);
            echo "<script>alert('Thêm học phí thành công!')</script>";
            echo "<script>window.location.href = '/QLDA_HSSV/admin/tuition/index'</script>";
          } else {
            echo "<script>alert('Thêm ngành thất bại, trùng mã ngành!')</script>";
          }
        }
        $tuition = $this->model->getAllTuitions();
        $departments = $this->model->getDepartment();
        $this->view('/admin/tuition/create', [
          'tuition' => $tuition,
          'departments' => $departments
        ]);
    }

    public function edit($id = '') {

        if (isPost()) {
            $filteredPost = filter(); 
            $this->model->updateTuition($id, $filteredPost); 
            echo "<script>alert('Sửa học phí thành công')</script>";
            echo "<script>window.location.href = '/QLDA_HSSV/admin/tuition'</script>";
        } else {
            $result = $this->model->getTuitionById($id); 
            if (!$result) {
              die("Không tìm thấy học phí.");
            }
            $departments = $this->model->getDepartment();
            $this->view('/admin/tuition/edit', [
              'data' => $result,
              'departments' => $departments
            ]);
        }
    }

    public function delete($id = '') {

        if ($this->model->deleteTuition($id)) {
            echo "<script>alert('Xóa thành công')</script>";
        } else {
            echo "<script>alert('Xóa thất bại')</script>";
        }
        echo "<script>window.location.href = '/QLDA_HSSV/admin/tuition'</script>";
    }


}
