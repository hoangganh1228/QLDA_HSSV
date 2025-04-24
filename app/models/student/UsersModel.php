<?php
class UsersModel extends Model {

    public function getAllUsers($search = '') {
        return $this->database->select([], 'students', "WHERE username LIKE '%$search%' OR email LIKE '%$search%'");
    }

    public function isDuplicateKhoaId($student_id) {
        return $this->database->isDuplicate('students', 'student_id', $student_id);
    }

    public function addUser($data) {
        return $this->database->insert('students', $data);
    }

    public function addTeacher($data) {
        return $this->database->insert('teachers', $data);
    }
    
    public function addStudent($data) {
        return $this->database->insert('students', $data);
    }

    public function getUserByUsername($username) {
        $result = $this->database->select(['*'], 'students', "WHERE username = '$username'");
        return $result ? $result[0] : null;
    }

    public function studentExists($student_id) {
        $result = $this->database->select(
            ['id'], // Chỉ cần lấy cột id
            'students', // Bảng students
            "WHERE student_id = '$student_id'" // Điều kiện kiểm tra
        );
        return !empty($result); // Trả về true nếu tồn tại, false nếu không
    }

  
    public function updateUser($id, $data) {
        return $this->database->update('students', $data, "WHERE id = '$id'");
    }
    // đừng động vào
    public function updateSinhVien($student_id, $data) {
        return $this->database->update('students', $data, "WHERE student_id = '$student_id'");
    }

    // Lấy thông tin khoa theo id
    public function getUserById($id) {
        $result = $this->database->select([], 'students', "WHERE id = '$id'");
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

    // Xóa khoa theo id
    public function deleteUser($id) {
        return $this->database->delete('students', "WHERE id = '$id'");
    }
    public function escapeString($string) {
        return str_replace("'", "''", $string); // Thay thế dấu nháy đơn để tránh lỗi SQL
    }
    
    public function updatePassword($username, $hashedPassword) {
        $username = $this->escapeString($username);
        $hashedPassword = $this->escapeString($hashedPassword);
    
        $sql = "UPDATE students SET password = '$hashedPassword' WHERE username = '$username'";
        return $this->database->query($sql);
    }
    
    
    
}
