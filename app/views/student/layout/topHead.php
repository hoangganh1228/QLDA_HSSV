<div class="d-flex justify-content-between align-items-center mb-4">
    <!-- User Profile -->
    <div class="dropdown ms-auto">
        <button class="dropdown-toggle d-flex align-items-center logo btn-logo" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-circle" style="font-size: 30px;"></i>
            <span class="ms-2">
                <?php 
                foreach ($user as $user1): 
                    if ($user1['username'] === $_SESSION['username']): 
                        echo $user1['username'];
                    endif; 
                endforeach; 
                ?>
            </span>
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/QLDA_HSSV/student/Trang_chu/resetPassword">Thay đổi mật khẩu</a></li>
            <li><a class="dropdown-item" href="/QLDA_HSSV/student/Trang_chu/logout">Đăng xuất</a></li>
        </ul>
    </div>
</div>