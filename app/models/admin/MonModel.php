<?php
class MonModel extends Model {

    public function getAll($search = '') {
        $condition = !empty($search) ? "WHERE subjects.subject_id LIKE '%$search%' OR subjects.subject_name LIKE '%$search%'" : '';
        $query = "
            SELECT subjects.*, major_name 
            FROM subjects 
            LEFT JOIN majors 
            ON subjects.major_id = majors.major_id 
            $condition
        ";
        return $this->database->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function isDuplicateMonId($subject_id) {
        return $this->database->isDuplicate('subjects', 'subject_id', $subject_id);
    }

    public function addMon($data) {
        return $this->database->insert('subjects', $data);
    }

    public function updateMon($id, $data) {
        return $this->database->update('subjects', $data, "WHERE id = '$id'");
    }

    public function getMonById($id) {
        $result = $this->database->select([], 'subjects', "WHERE id = '$id'");
        return $result ? $result[0] : null;
    }
    

    public function deleteMon($id) {
        return $this->database->delete('subjects', "WHERE id = '$id'");
    }

    public function getAllNganh() {
        return $this->database->select([], 'majors', '');
    }
}
