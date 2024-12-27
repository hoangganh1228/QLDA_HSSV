<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách người dùng</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" integrity="sha384-tViUnnbYAV00FLIhhi3v/dWt3Jxw4gZQcNoSCxCIFNJVCx7/D55/wXsrNIRANwdD" crossorigin="anonymous">
    
</head>

<body>
    <div class="container-fluid mt-4">
        <div class="d-flex">
            <?php require_once __DIR__ . '/../layouts/sider.php' ;?>
            
            <div class="main-content flex-grow-1">
                 <?php require_once __DIR__ . '/../layouts/header.php' ;?>
                <a href="/QLDA_HSSV/admin/users/create" class="btn btn-outline-secondary" style="width: 100px;">Thêm</a>
                
                <div class="table-container">
                    <h3 class="text-center mb-4">Người dùng</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Quyền</th>
                                <th>Email</th>
                                <th>SĐT</th>
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
                                        <td><?php echo $row['username'] ?></td> 
                                        <td><?php echo $row['role'] ?></td> 
                                        <td><?php echo $row['email'] ?></td> 
                                        <td><?php echo $row['phone'] ?></td> 
                                        <td>
                                            <a href="/QLDA_HSSV/admin/users/edit/<?= $row['user_id'] ?>" class="btn btn-outline-secondary">Sửa</a>
                                            <a href="/QLDA_HSSV/admin/users/delete/<?= $row['user_id'] ?>" class="btn btn-outline-secondary" onclick="return confirm('Xác nhận xóa!')">Xóa</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                </table>
                </div>
            </div>
        </div>

        
      
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
