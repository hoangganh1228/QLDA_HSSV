<?php

<<<<<<< HEAD
// function checkPermission(array $allowedRoles) {
//   if (session_status() === PHP_SESSION_NONE) {
//     session_start();
//   }
//   // echo '<pre>';   
//   // print_r($_SESSION);
//   // echo '</pre>';
//   // Kiểm tra nếu người dùng chưa đăng nhập
//   if (!isset($_SESSION['role'])) {
//       header('Location: /QLDA_HSSV/admin/users/login'); // Chuyển hướng đến trang đăng nhập
//       exit();
//   }
=======
function checkPermission(array $allowedRoles) {
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  // echo '<pre>';   
  // print_r($_SESSION);
  // echo '</pre>';
  // Kiểm tra nếu người dùng chưa đăng nhập
  if (!isset($_SESSION['role'])) {
      header('Location: /admin/users/login'); // Chuyển hướng đến trang đăng nhập
      exit();
  }
>>>>>>> 82c559a68c975ba92cd746b127e4aabde6ac1458

//   // Nếu là Quản lý, tự động có quyền truy cập mọi chức năng
//   // if ($_SESSION['role'] === 'Quản lý') {
//   //     return;
//   // }

<<<<<<< HEAD
//   // Kiểm tra nếu vai trò người dùng không nằm trong danh sách cho phép
//   if (!in_array($_SESSION['role'], $allowedRoles)) {
//       header('Location: /QLDA_HSSV/errors/404'); // Chuyển hướng đến trang "Không có quyền"
//       exit();
//   }
// }
=======
  // Kiểm tra nếu vai trò người dùng không nằm trong danh sách cho phép
  if (!in_array($_SESSION['role'], $allowedRoles)) {
      header('Location: /errors/404'); // Chuyển hướng đến trang "Không có quyền"
      exit();
  }
}
>>>>>>> 82c559a68c975ba92cd746b127e4aabde6ac1458
