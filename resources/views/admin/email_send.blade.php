<!DOCTYPE html>
<html lang="en">
	<head>
		<base href="/public">
		<!-- plugins:css -->
		@include('admin.css')
		<style type="text/css">
			label{
				display: inline-block;
				width: 100px;
			}
		</style>
	</head>
	<body>
		<div class="container-scroller">
			
			<!-- partial:partials/_sidebar.html -->
			@include('admin.sidebar')
			
			<!-- partial:partials/_navbar.html -->
			@include('admin.navbar')
			
			<!-- For Send Email Notification use Commands
			1) php artisan notification:table
			2) php artisan migrate
			3) php artisan make:notification SendCustomerEmailNotification
			Its over -->


			<!-- partial -->
			<div class="container-fluid page-body-wrapper">
				<div class="container pt-5" align="center">
				@if(session()->has('message'))
				<div class="alert alert-success"> 
					<button type="button" class="close" data-dismiss="alert">X</button>
					{{session()->get('message')}}
				</div>
				@endif
				<form method="post" action="{{url('sendmail',$customer->id)}}">
					@csrf
					<div class="p-2">
						<label>Greeting</label>
						<input type="text" name="greeting" class="bg-dark" required>
					</div>
					<div class="p-2">
						<label>Body</label>
						<input type="text" name="body" class="bg-dark" required>
					</div>
					<div class="p-2">
						<label>Action Text</label>
						<input type="text" name="actiontext" class="bg-dark" required>
					</div>
					<div class="p-2">
						<label>Action Url</label>
						<input type="text" name="actionurl" class="bg-dark" required>
					</div>
					<div class="p-2">
						<label>End Part</label>
						<input type="text" name="endpart" class="bg-dark" required>
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