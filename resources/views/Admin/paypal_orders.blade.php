@extends('layouts.admin_layout')
@section('content')
<div id="page-wrapper">
	
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Paypal Payments</h1>
		</div>
		<div class="col-md-12">
		</div>
	</div>
	<div class="row">
		
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					 <i class="fa fa-paypal fa-5x"> Paypal</i>
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<div class="col-md-6">	
						<div class="float-left">
							
						</div>
						<h3><strong>Pending</strong></h3>
						<table class="table table-responsive table-hover table-bordered" id="item_tbl" width="100%">
							<thead>
								<tr>
									<th width="8%">Order Number</th>
									
									<th width="10%"></th>

								</tr>
							</thead>
							<tbody>
							
							@foreach($get_paypal as $paypal)
								<tr>
									<td style="vertical-align: middle;">{{ $paypal->order_number }}</td>
									
									<td style="vertical-align: middle;"><a href="/admin/order_details/{{ $paypal->order_number }}">View Information</a>&nbsp; <a href="/admin/paypal/{{ $paypal->order_number }}">Confirm Order</a>&nbsp; <a href="https://www.sandbox.paypal.com/invoice/create">Create Invoice</a></td>
								</tr>
							@endforeach
							</tbody>
						</table>
					</div>
					
					<div class="col-md-6">
						<div class="float-left">
							
						</div>
						<h3><strong>On Delivery</strong></h3>
						<table class="table table-responsive table-hover table-bordered" id="item_tbl" width="100%">
							<thead>
								<tr>
									<th width="8%">Order Number</th>
									
									<th width="10%">Action</th>

								</tr>
							</thead>
							<tbody>
							@foreach($get_deliver as $deliver)
								<tr>
									<td style="vertical-align: middle;">{{ $deliver->order_number}}</td>
									
									<td style="vertical-align: middle;"><a href="#">Success</a></td>
								</tr>
							@endforeach	
							</tbody>
						</table>
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