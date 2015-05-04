
@extends('template/masterlayout')


@section('title')
Customer Details
@stop

@section('breadcrumb')
<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
<li><a href="/customers">Customers</a></li>
<li class="active"> @yield('title') </li>
@stop

@section('main')

<h3>{{ $customer ->first_name }} {{ $customer ->last_name }}</h3>

<table class="table">
    <tr>
        <td>
            <p>{{ $customer->address1 }}<br />
                @if ($customer->address2 != "" )

                    {{ $customer->address2 }}<br />

                @endif
                {{ $customer->city }}, {{ $customer->province }}<br />
                {{ $customer->postal_code }}<br />
            </p>
        </td>
        <td>
            <p>
                <strong>E-mail: </strong>{{ $customer->email }}<br />
                <strong>Home: </strong> {{ $customer->home_phone }}<br />
                <strong>Cell: </strong> {{ $customer->cell_phone }}<br />
                <strong>Work: </strong> {{ $customer->work_phone }}
            </p>
        </td>
    </tr>
</table>



<h3>Order History</h3>

  <table class="table table-hover">
    <tbody><tr>
      <th></th>
      <th>Order #</th>
      <th>Status</th>
      <th>Staff</th>
      <th>Date</th>
      <th>Description</th>
    </tr>

@foreach ( $orders as $order )
    <?php
        $staff = User::find( $order->staff );
        $status = OrderStatus::find( $order->status );

        switch( $status->status ){

            case "new":
                $statusLabelClass = "label-primary";
            break;

            case "recieved":
                $statusLabelClass = "label-info";
            break;

            case "processed":
                $statusLabelClass = "label-warning";
            break;

            case "in transit":
                $statusLabelClass = "label-default";
            break;

            case "arrived":
                $statusLabelClass = "label-success";
            break;

            default:
                $statusLabelClass = "label-primary";
            break;
        }

    ?>
    <tr>
        <td>
            <a href="/order/{{ $order->id }}">
            <button type="button" class="btn btn-default btn-xs">
                <span class="fa fa-eye" aria-hidden="true"></span> View
            </button>
            </a>
        </td>
        <td><a href="/order/{{ $order->id }}">{{ $order->id }}</a></td>
        <td><span class="label {{ $statusLabelClass }}">{{ $status->status }}</span></td>
        <td>{{ $staff->first_name }} {{ $staff->last_name }}</td>
        <td>{{ $order->created_at }}</td>
        <td>{{ str_limit($order->description, $limit = 60, $end = '...') }}</td>
    </tr>
@endforeach

    </tbody>
</table>


<div class="row">
    <div class="col-md-10">
        <div id="customerinfo" style="padding-top: 20px;"></div>
    </div>
</div>
@stop


@section('javascript')

@stop
