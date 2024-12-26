<?php

class DiemSoModel extends Model {

// Lấy danh sách điểm số của sinh viên (có tùy chọn tìm kiếm theo student_id hoặc grade_id)
public function getAll($search = '') {
    $condition = !empty($search) 
        ? "WHERE student_id LIKE '%$search%' OR grade_id LIKE '%$search%'"
        : '';
        $query = "
        SELECT grades.*, credit_registration.reg_id,semesters.semester_id
        FROM grades 
        LEFT JOIN credit_registration
        ON grades.reg_id = credit_registration.reg_id 
        LEFT JOIN semesters
        ON credit_registration.semester_id = semesters.semester_id 
        $condition
    ";
    return $this->database->query($query)->fetchAll(PDO::FETCH_ASSOC);
}
public function getGradesBySemester($reg_id, $semester_id) {
    // Định nghĩa các cột cần lấy
    $columns = [
        "g.grade_id",
        "g.grade",
        "cr.reg_id",
        "s.semester_id",
        "s.semester_name",
        
    ];
    
    // Định nghĩa bảng và các JOIN
    $table = "
        grades g
        JOIN credit_registration cr ON g.reg_id = cr.reg_id
        JOIN semesters s ON cr.semester_id = s.semester_id
    ";
    
    // Điều kiện lọc
    $condition = "
        WHERE cr.reg_id = '$reg_id' 
        AND s.semester_id = '$semester_id'
    ";
    
    // Thực hiện truy vấn
    $result = $this->database->select($columns, $table, $condition);
    
    // Kiểm tra kết quả và trả về
    if (empty($result)) {
        return false; // Không tìm thấy dữ liệu
    }
    
    return $result; // Trả về dữ liệu điểm của sinh viên theo học kỳ
}

// Kiểm tra trùng student_id và grade_id
public function isDuplicateGrade($student_id, $grade_id) {
    return $this->database->isDuplicate('grades', ['student_id', 'grade_id'], [$student_id, $grade_id]);
}

// Thêm điểm số mới cho sinh viên
public function addDiemSo($data) {
    return $this->database->insert('grades', $data);
}

// Cập nhật điểm số theo student_id và grade_id
public function updateDiemSo($student_id, $grade_id, $data) {
    return $this->database->update('grades', $data, "WHERE student_id = '$student_id' AND grade_id = '$grade_id'");
}

// Lấy điểm số của sinh viên theo student_id và grade_id
public function getDiemSoByStudentAndGrade($student_id, $grade_id) {
    $result = $this->database->select([], 'grades', "WHERE student_id = '$student_id' AND grade_id = '$grade_id'");
    return $result ? $result[0] : null;
}

// Xóa điểm số của sinh viên theo student_id và grade_id
public function deleteDiemSo($student_id, $grade_id) {
    return $this->database->delete('grades', "WHERE student_id = '$student_id' AND grade_id = '$grade_id'");
}

// Hàm query để lấy dữ liệu từ bảng khác
public function query($sql) {
    return $this->database->query($sql);
  
}
public function getAllKi() {
    return $this->database->select([], 'semesters', '');
}
public function getAlldki() {
    return $this->database->select([], 'credit_registration', '');
}

public function getAllUsers($search = '') {
    return $this->database->select([], 'users', "WHERE username LIKE '%$search%' OR email LIKE '%$search%'");
}
public function getAllstudent($search = '') {
    return $this->database->select([], 'students', "WHERE fullname LIKE '%$search%' OR student_id LIKE '%$search%'");
}

}
?>
