@include('admin/layouts.header')


@include('admin/layouts.navbar')

  <!-- =============================================== -->

@include('admin/layouts.sidebar')

  <!-- =============================================== -->


  <div class="content-wrapper">
 <section class="content-header">

      <h1>
        @yield('title')
        <small>@yield('small_title')</small>
      </h1>

    
  </section>


@yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('admin/layouts.footer')