<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ url('/') }}" class="logo d-flex align-items-center">
            <img src="{{ asset('template/img/logo.png') }}" alt="">
        </a>
    </div><!-- End Logo -->

    <div class="search-bar">
            <form class="search-form d-flex align-items-center" action="{{ url('cari') }}" method="GET">
            @csrf
                <input type="text" name="cari" placeholder="Search" title="Cari Produk" value="{{ isset($kata_kunci) ? implode(' ', $kata_kunci) : old('cari') }}" >
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li><!-- End Search Icon-->

            @if (Route::has('login'))
            <li class="nav-item dropdown pe-3">
                @auth
                <a href="{{ url('/admin/dashboard') }}" class="">Dashboard Admin</a>
                @else
                <a href="{{ route('login') }}" class=""></a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}" class=""></a>
                @endif
                @endauth
            </li>
            @endif
        </ul>
    </nav><!-- End Icons Navigation -->
</header>