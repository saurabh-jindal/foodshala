<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Foodshala</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">

	<!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/beyond_the_mountains-webfont.css" type="text/css"/>

	<!-- Stylesheets -->
	<link href="<?php echo base_url(); ?>assets/plugin-frameworks/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/plugin-frameworks/swiper.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/fonts/ionicons.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/common/styles.css" rel="stylesheet">

</head>
<body>

<header>
	<div class="container">
		<!-- Flash Messages -->
		<?php if ($this->session->flashdata('user_registered')): ?>
			<?php echo '<p class="alert alert-success alert-dismissible fade show">'.$this->session->flashdata('user_registered').'</p>'; ?>
		<?php endif; ?>

		<?php if ($this->session->flashdata('login_failed')): ?>
			<?php echo '<p class="alert alert-danger alert-dismissible fade show">'.$this->session->flashdata('login_failed').'</p>'; ?>
		<?php endif; ?>

		<?php if ($this->session->flashdata('food_ordered')): ?>
			<?php echo '<p class="alert alert-success alert-dismissible fade show">'.$this->session->flashdata('food_ordered').'</p>'; ?>
		<?php endif; ?>

		<?php if ($this->session->flashdata('added_to_cart')): ?>
			<?php echo '<p class="alert alert-success alert-dismissible fade show">'.$this->session->flashdata('added_to_cart').'</p>'; ?>
		<?php endif; ?>
	</div>
	<div class="container">
		<!-- <a class="logo" href="#"><img src="images/logo-white.png" alt="Logo"></a> -->
		<h2><a class="logo" href="<?php echo base_url(); ?>">Foodshala</a></h2>

		<div class="right-area">
			<div class='row'>
				<?php if (!$this->session->userdata('logged_in')) : ?>
				<h6><a class="plr-20 color-white btn-fill-primary" href="<?php echo base_url(); ?>users/login" style="margin-right: 1em;">Login</a></h6>
				<h6><a class="plr-20 color-white btn-fill-primary" href="<?php echo base_url(); ?>restaurant/register" style="margin-right: 1em;">SignUp as Restaurant</a></h6>
				<h6><a class="plr-20 color-white btn-fill-primary" href="<?php echo base_url(); ?>users/register">SignUp as Customer</a></h6>
				<?php endif; ?>
				<?php if ($this->session->userdata('logged_in')) : ?>
					<h6><a class="plr-20 color-white btn-fill-primary" href="<?php echo base_url(); ?>users/logout">Logout</a></h6>
				<?php endif; ?>
			</div>
		</div><!-- right-area -->

		<a class="menu-nav-icon" data-menu="#main-menu" href="#"><i class="ion-navicon"></i></a>

		<ul class="main-menu font-mountainsre" id="main-menu">
			<li><a href="<?php echo base_url(); ?>">HOME</a></li>
				<?php if (($this->session->userdata('user_role') == 1) || ($this->session->userdata('user_role') == null)) : ?>
					<li><a href="<?php echo base_url(); ?>foods">FOODS</a></li>
				<?php endif; ?>
			<?php if ($this->session->userdata('user_role') != null) : ?>
				<?php if ($this->session->userdata('user_role') == 0) : ?>
					<li><a href="<?php echo base_url(); ?>foods/add_menu">ADD MENU</a></li>
				<?php endif; ?>
			<?php endif; ?>
			<?php if ($this->session->userdata('user_role') != null) : ?>
				<?php if ($this->session->userdata('user_role') == 1) : ?>
					<li><a href="<?php echo base_url(); ?>foods/view_cart">CART</a></li>
				<?php endif; ?>
			<?php endif; ?>
			<?php if ($this->session->userdata('user_role') != null) : ?>
				<?php if ($this->session->userdata('user_role') == 0) : ?>
					<li><a href="<?php echo base_url(); ?>foods/view_orders">ORDERS</a></li>
				<?php endif; ?>
			<?php endif; ?>
		</ul>

		<div class="clearfix"></div>

	</div><!-- container -->
</header>


