<!-- resources/views/includes/sidebar.blade.php -->
<aside id="sidebar" class="js-sidebar">
    <div class="h-100">
        <div class="sidebar-logo">
            <a href="#">Admin Dashboard</a>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-header">Navigation Sidebar</li>
            <li class="sidebar-item {{ Request::is('dashboard') ? 'active' : '' }}">
                <a href="{{ url('dashboard') }}" class="sidebar-link">
                    <i class="fa-solid fa-list pe-2"></i>
                    Dashboard
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ url('verify_restaurant') }}" class="sidebar-link">
                    <i class="fa-solid fa-comment-dollar pe-2"></i>
                    Verify Restaurant
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ url('data_customer') }}" class="sidebar-link">
                    <i class="fa-solid fa-user pe-2"></i>
                    Customer Account Data
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ url('daftar-toko') }}" class="sidebar-link">
                    <i class="fa-solid fa-comment-dollar pe-2"></i>
                    Store Account Data
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ url('promos') }}" class="sidebar-link">
                    <i class="fa-solid fa-comment-dollar pe-2"></i>
                    Promo
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('foods.index') }}" class="sidebar-link">
                    <i class="fa-solid fa-newspaper pe-2"></i>
                    Food
                </a>
            </li>
        </ul>
    </div>
</aside>