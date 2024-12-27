<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm học phí</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container p-3 my-3">
      <div class="display-6 text-center">Thêm học phí</div>
      <form action="" method="post">
        <div class="form-group mt-3">
          <label for="user_id">ID:</label>
          <input type="text" name="tuition_fee_id" id="tuition_fee_id" class="form-control" required>
        </div>
        <div class="form-group mt-3">
          <label for="department_id">Mã khoa:</label>
          <select name="department_id" class="form-control" required>
            <option value="">Chọn mã khoa</option>
            <?php foreach ($departments as $department): ?>
                <option value="<?= $department['department_id']; ?>"><?= $department['department_name']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group mt-3">
            <label for="fee_per_credit">Học phí mỗi tín chỉ:</label>
            <input type="number" name="fee_per_credit" id="fee_per_credit" class="form-control" required>
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
