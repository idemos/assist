<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns="http://www.w3.org/1999/xhtml">
<head>
@include('includes/head')
</head>
<body id="page-top">
  	<!-- Page Wrapper -->
  	<div id="wrapper">
		@include('includes/sidebar')
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