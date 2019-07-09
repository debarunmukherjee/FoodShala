<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="<?php echo(base_url()); ?>assets/imgs/grocery.png">
	<title>Foodshala | Foods That Matter</title>

	<!--Template based on URL below-->
	<link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/starter-template/">

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/810b85017b.js"></script>

	<!-- Place your stylesheet here-->
	<link href="<?php echo (base_url()) ?>assets/css/stylesheet.css" rel= "stylesheet" type="text/css">
</head>

<body>

	<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
		<a class="navbar-brand" href="<?php echo(base_url()) ?>">
			<img src="<?php echo(base_url()) ?>assets/imgs/grocery.svg" alt="Company Logo" style="width:45px;">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
			aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="navbar-collapse collapse" id="navbarsExampleDefault">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="<?php echo( base_url() ); ?>">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo( base_url()."menu_items" ); ?>">Menu</a>
				</li>

				<!-- Only if the user is logged in as restaurant, he/she can add a new food item and see the list of orders taken -->
				<?php if($this->session->userdata('logged_in') && ($this->session->userdata('role') === "Restaurant")): ?>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo( base_url()."menu_items/create" ); ?>">Add new Item</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo( base_url()."view-orders" ); ?>">Orders Taken</a>
					</li>
				<?php endif; ?>

				<!-- Only if the user is logged in as customer, he/she can his order history -->
				<?php if($this->session->userdata('logged_in') && ($this->session->userdata('role') === "User")): ?>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo( base_url()."order-history" ); ?>">Order history</a>
					</li>
				<?php endif; ?>
			</ul>
			<ul class="navbar-nav ml-auto">
				<?php if(!$this->session->userdata('logged_in')): ?>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo( base_url()."register-customer" ); ?>">Register as Customer</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo( base_url()."register-restaurant" ); ?>">Register as Restaurant</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo( base_url()."login" ); ?>">Log In</a>
					</li>
				<?php endif; ?>

				<?php if($this->session->userdata('logged_in')): ?>
					<li class="nav-item">
						<span class="navbar-text text-white mr-4">Welcome, <?php echo($this->session->userdata('name')); ?></span>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo( base_url()."logout" ); ?>">Log Out</a>
					</li>
				<?php endif; ?>
			</ul>
		</div>
	</nav>

	<main role="main" class="">
	<!-- Display various flash messages here -->
	<div class="container">
		<?php if($this->session->flashdata('user_registered')): ?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Awesome!</strong> <?php echo($this->session->flashdata('user_registered')); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php endif; ?>
		<?php if($this->session->flashdata('user_loggedin')): ?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Awesome!</strong> <?php echo($this->session->flashdata('user_loggedin')); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php endif; ?>
		<?php if($this->session->flashdata('login_error')): ?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Login Failed!</strong> <?php echo($this->session->flashdata('login_error')); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php endif; ?>
		<?php if($this->session->flashdata('user_loggedout')): ?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Awesome!</strong> <?php echo($this->session->flashdata('user_loggedout')); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php endif; ?>
		<?php if($this->session->flashdata('item_created')): ?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Awesome!</strong> <?php echo($this->session->flashdata('item_created')); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php endif; ?>
		<?php if($this->session->flashdata('order_placed')): ?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Bon appétit!</strong> <?php echo($this->session->flashdata('order_placed')); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php endif; ?>
	</div>

	