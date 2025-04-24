<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách đăng ký môn học</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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
    <div class="container mt-4">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Danh sách đăng ký môn học</h2>
            <a href="/admin/DangKyMonHoc/add_dangky" class="btn btn-success">Thêm mới</a>
        </div>

        <!-- Search Form -->
        <form method="GET" action="" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Tìm kiếm thông tin đăng ký" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                <button class="btn btn-primary" type="submit">Tìm kiếm</button>
            </div>
        </form>

        <!-- Table List -->
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Mã Đăng Ký</th>
                    <th>Tên Ngành</th>
                    <th>Tên Môn Học</th>
                    <th>Tên Học Kỳ</th>
                    <th>Tên Khóa Học</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
    <?php if (!empty($table)) : ?>
        <?php foreach ($table as $row) : ?>
            <?php 
            $major_name = "";
            $subject_name = "";
            $semester_name = "";
            $khoa_hoc_name = "";

            // Tìm tên ngành
            foreach ($majors as $major) {
                if ($row['major_id'] == $major['major_id']) {
                    $major_name = $major['major_name'];
                    break;
                }
            }

            // Tìm tên môn học
            foreach ($subjects as $subject) {
                if ($row['subject_id'] == $subject['subject_id']) {
                    $subject_name = $subject['subject_name'];
                    break;
                }
            }

            // Tìm tên học kỳ
            foreach ($semesters as $semester) {
                if ($row['semester_id'] == $semester['semester_id']) {
                    $semester_name = $semester['name'];
                    break;
                }
            }

            // Tìm tên khóa học
            foreach ($khoa_hoc as $khoa_Hoc) {
                if ($row['khoa_hoc_id'] == $khoa_Hoc['khoa_hoc_id']) {
                    $khoa_hoc_name = $khoa_Hoc['start_year'] . '-' . $khoa_Hoc['end_year'];
                    break;
                }
            }
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['reg_id']; ?></td>
                <td><?php echo $major_name; ?></td> <!-- Tên Ngành -->
                <td><?php echo $subject_name; ?></td> <!-- Tên Môn Học -->
                <td><?php echo $semester_name; ?></td> <!-- Tên Học Kỳ -->
                <td><?php echo $khoa_hoc_name; ?></td> <!-- Tên Khóa Học -->
                <td>
<<<<<<< HEAD
                    <a href="/QLDA_HSSV/admin/DangKyMonHoc/edit_dangky/<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Sửa</a>
                    <a href="/QLDA_HSSV/admin/DangKyMonHoc/delete_dangky/<?php echo $row['id']?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa không?');">Xóa</a>
=======
                    <a href="/admin/DangKyMonHoc/edit_dangky/<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Sửa</a>
                    <a href="/admin/DangKyMonHoc/delete_dangky/<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa không?');">Xóa</a>
>>>>>>> 82c559a68c975ba92cd746b127e4aabde6ac1458
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else : ?>
        <tr>
            <td colspan="7" class="text-center">Không có dữ liệu nào!</td>
        </tr>
    <?php endif; ?>
</tbody>

        </table>
    </div>
                </div>
                </div>
                </div>


</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>
