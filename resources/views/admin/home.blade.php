@extends('admin/layouts.app')
@inject('client', 'App\Client')



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
            <a href="{{ 'admin/client' }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>  

</div>
</div>




    </section>
@endsection
