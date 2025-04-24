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
            <!-- Thông tin chung -->
            <div class="form-group mt-3">
                <label for="fullname">Mã sinh viên:</label>
                <input type="text" name="student_id" class="form-control" required>
            </div>
            <div class="form-group mt-3">
                <label for="fullname">Họ và tên:</label>
                <input type="text" name="fullname" class="form-control" required>
            </div>
            <div class="form-group mt-3">
                <label for="username">Tên đăng nhập:</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group mt-3">
                <label for="password">Mật khẩu:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group mt-3">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group mt-3">
                <label for="phone">SĐT:</label>
                <input type="tel" name="phone" class="form-control" required>
            </div>
            <div class="form-group mt-3">
                <label for="address">Địa chỉ:</label>
                <input type="text" name="address" class="form-control" required>
            </div>
            <div class="form-group mt-3">
                <label for="address">Ngày sinh:</label>
                <input type="date" name="date_of_birth" class="form-control" required>
            </div>
            <div class="form-group mt-3">
                <label for="sex">Giới tính:</label>
                <select name="sex" id="sex" class="form-control" required>
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                </select>
            </div>

            <div id="student-fields">
                <div class="form-group mt-3">
                    <label for="class_id">Lớp:</label>
                    <select name="class_id" id="class_id" class="form-control">
                        <option value="">Chọn lớp</option>
                        <?php foreach ($classes as $class): ?>
                            <option value="<?= $class['class_id']; ?>">
                                <?= $class['class_id']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="khoa_hoc_id">Khóa học:</label>
                    <select name="khoa_hoc_id" id="khoa_hoc_id" class="form-control">
                        <option value="">Chọn khóa học</option>
                        <?php foreach ($khoahocs as $khoahoc): ?>
                            <option value="<?= $khoahoc['khoa_hoc_id']; ?>">
                                <?= $khoahoc['start_year'] . ' - ' . $khoahoc['end_year']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
<<<<<<< HEAD



            <!-- Nút Submit -->
            <button type="submit" class="btn btn-outline-secondary mt-3">Thêm mới</button>
        </form>
=======
        </div>
        <br>
        <div>
            <button type="submit" id="btnThem" class="btn btn-outline-secondary">Thêm</button>
            <a href="/admin/users/index" class="btn btn-outline-secondary">Quay lại</a>
        </div>
    </form>
>>>>>>> 82c559a68c975ba92cd746b127e4aabde6ac1458
  </div>
  <script src="/app/public/js/script.js"></script>
</body>
</html>
