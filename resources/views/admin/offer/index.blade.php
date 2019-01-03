@extends('admin/layouts.app')
@section('title_page')
Offers

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
Offer Control
  </h2>



<div class="table-responsive">

  <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Price</th>
        <th>Duration</th>
        <th>Description</th>
        <th>Image</th>
        <th>Restaurant</th>
        <th>Control</th>
      </tr>
    </thead>
    <tbody>

	@foreach($offers as $offer)
      <tr>


       <td>{{ (($offers->currentPage() - 1) * $offers->perPage()) + $loop->iteration }}</td>
       
        <td>{{ $offer->name }}</td>
        <td>{{ $offer->price }}</td>
        <td>{{ $offer->duration }}</td>
        <td>{{ $offer->description }}</td>
     <td><img src="{{asset('/storage/image/' . $offer->image)}}" style="width: 200px ; height: 100px"></td>
        <td>{{ optional($offer->restaurant)->name }}</td>

        <td>

    

    {!! Form::open(['method' => 'DELETE','url' => 'offers/'. $offer->id,'style'=>'display:inline', ('onclick="return myFunction();"')]) !!}



        <button type="submit" class="btn btn-danger">
          <i class="fa fa-trash-o"></i>
          </button>
                
      {!! Form::close() !!}

        </td>
      </tr>
     

@endforeach


</form>

    </tbody>

  </table>


      <div class="text-center">{{ $offers->render() }}</div>
</div>


<script>
  function myFunction() {
      if(!confirm("Are You Sure to delete this"))
      event.preventDefault();
  }
 </script>



@endsection