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
					<div class="float-left">
						
					</div>
					<table class="table table-responsive table-hover table-bordered" id="item_tbl" width="100%">
						<thead>
							<tr>
								<th width="8%">Product Name</th>
								<th width="10%">Product Quantity</th>
								<th width="10%">Customer Name</th>
								<th width="10%">Contact Number</th>
								<th width="10%">Email</th>
								<th width="10%">Province</th>
								<th width="10%">Municipality</th>
								<th width="10%">Barangay</th>
								<th width="10%">Street</th>
								<th width="10%">Action</th>

							</tr>
						</thead>
						<tbody>
							
							<tr>
								<td style="vertical-align: middle;"></td>
								<td style="vertical-align: middle;"></td>
								<td style="vertical-align: middle;"></td>
								<td style="vertical-align: middle;"></td>
								<td style="vertical-align: middle;"></td>
								<td style="vertical-align: middle;"></td>
								<td style="vertical-align: middle;"></td>
								<td style="vertical-align: middle;"></td>
								<td style="vertical-align: middle;"></td>
								<td style="vertical-align: middle;"><a href="#"><i class="fa fa-truck"></i></a> &nbsp; <a href="#"><i class="fa fa-print"></i></a> &nbsp; <a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></td>
							</tr>
							
						</tbody>
					</table>
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>
</div>
@endsection