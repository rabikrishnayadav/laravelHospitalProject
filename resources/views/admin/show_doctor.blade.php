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
				<div class="m-2 p-2">
					<table class="table table-bordered table-hover table-striped table-responsive-sm text-center">
						<thead class="text-light">
							<tr>
								<th>Name</th>
								<th>Phone</th>
								<th>Speciality</th>
								<th>Room</th>
								<th>Profile</th>
								<th colspan="2">Action</th>
							</tr>
						</thead>
						<tbody class="table-dark">
							@foreach($data as $info)
							<tr>
								<td>{{$info->name}}</td>
								<td>{{$info->phone}}</td>
								<td>{{$info->speciality}}</td>
								<td>{{$info->room}}</td>
								<td><a href="doctorimage/{{$info->image}}"><img src="doctorimage/{{$info->image}}"></a></td>
								<td><a href="" class="btn btn-warning" style="color:black">Update</a></td>
								<td><a href="{{url('delete_doctor', $info->id)}}" onclick="return confirm('Are you sure to Delete Doctor')" class="btn btn-danger">Delete</a></td>
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