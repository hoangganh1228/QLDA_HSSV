<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý điểmđiểm</title>
    <?php
    require 'configs/bootstrap.php';
    ?>
</head>

<body>
    <div class="container">
        <h2 class="text-center text-uppercase">Cập nhật điểm</h2>
        <hr>
        <form action="" method="post">
            <div class="row">
                <div class="form-group mt-3">

                    <label for="semester_id">Mã học kỳ:</label>
                    <input type="text" name='semester_id' id="semester_id" class="form-control"
                        placeholder="Nhập mã học kỳ" value="<?php echo $data['semester_id'] ?>" disabled>
                </div>
                <div class="form-group mt-3">
                    <label for="name">Tên học kỳ:</label>
                    <input type="text" name='name' id="name" class="form-control" placeholder="Tên học kỳ"
                        value="<?php echo $data['name'] ?>">
                </div>
                <div class="form-group mt-3">
                    <label for="start">Năm bắt đầu:</label>
                    <input type="text" name='start' id="start" class="form-control" placeholder="Năm bắt đầu"
                        value="<?php echo $data['start'] ?>">
                </div>

                <div class="form-group mt-3">
                    <label for="end">Năm kết thúc:</label>
                    <input type="text" name='end' id="end" class="form-control" placeholder="Năm kết thúc"
                        value="<?php echo $data['end'] ?>">
                </div>


            </div>
            <div class="mt-4  align-items-center">
                <button type="submit" id="btnThem" class="btn btn-success mx-auto">Lưu thông tin</button>
                <a href="/admin/hocky/list_HK" class="btn btn-danger">Quay lại</a>
            </div>
        </form>
    </div>

</body>

</html>