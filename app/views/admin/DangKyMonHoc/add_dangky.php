

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm đăng ký môn học</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>


    <div class="container mt-4">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Thêm Đăng Ký Môn Học</h2>
            <a href="/QLDA_HSSV/admin/DangKyMonHoc" class="btn btn-secondary">Quay lại</a>
        </div>

        <!-- Form Add -->
        <form method="POST" action=" ">
            <div class="mb-3">
                <label for="reg_id" class="form-label">Mã Đăng Ký</label>
                <input type="text" name="reg_id" class="form-control" id="reg_id" placeholder="Nhập mã đăng ký" required>
            </div>

            <!-- Mã Ngành -->
            <div class="mb-3">
                <label for="major_id" class="form-label">Mã Ngành</label>
                <select name="major_id" id="major_id" class="form-select" required>
                    <option value="" disabled selected>Chọn mã ngành</option>
                    <?php foreach ($majors as $major): ?>
                        <option value="<?php echo $major['major_id']; ?>">
                        <?= $major['major_name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Mã Môn Học -->
            <div class="mb-3">
                <label for="subject_id" class="form-label">Mã Môn Học</label>
                <select name="subject_id" id="subject_id" class="form-select" required>
                    <option value="" disabled selected>Chọn mã môn học</option>
                    <?php foreach ($subjects as $subject): ?>
                        <option value="<?php echo $subject['subject_id']; ?>">
                            <?php echo $subject['subject_name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Mã Học Kỳ -->
            <div class="mb-3">
                <label for="semester_id" class="form-label">Mã Học Kỳ</label>
                <select name="semester_id" id="semester_id" class="form-select" required>
                    <option value="" disabled selected>Chọn mã học kỳ</option>
                    <?php foreach ($semesters as $semester): ?>
                        <option value="<?php echo $semester['semester_id']; ?>">
                            <?php echo $semester['name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Mã Khóa Học -->
            <div class="mb-3">
                <label for="khoa_hoc_id" class="form-label">Mã Khóa Học</label>
                <select name="khoa_hoc_id" id="khoa_hoc_id" class="form-select" required>
                    <option value="" disabled selected>Chọn mã khóa học</option>
                    <?php foreach ($khoa_hoc as $khoa): ?>
                        <option value="<?php echo $khoa['khoa_hoc_id']; ?>">
                        <?php echo $khoa['start_year'] . '-' . $khoa['end_year']; ?>
                        </option>   
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Submit Button -->
            <div class="mb-3 text-end">
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
        </form>
    </div>
  


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
