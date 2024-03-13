  @extends('Frontend.Dashboard.Layouts.master')
  @section('dashboard-content')
  <!--=============================
    DASHBOARD START
  ==============================-->
  <section id="wsus__dashboard">
    <div class="container-fluid">
      {{-- Sidebar --}}
      @include('Frontend.Dashboard.Layouts.sidebar')
      {{-- end sidebar --}}
      
    </div>
  </section>
  <!--=============================
    DASHBOARD START
  ==============================-->

@endsection