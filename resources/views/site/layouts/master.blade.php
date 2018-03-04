<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<meta name="description" content="">
    	<meta name="author" content="">
    	<title>@yield('title')</title>
    	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	    <link href="/css/bootstrap/bootstrap.min.css" rel="stylesheet">
	    <link href="/css/site/default.css" rel="stylesheet">
	    @yield('cssfiles')
	</head>
	<body class="fix-header">
	    <header class="col-md-12" id="header-bar">
	        <div class="header-logo-section col-md-3">
	          <img src="/images/es-6-explicit.png" height="40" />
	        </div>
	        <div class="col-md-9 header-navigation">
	          	<div class="col-md-6 pages-nav-container pull-left">
	            	<nav class="align-middle">
	              		<ul>
	                		<li><a href="#">Products</a></li>
		                	<li><a href="#">Top Deals</a></li>
		                	<li><a href="#">Volume Licensing</a></li>
	              		</ul>
	            	</nav>
	          	</div>
	          	<div class="col-md-5 search-bar-container pull-right">
	            	<div class="search-bar pull-right">
						<form method="get" action="/search">
	              			<label class="search-bar-label" for="search"><i class="search-bar-icon material-icons">search</i></label>
	              			<input class="search-bar-input" name="s" class="input" id="search" type="text" placeholder="Search">
						</form>
	              		<div class="search-dropdown" style="display: none;">
	                		<div class="recent-searches">
		                  		<div class="row">
		                    		<div class="col-md-1">
		                      			<i class="search-bar-icon material-icons">history</i>
		                    		</div>
		                    		<div class="col-md-11">
		                      			<p>Recent Searches</p>
		                    		</div>
		                  		</div>
			                </div>
			          	</div>
			    	</div>
			  	</div>
	  			<div class="col-md-1 pull-right">
	    			<a href="" class="profile-icon" ><img src="/images/default-user-icon.png" /></a>
	  			</div>
			</div>
	    </header>
	    
		<div id="wrapper">
			@yield('content')
		</div>

		<footer class="footer-container">
			<div class="col-md-6 footer-links-container">
				<div class="col-md-4">
					<ul>
						<li><a href="#">FAQ</a></li>
						<li><a href="#">Terms</a></li>
					</ul>
				</div>
				<div class="col-md-4">
					<ul>
						<li><a href="#">About</a></li>
						<li><a href="#">Contact</a></li>
					</ul>
				</div>
				<div class="col-md-4">
					<ul>
						<li><a href="#">Testimonials</a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-6 align-center">
				<div class="center-elements">
					<p>© 2017 ESoftwareDeals. All Rights Reserved</p>
				</div>
			</div>
		</footer>
		<script src="/js/jquery/jquery-3.3.1.min.js"></script>
		<script src="js/jquery/jquery-migrate-3.0.0.js" ></script>
		<script src="js/jquery/jquery-ui.js"></script>
	  	<script src="/js/bootstrap/bootstrap.min.js"></script>
    	<script src="/js/site/search.js"></script>
		@yield('jsfiles')
	</body>
</html>
