<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <a href="/QLDA_HSSV/admin/users/logout">Đăng xuất</a>

    <div class="d-flex">
        <!-- Sidebar -->
        <div class="bg-light border-end" style="width: 250px; height: 100vh;">
            <h5 class="p-3">Chức năng</h5>
            <ul class="list-group list-group-flush">
                <!-- Chỉ hiển thị nếu là Quản lý -->
                <?php if ($role === 'Quản lý') : ?>
                    <li class="list-group-item"><a href="/QLDA_HSSV/admin/users">Quản lý người dùng</a></li>
                    <li class="list-group-item"><a href="/QLDA_HSSV/admin/manage_courses">Quản lý môn học</a></li>
                    <li class="list-group-item"><a href="/QLDA_HSSV/admin/manage_fees">Quản lý học phí</a></li>
                    <li class="list-group-item"><a href="/QLDA_HSSV/admin/manage_grades">Nhập điểm</a></li>
                    <li class="list-group-item"><a href="/QLDA_HSSV/admin/view_info">Quản lý thông tin cá nhân</a></li>
                    <li class="list-group-item"><a href="/QLDA_HSSV/admin/manage_fees">Quản lý học phí</a></li>
                    <li class="list-group-item"><a href="/QLDA_HSSV/admin/nganh">Quản lý ngành</a></li>

                <?php endif; ?>

                <!-- Chỉ hiển thị nếu là Giảng viên -->
                <?php if ($role === 'Giảng viên') : ?>
                    <li class="list-group-item"><a href="/QLDA_HSSV/admin/manage_grades">Nhập điểm</a></li>
                    <li class="list-group-item"><a href="/QLDA_HSSV/admin/view_info">Quản lý thông tin cá nhân</a></li>
                <?php endif; ?>

                <!-- Chỉ hiển thị nếu là Sinh viên -->
                <?php if ($role === 'Sinh viên') : ?>
                    <li class="list-group-item"><a href="/QLDA_HSSV/admin/register_courses">Đăng ký môn học</a></li>
                    <li class="list-group-item"><a href="/QLDA_HSSV/admin/view_grades">Xem điểm</a></li>
                    <li class="list-group-item"><a href="/QLDA_HSSV/admin/manage_fees">Quản lý học phí</a></li>
                <?php endif; ?>
            </ul>
        </div>

        <!-- Content -->
        <div class="p-4" style="flex-grow: 1;">
            <h2>Dashboard</h2>
            <p><?= $message ?></p>
        </div>

    </div>
</body>
</html>
