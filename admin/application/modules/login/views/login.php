<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo ASSETS; ?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- Font Awesome -->
	<link href="<?php echo ASSETS; ?>css/font-awesome.min.css" rel="stylesheet">
	
	<!-- Perfect -->
	<link href="<?php echo ASSETS; ?>css/app.min.css" rel="stylesheet">

  </head>

  <body style="background:url('<?php echo ASSETS; ?>img/bg.jpg');">
	<div class="login-wrapper">
		<div class="text-center">
			<h2 class="fadeInUp animation-delay8" style="font-weight:bold">
				<span class="text-success">AstroRiva</span> <span style="color:#ccc; text-shadow:0 1px #fff">Admin</span>
			</h2>
		</div>
		<div class="login-widget animation-delay1">	
			<div class="panel panel-default">
				<div class="panel-heading clearfix">
					<div class="pull-left">
					 	<i class="fa fa-lock fa-lg"></i> Login
					</div>

					<div class="pull-right">
						<span style="font-size:11px;">Welcome Admin!</span>
						
					</div>
				</div>
				<div class="panel-body">
					<form method="post" action="<?php echo base_url(); ?>login/">
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="username" placeholder="Username" class="form-control input-sm bounceIn animation-delay2" required>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" placeholder="Password" class="form-control input-sm bounceIn animation-delay4" required>
						</div>		
						<div class="seperator"></div>
						<div class="form-group">
							Forgot your password?<br/>
							Click <a href="#">here</a> to reset your password
						</div>

						<hr/>							
						<button type="submit" class="btn btn-success btn-sm bounceIn animation-delay5  pull-right"><i class="fa fa-sign-in"></i> Sign in</button>
					</form>
				</div>
			</div><!-- /panel -->
		</div><!-- /login-widget -->
	</div><!-- /login-wrapper -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <!-- Jquery -->
	<script src="<?php echo ASSETS; ?>js/jquery-1.10.2.min.js"></script>
    
    <!-- Bootstrap -->
    <script src="<?php echo ASSETS; ?>bootstrap/js/bootstrap.min.js"></script>
   
	<!-- Modernizr -->
	<script src='<?php echo ASSETS; ?>js/modernizr.min.js'></script>
   
    <!-- Pace -->
	<script src='<?php echo ASSETS; ?>js/pace.min.js'></script>
   
	<!-- Popup Overlay -->
	<script src='<?php echo ASSETS; ?>js/jquery.popupoverlay.min.js'></script>
   
    <!-- Slimscroll -->
	<script src='<?php echo ASSETS; ?>js/jquery.slimscroll.min.js'></script>
   
	<!-- Cookie -->
	<script src='<?php echo ASSETS; ?>js/jquery.cookie.min.js'></script>

	<!-- Perfect -->
	<script src="<?php echo ASSETS; ?>js/app/app.js"></script>
  </body>
</html>
