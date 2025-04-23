<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    require 'configs/bootstrap.php';
    ?>
    <title>Thêm khóa học</title>
</head>



<body>
    <div class="container">
        <h2 class="text-center text-uppercase">Thêm khóa học </h2>
        <hr>
        <form action="" method="post">
            <div class="row">
                <div class="col">
                    <div class="form-group mt-3">
                        <label for="khoa_hoc_id">Mã khóa học:</label>
                        <input type="text" name='khoa_hoc_id' id="khoa_hoc_id" class="form-control"
                            placeholder="Nhập mã khóa học" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="start_year">Năm bắt đầu:</label>
                        <input type="text" name='start_year' id="start_year" class="form-control"
                            placeholder="Nhập năm bắt đầu" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="end_year">Năm kết thúc:</label>
                        <input type="text" name='end_year' id="end_year" class="form-control"
                            placeholder="Nhập năm kết thúc" required>
                    </div>


                </div>

            </div>


            <div class="mt-4  align-items-center">
                <button type="submit" id="btnThem" class="btn btn-success mx-auto">Lưu thông tin</button>
                <a href="/admin/khoahoc/list_KH" class="btn btn-danger">Quay lại</a>
            </div>
        </form>
    </div>

</body>

</html>