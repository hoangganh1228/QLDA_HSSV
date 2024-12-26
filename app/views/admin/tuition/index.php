<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách học phí</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" integrity="sha384-tViUnnbYAV00FLIhhi3v/dWt3Jxw4gZQcNoSCxCIFNJVCx7/D55/wXsrNIRANwdD" crossorigin="anonymous">
    
</head>

<body>
    <div class="container-fluid mt-4">
        <div class="d-flex">
            <?php require_once __DIR__ . '/../layouts/sider.php' ;?>
            <div class="main-content flex-grow-1">
                <?php require_once __DIR__ . '/../layouts/header.php' ;?>
                <a href="/QLDA_HSSV/admin/tuition/create" class="btn btn-outline-secondary" style="width: 100px;">Thêm</a>
                <div class="table-container">
                    <h3 class="text-center mb-4">Học phí</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Id</th>
                                <th>Số mã khoa</th>
                                <th>Học phí mỗi tín chỉ</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($table)) : ?>
                                <tr>
                                    <td colspan="5">
                                        <div class="alert alert-danger text-center">Không tìm thấy học phí</div>
                                    </td>
                                </tr>
                            <?php else : ?>
                                <?php $i = 0; foreach ($table as $row) : ?>
                                    <tr>
                                        <td><?php echo (++$i); ?></td>
                                        <td><?php echo $row['tuition_fee_id'] ?></td> 
                                        <td><?php echo $row['department_id'] ?></td> 
                                        <td><?php echo $row['fee_per_credit'] ?></td> 
                                        <td>
                                            <a href="/QLDA_HSSV/admin/tuition/edit/<?= $row['id'] ?>" class="btn btn-outline-secondary">Sửa</a>
                                            <a href="/QLDA_HSSV/admin/tuition/delete/<?= $row['id'] ?>" class="btn btn-outline-secondary" onclick="return confirm('Xác nhận xóa!')">Xóa</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!-- <form action="" method="get" class="row justify-content-center mt-3 mb-3">
            <div class="col-md-4 mb-2">
                <input name="search" type="text" class="form-control" placeholder="Tìm kiếm người dùng">
            </div>
            <div class="col-md-2 mb-2">
                <button class="btn btn-outline-secondary" type="submit">Tìm kiếm</button>
            </div>
        </form> -->
       
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
