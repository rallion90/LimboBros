<?php $Helper = new Helper;?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>@if($Helper::getOrderCount()>0) ({{ $Helper::getOrderCount() }}) @endif Limbo Bros</title>

        <!-- Bootstrap Core CSS -->
       <link href="{{ asset('admin_vendor/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- MetisMenu CSS -->
        <link href="{{ asset('admin_vendor/css/metisMenu.min.css') }}" rel="stylesheet">
        <!-- Timeline CSS -->
        <link href="{{ asset('admin_vendor/css/timeline.css') }}" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="{{ asset('admin_vendor/css/startmin.css') }}" rel="stylesheet">
        <!-- Morris Charts CSS -->
       
        <!-- Custom Fonts -->
        <link href="{{ asset('admin_vendor/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('admin_vendor/css/summary.css') }}" rel="stylesheet" type="text/css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>-->

        <style>
            .error{
                color:red;
            }
        </style>
    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">Limbo BROS</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="/admin/home"><i class="fa fa-home fa-fw"></i> Website</a></li>
                </ul>

                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown navbar-inverse">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                        
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-order fa-fw"></i>New Order from 
                                        <span class="pull-right text-muted small">{{ Carbon::now()->toDateTimeString() }}</span>
                                    </div>
                                </a>
                            </li>  
                            
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> {{ ucwords(Auth::guard('admin')->user()->admin_name) }} <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            
                            <li>
                                <a href="/admin/index"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="/admin/register_product"><i class="fa fa-list fa-fw"></i> Products</a>
                            </li>
                            <li>
                                <a href="/admin/product_list"><i class="fa fa-eye fa-fw"></i> View Products</a>
                            </li>
                            <li>
                                <a href="/admin/cash_on_delivery"><i class="fa fa-money fa-fw"></i> Cash on Delivery</a>
                            </li>
                            <li>
                                <a href="/admin/paypal"><i class="fa fa-paypal fa-fw"></i> Paypal</a>
                            </li>
                            <li>
                                <a href="/admin/succesful_order"><i class="fa fa-success fa-fw"></i> Succesful Orders</a>
                            </li>
                            
                            
                            <li>
                                <a href="/admin/category"><i class="fa fa-list-alt fa-fw"></i> Categories</a>
                            </li>
                            <li>
                                <a href="/admin/comments"><i class="fa fa-comment fa-fw"></i> Comments</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-table fa-fw"></i> Customer List</a>
                            </li>

                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i> Logout</a>

                            </li>
                            
                            
                            
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            @yield('content')
        </div>
        <!-- /#wrapper -->

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        <!-- jQuery -->
        <script src="{{ asset('admin_vendor/js/jquery.min.js') }}"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="{{ asset('admin_vendor/js/bootstrap.min.js') }}"></script>
        <!-- Metis Menu Plugin JavaScript -->
        <script src="{{ asset('admin_vendor/js/metisMenu.min.js') }}"></script>
        <!-- Morris Charts JavaScript -->
        
        
        <!-- Custom Theme JavaScript -->
        <script src="{{ asset('admin_vendor/js/startmin.js') }}"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/data.js"></script>
        <script src="https://code.highcharts.com/modules/drilldown.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>

        <script>
            CKEDITOR.replace('editor');
        </script>

        <script>
            // Create the chart
            Highcharts.chart('container', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Browser market shares. January, 2018'
                },
                subtitle: {
                    text: 'Click the columns to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
                },
                accessibility: {
                    announceNewData: {
                        enabled: true
                    }
                },
                xAxis: {
                    type: 'category'
                },
                yAxis: {
                    title: {
                        text: 'Total percent market share'
                    }

                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: '{point.y:.1f}'
                        }
                    }
                },

                tooltip: {
                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> of total<br/>'
                },

                series: [
                    {
                        name: "Browsers",
                        colorByPoint: true,
                        data: [
                            {
                                name: "Chrome",
                                y: 62.74,
                                drilldown: "Chrome"
                            },
                            {
                                name: "Firefox",
                                y: 10.57,
                                drilldown: "Firefox"
                            },
                            {
                                name: "Internet Explorer",
                                y: 7.23,
                                drilldown: "Internet Explorer"
                            },
                            {
                                name: "Safari",
                                y: 5.58,
                                drilldown: "Safari"
                            },
                            {
                                name: "Edge",
                                y: 4.02,
                                drilldown: "Edge"
                            },
                            {
                                name: "Other",
                                y: 7.62,
                                drilldown: null
                            }
                        ]
                    }
                ],
                drilldown: {
                    series: [
                        {
                            name: "Chrome",
                            id: "Chrome",
                            data: [
                                [
                                    "v65.0",
                                    0.1
                                ],
                                [
                                    "v64.0",
                                    1.3
                                ],
                                [
                                    "v63.0",
                                    53.02
                                ],
                                [
                                    "v62.0",
                                    1.4
                                ],
                                [
                                    "v61.0",
                                    0.88
                                ],
                                [
                                    "v60.0",
                                    0.56
                                ],
                                [
                                    "v59.0",
                                    0.45
                                ],
                                [
                                    "v58.0",
                                    0.49
                                ],
                                [
                                    "v57.0",
                                    0.32
                                ],
                                [
                                    "v56.0",
                                    0.29
                                ],
                                [
                                    "v55.0",
                                    0.79
                                ],
                                [
                                    "v54.0",
                                    0.18
                                ],
                                [
                                    "v51.0",
                                    0.13
                                ],
                                [
                                    "v49.0",
                                    2.16
                                ],
                                [
                                    "v48.0",
                                    0.13
                                ],
                                [
                                    "v47.0",
                                    0.11
                                ],
                                [
                                    "v43.0",
                                    0.17
                                ],
                                [
                                    "v29.0",
                                    0.26
                                ]
                            ]
                        },
                        {
                            name: "Firefox",
                            id: "Firefox",
                            data: [
                                [
                                    "v58.0",
                                    1.02
                                ],
                                [
                                    "v57.0",
                                    7.36
                                ],
                                [
                                    "v56.0",
                                    0.35
                                ],
                                [
                                    "v55.0",
                                    0.11
                                ],
                                [
                                    "v54.0",
                                    0.1
                                ],
                                [
                                    "v52.0",
                                    0.95
                                ],
                                [
                                    "v51.0",
                                    0.15
                                ],
                                [
                                    "v50.0",
                                    0.1
                                ],
                                [
                                    "v48.0",
                                    0.31
                                ],
                                [
                                    "v47.0",
                                    0.12
                                ]
                            ]
                        },
                        {
                            name: "Internet Explorer",
                            id: "Internet Explorer",
                            data: [
                                [
                                    "v11.0",
                                    6.2
                                ],
                                [
                                    "v10.0",
                                    0.29
                                ],
                                [
                                    "v9.0",
                                    0.27
                                ],
                                [
                                    "v8.0",
                                    0.47
                                ]
                            ]
                        },
                        {
                            name: "Safari",
                            id: "Safari",
                            data: [
                                [
                                    "v11.0",
                                    3.39
                                ],
                                [
                                    "v10.1",
                                    0.96
                                ],
                                [
                                    "v10.0",
                                    0.36
                                ],
                                [
                                    "v9.1",
                                    0.54
                                ],
                                [
                                    "v9.0",
                                    0.13
                                ],
                                [
                                    "v5.1",
                                    0.2
                                ]
                            ]
                        },
                        {
                            name: "Edge",
                            id: "Edge",
                            data: [
                                [
                                    "v16",
                                    2.6
                                ],
                                [
                                    "v15",
                                    0.92
                                ],
                                [
                                    "v14",
                                    0.4
                                ],
                                [
                                    "v13",
                                    0.1
                                ]
                            ]
                        }
                    ]
                }
            });
        </script>

        <script>
          $(function () {
            $('#item_tbl').DataTable({
              "pageLength": 3,
              "paging": true,
              "lengthChange": false,
              "searching": true,
              "ordering": true,
              "info": true,
              "autoWidth": false,
              "responsive": true
            });
          });
        </script>

        @foreach($Helper::lowStock() as $stock=>$value)
            
            <script>
                swal({
                    html: true,
                    title: "Product Running Out of Stock/Out of Stock",
                    text: "",
                    icon: "warning",
                });
            </script>
        @endforeach

        @foreach($Helper::PaypalPayment() as $paypalOrders)
            <script>
                swal({
                    html: true,
                    title: "New Paypal Orders",
                    text: "You have a new Paypal Orders",
                    icon: "info",
                });
            </script>
        @endforeach

        

    </body>
</html>