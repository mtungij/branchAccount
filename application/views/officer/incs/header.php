<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Microphinance | Admin panel</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<!-- Bootstrap core CSS -->
<link href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome -->
<link href="<?php echo base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet">

<!-- Pace -->
<link href="<?php echo base_url() ?>assets/css/pace.css" rel="stylesheet">

<!-- Color box -->
<link href="<?php echo base_url() ?>assets/css/colorbox/colorbox.css" rel="stylesheet">

<!-- Morris -->
<link href="<?php echo base_url() ?>assets/css/morris.css" rel="stylesheet"/>	

<!-- Perfect -->
<link href="<?php echo base_url() ?>assets/css/app.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/app-skin.css" rel="stylesheet">




</head>

<body class="overflow-hidden">
<!-- Overlay Div -->
<div id="overlay" class="transparent"></div>

<a href="#" id="theme-setting-icon"><i class="fa fa-cog fa-lg"></i></a>
<div id="theme-setting">
<div class="title">
<strong class="no-margin">Skin Color</strong>
</div>
<div class="theme-box">
<a class="theme-color" style="background:#323447" id="default"></a>
<a class="theme-color" style="background:#efefef" id="skin-1"></a>
<a class="theme-color" style="background:#a93922" id="skin-2"></a>
<a class="theme-color" style="background:#3e6b96" id="skin-3"></a>
<a class="theme-color" style="background:#635247" id="skin-4"></a>
<a class="theme-color" style="background:#3a3a3a" id="skin-5"></a>
<a class="theme-color" style="background:#495B6C" id="skin-6"></a>
</div>
<div class="title">
<strong class="no-margin">Sidebar Menu</strong>
</div>
<div class="theme-box">
<label class="label-checkbox">
<input type="checkbox" checked id="fixedSidebar">
<span class="custom-checkbox"></span>
Fixed Sidebar
</label>
</div>
</div><!-- /theme-setting -->

<div id="wrapper" class="preload">
<div id="top-nav" class="fixed skin-6">
<a href="#" class="brand">
<span>Microphinance</span>
<span class="text-toggle"> </span>
</a><!-- /brand -->					
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
<a class="dropdown-toggle" data-toggle="dropdown" href="#">
<strong><?php echo $_SESSION['comp_name']; ?></strong>
<span><i class="fa fa-chevron-down"></i></span>
</a>
<ul class="dropdown-menu">
<li>
<a class="clearfix" href="#">
<img src="<?php echo base_url() ?>assets/img/user.jpg" alt="User Avatar">
<div class="detail">
	<strong>John Doe</strong>
	<p class="grey">John_Doe@email.com</p> 
</div>
</a>
</li>
<li><a tabindex="-1" href="" class="main-link"><i class="fa fa-edit fa-lg"></i> Edit profile</a></li>
<li class="divider"></li>
<li><a tabindex="-1" class="main-link logoutConfirm_open" href="#logoutConfirm"><i class="fa fa-lock fa-lg"></i> Log out</a></li>
</ul>
</li>
</ul>
</div><!-- /top-nav-->

	


