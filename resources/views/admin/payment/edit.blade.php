@extends('admin/layouts.app')


@section('title_page')

Edit Payment

@endsection

@section('content')

<div class="container">
  <h2>Edit Payment</h2>



                                                        
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



   {!!Form::model($payments,array('url'=>'payments/'.$payments->id, 'method'=>'put', )) !!}
    
    <div class="col-xs-12 col-sm-12 col-md-12">
       
        <div class="form-group">
	
	{!! Form::text('done', null , array('placeholder'=> 'Paid', 'class'=> 'form-control')) !!}
</div>
</div>
   <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
    {!! Form::select('restaurant_id', $restaurants , [] , array('class'=>'form-control')) !!}
</div>
</div>

{!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

   {!! Form::close() !!}       
  


    </div>
@endsection