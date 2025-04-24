<?php
if (!empty($_GET['status'])) {
    switch ($_GET['status']) {
        case 'success':
            echo "<script>alert('Import thành công');</script>";
            break;
        case 'error':
            echo "<script>alert('Import không thành công');</script>";
            break;
        case 'invalid_file':
            echo "<script>alert('File định dạng lỗi');</script>";
            break;
        default:
            echo "<script>alert('Lỗi không xác định!');</script>";
    }
    echo "<script>window.location.href = 'http://localhost/QLDA_HSSV/admin/diem';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" integrity="sha384-tViUnnbYAV00FLIhhi3v/dWt3Jxw4gZQcNoSCxCIFNJVCx7/D55/wXsrNIRANwdD" crossorigin="anonymous">

    <title>Quản lý điểm</title>

    <script>
        function formToggle(ID) {
            var element = document.getElementById(ID);
            if (element.style.display === "none") {
                element.style.display = "block";
            } else {
                element.style.display = "none";
            }
        }
    </script>
</head>
<style>
    .table input {
        width: 100%;
        /* Đặt chiều rộng của input chiếm 100% chiều rộng của cột */
        padding: 0px;
        /* Điều chỉnh padding nếu cần */
        text-align: center;
        /* Căn giữa nội dung trong input */
    }

    .table {
        table-layout: fixed;
        /* Cố định chiều rộng các cột */
        width: 100%;
        /* Bảng chiếm toàn bộ chiều rộng */
    }

    th,
    td {
        padding: 8px 12px;
        /* Điều chỉnh padding cho các ô */
        text-align: center;
        overflow: hidden;
        /* Ẩn phần thừa nếu nội dung quá dài */
        text-overflow: ellipsis;
        /* Hiển thị dấu ba chấm nếu văn bản bị tràn */
        white-space: nowrap;
        /* Ngừng ngắt dòng trong ô */
    }

    th {
        white-space: nowrap;
        /* Ngăn tiêu đề cột bị ngắt dòng */
    }


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

    .btn-search {
        background-color: blue;
    }

    .sidebar {
        background-color: #343a40;
        color: white;
        height: auto;
        padding: 20px 0;
        /* overflow-y: auto; */
        position: sticky;
        top: 0;
    }

    .sidebar h4 {
        text-align: center;

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
                        <h3 class="mb-4">Quản lý điểm</h3>
                        <hr>
                        <div class="container_css">
                            <!-- Form tìm kiếm -->
                            <form action="" id="tbForm" method="get" style="margin-top: 20px;">
                                <div class="row mb-3 align-items-center">
                                    <div class="col-md-2">
                                        <select class="form-select" name="mon" id="" onchange="document.getElementById('tbForm').submit()">
                                            <option value="">-- Chọn môn --</option>
                                            <?php
                                            foreach ($mons as $val):
                                            ?>
                                                <option value="<?= $val["subject_id"] ?>" <?= ($val["subject_id"] == $mon) ? 'selected' : '' ?>><?= $val["subject_name"] ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <select class="form-select" name="khoa" id="" onchange="document.getElementById('tbForm').submit()">
                                            <option value="">-- Chọn khóa --</option>
                                            <?php
                                            foreach ($khoas as $val):
                                            ?>
                                                <option value="<?= $val["khoa_hoc_id"] ?>" <?= ($val["khoa_hoc_id"] == $khoa) ? 'selected' : '' ?>><?= $val["khoa_hoc_id"] ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <select class="form-select" name="nganh" id="" onchange="document.getElementById('tbForm').submit()">
                                            <option value="">-- Chọn ngành --</option>
                                            <?php
                                            foreach ($nganhs as $val):
                                            ?>
                                                <option value="<?= $val["major_id"] ?>" <?= ($val["major_id"] == $nganh) ? 'selected' : '' ?>><?= $val["major_name"] ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <select class="form-select" name="lop" id="" onchange="document.getElementById('tbForm').submit()">
                                            <option value="">-- Chọn lớp --</option>
                                            <?php
                                            foreach ($sv as $val):
                                            ?>
                                                <option value="<?= $val["class_id"] ?>" <?= ($val["class_id"] == $lop) ? 'selected' : '' ?>><?= $val["class_id"] ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4 head">
                                        <div class="float-end">
                                            <a href="javascript:void(0);" class="btn btn-success" onclick="formToggle('importForm')" style="visibility: <?= !empty($mon) ? 'visible' : 'hidden'; ?>"><i class="plus"></i>Import</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="col-md-4" id="importForm" style="display: none;">
                                <form class="row g-3" action="../admin/diem/Import?mon=<?= $mon ?>&khoa=<?= $khoa ?>&nganh=<?= $nganh ?>&lop=<?= $lop ?>" method="post" enctype="multipart/form-data">
                                    <div class="col-auto">
                                        <label for="fileInput" class="visually-hidden">File</label>
                                        <input type="file" name="file" id="fileInput" class="form-control">
                                    </div>
                                    <div class="col-auto">
                                        <input type="submit" class="btn btn-primary mb-3" name="importSubmit" value="Import">
                                    </div>
                                </form>
                            </div>
                            <form action="diem/edit?mon=<?= $mon ?>&khoa=<?= $khoa ?>&nganh=<?= $nganh ?>&lop=<?= $lop ?>" method="post">
                                <div class="table-responsive-lg" style="height: 450px;">
                                    <table class="table table-hover table-bordered border text-center">
                                        <thead class="table-dark p-2" style="opacity:0.9">
                                            <tr class="bg-dark text-light">
                                                <th>STT</th>
                                                <th style="width: 10%">Mã sinh viên</th>
                                                <th>Tên sinh viên</th>
                                                <th style="width: 10%">Lớp</th>
                                                <th style="width: 10%">Kỳ</th>
                                                <th style="width: 10%">Chuyên cần</th>
                                                <th style="width: 10%">Giữa kì</th>
                                                <th style="width: 10%">Cuối kỳ</th>
                                                <th style="width: 10%">Tổng kết</th>
                                                <th style="width: 15%;">Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (empty($sv)) :
                                            ?>
                                                <tr>
                                                    <td colspan="10">
                                                        <div class="alert alert-danger text-center">
                                                            Không tìm thấy thông tin sinh viên
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                            else :
                                                $i = 0;
                                                foreach ($sv as $row) :
                                                ?>
                                                    <tr>
                                                        <td><?php echo (++$i); ?></td>
                                                        <td><?php echo $row['student_id'] ?></td>
                                                        <td><?php echo $row['fullname'] ?></td>
                                                        <td><?php echo $row['class_id'] ?></td>
                                                        <td><?php echo $row['semester_id'] ?></td>
                                                        <td><input name="chuyen_can[<?= $row['grade_id'] ?>]" type="number" step="0.1" value="<?php echo $row['chuyen_can'] ?>"></td>
                                                        <td><input name="giua_ky[<?= $row['grade_id'] ?>]" type="number" step="0.1" value="<?php echo $row['giua_ky'] ?>"></td>
                                                        <td><input name="cuoi_ky[<?= $row['grade_id'] ?>]" type="number" step="0.1" value="<?php echo $row['cuoi_ky'] ?>"></td>
                                                        <td><?php echo round(($row['chuyen_can'] * 10 + $row['giua_ky'] * 30 + $row['cuoi_ky'] * 60) / 100, 1) ?></td>
                                                        <td>
                                                            <button name="grade" value="<?= $row['grade_id'] ?>" type="submit" class="btn btn-warning btn-sm">
                                                                Cập nhật
                                                            </button>
                                                        </td>
                                                    </tr>
                                            <?php
                                                endforeach;
                                            endif;
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
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