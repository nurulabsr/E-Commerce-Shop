<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">Stisla</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="dropdown ">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
          <ul class="dropdown-menu">
            <li class=""><a class="nav-link" href="index-0.html">General Dashboard</a></li>
            <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
          </ul>
        </li>
        <li class="menu-header">Starter</li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Manage Website</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{route('admin.slider.create')}}">Create Slider</a></li>
            <li><a class="nav-link" href="{{route('admin.slider.index')}}">Sidebar Table</a></li>
          </ul>
        </li>
        <li class="dropdown {{SetActive([
          'admin.category.*',
          'admin.sub-category.*',
          'admin.child-category.*',
        ])}}">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Manage Category</span></a>
          <ul class="dropdown-menu">
            <li class="{{SetActive(['admin.category.create'])}}"><a class="nav-link" href="{{route('admin.category.create')}}">Create Category</a></li>
            <li class="{{SetActive(['admin.category.index'])}}"><a class="nav-link" href="{{route('admin.category.index')}}">Category Table</a></li>
            <li class="{{SetActive(['admin.sub-category.create'])}}"><a class="nav-link" href="{{route('admin.sub-category.create')}}">Create Sub Category</a></li>
            <li class="{{SetActive(['admin.sub-category.index'])}}"><a class="nav-link" href="{{route('admin.sub-category.index')}}">Sub Category Table</a></li>
            <li class="{{SetActive(['admin.child-category.create'])}}"><a class="nav-link" href="{{route('admin.child-category.create')}}">Create Child Category</a></li>
            <li class="{{SetActive(['admin.child-category.index'])}}"><a class="nav-link" href="{{route('admin.child-category.index')}}">Child Category Table</a></li>

          </ul>
        </li>

        <li class="dropdown {{
           SetActive([
            'admin.brand.*',
           ])
        }}">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Manage Brand</span></a>
          <ul class="dropdown-menu">
               <li class="{{SetActive(['admin.brand.create'])}}"> <a class="nav-link" href="{{route('admin.brand.create')}}">Create Brand</a> </li>
               <li class="{{SetActive(['admin.brand.index'])}}"> <a class="nav-link" href="{{route('admin.brand.index')}}">Brand Table</a> </li>
          </ul> 
        </li>

        <li class="dropdown {{
             SetActive([
             'admin.seller-product.*',
             ])
           }}">
           <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Seller Product</span></a>
           <ul class="dropdown-menu">
                 <li class="{{SetActive(['admin.seller-product.all'])}}"> <a class="nav-link" href="{{route('admin.seller-product.all')}}">All Product</a> </li>
                 <li class="{{SetActive(['admin.sellers.pending.product'])}}"> <a class="nav-link" href="{{route('admin.sellers.pending.product')}}">Pending Product</a> </li>
           </ul> 
       </li>
       
        <li class="dropdown">
         <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Manage Product</span></a>
         <ul class="dropdown-menu">
              <li> <a class="nav-link" href="{{route('admin.products.create')}}">Create Product</a> </li>
              <li> <a class="nav-link" href="{{route('admin.products.index')}}">Product Table</a> </li>
         </ul> 
       </li>
       
        <li class="dropdown {{
          SetActive([
           'admin.vendor-profile.*',
          ])
       }}">
         <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Admin Vendor Profile</span></a>
         <ul class="dropdown-menu">
              <li class="{{SetActive(['admin.vendor-profile.create'])}}"> <a class="nav-link" href="{{route('admin.vendor-profile.create')}}">Create Profile</a> </li>
              <li class="{{SetActive(['admin.vendor-profile.edit'])}}"> <a class="nav-link" href="{{route('admin.vendor-profile.edit', 1)}}">Update Profile</a> </li>
            </ul> 
       </li>
        {{-- <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li> --}}
        

{{-- 
       <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Layout</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="layout-default.html">Slider</a></li>
            <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
            <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
          </ul>
        </li>
        <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li> --}}
      
    </aside>
  </div>