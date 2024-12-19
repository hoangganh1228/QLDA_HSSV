document.addEventListener('DOMContentLoaded', function () {
  const roleSelect = document.getElementById('role');
  const teacherFields = document.getElementById('teacher-fields');
  const studentFields = document.getElementById('student-fields');

  // Hàm ẩn/hiện các trường dựa trên vai trò
  function toggleFields() {
    const role = roleSelect.value;

    // Ẩn tất cả các trường phụ
    teacherFields.style.display = 'none';
    studentFields.style.display = 'none';

    // Hiển thị các trường dựa trên vai trò
    if (role === 'Giảng viên') {
      teacherFields.style.display = 'block';
    } else if (role === 'Sinh viên') {
      studentFields.style.display = 'block';
    }
    // Nếu là Quản lý, không hiển thị trường nào
  }

  // Khi tải trang, hiển thị đúng các trường dựa trên vai trò hiện tại
  toggleFields();

  // Thêm sự kiện thay đổi vai trò
  roleSelect.addEventListener('change', toggleFields);
});
