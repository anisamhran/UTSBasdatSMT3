<ul class="nav">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-th menu-icon"></i>
            <span class="menu-title">Dashboard</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#data-master" aria-expanded="false">
            <i class="fas fa-chart-bar menu-icon"></i>
            <span class="menu-title">Data Master</span>
        </a>
        <div class="collapse" id="data-master">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('data-barang') }}">
                        <span class="menu-title">Barang</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('data-vendor') }}">
                        <span class="menu-title">Vendor</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('data-satuan') }}">
                        <span class="menu-title">Satuan</span>
                    </a>
                </li>
            </ul>
            <ul class="nav flex-column sub-menu">   
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('data-barang-dihapus') }}">
                        <span class="menu-title">Barang Terhapus</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('data-vendor-dihapus') }}">
                        <span class="menu-title">Vendor Terhapus</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('data-satuan-dihapus') }}">
                        <span class = "menu-title">Satuan Terhapus</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('data-user') }}">
            <i class="fas fa-user menu-icon"></i>
            <span class="menu-title">User</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('data-user-dihapus') }}">
            <i class="fas fa-times menu-icon"></i>
            <span class="menu-title">User Dihapus</span>
        </a>
    </li>   
  </ul>
  