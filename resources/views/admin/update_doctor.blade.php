<!DOCTYPE html>
<html lang="en">
	<head>
		<base href="/public">
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
				<div class="container pt-5" align="center">
				@if(session()->has('message'))
				<div class="alert alert-success"> 
					<button type="button" class="close" data-dismiss="alert">X</button>
					{{session()->get('message')}}
				</div>
				@endif
				<form method="post" action="{{url('edit_doctor', $data->id)}}" enctype="multipart/form-data">
					@csrf
					<div class="p-2">
						<label>Doctor Name</label>
						<input type="text" name="name" placeholder="write name" class="bg-dark" value="{{$data->name}}" required>
					</div>
					<div class="p-2">
						<label>Doctor Phone</label>
						<input type="number" name="phone" placeholder="write number" class="bg-dark" value="{{$data->phone}}" required>
					</div>
					<div class="p-2">
						<label>Doctor Room No</label>
						<input type="text" name="room" placeholder="write doctor room no" class="bg-dark" value="{{$data->room}}" required>
					</div>
					<div class="p-2">
						<label>Speciality</label>
						<input type="text" name="speciality" placeholder="Speciality" class="bg-dark" value="{{$data->speciality}}" required>
					</div>
					<div class="p-2">
						<label>Old Image</label>
						<img src="doctorimage/{{$data->image}}" width="200" height="150"><br>
						<label>Upload New Image</label>
						<input type="file" name="doctor_img" class="bg-dark">
					</div>
					<div class="p-2">
						<input type="submit" name="submit" value="Submit" class="btn btn-success">
					</div>
				</form>
				</div>
			</div>
		</div>
		<!-- plugins:js -->
		@include('admin.script')
	</body>
</html>