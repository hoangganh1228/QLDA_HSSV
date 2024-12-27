<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Danh sách khóa học</title>
</head>

<body>
    <div class="container-fluid">
        <div class="col-lg-10 w-100 p-4 overflow-hidden ml-0">
            <h3 class="mb-4">Danh sách khóa học</h3>
            <hr>
            <div class="container_css">
                <div class="">
                    <a href="/QLDA_HSSV/admin/khoahoc/add_KH" class="btn btn-success btn-sm">Thêm mới <i
                            class="fa-solid fa-plus"></i></a>
                </div>
                <div class="">
                    <!-- Form tìm kiếm -->
                    <form action="" id="tbForm" method="get" style="margin-top: 20px;">
                        <div class="row mb-3 align-items-center">
                            <div class="col-10">
                                <input name="search" type="text" class="form-control" placeholder="Nhập mã khóa học">
                            </div>
                            <div class="col-2 text-end">
                                <button class="btn btn-outline-secondary w-100" type="submit">Tìm kiếm</button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive-lg" style="height: 450px;">
                        <table class="table table-hover table-bordered border text-center">
                            <thead class="table-dark p-2" style="opacity:0.9">
                                <tr class="bg-dark text-light">
                                    <th>STT</th>
                                    <th>Mã khóa học</th>
                                    <th>Năm bắt đầu</th>
                                    <th>Năm kết thúc</th>
                                    <th style="width: 15%;">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (empty($table)) :
                                ?>
                                <tr>
                                    <td colspan="10">
                                        <div class="alert alert-danger text-center">
                                            Không tìm thấy thông tin khóa học
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                else :
                                    $i = 0;
                                    foreach ($table as $row) :
                                ?>
                                <tr>
                                    <td><?php echo (++$i); ?></td>
                                    <td><?php echo $row['khoa_hoc_id'] ?></td>
                                    <td><?php echo $row['start_year'] ?></td>
                                    <td><?php echo $row['end_year'] ?></td>



                                    <td>
                                        <a href="/QLDA_HSSV/admin/khoahoc/edit_KH/<?= $row['id'] ?>"
                                            class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i>Cập
                                            nhật</a>

                                        <a href="/QLDA_HSSV/admin/khoahoc/delete_KH/<?= $row['id'] ?>"
                                            class="btn btn-danger" onclick="return confirm('Xác nhận xóa!')"><i
                                                class="fa-solid fa-trash"></i>Xóa</a>

                                    </td>
                                </tr>
                                <?php
                                    endforeach;
                                endif;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>