<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        integrity="sha384-tViUnnbYAV00FLIhhi3v/dWt3Jxw4gZQcNoSCxCIFNJVCx7/D55/wXsrNIRANwdD" crossorigin="anonymous">
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

        .dropdown .logo {
            border: none;
            background: none;
        }

        .search-bar .form-control {
            border-radius: 20px;
        }

        .table-container {
            margin-top: 30px;
            overflow-x: auto;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
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
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-lg-2 sidebar">
                <?php $this->view("student/layout/sidebar", ['user' => $user]) ?>
            </div>
            <div class="col-md-9 col-lg-10 main-content">
                <?php $this->view("student/layout/topHead", ['user' => $user]) ?>
                <!-- Dropdown chọn học kỳ -->
                <div class="dropdown mt-4">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="hocKyDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Chọn Học Kỳ
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="hocKyDropdown">
                        <?php foreach ($semester as $item): ?>
                        <li>
                            <a class="dropdown-item" href="?hoc_ky=<?php echo $item['id']; ?>">
                                <?php echo $item['name']; ?>
                            </a>
                        </li>
                        <?php endforeach; ?>
                        <li>
                            <a class="dropdown-item" href="?hoc_ky=all">Tất Cả</a>
                        </li>
                    </ul>
                </div>
                <!-- Điểm số table -->
                <div class="table-container">
                    <h3 class="text-center mb-4">Bảng Điểm Số</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Môn</th>
                                <th>Chuyên Cần</th>
                                <th>Giữa Kỳ</th>
                                <th>Cuối Kỳ</th>
                                <th>Tổng Kết</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; foreach ($ResultData as $DiemSo): ?>
                           
                            <?php foreach ($student as $student1): ?>
                            <?php foreach ($Registration as $registration): ?>
                            <?php if ($DiemSo['student_id'] == $student1['student_id'] && $student1['fullname'] == $_SESSION['username'] && $DiemSo['reg_id'] == $registration['reg_id'] && $registration['status']=="Đã đăng ký"): ?>
                            <tr>
                                <td><?php echo (++$i); ?></td>
                                <td><?php echo $registration['subject_id']; ?></td>
                                <td><?php echo $DiemSo['chuyen_can']; ?></td>
                                <td><?php echo $DiemSo['giua_ky']; ?></td>
                                <td><?php echo $DiemSo['cuoi_ky']; ?></td>
                                <td><?php echo $DiemSo['tong_ket']; ?></td>
                            </tr>
                            <?php endif; ?>
                           
                            <?php endforeach; ?>
                            <?php endforeach; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
