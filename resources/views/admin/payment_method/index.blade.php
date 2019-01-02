@extends('admin/layouts.app')
@section('title_page')
Payment Methods

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
Payment Methods Control
  </h2>

    <a class="btn btn-primary" href="{{ url('payment_methods/create') }}">Add New Payment Method</a>


<div class="table-responsive">

  <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Name</th>
      </tr>
    </thead>
    <tbody>

	@foreach($payment_methods as $payment)
      <tr>


       <td>{{ (($payment_methods->currentPage() - 1) * $payment_methods->perPage()) + $loop->iteration }}</td>
       
        <td>{{ $payment->name }}</td>

        <td>

    <a class="btn btn-primary" href="{{ route('payment_methods.edit', $payment) }}">Edit</a>

    


    {!! Form::open(['method' => 'DELETE','url' => 'payment_methods/'. $payment->id,'style'=>'display:inline', ('onclick="return myFunction();"')]) !!}

       {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
      
      {!! Form::close() !!}

        </td>
      </tr>
     

@endforeach


</form>

    </tbody>

  </table>


      <div class="text-center">{{ $payment_methods->render() }}</div>
</div>


<script>
  function myFunction() {
      if(!confirm("Are You Sure to delete this"))
      event.preventDefault();
  }
 </script>



@endsection