<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
<meta name="description" content="My Coin Station - Watch Video,image,link and Earn Coin">
<meta name="keywords" content="My Coin Station, Watch Video, Watch Image, Watch Link, Earn Money">
	<title>My Coin Station | Admin Panel</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?=base_url()?>assets/admin/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?=base_url()?>assets/admin/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?=base_url()?>assets/admin/css/minified/core.min.css" rel="stylesheet" type="text/css">
	<link href="<?=base_url()?>assets/admin/css/minified/components.min.css" rel="stylesheet" type="text/css">
	<link href="<?=base_url()?>assets/admin/css/minified/colors.min.css" rel="stylesheet" type="text/css">
	<link href="<?=base_url()?>assets/admin/css/custom.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/admin/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/admin/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>




	<!-- Theme JS files -->
	<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/notifications/pnotify.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/admin/js/core/app.js"></script> 
	<!-- /theme JS files -->
	<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/selects/select2.min.js"></script>

	<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<script type="text/javascript" src="<?=base_url()?>assets/admin/js/bootstrap-datepicker.js"></script>
	


</head>

<body>
	<div class="loader hidden">
		<i class="icon-spinner6 spinner"></i>
	</div>
	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="<?=BASE_URL_ADMIN?>">My Coin Station</a>

			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>

				<?php if (!empty($image_alert)) { ?>
					<li>
						<a href="<?=BASE_URL_ADMIN?>ads_alert/imagealert">
							<i class="icon-stack-empty"></i>
							<span class="badge bg-warning-400"><?=$image_alert?></span>
						</a>
					</li>
				<?php } if (!empty($link_alert)) { ?>
					<li>
						<a href="<?=BASE_URL_ADMIN?>ads_alert/linkalert">
							<i class="icon-magic-wand"></i>
							<span class="badge bg-warning-400"><?=$link_alert?></span>
						</a>
					</li>
				<?php } if (!empty($video_alert)) { ?>
					<li>
							<a href="<?=BASE_URL_ADMIN?>ads_alert/videoalert">
								<i class="icon-presentation"></i>
								<span class="badge bg-warning-400"><?=$video_alert?></span>
							</a>
					</li>
				<?php }  if (!empty($applink_alert)) { ?>
					<li>
							<a href="<?=BASE_URL_ADMIN?>ads_alert/applinkalert">
								<i class="icon-android"></i>
								<span class="badge bg-warning-400"><?=$applink_alert?></span>
							</a>
					</li>
				<?php } ?>	


			</ul>
			
			<ul class="nav navbar-nav navbar-right">

				<li class="dropdown dropdown-user">
					<form  method="post" action="<?=BASE_URL_ADMIN?>Dashboard/database_backup">
						<button type="submit"  class="btn btn-info"><i class="icon-database" aria-hidden="true"> </i> Database Backup</button>
					</form>
					
				</li>

				<li class="dropdown dropdown-user">
					<a href="<?=BASE_URL_ADMIN?>Dashboard/changepassword"> <i class="icon-lock2"></i> Change Password</a>
				</li>
				<li class="dropdown dropdown-user">
					<a href="<?=BASE_URL_ADMIN?>login/logout"> <i class="icon-drawer-in"></i> Logout</a>
				</li>
			</ul>
		</div>

	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<?php $this->load->view('admin/sidebar'); ?>

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4>
								<span class="text-semibold">Admin</span> - <?= !empty($this->uri->segment(2)) ? $this->uri->segment(2) : 'Dashboard' ?>
							</h4>
						</div>
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="<?=BASE_URL_ADMIN?>"><i class="icon-home2 position-left"></i> Admin</a></li>
							<li class="active"><?= !empty($this->uri->segment(2)) ? ucwords(str_replace('_',' ',$this->uri->segment(2))) : 'Dashboard' ?></li>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Main charts -->
					<div class="row">
						<div class="col-lg-12">