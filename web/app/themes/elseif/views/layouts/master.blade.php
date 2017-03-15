<html>
    @include('views.parts.head')
    <body {{ body_class() }}>

        @include('views.parts.header')

        @yield('content')

        @include('views.parts.footer')
        @include('views.parts.scripts')
    </body>
</html>