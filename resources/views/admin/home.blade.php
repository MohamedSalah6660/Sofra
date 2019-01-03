@extends('admin/layouts.app')
@inject('client', 'App\Client')
@inject('restaurant', 'App\Restaurant')
@inject('city', 'App\City')
@inject('order', 'App\Order')
@inject('category', 'App\Category')
@inject('contact', 'App\Contact')
@inject('offer', 'App\Offer')



@section('title')

Dashboard

@endsection


@section('small_title')

Home Page For Admin
   
@endsection

@section('content')



    <!-- Main content -->
    <section class="content">

<div class="row">
    <div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $client->count() }}</h3>

              <p>Count Of Clients</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ 'clients' }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>  

</div>
    <div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $restaurant->count() }}</h3>

              <p>Count Of Restaurants</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ 'restaurants' }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>  

</div>

    <div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $city->count() }}</h3>

              <p>Count Of Cities</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ 'cities' }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>  

</div>

    <div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $category->count() }}</h3>

              <p>Count Of Categories</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ 'categories' }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>  

</div>

    <div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $order->count() }}</h3>

              <p>Count Of Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ 'orders' }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>  

</div>

    <div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $offer->count() }}</h3>

              <p>Count Of Offers</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ 'offers' }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>  

</div>

    <div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $contact->count() }}</h3>

              <p>Count Of Contacts</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ 'contacts' }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>  

</div>




</div>




    </section>
@endsection
