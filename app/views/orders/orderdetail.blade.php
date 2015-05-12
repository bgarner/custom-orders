<?php
Carbon::setToStringFormat('j F Y g:i a');
$customer = Customer::find( $order->customer );
?>

<style>
input[type="text"],
textarea {
    width:100%;
    padding: 0;
    border: 1px solid #ccc;
    }
</style>
@extends('template/masterlayout')

@section('title')
Order Detail &mdash; Order #{{ $order->id }} {{ $customer->first_name }} {{ $customer->last_name }}
@stop

@section('breadcrumb')
<li><a href="/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
<li><a href="/orders">Orders in Progress</a></li>
<li class="active"> @yield('title') </li>
@stop

@section('main')

<?php
    $staff = User::find($order->staff);
?>

<div class="row">
    <div class="col-md-12">
      <!-- The time line -->

      <ul class="timeline">
        <!-- timeline time label -->
        <li class="time-label">
        <?php
            switch( $order->status ){
                case 1: //new
                    $statusClass = "label-primary";
                    break;

                case 2: //recieved
                    $statusClass = "label-info";
                    break;

                case 3: //processed
                    $statusClass = "label-warning";
                    break;

                case 4: //in transit
                    $statusClass = "label-default";
                    break;

                case 5: //arrived
                    $statusClass = "label-success";
                    break;

                case 6: //completed
                    $statusClass = "label-completed";
                    break;

                default:
                    $statusClass = "label-primary";
                    break;
            }
        ?>
            <h3 class="pull-right">Order Status: <span class="label {{ $statusClass }}" id="order-status">{{ OrderStatus::lookUpStatus($order->status) }}</span></h3>

            <span class="bg-blue">
                &nbsp; <i class="fa fa-thumbs-up"></i> &nbsp; Order Placed on {{ $order->created_at }} by <a href="mailto:{{ $staff->email }}" style="color: #fff; font-weight: bold; text-decoration: underline;">{{ $staff->first_name }} {{ $staff->last_name }}</a>
            </span>

        </li>
        <!-- /.timeline-label -->
        @foreach( $ordertracking as $orderevent )

        <!-- timeline item -->
        <li>
        <?php
            switch( $orderevent->order_status_type ){

                case 1: //order sent
                    echo '<i class="fa fa-plus-circle bg-blue" data-toggle="tooltip" data-placement="top" title="Order Updated"></i>';
                    $status = "Order Sent";
                    break;

                case 2: // order viewed at head office
                    echo '<i class="fa fa-eye bg-aqua" data-toggle="tooltip" data-placement="top" title="Order Received at Head Office"></i>';
                    $status = "Order Received";
                    break;

                case 3: // order send to vendor
                    echo '<i class="fa fa-envelope bg-aqua" data-toggle="tooltip" data-placement="top" title="Order sent to Vendor"></i>';
                    $status = "Order Processed";
                    break;

                case 4: //posted message
                    echo '<i class="fa fa-comments bg-green" data-toggle="tooltip" data-placement="top" title="Message"></i>';
                    $status = "Posted Message";
                    break;

                case 5: // invoice issued
                    echo '<i class="fa fa-usd bg-aqua" data-toggle="tooltip" data-placement="top" title="Invoice Issued"></i>';
                    $status = "Invoice Issued";
                    break;

                case 6: //shipping info
                    echo '<i class="fa fa-ship bg-aqua" data-toggle="tooltip" data-placement="top" title="Order Shipped"></i>';
                    $status = "Order Shipped";
                    break;

                case 7: //question
                    echo '<i class="fa fa-question-circle bg-yellow" data-toggle="tooltip" data-placement="top" title="Question"></i>';
                    $status = "Question";
                    break;

                case 8: //question
                    echo '<i class="fa fa-exclamation-circle bg-red" data-toggle="tooltip" data-placement="top" title="Alert"></i>';
                    $status = "Alert";
                    break;

                case 9: //question
                    echo '<i class="fa fa-lock bg-black" data-toggle="tooltip" data-placement="top" title="Sale Completed"></i>';
                    $status = "Sale Completed";
                    break;

                default:
                    echo '<i class="fa fa-comments bg-yellow" data-toggle="tooltip" data-placement="top" title="Message Posted"></i>';
                    break;
            }

            $storeuser = User::find($orderevent->user);
        ?>
          <!-- -->
          <div class="timeline-item">
            <span class="time"><i class="fa fa-clock-o"></i> {{ $orderevent->created_at }}</span>
            <h3 class="timeline-header no-border"><!-- <span class="label label-default"><strong>{{ $status }}</strong></span>--><a href="mailto:{{ $storeuser->email }}">{{ $storeuser->first_name }} {{ $storeuser->last_name }}</a> {{ $orderevent->description }}</h3>
          </div>
        </li>
        <!-- END timeline item -->
        @endforeach

        <!-- END timeline item -->
        <li id="statusUpdateForm">
          <i class="fa fa-clock-o bg-gray"></i>
          <?php
            $statuses = Array();
            foreach($ordertrackingstatus as $status) {
                $statuses[$status->id] = $status->shortcode;
            }

            $orderstatus = Array();
            $orderstatus[0] = 'unchanged';
            foreach($orderstatustypes as $os) {
                $orderstatus[$os->id] = $os->status;
            }

          ?>
            <div class="timeline-item" style="padding-left: 20px; padding-bottom: 15px;">
                <form id="postOrderStatus">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Post an Update</h4>
                    </div>
                </div>

                <div class="row">
                    <input type="hidden" id="user" name="user" value="{{ Auth::user()->id }}" />
                    <input type="hidden" id="order_id" name="order_id" value="{{ $order->id }}" />
                    <div class="col-md-2">
                        {{ Form::label('status', 'Update Type') }}<br />
                        {{ Form::select('status', $statuses); }}<br />
                        <br />
                        {{ Form::label('orderstatus', 'Order Status') }}<br />
                        {{ Form::select('orderstatus', $orderstatus); }}<br />
                    </div>

                    <div class="col-md-8">
                        {{ Form::label('notes', 'Notes') }}<br />
                        <textarea name="notes" cols="100" rows="3" id="notes"></textarea>
                        <br />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">&nbsp;</div>
                </div>
                <div class="row">
                    <div class="col-md-2">

                    </div>
                    <div class="col-md-8">
                        {{ Form::checkbox('nbg_notify', 'value', false) }}
                        {{ Form::label('nbg_notify', 'Notify NBG') }}
                        &nbsp;&nbsp;&nbsp;
                        {{ Form::checkbox('smg_notify', 'value', false) }}
                        {{ Form::label('smg_notify', 'Notify SGM') }}
                        &nbsp;&nbsp;&nbsp;
                        {{ Form::checkbox('ho_notify', 'value', false) }}
                        {{ Form::label('ho_notify', 'Notify Head Office') }}

                        <br />
                        <button type="button" id="postOrderStatusSubmit" class="btn btn-primary btn-lg pull-right">Post</button>
                        <!-- {{ Form::submit('Post'); }} -->
                    </div>
                </div>
                </form>
            </div>
        </li>
      </ul>
    </div><!-- /.col -->
    </div>


<hr />
    <!-- {{ $order->id }} <br />
    {{ $order->customer }} <br />
    {{ $order->status }} <br />

    <hr /> -->


    <section class="invoice pad">
                              <!-- title row -->
                              <div class="row">
                                <div class="col-xs-12">
                                  <h2 class="page-header">
                                    <i class="fa fa-globe"></i> Invoice
                                    <small class="pull-right">Date: {{ $order->created_at }}</small>
                                  </h2>
                                </div><!-- /.col -->
                              </div>
                              <!-- info row -->
                              <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                  From
                                  <address>
                                    <strong>Sport Chek West Edmonton Mall</strong><br>
                                    795 Folsom Ave, Suite 600<br>
                                    San Francisco, CA 94107<br>
                                    Phone: (403) 123-5432<br>
                                    Email: info@almasaeedstudio.com
                                  </address>
                                </div><!-- /.col -->


                                <div class="col-sm-4 invoice-col">
                                  To
                                  <address>
                                    <strong>{{ $customer->first_name }} {{ $customer->last_name }}</strong><br>
                                    {{ $customer->address1 }}<br>
                                    {{ $customer->city }}, {{ $customer->province }} <br>
                                    {{ $customer->postal_code }}<br />
                                    Cell Phone: {{ $customer->cell_phone }}<br>
                                    Work Phone: {{ $customer->work_phone }}<br>
                                    Home Phone: {{ $customer->home_phone }}<br>
                                    Email: {{ $customer->email }}
                                  </address>
                                </div><!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                  <b>Invoice #007612</b><br>
                                  <br>
                                  <b>Order ID:</b> 4F3S8J<br>
                                  <b>Payment Due:</b> 2/22/2014<br>
                                  <b>Account:</b> 968-34567
                                </div><!-- /.col -->
                              </div><!-- /.row -->

                              <!-- Table row -->
                              <div class="row">
                                <div class="col-xs-12 table-responsive">
                                  <table class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th>Qty</th>
                                        <th>Product</th>
                                        <!-- <th>Product Number</th> -->
                                        <th>Description</th>
                                        <th>Customer Specs</th>
                                        <th>price</th>
                                        <th>Subtotal</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $total = array();
                                    ?>

                                    @foreach( $orderitems as $item )
                                    <?php
                                        $product = Product::find( $item->product );
                                        $brand = Brand::find( $product->brand );
                                        $cat = Category::find( $product->category );
                                        $subtotal = $item->quantity * $product->price;
                                        array_push($total, $subtotal);
                                    ?>

                                      <tr>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $brand->brand }} {{ $product->name }}</td>
                                        <!-- <td>455-981-221</td> -->
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td style="text-align: right;">${{ $product->price }}</td>
                                        <td style="text-align: right;">${{ $subtotal }}</td>
                                      </tr>

                                      @endforeach

                                    </tbody>
                                  </table>
                                </div><!-- /.col -->
                              </div><!-- /.row -->

                              <div class="row">
                                <!-- accepted payments column -->
                                <div class="col-xs-8">
                                  <p class="lead">Paid: 14 February 2015</p>

                                </div><!-- /.col -->
                                <div class="col-xs-4">

                                  <div class="table-responsive">
                                    <table class="table">
                                      <tbody><tr>
                                        <th style="width:50%">Subtotal:</th>

                                        <td style="text-align: right;">${{ array_sum($total) }}</td>
                                      </tr>
                                      <tr>
                                        <th>GST</th>
                                        <td style="text-align: right;">${{ array_sum($total) * .05 }}</td>
                                      </tr>
                                      <tr>
                                        <th>Shipping:</th>
                                        <td style="text-align: right;">-- </td>
                                      </tr>
                                      <tr>
                                        <th>Total:</th>
                                        <td style="text-align: right;">${{ array_sum($total) * 1.05 }}</td>
                                      </tr>
                                    </tbody></table>
                                  </div>
                                </div><!-- /.col -->
                              </div><!-- /.row -->

                              <!-- this row will not appear when printing -->
                              <div class="row no-print">
                                <div class="col-xs-12">
                                  <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>

                                  <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
                                </div>
                              </div>
                            </section>

    <!-- <table>
        <tr>
            <th>Category</th>
            <th>Brand</th>
            <th>Name</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Subtotal</th>
            <th>Product Desc.</th>
            <th>Customer Specs</th>
        </tr>
    @foreach( $orderitems as $item )
    <?php
        $product = Product::find( $item->product );
        $brand = Brand::find( $product->brand );
        $cat = Category::find( $product->category );
        $subtotal = $item->quantity * $product->price;
    ?>
        <tr>
            <td>{{ $cat->category_name }}</td>
            <td>{{ $brand->brand }}</td>
            <td>{{ $product->name }}</td>
            <td>${{ $product->price }}</td>
            <td>{{ $item->quantity }}</td>
            <td>${{ $subtotal }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $item->description }}</td>

        </tr>
    @endforeach
    </table> -->


@stop

@section('javascript')
<script src="/js/postOrderStatusUpdate.js" type="text/javascript"></script>
@stop
