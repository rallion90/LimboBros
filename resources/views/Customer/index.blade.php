@extends('layouts.customer_layout')
@section('content')


<!--================ Hero banner start =================-->
<main class="site-main">
    <section class="hero-banner">
        <div class="container">
            <div class="row no-gutters align-items-center pt-60px">
                <div class="col-5 d-none d-sm-block">
                    <div class="hero-banner__img">
                        <img class="img-fluid" src="{{ asset('products/products1.jpg') }}" height="500px" alt="">
                    </div>
                </div>
                <div class="col-sm-7 col-lg-6 offset-lg-1 pl-4 pl-md-5 pl-lg-0">
                    <div class="hero-banner__content">
                        <h4>Shop is fun</h4>
                        <h1>Browse Our Premium Product</h1>
                        <p>Us which over of signs divide dominion deep fill bring they're meat beho upon own earth without morning over third. Their male dry. They are great appear whose land fly grass.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ Hero banner start =================-->
    <!--================ Hero Carousel start =================-->
    
    <!--================ Hero Carousel end =================-->
    <!-- ================ trending product section start ================= -->
    <section class="section-margin calc-60px">
        <div class="container">
            <div class="section-intro pb-60px">
                <p>Active Product in the Market</p>
                <h2><span class="section-intro__style">Product</span></h2>
            </div>
            <div class="row">
            @foreach($active_product as $product)    
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card text-center card-product">
                        <div class="card-product__img">
                            <img class="card-img" src="{{ asset('image') }}/{{ $product->product_image }}" alt="">
                        @if(Auth::guard('customer')->check())    
                            <ul class="card-product__imgOverlay">
                                <li><a href="#"><i class="ti-shopping-cart"></i></a></li>
                                <li><a href="#"><i class="ti-heart"></i></a></li>
                            </ul>
                        @else
                            <ul class="card-product__imgOverlay">
                                <li><a href="{{ route('customer.login') }}"><i class="ti-shopping-cart"></i></a></li>
                                <li><a href="{{ route('customer.login') }}"><i class="ti-heart"></i></a></li>
                            </ul> 
                        @endif    
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
        </div>
    </section>
    <!-- ================ trending product section end ================= -->
    <!-- ================ offer section start ================= -->
    <!--<section class="offer" id="parallax-1" data-anchor-target="#parallax-1" data-300-top="background-position: 20px 30px" data-top-bottom="background-position: 0 20px">
        <div class="container">
            <div class="row">
                <div class="col-xl-5">
                    <div class="offer__content text-center">
                        <h3>Up To 50% Off</h3>
                        <h4>Winter Sale</h4>
                        <p>Him she'd let them sixth saw light</p>
                        <a class="button button--active mt-3 mt-xl-4" href="#">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>-->
    <!-- ================ offer section end ================= -->
    <!-- ================ Best Selling item  carousel ================= -->
    <!--<section class="section-margin calc-60px">
        <div class="container">
            <div class="section-intro pb-60px">
                <p>Popular Item in the market</p>
                <h2>Best <span class="section-intro__style">Sellers</span></h2>
            </div>
            <div class="owl-carousel owl-theme" id="bestSellerCarousel">
                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="{{ asset('customer_vendor/img/product/product1.png') }}" alt="">
                        <ul class="card-product__imgOverlay">
                            <li><button><i class="ti-search"></i></button></li>
                            <li><button><i class="ti-shopping-cart"></i></button></li>
                            <li><button><i class="ti-heart"></i></button></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <p>Accessories</p>
                        <h4 class="card-product__title"><a href="single-product.html">Quartz Belt Watch</a></h4>
                        <p class="card-product__price">$150.00</p>
                    </div>
                </div>
                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="{{ asset('customer_vendor/img/product/product2.png') }}" alt="">
                        <ul class="card-product__imgOverlay">
                            <li><button><i class="ti-search"></i></button></li>
                            <li><button><i class="ti-shopping-cart"></i></button></li>
                            <li><button><i class="ti-heart"></i></button></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <p>Beauty</p>
                        <h4 class="card-product__title"><a href="single-product.html">Women Freshwash</a></h4>
                        <p class="card-product__price">$150.00</p>
                    </div>
                </div>
                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="{{ asset('customer_vendor/img/product/product3.png') }}" alt="">
                        <ul class="card-product__imgOverlay">
                            <li><button><i class="ti-search"></i></button></li>
                            <li><button><i class="ti-shopping-cart"></i></button></li>
                            <li><button><i class="ti-heart"></i></button></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <p>Decor</p>
                        <h4 class="card-product__title"><a href="single-product.html">Room Flash Light</a></h4>
                        <p class="card-product__price">$150.00</p>
                    </div>
                </div>
                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="{{ asset('customer_vendor/img/product/product4.png') }}" alt="">
                        <ul class="card-product__imgOverlay">
                            <li><button><i class="ti-search"></i></button></li>
                            <li><button><i class="ti-shopping-cart"></i></button></li>
                            <li><button><i class="ti-heart"></i></button></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <p>Decor</p>
                        <h4 class="card-product__title"><a href="single-product.html">Room Flash Light</a></h4>
                        <p class="card-product__price">$150.00</p>
                    </div>
                </div>
                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="{{ asset('customer_vendor/img/product/product1.png') }}" alt="">
                        <ul class="card-product__imgOverlay">
                            <li><button><i class="ti-search"></i></button></li>
                            <li><button><i class="ti-shopping-cart"></i></button></li>
                            <li><button><i class="ti-heart"></i></button></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <p>Accessories</p>
                        <h4 class="card-product__title"><a href="single-product.html">Quartz Belt Watch</a></h4>
                        <p class="card-product__price">$150.00</p>
                    </div>
                </div>
                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="{{ asset('customer_vendor/img/product/product2.png') }}" alt="">
                        <ul class="card-product__imgOverlay">
                            <li><button><i class="ti-search"></i></button></li>
                            <li><button><i class="ti-shopping-cart"></i></button></li>
                            <li><button><i class="ti-heart"></i></button></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <p>Beauty</p>
                        <h4 class="card-product__title"><a href="single-product.html">Women Freshwash</a></h4>
                        <p class="card-product__price">$150.00</p>
                    </div>
                </div>
                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="{{ asset('customer_vendor/img/product/product3.png') }}" alt="">
                        <ul class="card-product__imgOverlay">
                            <li><button><i class="ti-search"></i></button></li>
                            <li><button><i class="ti-shopping-cart"></i></button></li>
                            <li><button><i class="ti-heart"></i></button></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <p>Decor</p>
                        <h4 class="card-product__title"><a href="single-product.html">Room Flash Light</a></h4>
                        <p class="card-product__price">$150.00</p>
                    </div>
                </div>
                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="{{ asset('customer_vendor/img/product/product4.png') }}" alt="">
                        <ul class="card-product__imgOverlay">
                            <li><button><i class="ti-search"></i></button></li>
                            <li><button><i class="ti-shopping-cart"></i></button></li>
                            <li><button><i class="ti-heart"></i></button></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <p>Decor</p>
                        <h4 class="card-product__title"><a href="single-product.html">Room Flash Light</a></h4>
                        <p class="card-product__price">$150.00</p>
                    </div>
                </div>
            </div>
        </div>
    </section>-->
    <!-- ================ Best Selling item  carousel end ================= -->
    <!-- ================ Blog section start ================= -->
    
    <!-- ================ Blog section end ================= -->
    <!-- ================ Subscribe section start ================= -->
    
    <!-- ================ Subscribe section end ================= -->
</main>

@endsection