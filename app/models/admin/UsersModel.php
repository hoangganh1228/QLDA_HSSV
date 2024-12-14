<?php
class UsersModel extends Model {

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

    // // Cập nhật khoa theo id
    // public function updateKhoa($id, $data) {
    //     return $this->database->update('departments', $data, "WHERE id = '$id'");
    // }

    // // Lấy thông tin khoa theo id
    // public function getKhoaById($id) {
    //     $result = $this->database->select([], 'departments', "WHERE id = '$id'");
    //     return $result ? $result[0] : null;
    // }
    

    // Xóa khoa theo id
    // public function deleteKhoa($id) {
    //     return $this->database->delete('departments', "WHERE id = '$id'");
    // }
}
