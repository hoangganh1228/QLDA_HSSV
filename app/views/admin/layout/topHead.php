<div class="d-flex justify-content-between align-items-center mb-4">
    

    <!-- User Profile -->
    <div class="dropdown ms-auto">
        <button class="dropdown-toggle d-flex align-items-center logo" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-circle" style="font-size: 30px;"></i>
            <span class="ms-2">
                <?php 
              echo $_SESSION['username']
                ?>
            </span>
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/admin/Users/resetPassword">Thay đổi mật khẩu</a></li>
            <li><a class="dropdown-item" href="/admin/Users/logout">Đăng xuất</a></li>
        </ul>
    </div>
</div>
