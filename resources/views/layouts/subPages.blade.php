<!doctype html>
<html lang="en">
<head>
    @include('includes.head')
</head>

<body>
    <div class="site-wrap" id="home-section">
        @include('includes.header')

        @include('includes.subHeader')
        @yield('content')
        @include('includes.footer')

    </div>
    @include('includes.js')
</body>

</html>