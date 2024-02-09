<!doctype html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body>
    <div class="site-wrap" id="home-section">

        @include('includes.header')

        @include('includes.hero')

        @include('includes.howItWorks')

        @include('includes.prelisting')

        @include('includes.listing2')

        @include('includes.features')

        @section('color')
        bg-light
        @endsection
        @include('includes.testimonials')
        
        @include('includes.prefooter')

        @include('includes.footer')

    </div>

    @include('includes.js')

</body>

</html>