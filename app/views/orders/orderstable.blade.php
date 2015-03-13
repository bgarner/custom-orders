<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="http://code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link href="/css/style.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.html" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                <!-- AdminLTE -->
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->

                        <!-- Notifications: style can be found in dropdown.less -->

                        <!-- Tasks: style can be found in dropdown.less -->

                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>Matt McBride 314 </span>
                            </a>

                        </li>



                    </ul>
                    <a href="#" style="position: relative; top: 14px; right: 18px;" class="btn btn-xs btn-default">Sign out</a>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <!-- <div class="user-panel">
                        <div class="pull-left image">
                            <img src="../img/avatar3.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, Jane</p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div> -->
                    <!-- search form -->
                    <!-- <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form> -->
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li>
                            <a href="/dev/landing-page.html">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>

                        <li>
                            <a href="/dev/sales.html">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Sales</span>

                            </a>

                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-edit"></i> <span>New Order</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="/dev/clubs.html"><i class="fa fa-angle-double-right"></i> Clubs</a></li>
                                <li><a href="/dev/balls.html"><i class="fa fa-angle-double-right"></i> Balls</a></li>
                            </ul>
                        </li>
                        <li class="active">
                            <a href="/dev/orders.html">
                                <i class="fa fa-table"></i> <span>Orders in Progress</span>

                            </a>

                        </li>




                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Orders in Progress

                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Orders in Progress - this is coming from the view</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">



                    <div class="col-xs-12">
                                  <div class="box">
                                    <div class="box-header">
                                      <h3 class="box-title">February 2015</h3>
                                      <div class="box-tools">
                                        <div class="input-group">
                                          <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search">
                                          <div class="input-group-btn">
                                            <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                          </div>
                                        </div>
                                      </div>
                                    </div><!-- /.box-header -->
                                    <div class="box-body table-responsive no-padding">
                                      <table class="table table-hover">
                                        <tbody><tr>
                                          <th>Order #</th>
                                          <th>Customer Name</th>
                                          <th>Date</th>
                                          <th>Status</th>
                                          <th>Description</th>
                                        </tr>

                                        @foreach($orders as $order)

                                        <?php
                                            $customer = Customer::find( $order->customer );
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
                                            <td><a href="/order/{{ $order->id }}">{{ $order->id }}</a></td>
                                            <td><a href="/customer/{{ $customer->id }}">{{ $customer->first_name }} {{ $customer->last_name }}</a></td>
                                            <td>{{ $order->created_at }}</td>
                                            <td><span class="label {{ $statusLabelClass }}">{{ $status->status }}</span></td>
                                            <td>{{ $order->description }}</td>
                                        </tr>

                                        @endforeach


                                      </tbody></table>

                                      <?php echo $orders->links(); ?>

                                    </div><!-- /.box-body -->
                                  </div><!-- /.box -->
                                </div>


                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="/js/AdminLTE/app.js" type="text/javascript"></script>


    </body>
</html>
