<!DOCTYPE html>
<html lang="en">
<head>
  @include('CommonLink.header')
</head>
<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      @include('admin.layouts.navbar')
      @include('admin.layouts.sidebar')     

      <!-- Main Content -->
      <div class="main-content">
       @yield('content')
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2023 <div class="bullet"></div> Design By <a href="https://">Absar</a>
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
   @include('CommonLink.footer')
</body>
</html>