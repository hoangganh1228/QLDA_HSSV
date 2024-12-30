<?php
class UsersModel extends Model {

    public function getAllUsers($search = '') {
        return $this->database->select([], 'users', "WHERE username LIKE '%$search%' OR email LIKE '%$search%'");
    }

    public function isDuplicateKhoaId($users_id) {
        return $this->database->isDuplicate('users', 'user_id', $users_id);
    }

    public function addUser($data) {
        return $this->database->insert('users', $data);
    }

    public function addTeacher($data) {
        return $this->database->insert('teachers', $data);
    }
    
    public function addStudent($data) {
        return $this->database->insert('students', $data);
    }

        public function getUserByUsername($username) {
            $result = $this->database->select(['*'], 'users', "WHERE username = '$username'");
            return $result ? $result[0] : null;
        }

  
    public function updateUser($id, $data) {
        return $this->database->update('users', $data, "WHERE id = '$id'");
    }
    // đừng động vào
    public function updateSinhVien($user_id, $data) {
        return $this->database->update('users', $data, "WHERE user_id = '$user_id'");
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

    // Xóa khoa theo id
    public function deleteUser($id) {
        return $this->database->delete('users', "WHERE id = '$id'");
    }
    public function escapeString($string) {
        return str_replace("'", "''", $string); // Thay thế dấu nháy đơn để tránh lỗi SQL
    }
    
    public function updatePassword($username, $hashedPassword) {
        $username = $this->escapeString($username);
        $hashedPassword = $this->escapeString($hashedPassword);
    
        $sql = "UPDATE users SET password = '$hashedPassword' WHERE username = '$username'";
        return $this->database->query($sql);
    }
    
    
    
}
