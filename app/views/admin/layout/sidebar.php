<div class="sidebar">
    <h4><a href="javascript:void(0)" onclick="window.history.back();">Hệ thống</a></h4>
    <ul class="list-unstyled">
        <!-- Quản lý chung -->
        <li class="mb-2">
            <button class="btn  w-100 text-start dropdown-toggle" data-toggle="collapse" type="button" data-target="#quanlyChung" aria-expanded="false" aria-controls="quanlyChung         ">
                Quản lý chung
            </button>
            <div class="collapse multi-collapse" id="quanlyChung">
                <ul class="list-unstyled ps-3">
                    <li><a href="/admin/dashboard" class="text-white">Trang Chủ</a></li>
                    <li><a href="/admin/users" class="text-white">Quản lý người dùng</a></li>
                </ul>
            </div>
        </li>

        <!-- Quản lý học tập -->
        <li class="mb-2">
            <button class="btn  w-100 text-start dropdown-toggle" type="button" data-toggle="collapse" data-target="#quanlyHocTap" aria-expanded="false" aria-controls="quanlyHocTap        ">
                Quản lý học tập
            </button>
            <div class="collapse multi-collapse" id="quanlyHocTap">
                <ul class="list-unstyled ps-3">
                    <li><a href="/admin/nganh" class="text-white">Quản lý ngành</a></li>
                    <li><a href="/admin/mon" class="text-white">Quản lý môn</a></li>
                    <li><a href="/admin/DangKyMonHoc" class="text-white">Quản lý đăng ký học</a></li>
                    <li><a href="/admin/lop" class="text-white">Quản lý lớp</a></li>
                    <li><a href="/admin/Diem" class="text-white">Quản lý điểm</a></li>
                </ul>
            </div>
        </li>

        <!-- Quản lý học kỳ và khóa học -->
        <li class="mb-2">
            <button class="btn  w-100 text-start dropdown-toggle" type="button" data-toggle="collapse" data-target="#quanlyHocKy" aria-expanded="false" aria-controls="quanlyHocKy         ">
                Quản lý học kỳ và khóa học
            </button>
            <div class="collapse multi-collapse" id="quanlyHocKy">
                <ul class="list-unstyled ps-3">
                    <li><a href="/admin/khoa" class="text-white">Quản lý khoa</a></li>
                    <li><a href="/admin/Hocky" class="text-white">Quản lý kỳ học</a></li>
                    <li><a href="/admin/Khoahoc" class="text-white">Quản lý khóa học</a></li>
                </ul>
            </div>
        </li>

        <!-- Quản lý tài chính -->
        <li class="mb-2">
            <button class="btn  w-100 text-start dropdown-toggle" type="button" data-toggle="collapse" data-target="#quanlyTaiChinh" aria-expanded="false" aria-controls="quanlyTaiChinh       ">
                Quản lý tài chính
            </button>
            <div class="collapse" id="quanlyTaiChinh">
                <ul class="list-unstyled ps-3">
                    <li><a href="/admin/tuition" class="text-white">Quản lý học phí</a></li>
                </ul>
            </div>
        </li>
    </ul>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<style>
    .btn {
        color: #fff;
    }

    .btn:hover {
        background-color: transparent !important;
        /* Chỉ định rõ màu */
        border-color: transparent !important;
    }

    /* Đảm bảo chức năng toggle không bị ảnh hưởng */
    .btn[data-bs-toggle="collapse"] {
        color: #fff;
        background-color: #343a40;
        /* Màu nền mặc định */
    }

    .btn[data-bs-toggle="collapse"]:hover {
        background-color: #495057;
        /* Màu khi hover */
    }
</style>