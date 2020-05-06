@extends('layouts.customer_layout')
@section('content')
<br>
<main class="site-main">

	<div class="container">
	@foreach($orders as $order)
	<br>	
		<div class="card">
		  <h5 class="card-header">#{{ $order->order_number }}
		  @if($order->order_status == 0) 
		  	<p class="float-right">(Pending)</p>
		  @elseif($order->order_status == 1)
		  	<p class="float-right">(On Delivery)</p>
		  @else
			<p class="float-right">(Delivered)</p>
		  @endif	
		  </h5>

		  <div class="card-body">
		  	
		  	<div class="col-md-9">
			    <h5 class="card-title">{{ ucwords($order->product_name) }}</h5>
			    <p class="card-text">Qty: {{ $order->product_quantity }}</p>
			    <a href="#" class="btn btn-primary">View Information</a>
			</div>    
		  </div>
		</div>
	@endforeach	
	</div>	
	<section class="subscribe-position">
		<div class="container">
			<div class="subscribe text-center">
				<h3 class="subscribe__title">Get Update From Anywhere</h3>
				<p>Bearing Void gathering light light his eavening unto dont afraid</p>
				<div id="mc_embed_signup">
					<form target="_blank" action="#" method="get" class="subscribe-form form-inline mt-5 pt-1">
						<div class="form-group ml-sm-auto">
							<input class="form-control mb-1" type="email" name="EMAIL" placeholder="Enter your email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '" >
							<div class="info"></div>
						</div>
						<button class="button button-subscribe mr-auto mb-1" type="submit">Subscribe Now</button>
						<div style="position: absolute; left: -5000px;">
							<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
						</div>
					</form>
				</div>
				
			</div>
		</div>
	</section>
	<!-- ================ Subscribe section end ================= -->
</main>
@endsection