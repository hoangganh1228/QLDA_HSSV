<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký môn học</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" integrity="sha384-tViUnnbYAV00FLIhhi3v/dWt3Jxw4gZQcNoSCxCIFNJVCx7/D55/wXsrNIRANwdD" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
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
        .container {
            margin-top: 50px;
        }
        .table th, .table td {
            text-align: center;
        }
        .btn-register {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
        .btn-register:hover {
            background-color: #218838;
        }
        .btn-register:disabled {
            background-color: #6c757d;
            cursor: not-allowed;
        }
        .btn-registered {
            background-color: #6c757d;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    
<div class="container-fluid">
   <div class="row">
   <div class="col-md-3 col-lg-2 sidebar "> 
    <?php $this->view("student/layout/sidebar",[])?>
</div>
     <div class="col-md-9 col-lg-10 main-content">
        <?php $this->view("student/layout/topHead",[])?>
    <div class="container">
    <div class="row mb-3">
    <div class="col-md-4 offset-md-4">
        <select id="semester-filter" class="form-select">
            <option value="all">Tất cả các kỳ</option>
            <?php foreach ($semesters as $semester): ?>
                <option value="<?php echo $semester['name']; ?>">
                    <?php echo $semester['name']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
</div>

<h2 class="text-center mb-4">Danh sách các môn học</h2>
<div class="text-center mb-4">
    <button id="registerAllButton" class="btn btn-primary">Đăng ký tất cả</button>
</div>
<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>Môn Học</th>
            <th>Học Kỳ</th>
           
           
        </tr>
    </thead>
    <tbody>
    <?php foreach ($DangKyData as $index => $data): ?>
        <?php 
            $subject_name = "";
            $semester_name = "";

            // Tìm tên môn học
            foreach ($subjects as $subject) {
                if ($data['subject_id'] == $subject['subject_id']) {
                    $subject_name = $subject['subject_name'];
                    break;
                }
            }

            // Tìm tên học kỳ
            foreach ($semesters as $semester) {
                if ($data['semester_id'] == $semester['semester_id']) {
                    $semester_name = $semester['name'];
                    break;
                }
            }
        ?>
        <tr id="row-<?php echo $index; ?>" data-reg-id="<?php echo $data['reg_id']; ?>">
            <td><?php echo $subject_name; ?></td>
            <td class="semester"><?php echo $semester_name; ?></td>
        </tr>
    <?php endforeach; ?>
</tbody>


</table>



    </div>
     </div>
   </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>

let isRegisteredAll = false; 

document.getElementById('registerAllButton').addEventListener('click', function () {
    const rows = document.querySelectorAll('tbody tr'); // Chọn tất cả các hàng trong tbody
    const regIds = [];

    rows.forEach(row => {
        const regId = row.getAttribute('data-reg-id'); // Lấy reg_id từ thuộc tính data-reg-id
        if (regId) {
            regIds.push(regId);
        }
    });

    if (regIds.length > 0) {

        fetch('http://localhost/QLDA_HSSV/student/DangKyMonHoc/registerAll', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                regIds: regIds
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Đăng ký tất cả thành công!');
                const registerButton = document.getElementById('registerAllButton');
                registerButton.disabled = true;
                registerButton.innerText = 'Đã đăng ký';

                registerButton.style.display="none";
                

                isRegisteredAll = true; 

              
            } else {
                alert('Đăng ký thất bại: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Lỗi khi gửi yêu cầu:', error);
            alert('Đã xảy ra lỗi.');
        });
    } else {
        alert('Không có môn học nào để đăng ký.');
    }
});
window.addEventListener('beforeunload', function (e) {
    if (isRegisteredAll) {
        const confirmationMessage = "Bạn đã đăng ký tất cả môn học. Bạn có chắc muốn tải lại trang?";
        e.returnValue = confirmationMessage;  // Chrome, Firefox
        return confirmationMessage;  // Các trình duyệt khác
    }
});











    document.getElementById('semester-filter').addEventListener('change', function () {
        const selectedSemester = this.options[this.selectedIndex].text.trim(); // Lấy giá trị được chọn từ dropdown và loại bỏ khoảng trắng thừa
        // console.log(Selected Semester: ${selectedSemester});
        
        const rows = document.querySelectorAll('tbody tr'); // Chọn tất cả các hàng trong tbody
        console.log(rows)

                rows.forEach(row => {
                    const semesterCell = row.querySelector('.semester'); // Chọn cột có lớp 'semester'
        if (semesterCell) {
            const semester = semesterCell.textContent.trim(); // Lấy nội dung văn bản và loại bỏ khoảng trắng thừa
            // console.log(Semester: ${semester});
                    
                    // So sánh giá trị với điều kiện chuẩn hóa
                    if (selectedSemester === 'Tất cả các kỳ' || semester === selectedSemester) {
                        row.style.display = ''; // Hiển thị nếu khớp hoặc chọn "Tất cả các kỳ"
                    } else {
                        row.style.display = 'none'; // Ẩn nếu không khớp
                    }
                }
                });
    });












  





    </script>
</html>