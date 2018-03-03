<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<meta name="description" content="">
    	<meta name="author" content="">
    	<title>Esoftwaredeals | Register</title>
    	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
	    <link href="/css/bootstrap/bootstrap.min.css" rel="stylesheet">
	    <link href="/css/site/register.css" rel="stylesheet">
	</head>
	<body>
		<div id="wrapper">
			<div class="container-fluid">
				<div class="steps-form-2">
                    <div class="steps-row-2 setup-panel-2 d-flex justify-content-between">
                        <div class="steps-step-2">
                            <a href="#step-1" type="button" class="btn btn-circle-2 active">1</a>
                            <div class="text">Account Setup</div>
                        </div>
                        <div class="steps-step-2">
                            <a href="#step-2" type="button" class="btn btn-circle-2">2</a>
                            <div class="text">Personal Details</div>
                        </div>
                        <div class="steps-step-2">
                            <a href="#step-3" type="button" class="btn btn-circle-2">3</a>
                            <div class="text">Terms and Agreement</div>
                        </div>
                    </div>
				</div>
				<div class="row registration-form white-box">
					<div class="text-center">OR</div>
					<div class="col-md-6 first-column">
						<h1 class="register-heading-text color-gray">Register</h1>
						<form method="POST" action="/tango" class="floating-labels">
					    	{{ csrf_field() }}
				        	<div class="form-group">
				          		<input id="full_name" type="text" class="form-control" name="full_name" placeholder="Full Name" required>
				        	</div>
				        	<div class="form-group">
				          		<input id="email" type="email" class="form-control" name="email" placeholder="Email" required>
				        	</div>
				        	<div class="form-group">
				          		<input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
				        	</div>
				        	<div class="form-group">
				          		<input id="confirm_password" type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required>
				        	</div>
		                	<button type="submit" class="btn btn-info register-button">Register</button>
					    </form>
					</div>
					<div class="col-md-6 second-column">
						<h1 class="login-with-text">Login with<br/> Social Network</h1>
						<div class="social-network-buttons">
							<button type="button" class="btn facebook-button">
								Login with Facebook
							</button>
							<button type="button" class="btn google-button">
								Login with Google
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>

		<script src="/js/jquery/jquery-3.3.1.min.js"></script>
	    <script src="/js/bootstrap/bootstrap.min.js"></script>
	</body>
</html>