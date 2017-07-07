<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Astroriva Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo ASSETS; ?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- Font Awesome -->
	<link href="<?php echo ASSETS; ?>css/font-awesome.min.css" rel="stylesheet">

	<!-- Pace -->
	<link href="<?php echo ASSETS; ?>css/pace.css" rel="stylesheet">	
	
	<!-- Perfect -->
	<link href="<?php echo ASSETS; ?>css/app.min.css" rel="stylesheet">
	<link href="<?php echo ASSETS; ?>css/app-skin.css" rel="stylesheet">
	
  </head>

  <body class="overflow-hidden">
	<!-- Overlay Div -->
	<div id="overlay" class="transparent"></div>	
	<div id="wrapper" class="preload">
		<div id="top-nav" class="skin-6 fixed">
			<div class="brand">
				<span>AstroRiva</span>
				<span class="text-toggle"> Admin</span>
			</div><!-- /brand -->
			<button type="button" class="navbar-toggle pull-left" id="sidebarToggle">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<button type="button" class="navbar-toggle pull-left hide-menu" id="menuToggle">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<ul class="nav-notification clearfix">
				
				<li class="profile dropdown">
					<a class="main-link logoutConfirm_open" href="#logoutConfirm" >
						<strong>Logout</strong>
						<span><i class="fa fa-chevron-down"></i></span>
					</a>
				</li>
			</ul>
		</div><!-- /top-nav-->