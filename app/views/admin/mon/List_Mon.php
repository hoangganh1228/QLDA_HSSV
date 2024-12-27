<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách môn</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        .column {
            width: 25%;
            word-wrap: break-word;
        }
<<<<<<< HEAD
=======
<<<<<<< HEAD
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
=======
>>>>>>> 20d5b6113a184064ec286d9924a7136765448931
>>>>>>> d2a1f1f15bfcddb260b48e41c5b5b7b115614ed3
    </style>
</head>

<body>
<<<<<<< HEAD
=======
<<<<<<< HEAD
<div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-lg-2 sidebar">
                <?php $this->view("admin/layout/sidebar", []) ?>
            </div>
            <div class="col-md-9 col-lg-10 main-content">
                <?php $this->view("admin/layout/topHead", []) ?>
=======
>>>>>>> 20d5b6113a184064ec286d9924a7136765448931
>>>>>>> d2a1f1f15bfcddb260b48e41c5b5b7b115614ed3
    <div class="container">
        <div class="display-6 text-center">Danh sách môn</div>
        <form action="" method="get" class="row justify-content-center mt-3 mb-3">
            <div class="col-md-4 mb-2">
                <input name="search" type="text" class="form-control" placeholder="Tìm kiếm môn">
            </div>
            <div class="col-md-2 mb-2">
                <button class="btn btn-outline-secondary" type="submit">Tìm kiếm</button>
            </div>
        </form>
        <div>
            <a href="/QLDA_HSSV/admin/mon/add_mon" class="btn btn-outline-secondary" style="width: 100px;">Thêm</a>
        </div>
        <table class="table table-bordered table-hover mt-3">
            <thead class="thead-dark">
                <tr style="background:#efeded">
                    <th>STT</th>
                    <th>Mã môn</th>
                    <th>Tên môn</th>
                    <th>Số tín</th>
                    <th>Tên ngành</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($table)) : ?>
                    <tr>
                        <td colspan="6">
                            <div class="alert alert-danger text-center">Không tìm thấy môn</div>
                        </td>
                    </tr>
                <?php else : ?>
                    <?php $i = 0; foreach ($table as $row) : ?>
                        <tr>
                            <td><?php echo (++$i); ?></td>
                            <td><?php echo $row['subject_id'] ?></td> 
<<<<<<< HEAD
                            <td><?php echo $row['subject_name'] ?></td> 
=======
<<<<<<< HEAD
                            <td><?php echo $row['name'] ?></td> 
=======
                            <td><?php echo $row['subject_name'] ?></td> 
>>>>>>> 20d5b6113a184064ec286d9924a7136765448931
>>>>>>> d2a1f1f15bfcddb260b48e41c5b5b7b115614ed3
                            <td><?php echo $row['credits'] ?></td> 
                            <td><?php echo $row['major_name'] ?></td> 
                            <td>
                                <a href="/QLDA_HSSV/admin/mon/edit_mon/<?= $row['id'] ?>" class="btn btn-outline-secondary">Sửa</a>
                                <a href="/QLDA_HSSV/admin/mon/delete_mon/<?= $row['id'] ?>" class="btn btn-outline-secondary" onclick="return confirm('Xác nhận xóa!')">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
<<<<<<< HEAD
=======
<<<<<<< HEAD
                    </div>
                    </div>
                    </div>
=======
>>>>>>> 20d5b6113a184064ec286d9924a7136765448931
>>>>>>> d2a1f1f15bfcddb260b48e41c5b5b7b115614ed3
</body>

</html>
