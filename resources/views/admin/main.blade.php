<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5" />
		<meta name="author" content="NobleUI" />
		<meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web" />

		<title>Admin Panel - Real Estate</title>

		<!-- Fonts -->
		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet" />
		<!-- End fonts -->

		<!-- core:css -->
		<link rel="stylesheet" href="{{ asset('backend/assets/vendors/core/core.css') }}" />
		<!-- endinject -->

		<!-- Plugin css for this page -->
		<link rel="stylesheet" href="{{ asset('backend/assets/vendors/flatpickr/flatpickr.min.css') }}" />
		<!-- End plugin css for this page -->

		<!-- inject:css -->
		<link rel="stylesheet" href="{{ asset('backend/assets/fonts/feather-font/css/iconfont.css') }}" />
		<link rel="stylesheet" href="{{ asset('backend/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}" />
		<!-- endinject -->

		<!-- Layout styles -->
		<link rel="stylesheet" href="{{ asset('backend/assets/css/demo2/style.css') }}" />
		<!-- End layout styles -->

		<!-- toastr css for this page -->
		<link rel="stylesheet" href="{{ asset('backend/assets/vendors/toastr/toastr.min.css') }}" />
		<!-- toastr css for this page -->

		<link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.png') }}" />
	</head>
	<body>
		<div class="main-wrapper">
			<!-- partial:partials/_sidebar.html -->
			@include('admin.components.sidebar')
			<!-- partial -->

			<div class="page-wrapper">
				<!-- partial:partials/_navbar.html -->
				@include('admin.components.navbar')
				<!-- partial -->

				@yield('content')

				<!-- partial:partials/_footer.html -->
				@include('admin.components.footer')
				<!-- partial -->
			</div>
		</div>

		@section('js')
		<!-- core:js -->
		<script src="{{ asset('backend/assets/vendors/core/core.js') }}"></script>
		<!-- endinject -->

		<!-- Plugin js for this page -->
		<script src="{{ asset('backend/assets/vendors/flatpickr/flatpickr.min.js') }}"></script>
		<script src="{{ asset('backend/assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
		<!-- End plugin js for this page -->

		<!-- inject:js -->
		<script src="{{ asset('backend/assets/vendors/feather-icons/feather.min.js') }}"></script>
		<script src="{{ asset('backend/assets/js/template.js') }}"></script>
		<!-- endinject -->

		<!-- toastr js for this page -->
		<script src="{{ asset('backend/assets/vendors/toastr/toastr.min.js') }}"></script>
		<!-- toastr js for this page -->

		<!-- Custom js for this page -->
		<script src="{{ asset('backend/assets/js/dashboard-dark.js') }}"></script>
		<!-- End custom js for this page -->

		<script>
			@if(Session::has('message'))
			var type = "{{ Session::get('alert-type','info') }}"
			toastr.options = {
				"progressBar": true,
				"positionClass": "toast-top-center",
			}
			switch(type){
				case 'info':
				toastr.info(" {{ Session::get('message') }} ");
				break;

				case 'success':
				toastr.success(" {{ Session::get('message') }} ");
				break;

				case 'warning':
				toastr.warning(" {{ Session::get('message') }} ");
				break;

				case 'error':
				toastr.error(" {{ Session::get('message') }} ");
				break; 
			}
			@endif 
		</script>
		@show
	</body>
</html>