<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/dashboard*') ? 'active' : 'collapsed'}}" href="{{ url('admin/dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-heading">Data</li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/carousel*') ? 'active' : 'collapsed'}}" href="{{ url('admin/carousel') }}">
                <i class="bi bi-card-image"></i>
                <span>Carousel</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/kategori*') ? 'active' : 'collapsed'}}" href="{{ url('admin/kategori') }}">
                <i class="bi bi-list-ul"></i>
                <span>Kategori</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/produk*') ? 'active' : 'collapsed'}}" href="{{ url('admin/produk') }}">
                <i class="bi bi-folder"></i>
                <span>Produk</span>
            </a>
        </li>
        
        <li class="nav-heading">Setting</li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/setting*') ? 'active' : 'collapsed'}}" href="{{ url('admin/setting') }}">
                <i class="bi bi-gear"></i>
                <span>Footer</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/bantuan*') ? 'active' : 'collapsed'}}" href="{{ url('admin/bantuan') }}">
                <i class="bi bi-chat-left-text"></i>
                <span>Fitur Bantuan</span>
            </a>
        </li>

    </ul>

</aside>