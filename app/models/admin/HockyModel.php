<?php
class HockyModel extends Model
{
    public function getAll($search = '')
    {
        $condition = !empty($search) ? "WHERE semester_id LIKE '%$search%' OR name LIKE '%$search%'" : '';
        return $this->database->select([], 'semesters', $condition);
    }
    public function add_HK($data)
    {
        return $this->database->insert('semesters', $data);
    }
    public function isDuplicateBy_SemesterId($semester_id)
    {
        return $this->database->isDuplicate('semesters', 'semester_id', $semester_id);
    }
    public function updateHocky($semester_id, $data) {
        return $this->database->update('semesters', $data, "WHERE semester_id = '$semester_id'");
    }

    // Lấy thông tin khoa theo id
    public function getHockyById($semester_id) {
        $result = $this->database->select([], 'semesters', "WHERE semester_id = '$semester_id'");
        return $result ? $result[0] : null;
    }
    

    // Xóa khoa theo id
    public function deleteHocky($semester_id) {
        return $this->database->delete('semesters', "WHERE semester_id = '$semester_id'");
    }
}