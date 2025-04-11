<div class="col-3 bg-white position-fixed top-0 start-0 border-end vh-100" style="padding-top: 60px;">
    <div class="list-group mt-4">
        <a href="{{ route('products.index') }}" class="list-group-item">
            <i class="fas fa-box-open text-muted mr-3"></i>
            Quản lý sản phẩm
        </a>
        <a href="#" class="list-group-item">
            <i class="fas fa-shopping-cart text-muted mr-3"></i>
            Quản lý đơn hàng
        </a>
        <a href="#" class="list-group-item">
            <i class="fas fa-chart-pie text-muted mr-3"></i>
            Báo cáo
        </a>
        <a href="#" class="list-group-item">
            <i class="fas fa-chart-line text-muted mr-3"></i>
            Thống kê
        </a>
        <div class="dropdown-divider"></div>
        <a href="{{ route('admin.logout') }}" class="list-group-item text-danger">
            <i class="fas fa-sign-out-alt mr-3"></i>
            Đăng xuất
        </a>
    </div>
</div>