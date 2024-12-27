<?php
class DangKyMonHocModel extends Model {

    public function getAll($search = '') {
        // Kiểm tra và tạo câu điều kiện tìm kiếm
        $condition = !empty($search) ? "
            WHERE credit_registration.reg_id LIKE '%$search%' 
         
        " : '';
        
        // Truy vấn SQL
        $query = "
            SELECT 
                credit_registration.*, 
                majors.major_name,
                subjects.subject_name,
                semesters.name,
                khoa_hoc.start_year
               
            FROM credit_registration
            LEFT JOIN majors ON credit_registration.major_id = majors.major_id
            LEFT JOIN subjects ON credit_registration.subject_id = subjects.subject_id
            LEFT JOIN semesters ON credit_registration.semester_id = semesters.semester_id
            LEFT JOIN khoa_hoc ON credit_registration.khoa_hoc_id = khoa_hoc.khoa_hoc_id

           
            $condition
        ";
    
        // Thực thi truy vấn và trả về kết quả
        return $this->database->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }
    

    // Kiểm tra trùng mã đăng ký (reg_id)
    public function isDuplicateRegId($reg_id) {
        return $this->database->isDuplicate('credit_registration', 'reg_id', $reg_id);
    }

    // Thêm mới đăng ký môn học
    public function addDangKyMonHoc($data) {
        return $this->database->insert('credit_registration', $data);
    }

    // Cập nhật thông tin đăng ký môn học theo id
    public function updateDangKyMonHoc($id, $data) {
        return $this->database->update('credit_registration', $data, "WHERE id = '$id'");
    }

    // Lấy thông tin đăng ký môn học theo id
    public function getDangKyById($id) {
        $result = $this->database->select([], 'credit_registration', "WHERE id = '$id'");
        return $result ? $result[0] : null;
    }
    public function updateStatus($reg_id) {
        // Dữ liệu cần cập nhật
        $data = [
            'status' => 'Đã đăng ký'
        ];
    
        // Thực thi câu lệnh cập nhật trong bảng credit_registration
        return $this->database->update('credit_registration', $data, "WHERE reg_id = '$reg_id'");
    }
    
    
    // Xóa thông tin đăng ký môn học theo id
    public function deleteDangKyMonHoc($id) {
        return $this->database->delete('credit_registration', "WHERE id = '$id'");
    }
    public function getAllNganh() {
        return $this->database->select([], 'majors', '');
    }
    public function getAllMon() {
        return $this->database->select([], 'subjects', '');
    }
    public function getAllKi() {
        return $this->database->select([], 'semesters', '');
    }
    public function getAllKhoaHoc() {
        return $this->database->select([], 'khoa_hoc', '');
    }
    public function getAllUsers($search = '') {
        return $this->database->select([], 'users', "WHERE username LIKE '%$search%' OR email LIKE '%$search%'");
    }
}
