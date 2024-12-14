<?php
class UsersModel extends Model {
    public function getAll($search = '') {
        $condition = !empty($search) ? "WHERE users.user_id LIKE '%$search%' OR users.username LIKE '%$search%' OR users.email LIKE '%$search%'" : '';
        $query = "
            SELECT * 
            FROM users 
            $condition
        ";
        return $this->database->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllUsers() {
        return $this->database->select([], 'users', '');
    }

    public function isDuplicateKhoaId($users_id) {
        return $this->database->isDuplicate('users', 'user_id', $users_id);
    }

    public function addUser($data) {
        return $this->database->insert('users', $data);
    }

    public function getUserByUsername($username) {
        $result = $this->database->select(['*'], 'users', "WHERE username = '$username'");
        return $result ? $result[0] : null;
    }

    // Cập nhật khoa theo id
    public function updateUser($id, $data) {
        return $this->database->update('users', $data, "WHERE id = '$id'");
    }

    // Lấy thông tin khoa theo id
    public function getUserById($id) {
        $result = $this->database->select([], 'users', "WHERE id = '$id'");
        return $result ? $result[0] : null;
    }
    

    // Xóa khoa theo id
    public function deleteUser($id) {
        return $this->database->delete('users', "WHERE id = '$id'");
    }
}
