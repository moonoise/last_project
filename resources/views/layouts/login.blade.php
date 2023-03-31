<html>
    @include('layouts.head')
    <body>
        <main>
            <article>
                @yield('content')
            </article>
        </main>
        @stack('script')
    </body>
</html>

