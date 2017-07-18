<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title><?=$settings['sitename'];?> - <?=$settings['punchline'];?></title>

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

<body class="tutorial-page">

<nav class="navbar navbar-transparent navbar-fixed-top navbar-color-on-scroll" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button id="menu-toggle" type="button" class="navbar-toggle">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar bar1"></span>
        <span class="icon-bar bar2"></span>
        <span class="icon-bar bar3"></span>
      </button>
      <a href="http://www.creative-tim.com">
           <div class="logo-container">
                <div class="logo">
                    <img src="assets/img/logo.png" alt="Creative Tim Logo">
                </div>
                <div class="brand">
                    <?=$settings['sitename'];?>
					<br /><div style="font-size: 12px;"><?=$settings['punchline'];?></div>
                </div>
            </div>
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <?=$menu;?>
  </div><!-- /.container-fluid -->
</nav>

<div class="wrapper">
	<div class="header header-filter" style="background-image: url('assets/images/cover.jpg');">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<h1 class="title text-center">Register</h1>
				</div>
			</div>
		</div>
	</div>

	<div class="main main-raised">
		<div class="section">
	        <div class="container">
				<div class="row tim-row">
	                <h2 class="text-center">Create an account</h2>
					<?=$massege;?>
					<form action="" method="post">
	                <div class="col-md-8 col-md-offset-2">
	                    <div class="form-group label-floating">
							<label for="inputName" class="col-lg-2 control-label">Full Name</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" id="inputName" name="full-name">
								<div id="stat_name" class="status"></div>
							</div>
						</div>
	                    <div class="form-group label-floating">
							<label for="inputUName" class="col-lg-2 control-label">Username</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" id="inputUName" name="username">
								<div id="stat_username" class="status"></div>
							</div>
						</div>
	                    <div class="form-group label-floating">
							<label for="inputPass" class="col-lg-2 control-label">Password</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" id="inputPass" name="password">
								<div id="stat_password" class="status"></div>
							</div>
						</div>
	                    <div class="form-group label-floating">
							<label for="inputRPass" class="col-lg-2 control-label">Repeat password</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" id="inputRPass" name="rpassword">
								<div id="stat_rpassword" class="status"></div>
							</div>
						</div>
	                    <div class="form-group label-floating">
							<label for="inputRoll" class="col-lg-2 control-label">Roll No.</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" id="inputRoll" name="roll">
								<div id="stat_roll" class="status"></div>
							</div>
						</div>
	                    <div class="form-group label-floating">
							<label for="inputSession" class="col-lg-2 control-label">Session</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" id="inputSession" name="session">
								<div id="stat_session" class="status"></div>
							</div>
						</div>
	                    <div class="form-group">
							<label for="inputDept" class="col-lg-2 control-label">Department</label>
							<div class="col-lg-10">
								<select class="form-control" id="inputDept" name="dept"><?=$departments;?></select>
								<div id="stat_dept" class="status"></div>
							</div>
						</div>
	                    <div class="form-group label-floating">
							<label for="inputEmail" class="col-lg-2 control-label">Email</label>
							<div class="col-lg-10">
								<input type="email" class="form-control" id="inputEmail" name="email">
								<div id="stat_email" class="status"></div>
							</div>
						</div>
	                    <div class="form-group label-floating">
							<label for="inputMob" class="col-lg-2 control-label">Mobile</label>
							<div class="col-lg-10">
								<input type="number" class="form-control" id="inputMob" name="mobile">
								<div id="stat_mobile" class="status"></div>
							</div>
						</div>
						<div class="form-group pull-right">
							<div class="col-lg-10 col-lg-offset-2">
								<input type="reset" class="btn btn-default" value="Reset" />
								<input type="submit" class="btn btn-primary" value="Register" />
							</div>
						</div>
	                </div>
					</form>
	            </div>

	            
	        </div>
	    </div>
	</div>

</div>
<footer class="footer footer-transparent">
    <div class="container">
        <nav class="pull-left">
            <ul>
				<li>
					<a href="http://www.creative-tim.com">
						Creative Tim
					</a>
				</li>
				<li>
					<a href="http://presentation.creative-tim.com">
					   About Us
					</a>
				</li>
				<li>
					<a href="http://blog.creative-tim.com">
					   Blog
					</a>
				</li>
				<li>
					<a href="http://www.creative-tim.com/license">
						Licenses
					</a>
				</li>
            </ul>
        </nav>
        <div class="social-area pull-right">
            <a class="btn btn-social btn-twitter btn-just-icon" href="https://twitter.com/CreativeTim">
                <i class="fa fa-twitter"></i>
            </a>
            <a class="btn btn-social btn-facebook btn-just-icon" href="https://www.facebook.com/CreativeTim">
                <i class="fa fa-facebook-square"></i>
            </a>
            <a class="btn btn-social btn-google btn-just-icon" href="https://plus.google.com/+CreativetimPage">
                <i class="fa fa-google-plus"></i>
            </a>
        </div>
        <div class="copyright">
            &copy; 2016 Creative Tim, made with love
        </div>
    </div>
</footer>

</body>
	<!--   Core JS Files   -->
	<script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/material.min.js"></script>
	<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>

	
	<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
	<script src="assets/js/material-kit.js" type="text/javascript"></script>

	<script>

		$().ready(function(){

			$(window).on('scroll', materialKit.checkScrollForTransparentNavbar);
			
			$('#inputSession').mask("2zpqsrs2zpq", {
			  translation: {
				'z': {
				  pattern: /[0]/
				},
				'p': {
				  pattern: /[0-2]/
				},
				'q': {
				  pattern: /[0-9]/
				},
				'r': {
				  pattern: /[\/]/,
				  fallback: '-'
				},
				's': {
				  pattern: /[\/]/,
				  fallback: ' '
				},
				placeholder: "__/__/____"
			  }
			});
			
			$('#inputUName').blur(function() {
				if(this.value.length < 5 || this.value.length > 15)
				{
					$("#stat_username").removeClass('no-error');
					$("#stat_username").addClass('error');
					$("#stat_username").html("Username should be 5 to 15 characters long.");
				}else{
					$.ajax({
					  url: "/includes/exists.php?type=username&query=" + this.value,
					  cache: false,
					  success: function(html){
						  if(html > 0)
						  {
							  $("#stat_username").removeClass('no-error');
							  $("#stat_username").addClass('error');
							  $("#stat_username").html("Username already exists!");
						  }
						  else if(html == -9)
						  {
							  $("#stat_username").removeClass('no-error');
							  $("#stat_username").addClass('error');
							  $("#stat_username").html("Unknown error occurred!");
						  }else{
							  $("#stat_username").removeClass('error');
							  $("#stat_username").addClass('no-error');
							  $("#stat_username").html("Username is available!");
						  }
					  }
					});
				}
			});
			
			$('#inputEmail').blur(function() {
				if(this.value.length < 10 || this.value.length > 255)
				{
					$("#stat_email").removeClass('no-error');
					$("#stat_email").addClass('error');
					$("#stat_email").html("Email should be 10 to 255 characters long.");
				}else{
					$.ajax({
					  url: "/includes/exists.php?type=email&query=" + this.value,
					  cache: false,
					  success: function(html){
						  if(html > 0)
						  {
							  $("#stat_email").removeClass('no-error');
							  $("#stat_email").addClass('error');
							  $("#stat_email").html("Email has already been used!");
						  }
						  else if(html == -9)
						  {
							  $("#stat_email").removeClass('no-error');
							  $("#stat_email").addClass('error');
							  $("#stat_email").html("Unknown error occurred!");
						  }else{
							  $("#stat_email").removeClass('error');
							  $("#stat_email").addClass('no-error');
							  $("#stat_email").html("Email is okay!");
						  }
					  }
					});
				}
			});
			$('#inputMob').blur(function() {
				if(this.value.length < 10 || this.value.length > 10)
				{
					$("#stat_mobile").removeClass('no-error');
					$("#stat_mobile").addClass('error');
					$("#stat_mobile").html("Mobile number should exactly be 10 characters long.");
				}else{
					$.ajax({
					  url: "/includes/exists.php?type=mobile&query=" + this.value,
					  cache: false,
					  success: function(html){
						  if(html > 0)
						  {
							  $("#stat_mobile").removeClass('no-error');
							  $("#stat_mobile").addClass('error');
							  $("#stat_mobile").html("Mobile number has already been used!");
						  }
						  else if(html == -9)
						  {
							  $("#stat_mobile").removeClass('no-error');
							  $("#stat_mobile").addClass('error');
							  $("#stat_mobile").html("Unknown error occurred!");
						  }else{
							  $("#stat_mobile").removeClass('error');
							  $("#stat_mobile").addClass('no-error');
							  $("#stat_mobile").html("Mobile number is okay!");
						  }
					  }
					});
				}
			});
			$('#inputRPass').blur(function() {
				if(this.value != $('#inputPass').val())
				{
					$("#stat_rpassword").removeClass('no-error');
					$("#stat_rpassword").addClass('error');
					$("#stat_rpassword").html("The two passwords dont match!");
				}else{
					$("#stat_rpassword").html("");
				}
			});
		});

</script>
</html>
