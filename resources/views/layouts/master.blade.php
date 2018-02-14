<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<meta name="description" content="">
    	<meta name="author" content="">
    	<title>@yield('title')</title>
	    <link href="../../../public/css/bootstrap/bootstrap.min.css" rel="stylesheet">
	    <link href="../../../public/css/ampleadmin/animate.css" rel="stylesheet">
	    @yield('cssfiles')
	    <link href="../../../public/css/ampleadmin/default.css" id="theme" rel="stylesheet">
	</head>
	<body>
		@yield('content')


		<script src="../../../public/js/jquery/jquery-3.3.1.min.js"></script>
	    <script src="../../../public/js/bootstrap/bootstrap.min.js"></script>
		@yield('jsfiles')
	</body>
</html>