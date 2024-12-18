document.addEventListener('DOMContentLoaded', function () {
  const roleSelect = document.getElementById('role');
  const teacherFields = document.getElementById('teacher-fields');
  const studentFields = document.getElementById('student-fields');

  roleSelect.addEventListener('change', function () {
    const role = this.value;

    // Ẩn tất cả các trường phụ
    teacherFields.style.display = 'none';
    studentFields.style.display = 'none';

    // Hiển thị các trường theo vai trò
    if (role === 'Giảng viên') {
        teacherFields.style.display = 'block';
    } else if (role === 'Sinh viên') {
        studentFields.style.display = 'block';
    }
  });
})
