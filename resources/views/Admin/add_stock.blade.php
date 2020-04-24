@extends('layouts.admin_layout')

@section('content')

<div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Stocks</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade in">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong></strong> {{ Session::get('success') }}
                            </div>
                        @endif
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Add Stock
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <form role="form" method="post" action="/admin/add_stock_trigger/{{ $id }}">
                                                @csrf
                                                <span class="error"></span> 
                                                <div class="form-group">
                                                    <label>Stock:</label>
                                                    <input type="text" name="stock" class="form-control">                                  
                                                </div>
                                                
                                                <button type="submit" name="submit" class="btn btn-success">Submit</button>
                                                
                                            </form>
                                        </div>
                                        <!-- /.col-lg-6 (nested) -->
                                        
                                        <!-- /.col-lg-6 (nested) -->
                                    </div>
                                    <!-- /.row (nested) -->
                                </div>
                                <!-- /.panel-body -->


                            </div>
                            <!-- /.panel -->

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Product Information
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                 
                                            <tbody>
                                            @foreach($data as $dats)    
                                                <tr>
                                                	<td><b>Product ID</b></td>
                                                	<td>{{ $dats->product_id }}</td>
                                                </tr> 
                                                <tr>
                                                	<td><b>Product Name</b></td>
                                                	<td>{{ $dats->product_name }}</td>
                                                </tr> 
                                                <tr>
                                                	<td><b>Product Price</b></td>
                                                	<td>₱ {{ number_format($dats->product_price) }}</td>
                                                </tr>
                                                <tr>
                                                	<td><b>Product Category</b></td>
                                                	<td>{{ $dats->product_category }}</td>
                                                </tr> 
                                                <tr>
                                                	<td><b>Product Stock</b></td>
                                                	<td>{{ $dats->product_stock }}</td>
                                                </tr>                 
                                            @endforeach   
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                    
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->


                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

@endsection            