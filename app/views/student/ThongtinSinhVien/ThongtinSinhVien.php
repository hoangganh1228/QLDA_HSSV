<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
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
      
</style>
</head>

<body>
    

    <div class="container-fluid">
   <div class="row">
   <div class="col-md-3 col-lg-2 sidebar "> 
    <?php $this->view("student/layout/sidebar",['user'=>$user])?>
</div>
     <div class="col-md-9 col-lg-10 main-content">
        <?php $this->view("student/layout/topHead",['user'=>$user])?>
        <div class="">
                    <h2 class="text-center mb-4">Thông Tin Sinh Viên</h2>
                    <form>
                    <?php
                foreach ($sinhVienData as $SinhVien) {
                ?>
                   <?php foreach($user as $user1): ?>
                    <?php if ($SinhVien['user_id'] == $user1['user_id']): ?>
                        <div class="mb-3">
                            <label for="student_id" class="form-label">Mã Sinh Viên</label>
                            <input type="number" class="form-control" id="student_id" value="0" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="fullname" class="form-label">Họ và Tên</label>
                            <input type="text" class="form-control" id="fullname" value="<?php echo $SinhVien['fullname']?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="date_of_birth" class="form-label">Ngày Sinh</label>
                            <input type="date" class="form-control" id="date_of_birth" value="<?php echo $SinhVien['date_of_birth']?>" readonly>
                        </div>
                        <div class="mb-3">
                        <label class="form-label">Giới Tính</label>
                        <div>
                            <input type="radio" id="male" name="sex" value="Nam" <?php echo ($SinhVien['sex'] == 'Nam' ? 'checked' : ''); ?> disabled>
                            <label for="male">Nam</label>
                            <input type="radio" id="female" name="sex" value="Nữ" <?php echo ($SinhVien['sex'] == 'Nữ' ? 'checked' : ''); ?> class="ms-3" disabled>
                            <label for="female">Nữ</label>
                        </div>
                    </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Địa Chỉ</label>
                            <input type="text" class="form-control" id="address" value="<?php echo $SinhVien['address']?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="class_id" class="form-label">Mã Lớp</label>
                            <input type="text" class="form-control" id="class_id" value="<?php echo $SinhVien['class_id']?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="khoa_hoc_id" class="form-label">Mã Khóa Học</label>
                            <input type="text" class="form-control" id="khoa_hoc_id" value="<?php echo $SinhVien['khoa_hoc_id']?>" readonly>
                        </div>

                        <button type="button" class="btn btn-warning" onclick="window.location.href='/QLDA_HSSV/student/ThongtinSinhVien/edit_sinhvien/<?php echo $user1['user_id']; ?>'">Sửa</button>


                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php
                            
                }
                ?>
                    </form>
                 
                </div>
               
    </div>

    </div>
    </div>
   
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</html>
