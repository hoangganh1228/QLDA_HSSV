<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách khoa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        .column {
            width: 25%;
            word-wrap: break-word;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="display-6 text-center">Danh sách ngành</div>
        <form action="" method="get" class="row justify-content-center mt-3 mb-3">
            <div class="col-md-4 mb-2">
                <input name="search" type="text" class="form-control" placeholder="Tìm kiếm ngành">
            </div>
            <div class="col-md-2 mb-2">
                <button class="btn btn-outline-secondary" type="submit">Tìm kiếm</button>
            </div>
        </form>
        <div>
            <a href="/QLDA_HSSV/admin/nganh/add_nganh" class="btn btn-outline-secondary" style="width: 100px;">Thêm</a>
        </div>
        <table class="table table-bordered table-hover mt-3">
            <thead class="thead-dark">
                <tr style="background:#efeded">
                    <th>STT</th>
                    <th>Mã ngành</th>
                    <th>Tên ngành</th>
                    <th>Tên khoa</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($table)) : ?>
                    <tr>
                        <td colspan="5">
                            <div class="alert alert-danger text-center">Không tìm thấy ngành</div>
                        </td>
                    </tr>
                <?php else : ?>
                    <?php $i = 0; foreach ($table as $row) : ?>
                        <tr>
                            <td><?php echo (++$i); ?></td>
                            <td><?php echo $row['major_id'] ?></td> 
                            <td><?php echo $row['major_name'] ?></td> 
                            <td><?php echo $row['department_name'] ?></td> 
                            <td>
                                <a href="/QLDA_HSSV/admin/nganh/edit_nganh/<?= $row['id'] ?>" class="btn btn-outline-secondary">Sửa</a>
                                <a href="/QLDA_HSSV/admin/nganh/delete_nganh/<?= $row['id'] ?>" class="btn btn-outline-secondary" onclick="return confirm('Xác nhận xóa!')">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
