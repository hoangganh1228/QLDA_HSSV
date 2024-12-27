<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    require 'configs/bootstrap.php';
    ?>
    <title>Thêm học kỳ</title>
</head>



<body>
    <div class="container">
        <h2 class="text-center text-uppercase">Thêm học kỳ </h2>
        <hr>
        <form action="" method="post">
            <div class="row">
                <div class="col">
                    <div class="form-group mt-3">
                        <label for="semester_id">Mã học kỳ:</label>
                        <input type="text" name='semester_id' id="semester_id" class="form-control"
                            placeholder="Nhập mã học kỳ" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="name">Tên học kỳ:</label>
                        <input type="text" name='name' id="name" class="form-control" placeholder="Nhập tên học kỳ"
                            required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="start">Năm bắt đầu:</label>
                        <input type="text" name='start' id="start" class="form-control" placeholder="Năm bắt đầu"
                            required>
                    </div>

                    <div class="form-group mt-3">
                        <label for="end">Năm kết thúc:</label>
                        <input type="text" name='end' id="end" class="form-control" placeholder=" Năm kết thúc"
                            required>
                    </div>

                </div>

            </div>


            <div class="mt-4  align-items-center">
                <button type="submit" id="btnThem" class="btn btn-success mx-auto">Lưu thông tin</button>
                <a href="/QLDA_HSSV/admin/hocky/list_HK" class="btn btn-danger">Quay lại</a>
            </div>
        </form>
    </div>

</body>

</html>