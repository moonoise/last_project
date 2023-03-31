<html>
    @include('layouts.head')
    <body>
        @include('layouts.navbar')
        <main>
            <article>
                @yield('content')
            </article>
        </main>
        @include('layouts.footer')
        @include('layouts.consent')
        @stack('script')
        @include('layouts.consent-script')
    </body>
</html>

