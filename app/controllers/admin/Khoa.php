
    <?php
    class Khoa extends Controller {
        private $data, $model;

        function __construct() {
            $this->model = $this->model('admin/KhoaModel'); // Sử dụng model KhoaModel
            if (!$this->model) {
                die("Không thể tải model KhoaModel.");
            }
        }

        function index() {
            $this->list_khoa();
        }

        function list_khoa() {
            $search = isGet() ? (!empty($_GET['search']) ? $_GET['search'] : '') : '';
            $result = $this->model->getAll($search);
        
            if ($result === false) {
                die("Lỗi truy vấn cơ sở dữ liệu.");
            }
        
            $this->data['table'] = $result; 
            $this->view('/admin/khoa/List_Khoa', [
                'table' => $this->data['table']
            ]);
        }

        // Thêm khoa
        public function add_khoa() {
            if (isPost()) {
                $filteredPost = filter();
                if (!$this->model->isDuplicateKhoaId($filteredPost['department_id'])) {
                    $this->model->addKhoa($filteredPost);
                    echo "<script>alert('Thêm khoa thành công!')</script>";
                    echo "<script>window.location.href = '/QLDA_HSSV/admin/khoa/list_khoa'</script>";
                } else {
                    echo "<script>alert('Thêm khoa thất bại, trùng mã khoa!')</script>";
                }
            }
            $this->view('/admin/khoa/add_khoa', []); 
        }

        // Sửa khoa
        public function edit_khoa($id = '') {
            if (isPost()) {
                $filteredPost = filter(); 
                $this->model->updateKhoa($id, $filteredPost); 
                echo "<script>alert('Sửa khoa thành công')</script>";
                echo "<script>window.location.href = '/QLDA_HSSV/admin/khoa/list_khoa'</script>";
            } else {
                $result = $this->model->getKhoaById($id); 
                if (!$result) {
                    die("Không tìm thấy khoa.");
                }
                $this->view('/admin/khoa/edit_khoa', [
                    'data' => $result
                ]);
            }
        }
        

        // Xóa khoa
        public function delete_khoa($id = '') {
            if ($this->model->deleteKhoa($id)) {
                echo "<script>alert('Xóa thành công')</script>";
            } else {
                echo "<script>alert('Xóa thất bại')</script>";
            }
            echo "<script>window.location.href = '/QLDA_HSSV/admin/khoa/list_khoa'</script>";
        }
    }

?>

