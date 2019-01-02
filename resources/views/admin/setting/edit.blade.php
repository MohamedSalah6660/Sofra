@extends('admin/layouts.app')

@section('title_page')

Edit Setting

@endsection

@section('content')


<div class="container">
  <h2>Edit Setting
</h2>
             
    @if ($message = Session::get('success'))

    <div class="alert alert-success">

        <p>{{ $message }}</p>

    </div>

@endif
                                                        
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
  


    {!!Form::model($settings , array('url'=>'settings/'. $settings->id, 'method'=>'put' )) !!} 
  
  <label>Phone Number</label>

 
    {!! Form::text('phone', null , array('placeholder'=> 'Phone', 'class'=> 'form-control')) !!} 

  <label>Email Address</label>


    {!! Form::email('email', null , array('placeholder'=> 'Email Address', 'class'=> 'form-control')) !!}  
  
  <label>About Application</label>


    {!! Form::textarea('about_app', null , array('placeholder'=> 'About App', 'class'=> 'form-control')) !!}   

    <label>Facbook URL</label>


    {!! Form::url('facebook_url', null , array('placeholder'=> 'facebook_url', 'class'=> 'form-control')) !!} 

    <label>Twitter URL</label>
 

    {!! Form::url('twitter_url', null , array('placeholder'=> 'twitter_url', 'class'=> 'form-control')) !!}  

    <label>Whatsapp Number</label>


    {!! Form::number('whatsapp', null , array('placeholder'=> 'whatsapp', 'class'=> 'form-control')) !!}  

<label>Instgram</label>

    {!! Form::url('instgram', null , array('placeholder'=> 'instgram', 'class'=> 'form-control')) !!}  

<label>Google URL</label>

    {!! Form::url('google_url', null , array('placeholder'=> 'google_url', 'class'=> 'form-control')) !!}  

<label>Commission</label>

     {!! Form::number('commission', null , array('placeholder'=> 'Commission', 'class'=> 'form-control')) !!}  



{!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

   {!! Form::close() !!}       
  


@endsection