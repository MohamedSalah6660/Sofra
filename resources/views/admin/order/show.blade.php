@extends('admin/layouts.app')
@section('title_page')

{{ $orders->clients->name }} 's Order

@endsection

@section('content')


       
                    

 @if ($message = Session::get('delete'))

    <div class="alert alert-danger">

        <p>{{ $message }}</p>

    </div>

@endif


  <h2 class="text-center">
Order Details #{{$orders->number  }} </h2>


<div class="container">
    <div class="row">


        <div class="col-sm-6">
            
Order From : {{ optional($orders->clients)->name }}

<br>
Phone : {{ optional($orders->clients)->phone }}

<br>
Address  : {{ optional($orders->clients)->home_description }}

<br>
Quarter :  {{ optional($orders->clients)->quarter }}

<br>
City :  {{ optional($orders->clients)->cities->name }}

<br>
Number : {{ $orders->number }}





            </div>

                <div class="col-sm-6">
            
Restauran : {{ $orders->restaurants->name }}

<br>
Delivery : {{ $orders->delivery }}

<br>
Cost : {{ $orders->cost }}
<br>
Total : {{ $orders->total }}

<br>
Commission : {{ $orders->commission }}

<br>
Net : {{ $orders->net }}


<br>
Notes : {{ $orders->notes }}


<br>
Payment Method : {{ $orders->payment_methods->name }}

<br>
Status : {{ $orders->status }}



            </div>
          </div>
        </div>

<hr>


<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th> Name</th>
        <th>Quantity</th>
        <th>Price</th>
      </tr>
    </thead>
    <tbody>
      
	@foreach($order_product as $product)
      <tr>
        <td>{{ $product->name }}</td>
        <td>{{ $product->pivot->quantity }}</td>
        <td>{{ $product->pivot->price }}</td>

      </tr>
     

@endforeach
    </tbody>
  </table>
</div>

<h2 class="text-center"> Total : {{ $orders->total }} Ryal</h2>




@endsection