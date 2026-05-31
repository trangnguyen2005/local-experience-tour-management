<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'VN Local Experience' }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<header class="site-header">
    <div class="shell">
        <div class="nav">
            <a class="brand" href="{{ route('home') }}">
                <span class="brand-mark">VN</span>
                <span>Local Experience</span>
            </a>

            <button class="navbar-toggler" type="button" aria-controls="mainNavbar" aria-expanded="false" aria-label="Mở menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse" id="mainNavbar">
                <nav class="menu" aria-label="Menu chính">
                    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Trang chủ</a>
                    <a href="{{ route('experiences.index') }}" class="{{ request()->routeIs('experiences.*') ? 'active' : '' }}">Các chuyến tham quan</a>
                </nav>

                <div class="account">
                    @auth
                        <a class="btn light link" href="{{ route('dashboard') }}">Tài khoản</a>
                        @if(auth()->user()->isAdmin())
                            <a class="btn light link" href="{{ route('admin.dashboard') }}">Admin</a>
                        @endif
                        <form class="inline" method="post" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn secondary">Đăng xuất</button>
                        </form>
                    @else
                        <a class="btn light link" href="{{ route('login') }}">Đăng nhập</a>
                        <a class="btn accent link" href="{{ route('register') }}">Đăng ký</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</header>

<main class="main">
    <div class="shell">
        @if(session('status'))
            <div class="card">
                <p class="ok">{{ session('status') }}</p>
            </div>
        @endif

        @if($errors->any())
            <div class="card">
                @foreach($errors->all() as $error)
                    <p class="error">{{ $error }}</p>
                @endforeach
            </div>
        @endif

        @yield('content')
    </div>
</main>

<footer class="site-footer">
    <div class="shell footer-row">
        <div>
            <strong>VN Local Experience</strong>
            <div>Khám phá Việt Nam qua các trải nghiệm địa phương.</div>
        </div>
        <div>info@localexperience.test</div>
    </div>
</footer>
<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
