@extends('layouts.customer_layout')
@section('content')
<div class="container">
	<div class="row shop-tracking-status">	
		<div class="col-md-12">
			<div class="well">
				
				
				<section class="tracking_box_area section-margin--small">
					<div class="container">
						<div class="tracking_box_inner">
							<p>To track your order please enter your Order Number in the box below and press the "Track" button. This
							was given to you on your confirmation email you should have received.</p>
							<form class="row tracking_form" action="{{ route('customer.trackingTrigger') }}" method="post" novalidate="novalidate">
								@csrf
								<div class="col-md-12 form-group">
									<input type="text" class="form-control" id="order" name="order_number" placeholder="Order ID" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Order ID'">
								</div>
								<div class="col-md-12 form-group">
									<input type="email" class="form-control" id="email" name="email" placeholder="Billing Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Billing Email Address'">
								</div>
								<div class="col-md-12 form-group">
									<button type="submit" value="submit" class="button button-tracking">Track Order</button>
								</div>
							</form>
						</div>
					</div>
				</section>
				<div class="jumbotron">
					<h2>Your order status:</h2>
					<br>
				@foreach($orders as $order)	
					<ul class="list-group">
						<li class="list-group-item">
							<span class="prefix"><b>Est. Date of Delivery:</b>
							@if($order->order_type  == 1)	
								<p class="float-right"><strong>Cash on Delivery</strong></p>
							@else
								<p class="float-right"><strong>Paypal</strong></p>
							@endif	
							</span>
							<span class="label label-success"><strong>{{ Carbon::parse($order->created_at)->addDays(2)->toDateString() }}</strong></span>
						</li>
						<li class="list-group-item">
							<span class="prefix"><b>Order Status:</b></span>
						@if($order->order_status == 0)	
							<span class="label label-success">(Pending)</span>
						@elseif($order->order_status == 1)	
							<span class="label label-success">(On Delivery)</span>
						@else
							<span class="label label-success"><strong>(Delivered)</strong></span>
						@endif	
						</li>
						<li class="list-group-item">
							<b>Order Details:</b>
							<table class="table table-borderless">
								<thead>
									<tr>
										
										<th scope="col">Product Name</th>
										<th scope="col">Product Quantity</th>
										<th scope="col">Product Price</th>
									</tr>
								</thead>
								<tbody>
								<?php
									$total = 0;
								?>
								@foreach($items as $order_details)
									<?php
										$total += ($order_details->product_quantity * $order_details->product_price);
									?> 
									<tr>
										<td>{{ $order_details->product_name }}</td>
										<td>{{ $order_details->product_quantity }}</td>
										<td>₱{{ number_format($order_details->product_price) }}.00</td>
									</tr>
								@endforeach
								</tbody>
							</table>
						</li>
						<li class="list-group-item"><b>Shipping Fee:</b>  </li>
						<li class="list-group-item"><b>Total Amount:</b> ₱ {{ number_format($total) }}.00&nbsp; <span style="color:Red">*Please Pay Exact Amount During Shipping</span></li>
					</ul>
				@endforeach	
				</div>
			</div>
		</div>
	</div>
</div>	
@endsection