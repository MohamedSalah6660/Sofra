@extends('admin/layouts.app')
@section('title_page')

{{ $orders->clients->name }} 's Order

@endsection

@section('content')


      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                    

 @if ($message = Session::get('delete'))

    <div class="alert alert-danger">

        <p>{{ $message }}</p>

    </div>

@endif


  <h2>
Orders Control
  </h2>



<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>Restaurant</th>
  
      </tr>
    </thead>
    <tbody>
      
	@foreach($order_product as $product)
      <tr>
        <td>{{ $product->pivot->price }}</td>
        <td>{{ $product->pivot->quantity }}</td>

      </tr>
     

@endforeach
    </tbody>
  </table>
</div>




@endsection