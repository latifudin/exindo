<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ url('/') }}" class="logo d-flex align-items-center">
            <img src="{{ asset('template/img/logo.png') }}" alt="">
        </a>
    </div><!-- End Logo -->

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
                <a href="{{ url('/admin/dashboard') }}" class=""></a>
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