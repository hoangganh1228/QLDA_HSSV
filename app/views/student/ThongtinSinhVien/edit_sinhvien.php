<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Thông Tin Sinh Viên</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" integrity="sha384-tViUnnbYAV00FLIhhi3v/dWt3Jxw4gZQcNoSCxCIFNJVCx7/D55/wXsrNIRANwdD" crossorigin="anonymous">
</head>
<style>
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
            overflow-y: auto;
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

    .custom-icon {
        font-size: 30px;
        color: #495057;
        transition: transform 0.3s;
    }

    .custom-icon:hover {
        transform: scale(1.2);
    }

    input[readonly], input[readonly]:focus {
        background-color: #f8f9fa !important;
        border: 1px solid #ced4da;
        cursor: not-allowed;
    }
</style>
<body>
   
<div class="container-fluid">
   <div class="row">
   <div class="col-md-3 col-lg-2 sidebar "> 
    <?php $this->view("student/layout/sidebar",[])?>
</div>
     <div class="col-md-9 col-lg-10 main-content">
        <?php $this->view("student/layout/topHead",[])?>
        <div class="container">
            <h2 class="text-center mb-4">Sửa Thông Tin Sinh Viên</h2>
            <form method="POST" action="">
                <?php
                foreach ($sinhVienData as $SinhVien) {
                ?>
                  
                    <?php if ($SinhVien['username'] == $_SESSION['username']): ?>
                        
                    <!-- student_id -->
                    <div class="mb-3">
                        <label for="student_id" class="form-label">Mã Sinh Viên</label>
                        <input type="text" class="form-control" id="student_id" value="<?php echo $SinhVien['student_id']; ?>" readonly>
                    </div>
                  
                    <!-- fullname -->
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Họ và Tên</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $SinhVien['fullname']; ?>" required>
                    </div>
                    <!-- date_of_birth -->
                    <div class="mb-3">
                        <label for="date_of_birth" class="form-label">Ngày Sinh</label>
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="<?php echo $SinhVien['date_of_birth']; ?>" required>
                    </div>
                    <!-- sex -->
                    <div class="mb-3">
                        <label class="form-label">Giới Tính</label>
                        <div>
                            <input type="radio" id="male" name="sex" value="Nam" <?php echo ($SinhVien['sex'] == 'Nam' ? 'checked' : ''); ?> required>
                            <label for="male">Nam</label>
                            <input type="radio" id="female" name="sex" value="Nữ" <?php echo ($SinhVien['sex'] == 'Nữ' ? 'checked' : ''); ?> class="ms-3" required>
                            <label for="female">Nữ</label>
                        </div>
                    </div>
                    <!-- address -->
                    <div class="mb-3">
                        <label for="address" class="form-label">Địa Chỉ</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?php echo $SinhVien['address']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Địa Chỉ</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?php echo $SinhVien['email']; ?>" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
                        <a href="/student/ThongtinSinhVien" class="btn btn-secondary">Hủy</a>
                    </div>
                    <?php endif; ?>
              
                <?php
                            
                }
                ?>
            </form>
        </div>
    </div>
            </div>
            </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
