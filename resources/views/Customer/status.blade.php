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
							<form class="row tracking_form" action="#" method="post" novalidate="novalidate">
								<div class="col-md-12 form-group">
									<input type="text" class="form-control" id="order" name="order" placeholder="Order ID" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Order ID'">
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
				<h4>Your order status:</h4>
				<ul class="list-group">
					<li class="list-group-item">
						<span class="prefix">Date created:</span>
						<span class="label label-success">12.12.2013</span>
					</li>
					<li class="list-group-item">
						<span class="prefix">Last update:</span>
						<span class="label label-success">12.15.2013</span>
					</li>
					<li class="list-group-item">
						<span class="prefix">Comment:</span>
						<span class="label label-success">customer's comment goes here</span>
					</li>
					<li class="list-group-item">You can find out latest status of your order with the following link:</li>
					<li class="list-group-item"><a href="#">
						Click here to view your Items	
					</a></li>
				</ul>
				<div class="order-status">
					<div class="order-status-timeline">
						<!-- class names: c0 c1 c2 c3 and c4 -->
						<div class="order-status-timeline-completion c4"></div>
					</div>
					<div class="image-order-status image-order-status-new active img-circle">
						<span class="status">Accepted</span>
						<div class="icon"></div>
					</div>
					<div class="image-order-status image-order-status-active active img-circle">
						<span class="status">In progress</span>
						<div class="icon"></div>
					</div>
					<div class="image-order-status image-order-status-intransit active img-circle">
						<span class="status">Shipped</span>
						<div class="icon"></div>
					</div>
					<div class="image-order-status image-order-status-delivered  active img-circle">
						<span class="status">Delivered</span>
						<div class="icon"></div>
					</div>
					<div class="image-order-status image-order-status-completed active img-circle">
						<span class="status">Completed</span>
						<div class="icon"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	
@endsection