<div class="d-flex align-items-center justify-content-between mb-4">
    <form action="" method="get" class="row justify-content-center mt-3 mb-3">
    <div class="col-md-4 mb-2">
        <input name="search" type="text" class="form-control" placeholder="Tìm kiếm ">
    </div>
    <div class="col-md-2 mb-2">
        <button class="btn btn-outline-secondary" type="submit">Tìm kiếm</button>
    </div>
</form>

  <!-- User Profile -->
  <div class="dropdown ms-auto">
      <button class="dropdown-toggle d-flex flex-nowrap align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          <div class="d-flex align-items-center justify-content-center gap-3">
              <div><i class="bi bi-person-circle custom-icon"></i>
              
            </div>
          </div>
      </button>
      <ul class="dropdown-menu">
          <li><button class="dropdown-item" type="button">Thay đổi mật khẩu</button></li>
          <li><a href="/admin/Users/logout" class="dropdown-item" >Đăng xuất</a></li>

      </ul>
  </div>
</div>

<style>
        body {
            font-family: Arial, sans-serif;
        }
        button {
            border: none;
            background: none;
        }
        a {
            text-decoration: none;
            cursor: pointer;
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .custom-icon {
            font-size: 30px;
            transition: transform 0.3s;
        }
        .custom-icon:hover {
            transform: scale(1.2);
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
        .sidebar h4 {
            color: white;
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
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        .table-container {
            margin-top: 30px;
            overflow-x: auto;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            padding: 12px;
            text-align: center;
            border: 1px solid #dee2e6;
        }
        .table th {
            background-color: #343a40;
            color: white;
        }
        .table td {
            background-color: #f8f9fa;
        }
        .table td a {
            text-decoration: none;
            color: #007bff;
        }
        .table td a:hover {
            text-decoration: underline;
        }
</style>