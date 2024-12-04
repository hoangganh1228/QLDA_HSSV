<?php
class Lop extends Controller {
    private $data, $model;

    function __construct() {
        $this->model = $this->model('admin/LopModel'); 
        if (!$this->model) {
            die("Không thể tải model LopModel.");
        }
    }

    function index() {
        $this->list_lop();
    }

    function list_lop() {
        $search = isGet() ? (!empty($_GET['search']) ? $_GET['search'] : '') : '';
        $result = $this->model->getAll($search);
    
        if ($result === false) {
            die("Lỗi truy vấn cơ sở dữ liệu.");
        }
    
        $this->data['table'] = $result; 
        $this->view('/admin/lop/List_Lop', [
            'table' => $this->data['table']
        ]);
    }

    public function add_lop() {
        if (isPost()) {
            $filteredPost = filter();
            if (!$this->model->isDuplicateLopId($filteredPost['class_id'])) {
                $this->model->addLop($filteredPost);
                echo "<script>alert('Thêm lớp thành công!')</script>";
                echo "<script>window.location.href = '/QLDA_HSSV/admin/lop/list_lop'</script>";
            } else {
                echo "<script>alert('Thêm lớp thất bại, trùng mã lớp!')</script>";
            }
        }
        $majors = $this->model->getAllNganh();
        $this->view('/admin/lop/add_lop', ['majors' => $majors]);
    }

    public function edit_lop($id = '') {
        if (isPost()) {
            $filteredPost = filter(); 
            $this->model->updateLop($id, $filteredPost); 
            echo "<script>alert('Sửa lớp thành công')</script>";
            echo "<script>window.location.href = '/QLDA_HSSV/admin/lop/list_lop'</script>";
        } else {
            $result = $this->model->getLopById($id); 
            if (!$result) {
                die("Không tìm thấy lớp.");
            }
            $majors = $this->model->getAllNganh();
            $this->view('/admin/lop/edit_lop', [
                'data' => $result,
                'majors' => $majors
            ]);
        }
    }
    
    public function delete_lop($id = '') {
        if ($this->model->deleteLop($id)) {
            echo "<script>alert('Xóa thành công')</script>";
        } else {
            echo "<script>alert('Xóa thất bại')</script>";
        }
        echo "<script>window.location.href = '/QLDA_HSSV/admin/lop/list_lop'</script>";
    }
}
