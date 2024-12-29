<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách học phí</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" integrity="sha384-tViUnnbYAV00FLIhhi3v/dWt3Jxw4gZQcNoSCxCIFNJVCx7/D55/wXsrNIRANwdD" crossorigin="anonymous">
    
</head>
<style>
        .column {
            width: 25%;
            word-wrap: break-word;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
        }

        a {
            text-decoration: none;
        }

        .sidebar {
            background-color: #343a40;
            color: white;
            height: auto;
            padding: 20px 0;
            /* overflow-y: auto; */
            position: sticky;
            top:0;
        }
        .sidebar h4{
          text-align:center;
          
        }

        .sidebar h4 a {
            color: blue;
            text-decoration: none;
            margin-bottom: 15px;
            display: block;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin-top: 20px;
        }

        .sidebar ul li {
            margin-bottom: 15px;
        }

        .sidebar ul li a {
            color: white;
            padding: 10px 15px;
            display: block;
            border-radius: 5px;
            
        }

        .sidebar ul li a:hover {
            background-color: #6c757d;
        }

        .main-content {
            padding: 20px;
            background-color: #f8f9fa;
            min-height: 100vh;
        }

        .main-content h2 {
            margin-bottom: 20px;
        }

        .search-bar .form-control {
            border-radius: 20px;
        }

        .dropdown button {
            border: none;
            background: none;
        }



    </style>
<body>
<div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-lg-2 sidebar">
                <?php $this->view("admin/layout/sidebar", []) ?>
            </div>
            <div class="col-md-9 col-lg-10 main-content">
                <?php $this->view("admin/layout/topHead", []) ?>

    <div class="container">
                <a href="/QLDA_HSSV/admin/tuition/create" class="btn btn-success" style="width: 100px;">Thêm</a>
                <div class="table-container">
                    <h3 class="text-center mb-4">Học phí</h3>
                    <table class="table table-bordered table-striped mt-4">
                        <thead class="table-dark">
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
                                            <a href="/QLDA_HSSV/admin/tuition/edit/<?= $row['id'] ?>" class="btn btn-warning btn-sm">Sửa</a>
                                            <a href="/QLDA_HSSV/admin/tuition/delete/<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Xác nhận xóa!')">Xóa</a>
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
</div>
   

</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>
