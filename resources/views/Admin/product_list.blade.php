@extends('layouts.admin_layout')

@section('content')



<div id="page-wrapper">
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Products</h1>
        </div>
        <div class="col-md-12">
        </div>
    </div>
    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong></strong> {{ Session::get('success') }}
        </div>
    @endif
    <div class="row">
        
        <div class="col-lg-12" style="padding-bottom: 10px;">
            <div style="background: #eee;padding: 10px;border:solid 1px #ddd;border-radius: 0.5em">
                
                <a class="btn btn-default" href="/admin/register_product">
                    <i class="fa fa-plus"></i>
                Add Product</a>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="fa fa-inbox fa-fw"></span> Product List
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table class="table table-responsive table-hover table-bordered" id="item_tbl" width="100%">
                        <thead>
                            <tr>
                                <th width="8%">&nbsp;</th>
                                <th width="10%">Product Name</th>
                                <th width="10%">Category</th>
                                <th width="10%">Product Stock</th>
                                <th width="10%">Product Price</th>
                                <th width="10%">Product Description</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($get_product as $product)
                            <tr>
                                <td style="vertical-align: middle;"><img src="{{ asset('image') }}/{{ $product->product_image }}" width="100" alt="Product Image"></td>
                                <td style="vertical-align: middle;"><center>{{ $product->product_name }}</center></td>
                                <td style="vertical-align: middle;"><center>{{ ucwords($product->cat->category_name) }}</center></td>
                                <td style="vertical-align: middle;"><center>{{ $product->product_stock }}</center></td>
                                <td style="vertical-align: middle;"><center>₱ {{ number_format($product->product_price) }}</center></td>
                                <td style="vertical-align: middle;"><center>{{ $product->product_description }}</center></td>
                                <td style="vertical-align: middle;">
                                    <div class="btn-group">
                                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                        Action <span class="caret"></span>
                                      </button>
                                      <ul class="dropdown-menu" role="menu">
                                        <li><a href="/admin/edit_product/{{ $product->product_id }}"><i class="fa fa-edit fa-fw"></i>Edit</a></li>
                                        <li><a href="/admin/add_stock/{{ $product->product_id }}"><i class="fa fa-plus fa-fw"></i>Stock</a></li>
                                        <li><a href="/admin/delete_product/{{ $product->product_id }}"><i class="fa fa-trash fa-fw"></i>Delete</a></li>
                                      </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach                           
                        </tbody>
                    </table>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>

@endsection