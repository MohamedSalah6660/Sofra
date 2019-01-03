@extends('admin/layouts.app')
@section('title_page')
Categories

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
Categories Control
  </h2>

    <a class="btn btn-primary" href="{{ url('categories/create') }}">Add New Category</a>


<div class="table-responsive">

  <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Name</th>
      </tr>
    </thead>
    <tbody>

  @foreach($categories as $category)
      <tr>


       <td>{{ (($categories->currentPage() - 1) * $categories->perPage()) + $loop->iteration }}</td>
       
        <td>{{ $category->name }}</td>

        <td>

    <a class="btn btn-primary" href="{{ route('categories.edit', $category) }}">Edit</a>

    

    {!! Form::open(['method' => 'DELETE','url' => 'categories/'. $category->id,'style'=>'display:inline', ('onclick="return myFunction();"')]) !!}

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


      <div class="text-center">{{ $categories->render() }}</div>
</div>


<script>
  function myFunction() {
      if(!confirm("Are You Sure to delete this"))
      event.preventDefault();
  }
 </script>



@endsection