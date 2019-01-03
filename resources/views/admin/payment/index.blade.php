@extends('admin/layouts.app')
@section('title_page')
Payments

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
Payment Control
  </h2>

    <a class="btn btn-primary" href="{{ url('payments/create') }}">Add New Payment</a>


<div class="table-responsive">

  <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Paid</th>
        <th>Restaurant</th>
      </tr>
    </thead>
    <tbody>

	@foreach($payments as $payment)
      <tr>


       <td>{{ (($payments->currentPage() - 1) * $payments->perPage()) + $loop->iteration }}</td>
       
        <td>{{ $payment->done }}</td>
        <td>{{ optional($payment->restaurant)->name }}</td>

        <td>

    <a class="btn btn-primary" href="{{ route('payments.edit', $payment) }}">Edit</a>

    


    {!! Form::open(['method' => 'DELETE','url' => 'payments/'. $payment->id,'style'=>'display:inline', ('onclick="return myFunction();"')]) !!}

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


      <div class="text-center">{{ $payments->render() }}</div>
</div>


<script>
  function myFunction() {
      if(!confirm("Are You Sure to delete this"))
      event.preventDefault();
  }
 </script>



@endsection