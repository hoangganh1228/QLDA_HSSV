<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa ngành</title>
    <?php
        require_once 'configs/bootstrap.php';
    ?>
</head>

<body>
    <div class="container p-3 my-3">
        <div class="display-6 text-center">Sửa ngành</div>
        <form action="" method="post">
    <div class="form-group mt-3">
        <label for="">Mã ngành:</label>
        <input type="text" name="major_id" class="form-control" 
               value="<?= $data['major_id']; ?>" readonly>
    </div>
    <div class="form-group mt-3">
        <label for="">Tên ngành:</label>
        <input type="text" name="major_name" class="form-control" 
               value="<?= $data['major_name']; ?>" required>
    </div>
    <div class="form-group mt-3">
        <label for="">Tên khoa:</label>
        <select name="department_id" class="form-control" required>
            <option value="">Chọn khoa</option>
            <?php foreach ($departments as $dept): ?>
                <option value="<?= $dept['department_id']; ?>" 
                    <?= $data['department_id'] == $dept['department_id'] ? 'selected' : ''; ?>>
                    <?= $dept['department_name']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <br>
    <div>
        <button type="submit" id="btnThem" class="btn btn-outline-secondary">Sửa</button>
        <a href="/QLDA_HSSV/admin/nganh/list_nganh" class="btn btn-outline-secondary">Quay lại</a>
    </div>
</form>
    </div>
</body>

</html>
