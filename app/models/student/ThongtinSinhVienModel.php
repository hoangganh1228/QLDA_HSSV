<?php
class ThongtinSinhVienModel extends Model {

    // Lấy danh sách thông tin sinh viên (có tùy chọn tìm kiếm theo fullname hoặc address)
    public function getAll($search = '') {
        $condition = !empty($search) 
            ? "WHERE fullname LIKE '%$search%' OR address LIKE '%$search%'" 
            : '';
        return $this->database->select([], 'students', $condition);
    }

    // Kiểm tra trùng student_id
    public function isDuplicateStudentId($student_id) {
        return $this->database->isDuplicate('students', 'student_id', $student_id);
    }

    // Thêm thông tin sinh viên mới
    public function addSinhVien($data) {
        return $this->database->insert('students', $data);
    }

    // Cập nhật thông tin sinh viên theo id
    public function updateSinhVien($user_id, $data) {
        return $this->database->update('students', $data, "WHERE user_id = '$user_id'");
    }

    // Lấy thông tin sinh viên theo id
    public function getSinhVienById($id) {
        $result = $this->database->select([], 'students', "WHERE user_id = '$id'");
        return $result ? $result[0] : null;
    }

    // Xóa thông tin sinh viên theo id
    public function deleteSinhVien($id) {
        return $this->database->delete('students', "WHERE id = '$id'");
    }
     // Lấy thông tin khoa theo id
     public function getUserById($id) {
        $result = $this->database->select([], 'users', "WHERE id = '$id'");
        return $result ? $result[0] : null;
    }
    
    public function getAllKhoaHoc() {
        $result = $this->database->select([], 'khoa_hoc', "");
        return $result ?: []; // Trả về toàn bộ mảng hoặc mảng rỗng nếu không có dữ liệu
    }
    
    public function getAllDepartments() {
        $result = $this->database->select(['*'], 'departments', "");
        return $result ?: []; // Trả về toàn bộ mảng hoặc mảng rỗng nếu không có dữ liệu
    }
    
    public function getAllClasses() {
        $result = $this->database->select([], 'classes', "");
        return $result ?: []; // Trả về toàn bộ mảng hoặc mảng rỗng nếu không có dữ liệu
    }
    public function getAllUsers($search = '') {
        return $this->database->select([], 'users', "WHERE username LIKE '%$search%' OR email LIKE '%$search%'");
    }
}