@extends('layouts.customer_layout')
@section('content')
<!--================Single Product Area =================-->
<div class="product_image_area">
	<div class="container">
		<div class="row s_product_inner">
			<div class="col-lg-6">
				<div class="owl-carousel owl-theme s_Product_carousel">
					<div class="single-prd-item">
						<img class="img-fluid" src="{{ asset('image') }}/{{ $get_product->product_image }}" alt="">
					</div>
					<!-- <div class="single-prd-item">
									<img class="img-fluid" src="img/category/s-p1.jpg" alt="">
					</div>
					<div class="single-prd-item">
									<img class="img-fluid" src="img/category/s-p1.jpg" alt="">
					</div> -->
				</div>
			</div>
			<div class="col-lg-5 offset-lg-1">
				<div class="s_product_text">
					<h3>{{ ucwords($get_product->product_name) }}</h3>
					<h2>₱{{ number_format($get_product->product_price) }}.00</h2>
					<ul class="list">
						<li><a class="active" href="#"><span>Category</span> : {{ ucwords($get_product->product_category) }}</a></li>
						<li><a href="#"><span>Availibility</span> : In Stock</a></li>
					</ul>
					<p>
						Length: {{ ucwords($get_product->product_length) }}.00 cm <br>
						Width: {{ ucwords($get_product->product_width) }}.00 cm <br>
						Weight: {{ ucwords($get_product->product_weight) }}.00 cm
					</p>
					<p>{{ ucwords($get_product->product_description) }}</p>
					@if(Session::has('addSuccess'))
					<span onload="addCartSuccess()"></span>
					@endif
					<form method="post" action="{{ route('customer.addCart') }}">
						@csrf
						<!-- Hidden Fields-->
						
						<input type="hidden" name="product_id" id="product_id" value="{{ $get_product->product_id }}">
						<input type="hidden" name="product_name" id="product_name" value="{{ $get_product->product_name }}">
						<input type="hidden" name="product_price" id="product_price" value="{{ $get_product->product_price }}">
						<div class="product_count">
							<label for="qty">Quantity:</label>
							
							<input type="number" name="product_quantity" id="product_quantity" size="2" min="1" maxlength="12" value="1" title="Quantity:" class="input-text qty">
							
							<button class="btn btn-primary" id="addCart">Add to Cart</button>
						</div>
					</form>
					<div class="card_area d-flex align-items-center">
						<a class="icon_btn" href="#"><i class="lnr lnr lnr-diamond"></i></a>
						<a class="icon_btn" href="#"><i class="lnr lnr lnr-heart"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--================End Single Product Area =================-->
<!--================Product Description Area =================-->
<!--================ Start related Product area =================-->
<section class="related-product-area section-margin--small mt-0">
	<div class="container">
		<div class="section-intro pb-60px">
			<p>Product in the Same Category</p>
			<h2>Top <span class="section-intro__style">Product</span></h2>
		</div>
		<div class="row mt-30">
			<div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
				<div class="single-search-product-wrapper">
				@foreach($related_product as $related)		
					<div class="single-search-product d-flex">
						<a href="#"><img src="{{ asset('image') }}/{{ $related->product_image }}" alt=""></a>
						<div class="desc">
							<a href="#" class="title">{{ ucwords($related->product_name) }}</a>
							<div class="price">${{ ucwords($related->product_price) }}</div>
						</div>
					</div>
					
				@endforeach	
				</div>
			</div>
			
			
		</div>
	</div>
</section>
<!--================ end related Product area =================-->

@endsection