@extends('admin/layouts.app')


@section('title_page')

Edit Payment Method

@endsection

@section('content')

<div class="container">
  <h2>Edit Payment Method</h2>



                                                        
	@if (count($errors) > 0)

    <div class="alert alert-danger">

        <strong>Whoops!</strong> There were some problems with your input.<br><br>

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif



   {!!Form::model($payment_methods , array('url'=>'payment_methods/'. $payment_methods->id, 'method'=>'put', )) !!}
    
    <div class="col-xs-12 col-sm-12 col-md-12">
       
        <div class="form-group">
	
	{!! Form::text('name', null , array('placeholder'=> 'Payment Method', 'class'=> 'form-control')) !!}
</div>
</div>

{!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

   {!! Form::close() !!}       
  


    </div>
@endsection