@extends('admin/layouts.app')
@section('title_page')
Cities

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

  @if ($message = Session::get('success'))

    <div class="alert alert-success">

        <p>{{ $message }}</p>

    </div>

@endif

  <h2>
Cities Control
  </h2>

    <a class="btn btn-primary" href="{{ url('cities/create') }}">Add New City</a>


<div class="table-responsive">

  <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Name</th>
      </tr>
    </thead>
    <tbody>

	@foreach($cities as $city)
      <tr>


       <td>{{ (($cities->currentPage() - 1) * $cities->perPage()) + $loop->iteration }}</td>
       
        <td>{{ $city->name }}</td>

        <td>

    <a class="btn btn-primary" href="{{ route('cities.edit', $city) }}">Edit</a>

<!-- 
<a class="btn btn-danger" href="#" onclick="event.preventDefault();
 document.getElementById('deletecity').submit();" >Delete City</a>

<form id="deletecity" method="post" 
action="{{-- {{  route('cities.destroy',$city->id)}} --}}" 
style="display:none" >
  {{-- @csrf
          @method('delete')
         --}}
</form>
-->


    {!! Form::open(['method' => 'DELETE','url' => 'cities/'. $city->id,'style'=>'display:inline', ('onclick="return myFunction();"')]) !!}

      
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


      <div class="text-center">{{ $cities->render() }}</div>
</div>


<script>
  function myFunction() {
      if(!confirm("Are You Sure to delete this"))
      event.preventDefault();
  }
 </script>



@endsection