<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm ngành</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container p-3 my-3">
        <div class="display-6 text-center">Thêm ngành</div>
        <form action="" method="post">
    <div class="form-group mt-3">
        <label for="">Mã ngành:</label>
        <input type="text" name="major_id" class="form-control" required>
    </div>
    <div class="form-group mt-3">
        <label for="">Tên ngành:</label>
        <input type="text" name="major_name" class="form-control" required>
    </div>
    <div class="form-group mt-3">
        <label for="">Tên khoa:</label>
        <select name="department_id" class="form-control" required>
            <option value="">Chọn khoa</option>
            <?php foreach ($departments as $dept): ?>
                <option value="<?= $dept['department_id']; ?>"><?= $dept['department_name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <br>
    <div>
        <button type="submit" id="btnThem" class="btn btn-outline-secondary">Thêm</button>
        <a href="/admin/nganh/list_nganh" class="btn btn-outline-secondary">Quay lại</a>
    </div>
</form>
    </div>
</body>
</html>
