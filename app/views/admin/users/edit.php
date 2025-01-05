<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa người dùng</title>
    <?php
        require_once 'configs/bootstrap.php';
    ?>
</head>

<body>
    <div class="container p-3 my-3">
        <div class="display-6 text-center">Sửa người dùng</div>
        <form action="" method="post">
            <!-- Thông tin chung -->
            <div class="form-group mt-3">
                <label for="fullname">Mã sinh viên:</label>
                <input type="text" name="student_id" value="<?= $user['student_id']; ?>" class="form-control" required>
            </div>
            <div class="form-group mt-3">
                <label for="fullname">Họ và tên:</label>
                <input type="text" name="fullname" value="<?= $user['fullname']; ?>" class="form-control" required>
            </div>
            <div class="form-group mt-3">
                <label for="username">Tên đăng nhập:</label>
                <input type="text" name="username" value="<?= $user['username']; ?>" class="form-control" required>
            </div>
            <div class="form-group mt-3">
                <label for="password">Mật khẩu:</label>
                <input type="password" name="password" value="<?= $user['password']; ?>" class="form-control" required>
            </div>
            <div class="form-group mt-3">
                <label for="email">Email:</label>
                <input type="email" name="email" value="<?= $user['email']; ?>" class="form-control" required>
            </div>
            <div class="form-group mt-3">
                <label for="phone">SĐT:</label>
                <input type="tel" name="phone" value="<?= $user['phone']; ?>" class="form-control" required>
            </div>
            <div class="form-group mt-3">
                <label for="address">Địa chỉ:</label>
                <input type="text" name="address" value="<?= $user['address']; ?>" class="form-control" required>
            </div>
            <div class="form-group mt-3">
                <label for="address">Ngày sinh:</label>
                <input type="date" name="date_of_birth" value="<?= $user['date_of_birth']; ?>" class="form-control" required>
            </div>
            <div class="form-group mt-3">
                <label for="sex">Giới tính:</label>
                <select name="sex" id="sex" class="form-control" required>
                    <option value="Nam" <?= $user['sex'] === 'Nam' ? 'selected' : ''; ?>>Nam</option>
                    <option value="Nữ" <?= $user['sex'] === 'Nữ' ? 'selected' : ''; ?>>Nữ</option>
                </select>
            </div>

            <div id="student-fields">
                <div class="form-group mt-3">
                    <label for="class_id">Lớp:</label>
                    <select name="class_id" id="class_id" class="form-control">
                        <option value="">Chọn lớp</option>
                        <?php foreach ($classes as $class): ?>
                            <option value="<?= $class['class_id']; ?>" 
                                <?= $class['class_id'] == ($user['class_id'] ?? '') ? 'selected' : ''; ?>>
                                <?= $class['class_id']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="khoa_hoc_id">Khóa học:</label>
                    <select name="khoa_hoc_id" id="khoa_hoc_id" class="form-control">
                        <option value="">Chọn khóa học</option>
                        <?php foreach ($khoahocs as $khoahoc): ?>
                            <option value="<?= $khoahoc['khoa_hoc_id']; ?>" 
                                <?= $khoahoc['khoa_hoc_id'] == ($user['khoa_hoc_id'] ?? '') ? 'selected' : ''; ?>>
                                <?= $khoahoc['start_year'] . ' - ' . $khoahoc['end_year']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>



            <!-- Nút Submit -->
            <button type="submit" class="btn btn-outline-secondary mt-3">Cập nhật</button>
        </form>
    </div>
    <!-- <script src="/QLDA_HSSV/app/public/js/script.js"></script> -->
</body>

</html>
