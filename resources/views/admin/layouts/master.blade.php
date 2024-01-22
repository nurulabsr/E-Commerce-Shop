<!DOCTYPE html>
<html lang="en">
@include('admin.CommonLink.header')
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
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://">Absar</a>
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
   @include('admin.CommonLink.footer')
</body>
</html>