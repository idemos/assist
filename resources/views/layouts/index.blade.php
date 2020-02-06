<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns="http://www.w3.org/1999/xhtml">
<head>
@include('includes/head')
</head>
<<<<<<< HEAD
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
=======
<body class="dx-viewport">
    <div class="demo-container">
        @yield('content')
    </div>

@include('includes/footer')
>>>>>>> 6d607f7dded6dfb3289b81c6ad37ca8d8a8d986c
@yield('footer_script')
</body>
</html>