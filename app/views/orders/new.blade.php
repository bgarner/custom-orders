@extends('template/masterlayout')

@section('title')
New Order
@stop

@section('breadcrumb')
<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
<li><a href="/orders">Orders</a></li>
<li class="active"> @yield('title') </li>
@stop

@section('main')
<script>

function showNewCustomerForm()
{
    $( "#newCustomerForm" ).hide();
    $( "#existingCustomerForm" ).hide();

    $( "#newCustomerForm" ).show();
}

function showExisitngCustomerForm()
{
    $( "#newCustomerForm" ).hide();
    $( "#existingCustomerForm" ).hide();

    $( "#existingCustomerForm" ).show();
}

</script>

<h3>Customer Information</h3>
<button class="red" onclick="javascript:showNewCustomerForm();">New Customer</button> <strong>&nbsp;&nbsp;&nbsp;OR&nbsp;&nbsp;&nbsp;</strong>
<button onclick="javascript:showExisitngCustomerForm();">Returning Customer</button>

<form id="newCustomerForm" style="display: none;">

    <div class="row">
        <div class="col-md-12">
            <br />
            <h4>Customer Name</h4>
        </div>
        <div class="col-md-2">
            <label class="form-label">Prefix</label>
            <select class="form-control">
                <option value="Mr.">Mr.</option>
                <option value="Mrs.">Mrs.</option>
                <option value="Ms.">Ms.</option>
                <option value="Dr.">Dr.</option>
            </select>
        </div>

        <div class="col-md-4">
            <label class="form-label"><span class="req">*</span> First Name</label> <input type="text" class="form-control" id="first_name" name="first_name" />
        </div>
        <div class="col-md-4">
            <label class="form-label"><span class="req">*</span> Last Name</label> <input type="text" class="form-control" id="last_name" name="last_name" />
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-md-5">
            <h4>Address</h4>
            <label class="form-label"><span class="req">*</span> Address 1</label>
            <input type="text" class="form-control" id="address1" name="address1" />

            <label class="form-label">Address 2</label>
            <input type="text" class="form-control" id="address2" name="address2" />

            <label class="form-label"><span class="req">*</span> City</label>
            <input type="text" class="form-control" id="city" name="city" />

            <label class="form-label"><span class="req">*</span> Province</label>
            <input type="text" class="form-control" id="province" name="province" />

            <label class="form-label"><span class="req">*</span> Postal Code</label>
            <input type="text" class="form-control" id="postal_code" name="postal_code" />
        </div>

        <div class="col-md-5">
            <h4>E-mail &amp; Phone</h4>
            <label class="form-label"><span class="req">*</span> E-mail</label>
            <input type="text" class="form-control" id="email" name="email" />

            <label class="form-label"><span class="req">*</span> Home Phone</label>
            <input type="text" class="form-control" id="home_phone" name="home_phone" />

            <label class="form-label">Work Phone</label>
            <input type="text" class="form-control" id="work_phone" name="work_phone" />

            <label class="form-label">Cell Phone</label>
            <input type="text" class="form-control" id="cell_phone" name="cell_phone" />
        </div>
    </div>



</form>


<form id="existingCustomerForm" style="display: none;">
    <div class="row">
        <div class="col-md-10">
            <br />
            <h4>Returning Customer</h4>
            <label class="form-label">E-mail Address</label>
            <input type="text" style="width:200px;" id="returningCustomerEmail" name="returningCustomerEmail" />
            <button class="" id="existingCustomerFormSubmit">Look Up</button>
        </div>
    </div>
</form>

<div class="row">
    <div class="col-md-10">
        <div id="customerinfo" style="padding-top: 20px;"></div>
    </div>
</div>
@stop

@section('javascript')
<script src="/js/customerLookUp.js" type="text/javascript"></script>
@stop
