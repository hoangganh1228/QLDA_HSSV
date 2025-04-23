<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" integrity="sha384-tViUnnbYAV00FLIhhi3v/dWt3Jxw4gZQcNoSCxCIFNJVCx7/D55/wXsrNIRANwdD" crossorigin="anonymous">

    <title>Danh sách khóa học</title>
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
  .btn-search{
    background-color: blue;
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
    <div class="container-fluid">
        <div class="col-lg-10 w-100 p-4 overflow-hidden ml-0">
            <h3 class="mb-4">Danh sách khóa học</h3>
            <hr>
            <div class="container_css">
                <div class="">
                    <a href="/admin/Khoahoc/add_KH" class="btn btn-success btn-sm">Thêm mới <i
                            class="fa-solid fa-plus"></i></a>
                </div>
                <div class="">
                    <!-- Form tìm kiếm -->
                    <form action="" id="tbForm" method="get" style="margin-top: 20px;">
                        <div class="row mb-3 align-items-center">
                            <div class="col-10">
                                <input name="search" type="text" class="form-control" placeholder="Nhập mã khóa học">
                            </div>
                            <div class="col-2 text-end">
                                <button class="btn btn-outline-secondary w-100 btn-search" type="submit">Tìm kiếm</button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive-lg" style="height: 450px;">
                        <table class="table table-hover table-bordered border text-center">
                            <thead class="table-dark p-2" style="opacity:0.9">
                                <tr class="bg-dark text-light">
                                    <th>STT</th>
                                    <th>Mã khóa học</th>
                                    <th>Năm bắt đầu</th>
                                    <th>Năm kết thúc</th>
                                    <th >Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (empty($table)) :
                                ?>
                                <tr>
                                    <td colspan="10">
                                        <div class="alert alert-danger text-center">
                                            Không tìm thấy thông tin khóa học
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                else :
                                    $i = 0;
                                    foreach ($table as $row) :
                                ?>
                                <tr>
                                    <td><?php echo (++$i); ?></td>
                                    <td><?php echo $row['khoa_hoc_id'] ?></td>
                                    <td><?php echo $row['start_year'] ?></td>
                                    <td><?php echo $row['end_year'] ?></td>



                                    <td>
                                        <a href="/admin/Khoahoc/edit_KH/<?= $row['id'] ?>"
                                            class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i>Cập
                                            nhật</a>

                                        <a href="/admin/Khoahoc/delete_KH/<?= $row['id'] ?>"
                                            class="btn btn-danger" onclick="return confirm('Xác nhận xóa!')"><i
                                                class="fa-solid fa-trash"></i>Xóa</a>

                                    </td>
                                </tr>
                                <?php
                                    endforeach;
                                endif;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
            </div>
                            </div>
                            </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>