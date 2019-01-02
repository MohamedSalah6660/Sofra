<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('adminlte/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p></p>
          <h3 >{{ Auth::user()->name }}</h3>
        </div>
      </div>
      <!-- search form -->
      <hr>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul>
 
            <li><a href="{{ url('restaurants') }}"> <strong>Restaurants</strong></a></li>
  <hr>
            <li><a href="{{ url('orders') }}"> <strong>Orders</strong></a></li>
  <hr>
            <li><a href="{{ url('cities') }}"> <strong>Cities</strong></a></li>
  <hr>
            <li><a href="{{ url('categories') }}"> <strong>Categories</strong></a></li>
  <hr>
            <li><a href="{{ url('clients') }}"> <strong>Clients</strong></a></li>
  <hr>
              <li><a href="{{ url('offers') }}"> <strong>Offers</strong></a></li>
  <hr>
              <li><a href="{{ url('payments') }}"> <strong>Payments</strong></a></li>
  <hr>
              <li><a href="{{ url('payment_methods') }}"> <strong>Payment Methods</strong></a></li>
  <hr>
              <li><a href="{{ url('contacts') }}"> <strong>Contacts</strong></a></li>
  <hr>
              <li><a href="{{ url('changePassword') }}"> <strong>Change Password</strong></a></li>
  <hr>
  
         
        </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
