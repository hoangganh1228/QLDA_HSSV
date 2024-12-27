<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật thông tin khóa học</title>
    <?php
    require 'configs/bootstrap.php';
    ?>
</head>

<body>
    <div class="container">
        <h2 class="text-center text-uppercase">Cập nhật thông tin khóa học </h2>
        <hr>
        <form action="" method="post">
            <div class="row">
                <div class="form-group mt-3">

                    <label for="khoa_hoc_id">Mã khóa học:</label>
                    <input type="text" name='khoa_hoc_id' id="khoa_hoc_id" class="form-control"
                        placeholder="Nhập mã khóa học " value="<?php echo $data['khoa_hoc_id'] ?>" disabled>
                </div>
                <div class="form-group mt-3">
                    <label for="start_year">Năm bắt đầu:</label>
                    <input type="text" name='start_year' id="start_year" class="form-control" placeholder="Năm bắt đầu"
                        value="<?php echo $data['start_year'] ?>">
                </div>
                <div class="form-group mt-3">
                    <label for="end_year">Năm kết thúc:</label>
                    <input type="text" name='end_year' id="end_year" class="form-control" placeholder="Năm kết thúc"
                        value="<?php echo $data['end_year'] ?>">
                </div>

            </div>
            <div class="mt-4  align-items-center">
                <button type="submit" id="btnThem" class="btn btn-success mx-auto">Lưu thông tin</button>
                <a href="/QLDA_HSSV/admin/khoahoc/list_KH" class="btn btn-danger">Quay lại</a>
            </div>
        </form>
    </div>

</body>

</html>