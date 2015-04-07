@extends('template/masterlayout')

@section('title')
Order Detail
@stop

@section('breadcrumb')
<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
<li><a href="/orders">Orders in Progress</a></li>
<li class="active"> @yield('title') </li>
@stop

@section('main')

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

                                <?php
                                $customer = Customer::find( $order->customer );
                                ?>
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
