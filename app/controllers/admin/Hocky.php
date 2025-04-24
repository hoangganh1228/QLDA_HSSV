<?php
    class Hocky extends Controller{
        private $data, $model;
        function __construct()
        {
            $this->model = $this->model('admin/HockyModel');
            if(!$this->model){
                die("Không thể tải model học kỳ");
            }
        }
        function index(){
            $this->list_HK();
        }
        function list_HK(){
            $search = isGet() ? (!empty($_GET['search']) ? $_GET['search'] : '') : '';
            $result = $this->model->getAll($search);
            if ($result === false) {
                die("Lỗi truy vẫn csdl");
            }
            $this->data['table'] = $result;
            $this->view('/admin/hocky/List_HK', [
                'table' => $this->data['table']
            ]);
        }
        public function add_HK()
        {
            if (isPost()) {
                $filteredPost = filter();
                if (!$this->model->isDuplicateBy_SemesterId($filteredPost['semester_id'])) {
                    $this->model->add_HK($filteredPost);
                    echo "<script>alert('Thêm học kỳ thành công')</script>";
                    echo "<script>window.location.href = '/admin/Hocky/list_HK'</script>";
                } else {
                    echo "<script>alert('Trùng mã học kỳ!')</script>";
                }
            }          
       // Truyền danh sách mã lớp đến view
            $this->view('/admin/hocky/Add_HK', []);
        }
        function edit_HK($semester_id = '')
    {
        
        if (isPost()) {
            $filteredPost = filter();

            
            $this->model->updateHocky($semester_id, $filteredPost);

            echo "<script>alert('Cập nhật thông tin học kỳ thành công')</script>";
            echo "<script>window.location.href = '/admin/Hocky/list_HK'</script>";
        } else {
           
            $result = $this->model->getHockyById($semester_id);
            if (!$result) {
                die("Không tìm thấy học kỳ.");
            }
            
            $this->view('/admin/hocky/Edit_HK', [
                'data' => $result,
                
            ]);
        }
        
        
    }
    function delete_HK($semester_id = '')
    {
        if ($this->model->deleteHocky($semester_id)) {
            echo "<script>alert('Xóa thành công')</script>";
        } else {
            echo "<script>alert('Xóa thất bại')</script>";
        }
        echo "<script>window.location.href = '/admin/Hocky/list_HK'</script>";
    }
    }
    
    
?>