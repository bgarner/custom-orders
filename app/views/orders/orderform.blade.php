@extends('template/masterlayout')

@section('title')
New Order Form
@stop

@section('breadcrumb')
<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
<li><a href="/orders">Orders</a></li>
<li class="active"> @yield('title') </li>
@stop

@section('main')

{{ Form::open(array('url' => 'foo/bar')) }}
<div class="box">
    <!-- <div class='box-header with-border pad'>
        <h1>{{ $customer->first_name }} {{ $customer->last_name }}</h1>
    </div> -->

    <div class="box-body">
        <div class="box-tools pull-right">
            <?php $today = date("F j, Y, g:i a"); echo $today; ?>
        </div>
        <strong>{{ $customer->first_name }} {{ $customer->last_name }}</strong><br />
        {{ $customer->address1 }}<br />
        {{ $customer->address2 }}<br />
        {{ $customer->city }}, {{ $customer->province }}  {{ $customer->postal_code }}<br />
        <strong>Home:</strong> {{ $customer->home_phone }}<br />
        <strong>Work:</strong> {{ $customer->work_phone }}<br />
        <strong>Cell:</strong> {{ $customer->cell_phone }}<br />
        <strong>Email:</strong> <a href="mailto:{{ $customer->email }}">{{ $customer->email }}</a><br />
    </div>
</div>

<div class="box">
    <div class="box-header with-border">
        <h1 class="box-title">Item 1</h1>

    </div>
</div>


<div class="box">
    <div class="box-header with-border">
        <h1 class="box-title">Add an Item</h1>
        <div class="box-tools pull-right">
            <i style="font-size: 40px;" class="fa fa-plus-circle"></i>
        </div>
    </div>
</div>

{{ Form::close() }}
@stop
