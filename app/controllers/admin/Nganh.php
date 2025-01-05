<?php
class Nganh extends Controller {
    private $data, $model;

    function __construct() {
        $this->model = $this->model('admin/NganhModel'); 
        if (!$this->model) {
            die("Không thể tải model NganhModel.");
        }
    }

    function index() {
        $this->list_nganh();
    }

    function list_nganh() {




        $search = isGet() ? (!empty($_GET['search']) ? $_GET['search'] : '') : '';
        $result = $this->model->getAll($search);
    
        if ($result === false) {
            die("Lỗi truy vấn cơ sở dữ liệu.");
        }
    
        $this->data['table'] = $result; 
        $this->view('/admin/nganh/List_Nganh', [
            'table' => $this->data['table']
        ]);
    }

    public function add_nganh() {




        if (isPost()) {
            $filteredPost = filter();
            if (!$this->model->isDuplicateNganhId($filteredPost['major_id'])) {
                $this->model->addNganh($filteredPost);
                echo "<script>alert('Thêm ngành thành công!')</script>";
                echo "<script>window.location.href = '/QLDA_HSSV/admin/nganh/list_nganh'</script>";
            } else {
                echo "<script>alert('Thêm ngành thất bại, trùng mã ngành!')</script>";
            }
        }
        $departments = $this->model->getAllKhoa();
        $this->view('/admin/nganh/add_nganh', ['departments' => $departments]);
    }

    public function edit_nganh($id = '') {




        if (isPost()) {
            $filteredPost = filter(); 
            $this->model->updateNganh($id, $filteredPost); 
            echo "<script>alert('Sửa ngành thành công')</script>";
            echo "<script>window.location.href = '/QLDA_HSSV/admin/nganh/list_nganh'</script>";
        } else {
            $result = $this->model->getNganhById($id); 
            if (!$result) {
                die("Không tìm thấy ngành.");
            }
            $departments = $this->model->getAllKhoa();
            $this->view('/admin/nganh/edit_nganh', [
                'data' => $result,
                'departments' => $departments
            ]);
        }
    }
    
    

    public function delete_nganh($id = '') {


        if ($this->model->deleteNganh($id)) {
            echo "<script>alert('Xóa thành công')</script>";
        } else {
            echo "<script>alert('Xóa thất bại')</script>";
        }
        echo "<script>window.location.href = '/QLDA_HSSV/admin/nganh/list_nganh'</script>";
    }
}
