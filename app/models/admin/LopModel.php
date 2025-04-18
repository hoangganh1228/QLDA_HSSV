<?php
class LopModel extends Model {

    public function getAll($search = '') {
        $condition = !empty($search) ? "WHERE classes.class_id LIKE '%$search%' OR classes.class_name LIKE '%$search%'" : '';
        $query = "
            SELECT classes.*, major_name 
            FROM classes 
            LEFT JOIN majors 
            ON classes.major_id = majors.major_id 
            $condition
        ";
        return $this->database->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function isDuplicateLopId($class_id) {
        return $this->database->isDuplicate('classes', 'class_id', $class_id);
    }

    public function addLop($data) {
        return $this->database->insert('classes', $data);
    }

    public function updateLop($id, $data) {
        return $this->database->update('classes', $data, "WHERE id = '$id'");
    }

    public function getLopById($id) {
        $result = $this->database->select([], 'classes', "WHERE id = '$id'");
        return $result ? $result[0] : null;
    }
    

    public function deleteLop($id) {
        return $this->database->delete('classes', "WHERE id = '$id'");
    }

    public function getAllNganh() {
        return $this->database->select([], 'majors', '');
    }
}
