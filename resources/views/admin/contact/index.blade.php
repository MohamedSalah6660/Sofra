@extends('admin/layouts.app')
@section('title_page')
Contacts

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
Contact Control
  </h2>



<div class="table-responsive">

  <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Message</th>
        <th>Type</th>
      </tr>
    </thead>
    <tbody>

	@foreach($contacts as $contact)
      <tr>


       <td>{{ (($contacts->currentPage() - 1) * $contacts->perPage()) + $loop->iteration }}</td>
       
        <td>{{ $contact->name }}</td>
        <td>{{ $contact->phone }}</td>
        <td>{{ $contact->email }}</td>
        <td>{{ $contact->message }}</td>
        <td>{{ $contact->type }}</td>

        <td>

    

    {!! Form::open(['method' => 'DELETE','url' => 'contacts/'. $contact->id,'style'=>'display:inline', ('onclick="return myFunction();"')]) !!}


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


      <div class="text-center">{{ $contacts->render() }}</div>
</div>


<script>
  function myFunction() {
      if(!confirm("Are You Sure to delete this"))
      event.preventDefault();
  }
 </script>



@endsection