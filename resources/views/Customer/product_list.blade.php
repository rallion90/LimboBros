@extends('layouts.customer_layout')
@section('content')

<?php $Helper = new Helper;?>
<!-- ================ category section start ================= -->
<section class="section-margin--small mb-5">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-5">
                <div class="sidebar-categories">
                    <div class="head">Browse Categories</div>
                    <ul class="main-categories">
                        <li class="common-filter">
                            <form action="#">
                            @foreach($Helper::category() as $category)    
                                <ul>
                                    
                                    <a href="/customer/products/{{  $category->category_id }}"><li class="filter-list">{{ ucwords($category->category_name) }}<span> <!--(3600)--></span></li></a>
                                </ul>
                            @endforeach    
                            </form>
                        </li>
                    </ul>
                </div>
                
            </div>
            <div class="col-xl-9 col-lg-8 col-md-7">
                <!-- Start Filter Bar -->
                <div class="filter-bar d-flex flex-wrap align-items-center">
                    <div class="sorting">
                        <select>
                            <option value="1">Default sorting</option>
                            <option value="1">Default sorting</option>
                            <option value="1">Default sorting</option>
                        </select>
                    </div>
                    <div class="sorting mr-auto">
                        <select>
                            <option value="1">Show 12</option>
                            <option value="1">Show 12</option>
                            <option value="1">Show 12</option>
                        </select>
                    </div>
                    <div>
                        <div class="input-group filter-bar-search">
                            <input type="text" placeholder="Search">
                            <div class="input-group-append">
                                <button type="button"><i class="ti-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Filter Bar -->
                <!-- Start Best Seller -->
                <section class="lattest-product-area pb-40 category-list">
                    <div class="row">
                    @foreach($get_product as $product)    
                        <div class="col-md-6 col-lg-4">
                            <div class="card text-center card-product">
                                <div class="card-product__img">
                                    <img class="card-img" src="{{ asset('image') }}/{{ $product->product_image }}" alt="">
                                    <ul class="card-product__imgOverlay">
                                        
                                        <li><button><i class="ti-shopping-cart"></i></button></li>
                                        <li><button><i class="ti-heart"></i></button></li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <p>{{ ucwords($product->cat->category_name) }}</p>
                                    <h4 class="card-product__title"><a href="/customer/product_details/{{ $product->product_id }}">{{ ucwords($product->product_name) }}</a></h4>
                                    <p class="card-product__price">₱{{ number_format($product->product_price) }}.00</p>
                                </div>
                            </div>
                        </div>
                    @endforeach    
                    </div>
                </section>
                <!-- End Best Seller -->
            </div>
        </div>
    </div>
</section>
<!-- ================ category section end ================= -->
@endsection