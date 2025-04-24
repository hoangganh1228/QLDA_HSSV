<?php
class NganhModel extends Model {

    public function getAll($search = '') {
        $condition = !empty($search) ? "WHERE majors.major_id LIKE '%$search%' OR majors.major_name LIKE '%$search%'" : '';
        $query = "
            SELECT majors.*, department_name 
            FROM majors 
            LEFT JOIN departments 
            ON majors.department_id = departments.department_id 
            $condition
        ";
        return $this->database->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function isDuplicateNganhId($major_id) {
        return $this->database->isDuplicate('majors', 'major_id', $major_id);
    }

    public function addNganh($data) {
        return $this->database->insert('majors', $data);
    }

    public function updateNganh($id, $data) {
        return $this->database->update('majors', $data, "WHERE id = '$id'");
    }

    public function getNganhById($id) {
        $result = $this->database->select([], 'majors', "WHERE id = '$id'");
        return $result ? $result[0] : null;
    }
    

    public function deleteNganh($id) {
        return $this->database->delete('majors', "WHERE id = '$id'");
    }

    public function getAllKhoa() {
        return $this->database->select([], 'departments', '');
    }
}
