@extends('template/masterlayout')

@section('title')
New Order Form
@stop

@section('breadcrumb')
<li><a href="/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
<li><a href="/orders">Orders</a></li>
<li class="active"> @yield('title') </li>
@stop

@section('main')


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

<?php
$cat = Array();
$cat[0] = "Select a Product Category";
foreach($categories as $c) {
    $cat[$c->id] = $c->category_name;
}
?>
<div class="box">
    <div class="box-header with-border">
        <h1 class="box-title">Select a Product</h1>

        {{ Form::select('categories', $cat, null, array('class' => 'form-control brandLookupByCategory', 'id' => 'categories')) }}<br />
        <div id="brandSelectDiv"></div>
        <div id="productSelectDiv"></div>
        <div id="customOptions"></div>

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


@stop

@section('javascript')
<script src="http://objx.googlecode.com/files/objx-2.3.6.js" type="text/javascript"></script>
<script src="/js/getBrandsInCategory.js" type="text/javascript"></script>
<script src="/js/getProducts.js" type="text/javascript"></script>
<script src="/js/getCustomOrderFormOptionsForProduct.js" type="text/javascript"></script>

<script type="text/javascript">
    var queries = {{ json_encode(DB::getQueryLog()) }};
    console.log('/****************************** Database Queries ******************************/');
    console.log(' ');
    $.each(queries, function(id, query) {
        console.log('   ' + query.time + ' | ' + query.query + ' | ' + query.bindings[0]);
    });
    console.log(' ');
    console.log('/****************************** End Queries ***********************************/');
</script>

@stop
