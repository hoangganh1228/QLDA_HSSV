<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" integrity="sha384-tViUnnbYAV00FLIhhi3v/dWt3Jxw4gZQcNoSCxCIFNJVCx7/D55/wXsrNIRANwdD" crossorigin="anonymous">
</head>
<style>
  a{
    text-decoration: none;
    cursor:pointer;
  }
    *{
        margin: 0;
        padding: 0;
        box-sizing:border-box
    }
    
    .custom-icon {
        font-size: 30px;  /* Tăng kích thước lên 48px */
    }
    .sidebar {
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      width: 250px;
      background-color: #343a40;
      padding-top: 20px;
    }
    .sidebar h4{
        color:white;
        padding: 15px 20px;
    }
    .sidebar li a {
      color: white;
      padding: 15px 20px;
    
      display: block;
      font-size: 18px;
    }
    .sidebar li a:hover {
      background-color: #575d63;
    }
    

    .custom-icon {
      font-size: 30px;
      color: #495057;
      transition: transform 0.3s;
    }

    .custom-icon:hover {
      transform: scale(1.2);
    }
    .main-content{
        margin-left:400px;
    }
    
</style>
<body >
    
    
                   

<div class="container-fluid mt-4">
    <div class="d-flex ">
      <!-- Sidebar -->
      <div class="sidebar">
        <h4><a href="student">Hệ thống</a></h4>
        <ul class="list-unstyled">
          <li><a href="student/Trang_chu">Trang Chủ</a></li>
          <li><a href="student/ThongtinSinhVien">Thông tin sinh viên</a></li>

          <li><a href="student/DiemSo">Góc Học Tập</a></li>
          <li><a href="student/DangKyMonHoc">Đăng Ký Học</a></li>
          <li><a href="#">Thời Khóa Biểu</a></li>
          <li><a href="#">Tài Chính</a></li>
        </ul>
      </div>

      <!-- Main Content -->
      <div class="main-content flex-grow-1 ">
        <div class="d-flex align-items-center justify-content-between">
          <!-- Search Bar -->
          <div class="col-md-6 search-bar">
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-search"></i></span>
              <input type="text" class="form-control" placeholder="Tìm kiếm...">
            </div>
          </div>

          <!-- User Profile -->
          <div class="d-flex align-items-center justify-content-center gap-3">
            <div>
              <i class="bi bi-person-circle custom-icon"></i>
            </div>
            <p class="mb-0"> </p>
          </div>
        </div>

      
   
    

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</html>