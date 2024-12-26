<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" integrity="sha384-tViUnnbYAV00FLIhhi3v/dWt3Jxw4gZQcNoSCxCIFNJVCx7/D55/wXsrNIRANwdD" crossorigin="anonymous">

</head>
<body>
    <a href="/QLDA_HSSV/admin/users/logout">Đăng xuất</a>

    <div class="d-flex">
        <!-- Sidebar -->
        <?php require_once __DIR__ . '/../layouts/sider.php' ;?>
        
        <div class="main-content flex-grow-1">
            <?php require_once __DIR__ . '/../layouts/header.php' ;?>

            <div class="p-4" style="flex-grow: 1;">
                <h2>Dashboard</h2>
                <p><?= $message ?></p>
            </div>
        </div>
        
        <!-- Content -->

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
