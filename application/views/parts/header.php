<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="it-IT">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Gianluca Benucci">
	<meta name="generator" content="EasyLand 0.0.6" />
	<meta name="robots" content="noindex, nofollow"/>

	<!-- Oso tutto ciò che è degno di un Uomo, chi osa di più non lo è -->

	<link rel="preload" href="<?php echo site_url('assets/bootstrap/css/bootstrap.min.css'); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
	<noscript><link type="text/css" href="<?php echo site_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet"></noscript>
	<link type="text/css" href="<?php echo site_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

	<link rel="preload" href="<?php echo site_url('assets/style.css'); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
	<noscript><link type="text/css" href="<?php echo site_url('assets/style.css'); ?>" rel="stylesheet"></noscript>
	<link type="text/css" href="<?php echo site_url('assets/style.css'); ?>" rel="stylesheet">

	<script type="text/javascript" defer src="<?php echo site_url('assets/jquery-3.4.1.min.js'); ?>"></script>
	<script type="text/javascript" defer src="<?php echo site_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>

	<title><?php echo $title; ?></title>

</head>
<body>
	<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
		<a class="navbar-brand" href="<?php echo site_url(); ?>">EasyLand</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsMenu" aria-controls="navbarsMenu" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarsMenu">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="<?php echo site_url('regolamento'); ?>">Regolamento</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="<?php echo site_url('ambientazione'); ?>">Ambientazione</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="<?php echo site_url('razze'); ?>">Razze di Gioco</a>
				</li>
			</ul>

			<?php if ($this->ion_auth->logged_in()): //If user is logged in display logout button?>
				<a class="btn btn-outline-light mr-2" href="<?php echo site_url('auth/logout'); ?>">Logout</a>
				<?php if ($this->ion_auth->in_group('admin')): //If user is an admin display button for dashboard and land sections?>
					<a class="btn btn-primary my-2 my-sm-0" href="<?php echo site_url('auth/index'); ?>">Admin Dashboard</a>
					<a class="btn btn-primary ml-2 my-2 my-sm-0" href="<?php echo site_url('land'); ?>">Land</a>
				<?php else: //otherwise display only the land button?>
					<a class="btn btn-primary my-2 my-sm-0" href="<?php echo site_url('land/index'); ?>">Land</a>
				<?php endif; ?>
			<?php else: //If not logged in display button for register users or login?>
				<a class="btn btn-primary my-2 my-sm-0 mr-3" href="<?php echo site_url('registrazione'); ?>">Registrati</a>
				<a class="btn btn-outline-light my-2 my-sm-0" href="<?php echo site_url('auth/index'); ?>">Accedi</a>
			<?php endif; ?>

		</div>
	</nav>
