<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title><?=$settings['sitename'];?> : <?=$settings['punchline'];?></title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/material-kit.css" rel="stylesheet"/>

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="assets/css/demo.css" rel="stylesheet" />

</head>

<body class="index-page">
<!-- Navbar -->
<nav class="navbar navbar-transparent navbar-fixed-top navbar-color-on-scroll">
	<div class="container">
        <div class="navbar-header">
	    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-index">
	        	<span class="sr-only">Toggle navigation</span>
	        	<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
	    	</button>
	    	<a href="/">
	        	<div class="logo-container">
	                <div class="logo">
	                    <img src="assets/img/logo.png" alt="<?=$settings['sitename'];?>" rel="tooltip" title="<?=$settings['punchline'];?>" data-placement="bottom" data-html="true">
	                </div>
	                <div class="brand">
	                    <?=$settings['sitename'];?><br /><x-small><?=$settings['punchline'];?></x-small>
	                </div>


				</div>
	      	</a>
	    </div>
		
		<?=$menu;?>
		
	</div>
</nav>
<!-- End Navbar -->

<div class="wrapper">
	<div class="header header-filter" style="background-image: url('assets/img/cover.jpg');">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="brand">
						<h1><?=$settings['index_text'];?></h1>
						<h3><?=$settings['index_sub_text'];?></h3>
					</div>
				</div>
			</div>

		</div>
	</div>

	<!-- internal -->
	
	<div class="main main-raised">
	
		<div class="section section-basic">
	    	<div class="container">
	            <div class="col-md-12">
					<div class="title">
						<h2>Login as student</h2>
					</div>
				</div>
			</div>
			<?=$massege;?>
			<div class="container">
	            <div class="col-sm-12">
					<div class="row">
						<div class="col-md-12">
						<form action="/login.html" method="post" >
		                	<div class="form-group label-floating">
		        	        	<label class="control-label">Username</label>
		        	        	<input type="text" name="username" id="username" class="form-control" />
								<div class="notifier" id="n-username">&nbsp;</div>
		                	</div>
		                	<div class="form-group label-floating">
		        	        	<label class="control-label">Password</label>
		        	        	<input type="password" name="password" id="password" class="form-control" />
								<div class="notifier" id="n-password">&nbsp;</div>
		                	</div>
		                	<div class="form-group">
		        	        	<div class="togglebutton">
									<label>
										<input type="checkbox" value="1" name="remember" checked="">
										Remember me
									</label>
								</div>
		                	</div>
		                	<div class="form-group pull-right">
		        	        	<a href="/register.html" class="btn btn-primary btn-round">Register</a> <input type="submit" class="btn btn-primary btn-round" value="Login" />
		                	</div>
							</form>
		                </div>
					</div>
				</div>
			</div>
		</div>
		
		



	</div>
	<?=$footer;?>
</div>

<?=$searchmodal;?>

<div class="modal fade" id="myTerms" tabindex="-1" role="dialog" aria-labelledby="myTermsLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					<i class="material-icons">clear</i>
				</button>
				<h4 class="modal-title">Attention needed</h4>
			</div>
			<div class="modal-body">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-12">
							You must have to agree our terms and conditions in order to create an account. 
		                </div>
					</div>
				</div>
			</div>
			<br />
			<div class="modal-footer">
				<button class="btn btn-primary btn-round" onClick="agreeTerms(true);" data-dismiss="modal" >I'm agree</button>
				<button class="btn btn-primary btn-round" data-dismiss="modal" >Close</button>
			</div>
		</div>
	</div>
</div>

</body>
	<!--   Core JS Files   -->
	<script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/material.min.js"></script>

	<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
	<script src="assets/js/nouislider.min.js" type="text/javascript"></script>

	<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
	<script src="assets/js/bootstrap-datepicker.js" type="text/javascript"></script>

	<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
	<script src="assets/js/material-kit.js" type="text/javascript"></script>
	<script src="assets/js/flip.js" type="text/javascript"></script>
	<script src="assets/js/jquery.mask.js" type="text/javascript"></script>

	<script>
	$(function(){

		$("#username").focusout(function() {
			var username = $("#username").val();
			error = false;
			var error_text = "";
			
			if(username.length < 5 || username.length > 20)
			{
				error = true;
				error_text = "Username should be between 5 to 20 characters.";
			}else{
				error = false;
				error_text = "";
			}
			
			if(error)
			{
				$("#username").parent().addClass("has-error");
				$("#n-username").removeClass("n-noerror").addClass("n-error").html(error_text);
				$("#username").parent().append("<span id=\"cl-un\" class=\"material-icons form-control-feedback\">clear</span>");
			}else{
				$("#username").parent().removeClass("has-error");
				$("#n-username").removeClass("n-error").addClass("n-noerror").html(error_text);
				$("#cl-un").remove();
			}
		});
		
		$("#password").focusout(function() {
			var password = $("#password").val();
			error = false;
			var error_text = "";
			
			if(password.length < 8 || password.length > 20)
			{
				error = true;
				error_text = "Password should be between 8 to 20 characters.";
			}else{
				error = false;
				error_text = "";
			}
			
			if(error)
			{
				$("#password").parent().addClass("has-error");
				$("#n-password").removeClass("n-noerror").addClass("n-error").html(error_text);
				$("#password").parent().append("<span id=\"cl-ps\" class=\"material-icons form-control-feedback\">clear</span>");
			}else{
				$("#password").parent().removeClass("has-error");
				$("#n-password").removeClass("n-error").addClass("n-noerror").html(error_text);
				$("#cl-ps").remove();
			}

		});
		
	});
</script>

</html>
