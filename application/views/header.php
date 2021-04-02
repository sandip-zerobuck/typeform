<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Admin Panel</title>

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
	

	<style type="text/css">

		.new-form-box{
			width: 176px;
		    height: 208px;
		    position: relative;
		    border-radius: 8px;
		    box-shadow: rgb(0 0 0 / 8%) 0px 2px 4px, rgb(0 0 0 / 6%) 0px 2px 12px;
		    animation: 0.3s ease-in-out 0s 1 normal none running lbWRkT;
		    transition: all 0.2s ease-in 0s;
		    background-color: rgb(4, 135, 175);
		    padding: 20px;
		}

		.new-form-box h1{
			font-weight: bold;
			color: #fff;
		}

		.btn-create{
			box-shadow: rgb(0 0 0 / 8%) 0px 2px 4px, rgb(0 0 0 / 6%) 0px 2px 12px, rgb(0 0 0 / 4%) 0px 8px 14px, rgb(0 0 0 / 2%) 0px 12px 16px;
			border-radius: 5px;
			font-weight: bold;
			background: #fff;
			color: #000;
		}


		.form-box{
			width: 176px;
		    height: 208px;
		    position: relative;
		    border-radius: 8px;
		    box-shadow: rgb(0 0 0 / 8%) 0px 2px 4px, rgb(0 0 0 / 6%) 0px 2px 12px;
		    animation: 0.3s ease-in-out 0s 1 normal none running lbWRkT;
		    transition: all 0.2s ease-in 0s;
		}
	</style>

</head>

<body>
	<div class="loader hidden">
		<i class="icon-spinner6 spinner"></i>
	</div>
	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="<?=BASE_URL?>">Typeform</a>

			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			
			
			<ul class="nav navbar-nav navbar-right">

				<li class="dropdown dropdown-user">
					<a href="<?=BASE_URL?>index/changepassword"> <i class="icon-lock2"></i> Change Password</a>
				</li>
				<li class="dropdown dropdown-user">
					<a href="<?=BASE_URL?>login/logout"> <i class="icon-drawer-in"></i> Logout</a>
				</li>
			</ul>
		</div>

	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<?php $this->load->view('sidebar'); ?>

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4>
								<span class="text-semibold">Admin</span> - <?= !empty($this->uri->segment(1)) ? $this->uri->segment(1) : 'Dashboard' ?>
							</h4>
						</div>
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="<?=BASE_URL?>"><i class="icon-home2 position-left"></i> Admin</a></li>
							<li class="active"><?= !empty($this->uri->segment(1)) ? ucwords(str_replace('_',' ',$this->uri->segment(1))) : 'Dashboard' ?></li>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Main charts -->
					<div class="row">
						<div class="col-lg-12">