<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa đăng ký môn học</title>
    <?php
        require_once 'configs/bootstrap.php';
       
    ?>
</head>


<body>
 
    <div class="container p-3 my-3">
        <div class="display-6 text-center">Sửa đăng ký môn học</div>
        <form action="" method="post">
            <div class="form-group mt-3">
                <label for="">Mã đăng ký:</label>
                <input type="text" name="reg_id" class="form-control" 
                       value="<?= $data['reg_id']; ?>" readonly>
            </div>
            <div class="form-group mt-3">
                <label for="">Mã ngành:</label>
                <select name="major_id" class="form-control" required>
                    <option value="">Chọn ngành</option>
                    <?php foreach ($majors as $major): ?>
                        <option value="<?= $major['major_name']; ?>"
                            <?= $data['major_id'] == $major['major_id'] ? 'selected' : ''; ?>>
                            <?= $major['major_name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group mt-3">
    <label for="">Mã môn học:</label>
    <select name="subject_id" class="form-control" required>
                    <option value="">Chọn môn học</option>
                    <?php foreach ($subjects as $subject): ?>
                        <option value="<?= $subject['subject_name']; ?>"
                            <?= $data['subject_id'] == $subject['subject_id'] ? 'selected' : ''; ?>>
                            <?= $subject['subject_name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
</div>

            <div class="form-group mt-3">
                <label for="">Học kỳ:</label>
                <select name="semester_id" class="form-control" required>
                    <option value="">Chọn học kỳ</option>
                    <?php foreach ($semesters as $semester): ?>
                        <option value="<?= $semester['name']; ?>"
                            <?= $data['semester_id'] == $semester['semester_id'] ? 'selected' : ''; ?>>
                            <?= $semester['name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="">Mã khóa học:</label>
                <select name="khoa_hoc_id" class="form-control" required>
                    <option value="">Chọn khóa học</option>
                    <?php foreach ($khoa_hoc as $khoa): ?>
                        <option value="<?= $khoa['start_year']; ?>"
                            <?= $data['khoa_hoc_id'] == $khoa['khoa_hoc_id'] ? 'selected' : ''; ?>>
                            <?= $khoa['start_year']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <br>
            <div>
                <button type="submit" id="btnSua" class="btn btn-outline-secondary">Sửa</button>
                <a href="/QLDA_HSSV/admin/DangKyMonHoc" class="btn btn-outline-secondary">Quay lại</a>
            </div>
        </form>
    </div>
</body>

</html>
