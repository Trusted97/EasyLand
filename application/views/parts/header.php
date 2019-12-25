<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="it-IT">
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Gianluca Benucci">
	<meta name="generator" content="E-Land 0.0.2" />
	<meta name="robots" content="noindex, nofollow"/>

	<link rel="preload" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
	<noscript><link type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet"></noscript>
	<link type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

	<link rel="preload" href="<?php echo base_url('assets/style.css'); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
	<noscript><link type="text/css" href="<?php echo base_url('assets/style.css'); ?>" rel="stylesheet"></noscript>
	<link type="text/css" href="<?php echo base_url('assets/style.css'); ?>" rel="stylesheet">

	<script type="text/javascript" defer src="<?php echo base_url('assets/jquery-3.4.1.min.js'); ?>"></script>
	<script type="text/javascript" defer src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>

	<title>E-Land</title>

</head>
<body>
	<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
		<a class="navbar-brand" href="<?php echo base_url(); ?>">E-Land</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsMenu" aria-controls="navbarsMenu" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarsMenu">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="#">Regolamento</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="#">Ambientazione</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="#">Razze di Gioco</a>
				</li>
			</ul>
			<?php if ($this->ion_auth->logged_in()): ?>
				<a class="btn btn-primary my-2 my-sm-0" href="<?php echo site_url('auth/index'); ?>">Dashboard</a>
			<?php else: ?>
				<a class="btn btn-primary my-2 my-sm-0 mr-3" href="#">Iscriviti</a>
				<a class="btn btn-outline-light my-2 my-sm-0" href="<?php echo site_url('auth/index'); ?>">Accedi</a>
			<?php endif; ?>
		</div>
	</nav>
