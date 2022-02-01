<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- plugins:css -->
		@include('admin.css')
		<style type="text/css">
			label{
				display: inline-block;
				width: 200px;
			}
		</style>
	</head>
	<body>
		<div class="container-scroller">
			
			<!-- partial:partials/_sidebar.html -->
			@include('admin.sidebar')
			
			<!-- partial:partials/_navbar.html -->
			@include('admin.navbar')
			
			<!-- partial -->
			<div class="container-fluid page-body-wrapper">
				<div class="mt-2" style="width:95%">
					<table class="table table-bordered table-hover table-striped table-responsive text-center">
						<thead class="text-light">
							<tr>
								<th>Customer Name</th>
								<th>Email</th>
								<th>Phone</th>
								<th>Doctor Name</th>
								<th>Date</th>
								<th>Message</th>
								<th>Status</th>
								<th colspan="3">Action</th>
							</tr>
						</thead>
						<tbody class="table-dark">
							@foreach($data as $info)
							<tr>
								<td>{{$info->name}}</td>
								<td>{{$info->email}}</td>
								<td>{{$info->phone}}</td>
								<td>{{$info->doctor}}</td>
								<td>{{$info->date}}</td>
								<td>{{$info->message}}</td>
								<td>{{$info->status}}</td>
								<td><a href="{{url('aprove_appoint',$info->id)}}" class="btn btn-success">Approve</a></td>
								<td><a href="{{url('send_mail',$info->id)}}" class="btn btn-primary">Send Mail</a></td>
								<td><a href="{{url('canceled',$info->id)}}" class="btn btn-danger">Cancel</a></td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- plugins:js -->
		@include('admin.script')
	</body>
</html>