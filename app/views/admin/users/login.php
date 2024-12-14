<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-md-4">
            <h3 class="text-center mb-4">Đăng nhập</h3>
            <form action="/QLDA_HSSV/admin/users/loginPost" method="post">
                <div class="form-group mb-3">
                    <label for="username">Tên đăng nhập:</label>
                    <input type="text" name="username" id="username" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label for="password">Mật khẩu:</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
            </form>
        </div>
    </div>
</body>
</html>
