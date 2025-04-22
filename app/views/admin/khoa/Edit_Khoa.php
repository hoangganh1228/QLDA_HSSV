<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Khoa</title>
    <?php
        require_once 'configs/bootstrap.php';
    ?>
</head>

<body>
    <div class="container p-3 my-3">
        <div class="display-6 text-center">Sửa Khoa</div>
        <form action="" method="post">
            <div class="form-group mt-3">
                <label for="">Mã Khoa:</label>
                <input type="text" name="department_id" class="form-control" 
                       value="<?php echo $data['department_id']; ?>" readonly>
            </div>
            <div class="form-group mt-3">
                <label for="">Tên khoa:</label>
                <input type="text" name="department_name" class="form-control" 
                       value="<?php echo $data['department_name']; ?>" required>
            </div>
            <br>
            <div>
                <button type="submit" id="btnThem" class="btn btn-outline-secondary">Sửa</button>
                <a href="/QLDA_HSSV/admin/khoa/list_khoa" class="btn btn-outline-secondary">Quay lại</a>
            </div>
        </form>
    </div>
</body>

</html>
