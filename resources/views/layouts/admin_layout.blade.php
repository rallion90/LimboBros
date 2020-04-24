<?php $Helper = new Helper;?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Startmin - Bootstrap Admin Theme</title>

        <!-- Bootstrap Core CSS -->
       <link href="{{ asset('admin_vendor/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- MetisMenu CSS -->
        <link href="{{ asset('admin_vendor/css/metisMenu.min.css') }}" rel="stylesheet">
        <!-- Timeline CSS -->
        <link href="{{ asset('admin_vendor/css/timeline.css') }}" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="{{ asset('admin_vendor/css/startmin.css') }}" rel="stylesheet">
        <!-- Morris Charts CSS -->
        <link href="{{ asset('admin_vendor/css/morris.css') }}" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="{{ asset('admin_vendor/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
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
                                        <i class="fa fa-order fa-fw"></i> New Order
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>  
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> {{ ucwords(Auth::user()->name) }} <b class="caret"></b>
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
        <script src="{{ asset('admin_vendor/js/raphael.min.js') }}"></script>
        <script src="{{ asset('admin_vendor/js/morris.min.js') }}"></script>
        <script src="{{ asset('admin_vendor/js/morris-data.js') }}"></script>
        <!-- Custom Theme JavaScript -->
        <script src="{{ asset('admin_vendor/js/startmin.js') }}"></script>

        <script>
            CKEDITOR.replace('editor');
        </script>

        <script>
            tinymce.init({
                selector: '#editor'
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

        

        <script>
          window.onload = function() {
 
          var dataPoints = [];
           
          var chart = new CanvasJS.Chart("chartContainer", {
            click: visitorsChartDrilldownHandler,
            animationEnabled: true,
            theme: "light2",
            title: {
              text: "Daily Sales Data"
            },
            axisY: {
              title: "Units",
              titleFontSize: 24
            },
            data: [{
              type: "column",
              yValueFormatString: "#,### Units",
              dataPoints: dataPoints
            }]
          });
           
          function addData(data) {
            for (var i = 0; i < data.length; i++) {
              dataPoints.push({
                x: new Date(data[i].date),
                y: data[i].units
              });
            }
            chart.render();
           
          }
           
          $.getJSON("https://canvasjs.com/data/gallery/javascript/daily-sales-data.json", addData);
           
          }
        </script>

    </body>
</html>