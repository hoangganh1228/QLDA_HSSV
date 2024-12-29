<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" integrity="sha384-tViUnnbYAV00FLIhhi3v/dWt3Jxw4gZQcNoSCxCIFNJVCx7/D55/wXsrNIRANwdD" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>
   
    <div class="container-fluid mt-4">
        <div class="d-flex">
            <!-- Sidebar -->
            <?php require_once __DIR__ . '/../layouts/sider.php' ;?>

            <!-- Main Content -->
            <div class=" main-content flex-grow-1">
                <!-- Header -->
                <?php $this->view("student/layout/topHead",['user'=>$user])?>
                <!-- Dropdown chọn học kỳ -->
                <div class="dropdown mt-4 ">
                    <button class=" btn btn-secondary dropdown-toggle btn-dropdown" type="button" id="hocKyDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Chọn Học Kỳ
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="hocKyDropdown">
                        <?php foreach ($semesters as $item): ?>
                            <li><a class="dropdown-item" href="?hoc_ky=<?php echo $item['semester_id']; ?>"><?php echo $item['name']; ?></a></li>
                        <?php endforeach; ?>
                        <li><a class="dropdown-item" href="?hoc_ky=all">Tất Cả</a></li>
                    </ul>
                </div>

                <!-- Điểm số table -->
                <div class="table-container">
                    <h3 class="text-center mb-4">Học phí</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Học kỳ</th>
                                <th>Tiền</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($tuitionDetails)): ?>
                                <?php foreach ($tuitionDetails as $index => $detail): ?>
                                    <tr>
                                        <td><?php echo $index + 1; ?></td>
                                        <td><?php echo $detail['semester_name']; ?></td>
                                        <td><?php echo number_format($detail['total']); ?> VND</td>
                                        <td>
                                            <?php echo ($detail['total'] == $detail['paid']) ? 'Đã thanh toán' : 'Chưa thanh toán'; ?>
                                        </td>
                                        
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5">Không có dữ liệu học phí.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="summary-container">
                    <?php
                        $totalAmount = array_sum(array_column($tuitionDetails, 'total'));
                        $totalPaid = array_sum(array_column($tuitionDetails, 'paid'));
                        $remainingAmount = $totalAmount - $totalPaid;
                    ?>
                    <h5>Tổng tiền: <?php echo number_format($totalAmount); ?> VND</h5>
                    <h5>Tiền còn thiếu: <?php echo number_format($remainingAmount); ?> VND</h5>

                    <?php if ($remainingAmount > 0): ?>
                        <button 
                            class="btn btn-success mt-3" 
                            data-bs-toggle="modal" 
                            data-bs-target="#paymentModal" 
                            onclick="openPaymentModal('all', <?php echo $remainingAmount; ?>)"
                        >
                            Thanh toán số tiền còn thiếu
                        </button>
                    <?php else: ?>
                        <h6 class="text-success mt-3">Tất cả đã được thanh toán.</h6>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

<!-- Dialog -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentModalLabel">Thông tin thanh toán</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Thông tin sinh viên -->
                <form id="paymentForm" method="POST" action="/QLDA_HSSV/student/tuition/payTuition">
                    <!-- Thông tin sinh viên -->
                    <div class="mb-3">
                        <label for="studentName" class="form-label"><strong>Họ tên:</strong></label>
                        <input type="text" class="form-control" id="studentName" name="student_name" value="<?php echo $infoUser['fullname']; ?>" readonly>

                        <label for="studentId" class="form-label"><strong>Mã sinh viên:</strong></label>
                        <input type="text" class="form-control" id="studentId" name="student_id" value="<?php echo $infoUser['student_id']; ?>" readonly>

                        <label for="studentDob" class="form-label"><strong>Ngày sinh:</strong></label>
                        <input type="text" class="form-control" id="studentDob" name="student_dob" value="<?php echo $infoUser['date_of_birth']; ?>" readonly> 

                        <label for="studentMajor" class="form-label"><strong>Ngành:</strong></label>
                        <input type="text" class="form-control" id="studentMajor" name="student_major" value="<?php echo $infoUser['major_name']; ?>" readonly>

                        <label for="studentCourse" class="form-label"><strong>Khóa:</strong></label>
                        <input type="text" class="form-control" id="studentCourse" name="student_course" 
                            value="<?php echo $infoUser['start_year'] . ' - ' . $infoUser['end_year']; ?>" readonly>

                            <div class="alert alert-warning text-center p-3" style="font-size: 1.5rem; font-weight: bold; color: #ff5722; background-color: #fff3cd; border: 2px solid #ffc107; border-radius: 8px; margin-top: 12px;">
                                Tiền còn thiếu: <?php echo number_format($remainingAmount); ?> VND
                            </div>
                    </div>

                    <!-- Form nhập số tiền thanh toán -->
                    <div class="mb-3">
                        <label for="paymentAmount" class="form-label">Số tiền thanh toán</label>
                        <input type="number" class="form-control" id="paymentAmount" name="payment_amount" value="<?php echo $remainingAmount; ?>" readonly required>
                    </div>

                    <input type="hidden" id="paymentSemesterId" name="semester_id" value="">
                    <button type="submit" class="btn btn-primary">Nộp tiền</button>
                </form>
            </div>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<style>
   

    a {
        text-decoration: none;
    }
  .main-content{
    margin-left: 280px;
  }
  .btn-dropdown{
    background-color:#5c636a;
    
  }

    .btn-logo {
        border: none;
       background-color: #fff;
    }
</style>
