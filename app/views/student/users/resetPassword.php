<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<style>
    body {
        background-color: #f8f9fa;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .reset-password-container {
        width: 400px;
        background: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .reset-password-container h3 {
        margin-bottom: 20px;
        text-align: center;
    }
    .btn-primary {
        width: 100%;
    }
</style>
<body>
  
    <div class="reset-password-container">
        <h3>Reset Password</h3>
        <form action="/QLDA_HSSV/student/Trang_chu/resetPasswordPost" method="POST">
    <div class="mb-3">
        <label for="username" class="form-label">Tên đăng nhập</label>
        <input type="text" name="username" id="username" class="form-control" placeholder="Nhập tên đăng nhập" required>
    </div>
    <div class="mb-3">
        <label for="old_password" class="form-label">Mật khẩu cũ</label>
        <input type="password" name="old_password" id="old_password" class="form-control" placeholder="Nhập mật khẩu cũ" required>
    </div>
    <div class="mb-3">
        <label for="new_password" class="form-label">Mật khẩu mới</label>
        <input type="password" name="new_password" id="new_password" class="form-control" placeholder="Nhập mật khẩu mới" required>
    </div>
    <div class="mb-3">
        <label for="confirm_password" class="form-label">Xác nhận mật khẩu mới</label>
        <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Nhập lại mật khẩu mới" required>
    </div>
    <button type="submit" class="btn btn-primary">Đặt lại mật khẩu</button>
</form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
