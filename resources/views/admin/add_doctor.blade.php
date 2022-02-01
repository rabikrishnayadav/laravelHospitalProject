<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- plugins:css -->
		@include('admin.css')
	</head>
	<body>
		<div class="container-scroller">
			
			<!-- partial:partials/_sidebar.html -->
			@include('admin.sidebar')
			
			<!-- partial:partials/_navbar.html -->
			@include('admin.navbar')
			
			<!-- partial -->
			<div class="container-fluid page-body-wrapper">
				<h1>Add Doctors</h1>
			</div>
		</div>
		<!-- plugins:js -->
		@include('admin.script')
	</body>
</html>