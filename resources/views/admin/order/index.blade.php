@extends('admin/layouts.app')
@section('title_page')

Orders

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
        <th>#</th>
        <th> No</th>
        <th>Restaurant</th>
        <th>Total</th>
        <th>Notes</th>
        <th>Status</th>
        <th>Date</th>
        <th>Control</th>
      </tr>
    </thead>
    <tbody>
      
	@foreach($orders as $order)
      <tr>
       <td>{{ (($orders->currentPage() - 1) * $orders->perPage()) + $loop->iteration }}</td>
        <td>{{ $order->number }}</td>
        <td>{{ $order->restaurants->name }}</td>
        <td>{{ $order->total }}</td>
        <td>{{ $order->notes }}</td>
        <td>{{ $order->status }}</td>
        <td>{{ $order->created_at }}</td>
        <td>

          <a class="btn btn-success" href="{{ route('orders.show', $order) }}">Show Order</a>
                           
  

        </td>
      </tr>
     

@endforeach
    </tbody>
  </table>
</div>
  <div class="text-center">{{ $orders->render() }}</div>




@endsection