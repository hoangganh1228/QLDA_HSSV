<?php
class TuitionModel extends Model {

  public function getStudent($userId) {
    return $this->database->select([] ,'students', "WHERE user_id = '$userId' ");
  }

  public function insertTuitionBySemester($student_id, $semester_id) {
    // Bước 1: Lấy tổng học phí của kỳ học cụ thể
    $columns = ["SUM(s.credits * tf.fee_per_credit) AS total_fee"];
    $table = "
        student_subject ss
        JOIN credit_registration cr ON ss.reg_id = cr.reg_id
        JOIN subjects s ON cr.subject_id = s.subject_id
        JOIN majors m ON cr.major_id = m.major_id
        JOIN tuition_fee tf ON m.department_id = tf.department_id
    ";
    $condition = "
        WHERE ss.student_id = '$student_id' 
        AND cr.semester_id = '$semester_id'
        AND cr.status = 'Đã đăng ký'
        GROUP BY ss.student_id, cr.semester_id
    ";

    // Truy vấn tổng học phí
    $result = $this->database->select($columns, $table, $condition);

    if (empty($result)) {
        // Nếu không tìm thấy dữ liệu, thoát hàm
        return false; // Hoặc bạn có thể ném ra Exception nếu cần thiết
    }

    $total_fee = $result[0]['total_fee'];

    // Bước 2: Kiểm tra xem bản ghi đã tồn tại trong bảng `tuitions` chưa
    $checkExistColumns = ["id"];
    $checkExistTable = "tuitions";
    $checkExistCondition = "WHERE student_id = '$student_id' AND semester_id = '$semester_id'";
    $existingTuition = $this->database->select($checkExistColumns, $checkExistTable, $checkExistCondition);

    if (empty($existingTuition)) {
        // Nếu chưa tồn tại, chèn bản ghi mới vào bảng `tuitions`
        $data = [
            'student_id' => $student_id,
            'semester_id' => $semester_id,
            'total' => $total_fee,
            'paid' => 0 // Mặc định chưa thanh toán
        ];
        $this->database->insert('tuitions', $data);
    } else {
        // Nếu đã tồn tại, cập nhật `total` (nếu cần thiết)
        $updateData = [
            'total' => $total_fee
        ];
        $this->database->update('tuitions', $updateData, $checkExistCondition);
    }

    // Hàm chỉ thực hiện chèn hoặc cập nhật và không trả về giá trị
    return true; // Chỉ trả về `true` nếu thành công
}

function calculateTotalTuition($student_id) {
  // Khởi tạo biến tổng tiền
  $columns = ["SUM(total) AS total_tuition"];
  $table = "tuitions";
  $condition = "WHERE student_id = '$student_id'";

  // Sử dụng hàm select để lấy tổng tiền
  $result = $this->database->select($columns, $table, $condition);

  // Kiểm tra nếu không có dữ liệu
  if (empty($result) || $result[0]['total_tuition'] === null) {
      return "Không tìm thấy dữ liệu học phí cho sinh viên này.";
  }

  // Trả về tổng học phí
  return $result[0]['total_tuition'];
}

public function getAllSemesters() {
  return $this->database->select([], 'semesters', '');
}

public function getSemester($semester_id) {
  $result = $this->database->select([], 'semesters', "WHERE semester_id = '$semester_id'");
  return $result ? $result[0] : null;
}

public function getTuitionDetailsBySemester($student_id, $semester_id) {
  $columns = ["t.semester_id", "s.name as semester_name", "t.total", "t.paid"];
  $table = "
      tuitions t
      JOIN semesters s ON t.semester_id = s.semester_id
  ";
  $condition = "
      WHERE t.student_id = '$student_id'
      AND t.semester_id = '$semester_id'
  ";

  $result = $this->database->select($columns, $table, $condition);
  return $result ? $result[0] : null;
}

public function getAllTuitionDetails($student_id) {
  $columns = ["DISTINCT t.semester_id", "s.name as semester_name", "t.total", "t.paid"];
  $table = "
      tuitions t
      JOIN semesters s ON t.semester_id = s.semester_id
  ";
  $condition = "WHERE t.student_id = '$student_id'";

  $result = $this->database->select($columns, $table, $condition);
  return $result;
}

public function getInfo($student_id) {
  $columns = ["st.fullname", "st.student_id", "st.date_of_birth", "kh.start_year", "kh.end_year", "mj.major_name"];
  $table = "
      students st
      JOIN khoa_hoc kh ON st.khoa_hoc_id = kh.khoa_hoc_id
      JOIN credit_registration cr ON kh.khoa_hoc_id = cr.khoa_hoc_id
      JOIN majors mj ON cr.major_id = mj.major_id 
    ";
    $condition = "
      WHERE st.student_id = '$student_id' 
   
    ";

    $result = $this->database->select($columns, $table, $condition);
    return $result ? $result[0] : null;
  }


  public function getTuitionASC($student_id) {
    $columns = [];
    $table = "
        tuitions
      ";
      $condition = "
        WHERE student_id = '$student_id' AND paid < total ORDER BY semester_id ASC
      ";

      return $result = $this->database->select($columns, $table, $condition);
      
  }

  public function updateTuitionPaid($semester_id, $data) {
    $condition = "WHERE semester_id = $semester_id";
    return $this->database->update('tuitions', $data, $condition);
  }
  public function getAllUsers($search = '') {
    return $this->database->select([], 'users', "WHERE username LIKE '%$search%' OR email LIKE '%$search%'");
}


}
