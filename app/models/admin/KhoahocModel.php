<?php
    class KhoahocModel extends Model{
        public function getAll($search = '') {
            $condition = !empty($search) ? "WHERE khoa_hoc_id LIKE '%$search%'" : '';
            return $this->database->select([], 'khoa_hoc', $condition);
        }
        public function isDuplicateKhoahocId($khoa_hoc_id) {
            return $this->database->isDuplicate('khoa_hoc', 'khoa_hoc_id', $khoa_hoc_id);
        }
    
        // Thêm khoa mới
        public function addKhoahoc($data) {
            return $this->database->insert('khoa_hoc', $data);
        }
    
        // Cập nhật khoa theo id
        public function updateKhoahoc($id, $data) {
            //var_dump($id, $data);
            return $this->database->update('khoa_hoc', $data, "WHERE id = '$id'");
        }
    
        // Lấy thông tin khoa theo id
        public function getKhoahocById($id) {
            //var_dump($id);
            $result = $this->database->select([], 'khoa_hoc', "WHERE id = '$id'");
          //  var_dump($result);
            return $result ? $result[0] : null;
        }
        
    
        // Xóa khoa theo id
        public function deleteKhoahoc($id) {
            return $this->database->delete('khoa_hoc', "WHERE id = '$id'");
        }
    }
?>