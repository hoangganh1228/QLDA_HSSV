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
        $this->list_Nganh();
    }

    function list_Nganh() {

        checkPermission(['Quản lý']);



        $search = isGet() ? (!empty($_GET['search']) ? $_GET['search'] : '') : '';
        $result = $this->model->getAll($search);
    
        if ($result === false) {
            die("Lỗi truy vấn cơ sở dữ liệu.");
        }
    
        $this->data['table'] = $result; 
        $this->view('/admin/Nganh/List_Nganh', [
            'table' => $this->data['table']
        ]);
    }

    public function Add_Nganh() {


        checkPermission(['Quản lý']);


        if (isPost()) {
            $filteredPost = filter();
            if (!$this->model->isDuplicateNganhId($filteredPost['major_id'])) {
                $this->model->addNganh($filteredPost);
                echo "<script>alert('Thêm ngành thành công!')</script>";
<<<<<<< HEAD
                echo "<script>window.location.href = '/admin/Nganh/list_Nganh'</script>";
=======
                echo "<script>window.location.href = '/admin/Nganh/list_nganh'</script>";
>>>>>>> 1f816be85338ee79c85f4452b3886b720de56410
            } else {
                echo "<script>alert('Thêm ngành thất bại, trùng mã ngành!')</script>";
            }
        }
        $departments = $this->model->getAllKhoa();
<<<<<<< HEAD
        $this->view('/admin/Nganh/add_Nganh', ['departments' => $departments]);
=======
        $this->view('/admin/nganh/Add_Nganh', ['departments' => $departments]);
>>>>>>> 1f816be85338ee79c85f4452b3886b720de56410
    }

    public function Edit_Nganh($id = '') {


        checkPermission(['Quản lý']);


        if (isPost()) {
            $filteredPost = filter(); 
            $this->model->updateNganh($id, $filteredPost); 
            echo "<script>alert('Sửa ngành thành công')</script>";
            echo "<script>window.location.href = '/admin/Nganh/list_nganh'</script>";
        } else {
            $result = $this->model->getNganhById($id); 
            if (!$result) {
                die("Không tìm thấy ngành.");
            }
            $departments = $this->model->getAllKhoa();
<<<<<<< HEAD
            $this->view('/admin/Nganh/edit_Nganh', [
=======
            $this->view('/admin/nganh/Edit_Nganh', [
>>>>>>> 1f816be85338ee79c85f4452b3886b720de56410
                'data' => $result,
                'departments' => $departments
            ]);
        }
    }
    
    

    public function delete_nganh($id = '') {

        checkPermission(['Quản lý']);

        if ($this->model->deleteNganh($id)) {
            echo "<script>alert('Xóa thành công')</script>";
        } else {
            echo "<script>alert('Xóa thất bại')</script>";
        }
<<<<<<< HEAD
        echo "<script>window.location.href = '/admin/Nganh/list_Nganh'</script>";
=======
        echo "<script>window.location.href = '/admin/Nganh/list_nganh'</script>";
>>>>>>> 1f816be85338ee79c85f4452b3886b720de56410
    }
}
