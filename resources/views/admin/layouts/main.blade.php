
<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.includes.head')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
    
      @include('admin.includes.sidebar')
      @include('admin.includes.nav')
      @yield('mainContent')
      @include('admin.includes.footer')

      </div>
    </div>
    @include('admin.includes.js')

  </body>
</html>