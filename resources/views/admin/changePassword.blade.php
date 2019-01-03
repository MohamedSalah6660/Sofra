@extends('admin.layouts.app')
@section('title_page')

Change Password
@endsection
@section('content')

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

 @if ($message = Session::get('success'))

    <div class="alert alert-success">

        <p>{{ $message }}</p>

    </div>

@endif
        
 @if ($message = Session::get('failed'))

    <div class="alert alert-danger">

        <p>{{ $message }}</p>

    </div>

@endif

<h1>Change Password</h1>

                                                
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









   

    {!! Form::open(['url'=> 'changePassword','method'=>'POST'])!!}


<div class="container">
    <div class="row">
        <div class="col-sm-4">
            
            <label>Current Password</label>
            <div class="form-group pass_show"> 
                <input name="old-password" type="password" class="form-control" placeholder="Current Password"> 
            </div> 


               <label>New Password</label>
            <div class="form-group pass_show"> 
                <input name="password" type="password"  class="form-control" placeholder="New Password"> 
            </div> 


               <label>Confirm Password</label>
            <div class="form-group pass_show"> 
                <input name="password_confirmation" type="password"  class="form-control" placeholder="Confirm Password"> 
            </div> 
            
            <button type="submit" class="btn btn-primary">Change Password</button>
        </div>  
    </div>
</div>
    {!! Form::close()!!}

<style type="text/css">
    .pass_show{position: relative} 

.pass_show .ptxt { 

position: absolute; 

top: 50%; 

right: 10px; 

z-index: 1; 

color: #f36c01; 

margin-top: -10px; 

cursor: pointer; 

transition: .3s ease all; 

} 

.pass_show .ptxt:hover{color: #333333;} 



</style>


<script type="text/javascript">
    
  
$(document).ready(function(){
$('.pass_show').append('<span class="ptxt">Show</span>');  
});
  

$(document).on('click','.pass_show .ptxt', function(){ 

$(this).text($(this).text() == "Show" ? "Hide" : "Show"); 

$(this).prev().attr('type', function(index, attr){return attr == 'password' ? 'text' : 'password'; }); 

});  

</script>
@endsection