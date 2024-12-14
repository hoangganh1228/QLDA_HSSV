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
            <label for="username">Tên người dùng:</label>
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
            <label for="role">Vai trò:</label>
            <select name="role" id="role" class="form-control" required>
                <option value="">Chọn vai trò</option>
                <option value="Quản lý">Quản lý</option>
                <option value="Giảng viên">Giảng viên</option>
                <option value="Sinh viên">Sinh viên</option>
            </select>
        </div>
        <br>
        <div>
            <button type="submit" id="btnThem" class="btn btn-outline-secondary">Thêm</button>
            <a href="/QLDA_HSSV/admin/users/index" class="btn btn-outline-secondary">Quay lại</a>
        </div>
    </form>
  </div>
</body>
</html>
