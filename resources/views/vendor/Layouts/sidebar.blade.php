<div class="dashboard_sidebar">
    <span class="close_icon">
      <i class="far fa-bars dash_bar"></i>
      <i class="far fa-times dash_close"></i>
    </span>
    <a href="{{route('home')}}" class="dash_logo"><img src="{{asset('FrontendData/images/logo.png')}}" alt="logo" class="img-fluid"></a>
    <ul class="dashboard_link">
      <li><a class="active" href="{{route('vendor.dashboard')}}"><i class="fas fa-tachometer"></i>Dashboard</a></li>
      <li><a href=""><i class="fas fa-list-ul"></i> Orders</a></li>
      <li><a href="dsahboard_download.html"><i class="far fa-cloud-download-alt"></i> Downloads</a></li>
      <li><a href="dsahboard_review.html"><i class="far fa-star"></i> Reviews</a></li>
      <li><a href="dsahboard_wishlist.html"><i class="far fa-heart"></i> Wishlist</a></li>
      <li><a href="{{route('vendor.profile')}}"><i class="far fa-user"></i> My Profile</a></li>
      <li><a href="{{route('vendor.shop-profile.index')}}"><i class="fas fa-user-circle"></i>Shop Profile</a></li>
      <li><a href="{{route('vendor.shop-profile.edit', Auth::user()->id)}}"><i class="fas fa-user-circle"></i>Edit Shop Profile</a></li>
      <li><a href="dsahboard_address.html"><i class="fal fa-gift-card"></i> Addresses</a></li>
      <li><a href="{{route('vendor.products.create')}}"><i class="fal fa-gift-card"></i> Create Product</a></li>
      <li><a href="{{route('vendor.products.index')}}"><i class="fal fa-gift-card"></i> Product Data Table</a></li>   
      <li>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <a href="route('logout')" onclick="event.preventDefault();
          this.closest('form').submit();"><i class="far fa-sign-out-alt"></i> Log out</a>
      </form>
      </li>
    </ul>
  
    
  </div>