<html>
    @include('layouts-admin.head')
    <body>
        @include('layouts-admin.navbar')
        <main>
            <article>
                @yield('content')
            </article>
        </main>
        @include('layouts-admin.footer')
        @stack('script')
    </body>
</html>

