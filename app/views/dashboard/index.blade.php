@extends('template/masterlayout')

@section('title')
Dashboard
@stop

@section('breadcrumb')
<li><a href="/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active"> @yield('title') </li>
@stop


<?php
    $orderCount = Order::getCountofOrdersInProgress( Auth::user()->store );
?>
@section('main')
    <div class="row">
            <div class="col-lg-4 col-xs-3">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>Orders</h3>
                  <p>{{ $orderCount }} in progress</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="/orders" class="small-box-footer">View Orders <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->

            <div class="col-lg-4 col-xs-3">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>New Order</h3>
                  <p>&nbsp;</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="/order/new" class="small-box-footer">Begin New Order <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->


            <div class="col-lg-4 col-xs-3">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>Sales</h3>
                  <p>&nbsp;</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="/dev/sales.html" class="small-box-footer">View Sales Data <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->


          </div>


@stop
