@extends('layouts.admin_layout')
@section('content')
<div id="page-wrapper">
	
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Orders</h1>
		</div>
		<div class="col-md-12">
		</div>
	</div>
	<div class="row">
		
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<span class="fa fa-inbox fa-fw"></span> Order Details
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<div class="float-left">
						
					</div>
					<div class="container">
						<div class="row">
							<!-- BEGIN INVOICE -->
							<div class="col-xs-12">
								<div class="grid invoice">
									<div class="grid-body">
										<div class="invoice-title">
											<div class="row">
												<div class="col-xs-12">
													
												</div>
											</div>
											<br>
											<div class="row">
												<div class="col-xs-12">
													<h2>Order Details<br>
													<span class="small">Order Number <strong>{{ $id }}</strong></span></h2>
												</div>
											</div>
										</div>
										<hr>
										<div class="row">
											<div class="col-xs-6">
												<address>
													<strong>Shipped To:</strong><br>
													<b>{{ ucwords($get_info->customer) }}</b><br>
													{{ ucwords($get_info->street) }}, {{ $get_info->barangay }}<br>
													{{ $get_info->municipality }}, {{ $get_info->province }}, Philippines<br>
												
											</address>
										</div>
										
								</div>
								<div class="row">
									<div class="col-xs-6">
										<address>
											<strong>Payment Method:</strong><br>
											@if($get_info->order_type == 1)
												{{ ucwords('Cash On Delivery') }}
											@else
												{{ ucwords('Paypal') }}
											@endif<br>
											{{ $get_info->email }}<br>
										</address>
									</div>
									
									<div class="col-xs-6 text-right">
										<address>
											<h3>Total </h3><br>
											₱{{ number_format($sum) }}.00
										</address>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<h3>ORDER SUMMARY</h3>
										<table class="table table-striped">
											<thead>
												<tr class="line">
													<td><strong>Item</strong></td>
													<td class="text-center"><strong>Quantity</strong></td>
													<td class="text-center"><strong>Price</strong></td>
													
													
												</tr>
											</thead>
											<tbody>
											@foreach($get_order as $order)
												<tr>	
													<td><strong>{{ ucwords($order->product_name) }}</strong></td>
													<td class="text-center">{{ $order->product_quantity }}</td>
													<td class="text-center">₱ {{ number_format($order->product_price) }}.00</td>
												</tr>
												
											@endforeach	
												
												</tbody>
											</table>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12 text-right identity">
											<a href="/admin/confirm_order/{{ $id }}" class="btn btn-success">Confirm Order</a>

											<button class="btn btn-danger">Reject Order</button>

										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- END INVOICE -->
					</div>
				</div>
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-12 -->
</div>
</div>
@endsection