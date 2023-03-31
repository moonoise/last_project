<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg  navbar-dark bg-blue">
    <div class="container px-5">
        <div>
            <img src="{{ asset('assets/images/logo-W.svg') }}" style="width:200px;" alt="">
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link {{ Nav::isRoute('home') }} " aria-current="page" href="{{ route('home') }}">หน้าแรก</a></li>
                <li class="nav-item"><a class="nav-link {{ Nav::isRoute('step1.show') }} " aria-current="page" href="{{ route('step1.show') }}">ลงทะเบียน</a></li>
                @auth
                    <li class="nav-item"><a class="nav-link {{ Nav::isRoute('logout') }} " aria-current="page" href="{{ route('logout') }}">Logout</a></li>
                @else
                    <li class="nav-item"><a class="nav-link {{ Nav::isRoute('login') }} " aria-current="page" href="{{ route('login') }}">Log In</a></li>
               @endauth
        </div>
    </div>
</nav>
