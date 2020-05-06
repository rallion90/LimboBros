@extends('layouts.admin_layout')
@section('content')
<div id="page-wrapper">
	
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Finish Orders</h1>
		</div>
		<div class="col-md-12">
		</div>
	</div>
	<div class="row">
		
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<span class="fa fa-inbox fa-fw"></span> Finish Orders
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<div class="float-left">
						
					</div>
					<table class="table table-responsive table-hover table-bordered" id="item_tbl" width="100%">
						<thead>
							<tr>
								<th width="8%">Order Number</th>
								<th width="10%">Total</th>
								<th width="10%"></th>
								

							</tr>
						</thead>
						<tbody>
						@foreach($succesful_deliver as $success)
							<tr>
								<td style="vertical-align: middle;">{{ $success->order_number }}</td> 
								<td style="vertical-align: middle;">₱ {{ number_format($success->total) }}.00</td>	
								<td style="vertical-align: middle;"><a href="/admin/order_details/{{ $success->order_number }}">View Information</a></td>
							</tr>
						@endforeach	
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