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
                LEFT JOIN subjects ON credit_registration.subject_id = subjects.subject_name
                LEFT JOIN semesters ON credit_registration.semester_id = semesters.name
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
        
        
        
        // Xóa thông tin đăng ký môn học theo id
        public function deleteDangKyMonHoc($id) {
            return $this->database->delete('credit_registration', "WHERE id = '$id'");
        }
        public function getAllNganh() {
            return $this->database->select([], 'majors', '');
        }
        public function getAllSubjectCredit() {
            return $this->database->select([], 'student_subject', '');
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
        public function getStudentByUsername($username) {
            // Thoát ký tự đặc biệt trong username (nếu cần)
            $username = addslashes($username);
        
            // Truy vấn cơ sở dữ liệu
            $query = "SELECT * FROM students WHERE fullname = '$username'";
            $stmt = $this->database->query($query);
        
            // Kiểm tra kết quả trả về
            if ($stmt && $stmt->rowCount() > 0) {  // Dùng rowCount() thay cho num_rows
                return $stmt->fetch(PDO::FETCH_ASSOC);  // Trả về sinh viên đầu tiên
            }
        
            return null;  // Trả về null nếu không tìm thấy sinh viên
        }
        public function addStudentSubject($studentId, $regId) {
            // Tạo ID ngẫu nhiên cho student_subject
            $randomId = mt_rand(100000, 999999);  // ID ngẫu nhiên trong phạm vi 6 chữ số
        
            // Dữ liệu cần thêm vào bảng student_subject
            $data = [
                'id' => $randomId,  // ID ngẫu nhiên
                'student_id' => $studentId,
                'reg_id' => $regId
            ];
        
            // Chèn dữ liệu vào bảng student_subject
            return $this->database->insert('student_subject', $data);
        }
        public function addGrades($studentId, $regId) {
            // Tạo ID ngẫu nhiên cho student_subject
            $randomId = mt_rand(100000, 999999);  // ID ngẫu nhiên trong phạm vi 6 chữ số
        
            // Dữ liệu cần thêm vào bảng student_subject
            $data = [
                'id' => NULL,// ID ngẫu nhiên
                'grade_id'=>$randomId,
                'student_id' => $studentId,
                'teacher_id'=>NULL,
                'reg_id' => $regId,
                'chuyen_can'=>NULL,
                'giua_ky'=>NULL,
                'cuoi_ky'=>NULL,
                'tong_ket'=>NULL,


            ];
        
            // Chèn dữ liệu vào bảng student_subject
            return $this->database->insert('grades', $data);
        }
        public function isRegistered($studentId, $regId) {
            // Truy vấn kiểm tra xem student_id và reg_id đã tồn tại trong bảng student_subject chưa
            $result = $this->database->select(['COUNT(*) as count'], 'student_subject', "WHERE student_id = '$studentId' AND reg_id = '$regId'");
        
            // Kiểm tra kết quả, nếu COUNT(*) > 0, nghĩa là đã đăng ký
            return $result && $result[0]['count'] > 0;
        }
        
        // Trong Model, ví dụ "StudentModel.php"
        public function getRegisteredSubjects($student_id) {
            // Truy vấn lấy danh sách reg_id mà sinh viên đã đăng ký
            $result = $this->database->select(['reg_id'], 'student_subject', "WHERE student_id = '$student_id'");
            
            // Trả về danh sách reg_id mà sinh viên đã đăng ký
            return $result ? $result : [];
        }
        
        
        
        

        
        
        
        
        
    }
