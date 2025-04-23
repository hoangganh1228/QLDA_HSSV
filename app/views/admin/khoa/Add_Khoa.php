<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Khoa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container p-3 my-3">
        <div class="display-6 text-center">Thêm Khoa</div>
        <form action="/admin/khoa/add_khoa" method="post">
            <div class="form-group mt-3">
                <label for="">Mã Khoa:</label>
                <input type="text" name="department_id" class="form-control" placeholder="Nhập mã khoa" required>
            </div>
            <div class="form-group mt-3">
                <label for="">Tên khoa:</label>
                <input type="text" name="department_name" class="form-control" placeholder="Nhập tên khoa" required>
            </div>
            <br>
            <div>
                <button type="submit" class="btn btn-outline-secondary">Lưu</button>
                <a href="/admin/khoa/list_khoa" class="btn btn-outline-secondary">Quay lại</a>
            </div>
        </form>
    </div>
</body>
</html>
