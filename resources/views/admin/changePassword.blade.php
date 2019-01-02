@extends('admin.layouts.app')
@section('title_page')

Change Password
@endsection
@section('content')

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<h1>Change PAssword</h1>


<form  method="post" action="#">


<div class="container">
    <div class="row">
        <div class="col-sm-4">
            
            <label>Current Password</label>
            <div class="form-group pass_show"> 
                <input name="passwordold" type="password" class="form-control" placeholder="Current Password"> 
            </div> 


               <label>New Password</label>
            <div class="form-group pass_show"> 
                <input name="password" type="password"  class="form-control" placeholder="New Password"> 
            </div> 


               <label>Confirm Password</label>
            <div class="form-group pass_show"> 
                <input name="password_confirmation" type="password"  class="form-control" placeholder="Confirm Password"> 
            </div> 
            
            <button type="submit" class="btn btn-primary">Change PAssword</button>
        </div>  
    </div>
</div>
</form>

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