<?php
class Mon extends Controller {
    private $data, $model;

    function __construct() {
        $this->model = $this->model('admin/MonModel'); 
        if (!$this->model) {
            die("Không thể tải model MonModel.");
        }
    }

    function index() {
        $this->list_mon();
    }

    function list_mon() {
        $search = isGet() ? (!empty($_GET['search']) ? $_GET['search'] : '') : '';
        $result = $this->model->getAll($search);
    
        if ($result === false) {
            die("Lỗi truy vấn cơ sở dữ liệu.");
        }
    
        $this->data['table'] = $result; 
        $this->view('/admin/mon/List_Mon', [
            'table' => $this->data['table']
        ]);
    }

    public function add_mon() {
        if (isPost()) {
            $filteredPost = filter();
            if (!$this->model->isDuplicateMonId($filteredPost['subject_id'])) {
                $this->model->addMon($filteredPost);
                echo "<script>alert('Thêm môn thành công!')</script>";
                echo "<script>window.location.href = '/admin/mon/list_mon'</script>";
            } else {
                echo "<script>alert('Thêm môn thất bại, trùng mã môn!')</script>";
            }
        }
        $majors = $this->model->getAllNganh();
        $this->view('/admin/mon/add_mon', ['majors' => $majors]);
    }

    public function edit_mon($id = '') {
        if (isPost()) {
            $filteredPost = filter(); 
            $this->model->updateMon($id, $filteredPost); 
            echo "<script>alert('Sửa môn thành công')</script>";
            echo "<script>window.location.href = '/admin/mon/list_mon'</script>";
        } else {
            $result = $this->model->getMonById($id); 
            if (!$result) {
                die("Không tìm thấy môn.");
            }
            $majors = $this->model->getAllNganh();
            $this->view('/admin/mon/edit_mon', [
                'data' => $result,
                'majors' => $majors
            ]);
        }
    }
    
    

    public function delete_mon($id = '') {
        if ($this->model->deleteMon($id)) {
            echo "<script>alert('Xóa thành công')</script>";
        } else {
            echo "<script>alert('Xóa thất bại')</script>";
        }
        echo "<script>window.location.href = '/admin/mon/list_mon'</script>";
    }
}
