<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm môn</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container p-3 my-3">
        <div class="display-6 text-center">Thêm môn</div>
        <form action="" method="post">
    <div class="form-group mt-3">
        <label for="">Mã môn:</label>
        <input type="text" name="subject_id" class="form-control" required>
    </div>
    <div class="form-group mt-3">
        <label for="">Tên môn:</label>
        <input type="text" name="subject_name" class="form-control" required>
    </div>
    <div class="form-group mt-3">
        <label for="">Số tín:</label>
        <input type="number_format" name="credits" class="form-control" required>
    </div>
    <div class="form-group mt-3">
        <label for="">Tên ngành:</label>
        <select name="major_id" class="form-control" required>
            <option value="">Chọn ngành</option>
            <?php foreach ($majors as $dept): ?>
                <option value="<?= $dept['major_id']; ?>"><?= $dept['major_name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <br>
    <div>
        <button type="submit" id="btnThem" class="btn btn-outline-secondary">Thêm</button>
        <a href="/admin/mon/list_mon" class="btn btn-outline-secondary">Quay lại</a>
    </div>
</form>
    </div>
</body>
</html>
