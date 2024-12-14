<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa người dùng</title>
    <?php
        require_once 'configs/bootstrap.php';
    ?>
</head>

<body>
    <div class="container p-3 my-3">
        <div class="display-6 text-center">Sửa người dùng</div>
        <form action="" method="post">
          <div class="form-group mt-3">
              <label for="user_id">ID:</label>
              <input type="text" name="user_id" id="user_id" value="<?= $data['user_id']; ?>" class="form-control " required>
          </div>
          <div class="form-group mt-3">
            <label for="username">Tên người dùng:</label>
            <input type="text" name="username" id="username" value="<?= $data['username']; ?>" class="form-control" required>
          </div>
          <div class="form-group mt-3">
            <label for="password">Mật khẩu:</label>
            <input type="password" name="password" id="password" value="<?= $data['password']; ?>" class="form-control" required>
          </div>
          <div class="form-group mt-3">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?= $data['email']; ?>" class="form-control" required>
        </div>
        <div class="form-group mt-3">
            <label for="phone">SĐT:</label>
            <input type="tel" name="phone" id="phone" value="<?= $data['phone']; ?>" class="form-control" required>
        </div>
        <div class="form-group mt-3">
          <label for="role">Vai trò:</label>
          <select name="role" id="role" class="form-control" required>
              <option value="">Chọn vai trò</option>
              <option value="Quản lý" <?= $data['role'] === 'Quản lý' ? 'selected' : '' ?>>Quản lý</option>
              <option value="Giảng viên" <?= $data['role'] === 'Giảng viên' ? 'selected' : '' ?>>Giảng viên</option>
              <option value="Sinh viên" <?= $data['role'] === 'Sinh viên' ? 'selected' : '' ?>>Sinh viên</option>
          </select>
        </div>
    <br>
    <div>
        <button type="submit" id="btnThem" class="btn btn-outline-secondary">Sửa</button>
        <a href="/QLDA_HSSV/admin/users" class="btn btn-outline-secondary">Quay lại</a>
    </div>
</form>
    </div>
</body>

</html>
