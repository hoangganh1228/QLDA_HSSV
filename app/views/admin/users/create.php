<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm người dùng</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container p-3 my-3">
      <div class="display-6 text-center">Thêm người dùng</div>
      <form action="" method="post">
        <div class="form-group mt-3">
            <label for="user_id">ID:</label>
            <input type="text" name="user_id" id="user_id" class="form-control" required>
        </div>
        <div class="form-group mt-3">
            <label for="username">Tên đăng nhập:</label>
            <input type="text" name="username" id="username" class="form-control" required>
        </div>
        <div class="form-group mt-3">
            <label for="password">Mật khẩu:</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="form-group mt-3">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group mt-3">
            <label for="phone">SĐT:</label>
            <input type="tel" name="phone" id="phone" class="form-control" required>
        </div>
        <div class="form-group mt-3">
            <label for="phone">Địa chỉ:</label>
            <input type="text" name="address" id="address" class="form-control" required>
        </div>
        <div class="form-group mt-3">
            <label for="phone">Họ tên người dùng:</label>
            <input type="text" name="fullname" id="fullname" class="form-control" required>
        </div>
        <div class="form-group mt-3">
            <label for="dob">Ngày tháng năm sinh:</label>
            <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" required>
        </div>
        <div class="form-group mt-3">
            <label for="sex">Giới tính:</label>
            <select name="sex" id="sex" class="form-control" required>
                <option value="">Chọn giới tính</option>
                <option value="Nam">Nam</option>
                <option value="Nữ">Nữ</option>
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="role">Vai trò:</label>
            <select name="role" id="role" class="form-control" required>
                <option value="">Chọn vai trò</option>
                <option value="Quản lý">Quản lý</option>
                <option value="Giảng viên">Giảng viên</option>
                <option value="Sinh viên">Sinh viên</option>
            </select>
        </div>
        <div class="form-group mt-3" id="teacher-fields" style="display: none;">
            <label for="department_id">Khoa:</label>
            <select name="department_id" id="department_id" class="form-control">
                <option value="">Chọn khoa</option>
                <?php foreach ($departments as $department): ?>
                    <option value="<?= $department['department_id']; ?>"><?= $department['department_name']; ?></option>
                <?php endforeach; ?>
                <!-- Thêm các khoa khác -->
            </select>
        </div>
        <div class="form-group mt-3" id="student-fields" style="display: none;">
            <div class="form-group mt-3">
                <label for="class_id">Chọn lớp:</label>
                <select name="class_id" id="class_id" class="form-control">
                    <option value="">Chọn vai trò</option>
                    <?php foreach ($classes as $class): ?>
                        <option value="<?= $class['class_id']; ?>"><?= $class['class_id'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group mt-3">
                <label for="class_id"> Khóa học:</label>
                <select name="khoa_hoc_id" id="khoa_hoc_id" class="form-control">
                    <option value="">Chọn khóa học</option>
                    <?php foreach ($khoahocs as $khoahoc): ?>
                        <option value="<?= $khoahoc['khoa_hoc_id']; ?>"><?= $khoahoc['start_year'] . ' - ' . $khoahoc['end_year']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <br>
        <div>
            <button type="submit" id="btnThem" class="btn btn-outline-secondary">Thêm</button>
            <a href="/QLDA_HSSV/admin/users/index" class="btn btn-outline-secondary">Quay lại</a>
        </div>
    </form>
  </div>
  <script src="/QLDA_HSSV/app/public/js/script.js"></script>
</body>
</html>
