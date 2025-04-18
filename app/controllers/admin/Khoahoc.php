<?php
    class Khoahoc extends Controller{
        private $data, $model;
        function __construct()
    {
        $this->model = $this->model('admin/KhoahocModel');
        if (!$this->model) {
            die("Không thể tải model Khóa học model");
        }
    }
    function index()
    {
        $this->list_KH();
    }
    function list_KH()
    {
        $search = isGet() ? (!empty($_GET['search']) ? $_GET['search'] : '') : '';
        $result = $this->model->getAll($search);
        if ($result === false) {
            die("Lỗi truy vẫn csdl");
        }
        $this->data['table'] = $result;
        $this->view('/admin/khoahoc/list_KH', [
            'table' => $this->data['table']
        ]);
    }
    public function add_KH() {
        if (isPost()) {
            $filteredPost = filter();
            if (!$this->model->isDuplicateKhoahocId($filteredPost['khoa_hoc_id'])) {
                $this->model->addKhoahoc($filteredPost);
                echo "<script>alert('Thêm khóa học thành công!')</script>";
                echo "<script>window.location.href = '/QLDA_HSSV/admin/khoahoc/list_KH'</script>";
            } else {
                echo "<script>alert('Thêm khoa thất bại, trùng mã khóa học!')</script>";
            }
        }
        $this->view('/admin/khoahoc/add_KH', []); 
    }


    public function edit_KH($id = '') {
        //var_dump($id);
        if (isPost()) {
            $filteredPost = filter(); 
            $this->model->updateKhoahoc($id, $filteredPost); 
            echo "<script>alert('Cập nhật thông tin khóa học thành công')</script>";
            echo "<script>window.location.href = '/QLDA_HSSV/admin/khoahoc/list_KH'</script>";
        } else {
            $result = $this->model->getKhoahocById($id);
           // var_dump($result); 
            if (!$result) {
                die("Không tìm thấy khóa học.");
            }
            $this->view('/admin/khoahoc/edit_KH', [
                'data' => $result
            ]);
        }
    }
    

    
    public function delete_KH($id = '') {
        if ($this->model->deleteKhoahoc($id)) {
            echo "<script>alert('Xóa thành công')</script>";
        } else {
            echo "<script>alert('Xóa thất bại')</script>";
        }
        echo "<script>window.location.href = '/QLDA_HSSV/admin/khoahoc/list_KH'</script>";
    }
    }
?>