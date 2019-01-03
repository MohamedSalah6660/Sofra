@extends('admin/layouts.app')
@section('title_page')

Restaurants

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
Restaurants Control
  </h2>



<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th> Name</th>
        <th>City</th>
        <th>Commission</th>
        <th>Status</th>
        <th>Control</th>
      </tr>
    </thead>
    <tbody>
      
	@foreach($restaurants as $restaurant)
      <tr>
       <td>{{ (($restaurants->currentPage() - 1) * $restaurants->perPage()) + $loop->iteration }}</td>
        <td>{{ $restaurant->name }}</td>
        <td>{{ optional($restaurant->cities)->name}}</td>
        <td>{{ $restaurant->rest_commission }}</td>
        <td>{{ $restaurant->status }}</td>
        <td>


                           
  
    {!! Form::open(['method' => 'DELETE','url' => 'restaurants/'. $restaurant->id,'style'=>'display:inline', ('onclick="return myFunction();"')]) !!}
      

        <button type="submit" class="btn btn-danger">
          <i class="fa fa-trash-o"></i>
          </button>
                
                  {!! Form::close() !!}
        </td>
      </tr>
     

@endforeach
    </tbody>
  </table>
</div>
  <div class="text-center">{{ $restaurants->render() }}</div>


<script>
  function myFunction() {
      if(!confirm("Are You Sure to delete this"))
      event.preventDefault();
  }
 </script>



@endsection