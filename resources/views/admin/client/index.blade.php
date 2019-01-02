@extends('admin/layouts.app')
@section('title_page')
Clients

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
Clients Control
  </h2>



<div class="table-responsive">

  <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Home AD</th>
        <th>City</th>
        <th>Quarter</th>
        <th>Control</th>
      </tr>
    </thead>
    <tbody>

  @foreach($clients as $client)
      <tr>


       <td>{{ (($clients->currentPage() - 1) * $clients->perPage()) + $loop->iteration }}</td>
       
        <td>{{ $client->name }}</td>
        <td>{{ $client->email }}</td>
        <td>{{ $client->phone }}</td>
        <td>{{ $client->home_description }}</td>
        <td>{{ optional($client->cities)->name }}</td>
        <td>{{ $client->quarter }}</td>

        <td>
<a class="btn btn-danger" href="#">
   Delete</a>
   

    {!! Form::open(['method' => 'DELETE','url' => 'clients/'. $client->id,'style'=>'display:inline', ('onclick="return myFunction();"')]) !!}

       {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
      
      {!! Form::close() !!}

        </td>
      </tr>
     

@endforeach


</form>

    </tbody>

  </table>


      <div class="text-center">{{ $clients->render() }}</div>
</div>


<script>
  function myFunction() {
      if(!confirm("Are You Sure to delete this"))
      event.preventDefault();
  }
 </script>



@endsection