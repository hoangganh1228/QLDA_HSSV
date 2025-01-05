<?php
class TuitionModel extends Model {

    public function getAllTuitions($search = '') {
        return $this->database->select([], 'tuition_fee', "WHERE tuition_fee_id  LIKE '%$search%' OR department_id LIKE '%$search%'");
    }

    public function isDuplicateTuitionId($tuition_fee_id) {
        return $this->database->isDuplicate('tuition_fee', 'tuition_fee_id', $tuition_fee_id);
    }
    
    public function getDepartment() {
      return $this->database->select(['*'],'departments', "");
    }

    public function addTuition($data) {
        return $this->database->insert('tuition_fee', $data);
    }

    public function getUserByUsername($username) {
        $result = $this->database->select(['*'], 'students', "WHERE username = '$username'");
        return $result ? $result[0] : null;
    }

    // Cập nhật khoa theo id
    public function updateTuition($id, $data) {
        return $this->database->update('tuition_fee', $data, "WHERE id = '$id'");
    }

    // Lấy thông tin khoa theo id
    public function getTuitionById($id) {
      $result = $this->database->select([], 'tuition_fee', "WHERE id = '$id'");
      return $result ? $result[0] : null;
    }
    
    // Xóa khoa theo id
    public function deleteTuition($id) {
        return $this->database->delete('tuition_fee', "WHERE id = '$id'");
    }
}
