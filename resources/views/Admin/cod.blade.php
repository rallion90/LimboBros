@extends('layouts.admin_layout')
@section('content')
<div id="page-wrapper">
	
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">COD Orders</h1>
		</div>
		<div class="col-md-12">
		</div>
	</div>
	<div class="row">
		
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<span class="fa fa-inbox fa-fw"></span> Cash on Delivery Orders
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<div class="col-md-6">
						<div class="float-left">
							
						</div>
						<h3><strong>Pending Orders</strong></h3>
						<table class="table table-responsive table-hover table-bordered" id="item_tbl" width="100%">
							<thead>
								<tr>
									<th width="8%">Order Number</th>
									
									<th width="10%">Action</th>

								</tr>
							</thead>
							<tbody>
							@foreach($get_cod as $cod)	
								<tr>
									<td style="vertical-align: middle;">{{ ucwords($cod->order_number) }}</td>
									
									<td style="vertical-align: middle;"><a href="#"><i class="fa fa-truck"></i></a> &nbsp; <a href="/admin/generateReceipt/{{ $cod->order_number }}"><i class="fa fa-print"></i></a> &nbsp; <a href="/admin/order_details/{{ $cod->order_number }}"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
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
									<td style="vertical-align: middle;">{{ ucwords($deliver->order_number) }}</td>
									
									<td style="vertical-align: middle;"><a href="#">Success</a> <a href="#">Cancel</a></td>
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