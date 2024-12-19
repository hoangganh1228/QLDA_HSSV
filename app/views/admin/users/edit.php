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
            <?php if (isset($extraData) && !empty($extraData)): ?>
                <div class="form-group mt-3">
                    <label for="address">Địa chỉ:</label>
                    <input type="text" name="address" value="<?= $extraData[0]['address'] ?? ''; ?>" class="form-control" required>
                </div>
            <?php endif; ?>
            <?php if (isset($extraData) && !empty($extraData)): ?>
                <div class="form-group mt-3">
                    <label for="fullname">Họ tên người dùng:</label>
                    <input type="text" name="fullname" value="<?= $extraData[0]['fullname']; ?>" class="form-control" required>
                </div>
            <?php endif; ?>
            <?php if (isset($extraData) && !empty($extraData)): ?>
                <div class="form-group mt-3">
                    <label for="dob">Ngày tháng năm sinh:</label>
                    <input type="date" name="date_of_birth" value="<?= $extraData[0]['date_of_birth']; ?>" class="form-control" required>
                </div>
            <?php endif; ?>


            <?php if (isset($extraData) && !empty($extraData)): ?>
                <div class="form-group mt-3">
                    <label for="sex">Giới tính:</label>
                    <select name="sex" id="sex" class="form-control" required>
                        <option value="">Chọn giới tính</option>
                        <option value="Nam" <?= ($extraData[0]['sex'] === 'Nam') ? 'selected' : ''; ?>>Nam</option>
                        <option value="Nữ" <?= ($extraData[0]['sex'] === 'Nữ') ? 'selected' : ''; ?>>Nữ</option>
                    </select>
                </div>
            <?php endif; ?>

                
            <div class="form-group mt-3">
                <label for="role">Vai trò:</label>
                <select name="role" id="role" class="form-control" required>
                    <option value="Quản lý" <?= $user['role'] === 'Quản lý' ? 'selected' : ''; ?>>Quản lý</option>
                    <option value="Giảng viên" <?= $user['role'] === 'Giảng viên' ? 'selected' : ''; ?>>Giảng viên</option>
                    <option value="Sinh viên" <?= $user['role'] === 'Sinh viên' ? 'selected' : ''; ?>>Sinh viên</option>
                </select>
            </div>

            <!-- Trường cho Giảng viên -->
            <div id="teacher-fields" style="display: none;">
                <div class="form-group mt-3">
                    <label for="department_id">Khoa:</label>
                    <select name="department_id" id="department_id" class="form-control">
                        <option value="">Chọn khoa</option>
                        <?php foreach ($departments as $dept): ?>
                            <option value="<?= $dept['department_id']; ?>" 
                                <?= $dept['department_id'] == ($extraData['department_id'] ?? '') ? 'selected' : ''; ?>>
                                <?= $dept['department_name']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <!-- Trường cho Sinh viên -->
            <div id="student-fields" style="display: none;">
                <div class="form-group mt-3">
                    <label for="class_id">Lớp:</label>
                    <select name="class_id" id="class_id" class="form-control">
                        <option value="">Chọn lớp</option>
                        <?php foreach ($classes as $class): ?>
                            <option value="<?= $class['class_id']; ?>" 
                                <?= $class['class_id'] == ($extraData['class_id'] ?? '') ? 'selected' : ''; ?>>
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
                                <?= $khoahoc['khoa_hoc_id'] == ($extraData['khoa_hoc_id'] ?? '') ? 'selected' : ''; ?>>
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
    <script src="/QLDA_HSSV/app/public/js/script.js"></script>
</body>

</html>
