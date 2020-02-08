<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns="http://www.w3.org/1999/xhtml">
<head>
@include('includes/head')
@yield('head_script')
</head>
<body id="page-top">
  	<!-- Page Wrapper -->
  	<div id="wrapper">
		@if(auth()->user()->type == 1)
			@include('includes/sidebar')
		@endif
		<div id="content-wrapper" class="d-flex flex-column">
		    <!-- Main Content -->
		    <div id="content">
		    	@include('includes/navbar')
				@yield('content')
		    </div>
			
			@include('includes/footer')
	    </div>
    </div>

@include('includes/footer_script')
@yield('footer_script')
</body>
</html>