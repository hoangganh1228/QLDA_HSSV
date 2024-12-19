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
                <label for="username">Tên đăng nhập:</label>
                <input type="text" name="username" value="<?= $user['username']; ?>" class="form-control" required>
            </div>
            <div class="form-group mt-3">
                <label for="role">Vai trò:</label>
                <select name="role" id="role" class="form-control" required>
                    <option value="Quản lý" <?= $user['role'] === 'Quản lý' ? 'selected' : ''; ?>>Quản lý</option>
                    <option value="Giảng viên" <?= $user['role'] === 'Giảng viên' ? 'selected' : ''; ?>>Giảng viên</option>
                    <option value="Sinh viên" <?= $user['role'] === 'Sinh viên' ? 'selected' : ''; ?>>Sinh viên</option>
                </select>
            </div>

            <!-- Trường cho Giảng viên -->
            <?php if ($user['role'] === 'Giảng viên'): ?>
                <div class="form-group mt-3">
                    <label for="department_id">Khoa:</label>
                    <select name="department_id" class="form-control">
                        <?php foreach ($departments as $dept): ?>
                            <option value="<?= $dept['department_id']; ?>" 
                                <?= $dept['department_id'] == $extraData['department_id'] ? 'selected' : ''; ?>>
                                <?= $dept['department_name']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            <?php endif; ?>

            <!-- Trường cho Sinh viên -->
            <?php if ($user['role'] === 'Sinh viên'): ?>
                <div class="form-group mt-3">
                    <label for="class_id">Lớp:</label>
                    <select name="class_id" class="form-control">
                        <?php foreach ($classes as $class): ?>
                            <option value="<?= $class['class_id']; ?>" 
                                <?= $class['class_id'] == $extraData['class_id'] ? 'selected' : ''; ?>>
                                <?= $class['class_id']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="khoa_hoc_id">Khóa học:</label>
                    <select name="khoa_hoc_id" class="form-control">
                        <?php foreach ($khoahocs as $khoahoc): ?>
                            <option value="<?= $khoahoc['khoa_hoc_id']; ?>" 
                                <?= $khoahoc['khoa_hoc_id'] == $extraData['khoa_hoc_id'] ? 'selected' : ''; ?>>
                                <?= $khoahoc['start_year'] . ' - ' . $khoahoc['end_year']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            <?php endif; ?>

            <!-- Nút Submit -->
            <button type="submit" class="btn btn-outline-secondary mt-3">Cập nhật</button>
        </form>
    </div>
</body>

</html>
