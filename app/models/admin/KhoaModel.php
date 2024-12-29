<?php
class KhoaModel extends Model {

    // Lấy danh sách khoa (với tùy chọn tìm kiếm)
    public function getAll($search = '') {
        $condition = !empty($search) ? "WHERE department_id LIKE '%$search%' OR department_name LIKE '%$search%'" : '';
        return $this->database->select([], 'departments', $condition);
    }

    // Kiểm tra trùng mã khoa
    public function isDuplicateKhoaId($department_id) {
        return $this->database->isDuplicate('departments', 'department_id', $department_id);
    }

    // Thêm khoa mới
    public function addKhoa($data) {
        return $this->database->insert('departments', $data);
    }

    // Cập nhật khoa theo id
    public function updateKhoa($id, $data) {
        return $this->database->update('departments', $data, "WHERE id = '$id'");
    }

    // Lấy thông tin khoa theo id
    public function getKhoaById($id) {
        $result = $this->database->select([], 'departments', "WHERE id = '$id'");
        return $result ? $result[0] : null;
    }
    

    // Xóa khoa theo id
    public function deleteKhoa($id) {
        return $this->database->delete('departments', "WHERE id = '$id'");
    }

}