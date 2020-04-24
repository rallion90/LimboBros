@extends('layouts.admin_layout')

@section('content')

<div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Edit Product</h1>
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
                                    Edit Product
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                        @foreach($get_product as $product)    
                                            <form role="form" method="post" enctype="multipart/form-data" action="/admin/edit_product_trigger">
                                                @csrf
                                                <div class="form-group">
                                                    <label>File input</label>
                                                    <input type="file" name="product_image">
                                                </div>
                                                <span class="error"></span>
                                                <div class="form-group">
                                                    <label>Item Name:</label>
                                                    <input type="text" class="form-control" name="item_name" value="{{ $product->product_name }}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Category:</label>
                                                    <select class="form-control" name="category">
                                                       
                                                        <option value="{{ $product->product_category }}">{{ $product->product_category }}</option>
                                                       
                                                    </select>
                                                </div>
                                                <span class="error"></span>
                                                <div class="form-group">
                                                    <label>Stock:</label>
                                                    <input type="text" class="form-control" name="stock" value="{{ $product->product_stock }}">
                                                </div>
                                                <span class="error"></span>
                                                <div class="form-group">

                                                    <label>Price:</label>
                                                    <input type="text" class="form-control" name="price" value="{{ $product->product_price }}">
                                                </div>
                                                <span class="error"></span>
                                                <div class="form-group">
                                                    <label>Length: (cm)</label>
                                                    <input type="text" class="form-control" name="length" value="{{ $product->product_length }}">
                                                </div>
                                                <span class="error"></span>
                                                <div class="form-group">
                                                    <label>Width: (cm)</label>
                                                    <input type="text" class="form-control" name="width" value="{{ $product->product_width }}">
                                                </div>
                                                <span class="error"></span>
                                                <div class="form-group">
                                                    <label>Weight: (kg)</label>
                                                    <input type="text" class="form-control" name="weight" value="{{ $product->product_weight }}">
                                                </div>
                                                <span class="error"></span>
                                                <div class="form-group">
                                                    <label>Description:</label>
                                                    <textarea class="form-control" name="editor" id="editor"  rows="3"></textarea>
                                                </div>     
                                                
                                                <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                                                <button type="submit" name="submit" class="btn btn-default">Edit Product</button>
                                                
                                            </form>
                                        @endforeach    
                                        </div>
                                        <!-- /.col-lg-6 (nested) -->
                                        
                                        <!-- /.col-lg-6 (nested) -->
                                    </div>
                                    <!-- /.row (nested) -->
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