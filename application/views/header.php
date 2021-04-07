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
			width: 200px;
		    height: 250px;
		    position: relative;
		    border-radius: 8px;
		    box-shadow: rgb(0 0 0 / 8%) 0px 2px 4px, rgb(0 0 0 / 6%) 0px 2px 12px;
		    animation: 0.3s ease-in-out 0s 1 normal none running lbWRkT;
		    transition: all 0.2s ease-in 0s;
		    padding: 20px;
		    margin-top: 10px;
		}

		.form-box h1{
			font-weight: bold;
			font-size: 16px;
		}

		.form-box-button{
			font-weight: bold;
			box-shadow: rgb(0 0 0 / 8%) 0px 2px 4px, rgb(0 0 0 / 6%) 0px 2px 12px, rgb(0 0 0 / 4%) 0px 8px 14px, rgb(0 0 0 / 2%) 0px 12px 16px;
			border-radius: 5px;
			margin-top: 10px;
		}

		/* */

		#form-name{
			border: none;
    		border-bottom: 1px solid #f00;
    		width: 300px;
    		color: #f00;
    		font-size: 20px;
		}

		.question-box{
			cursor: pointer;
			padding: 10px;
			margin: 15px;
			box-shadow: rgb(0 0 0 / 8%) 0px 2px 4px, rgb(0 0 0 / 6%) 0px 2px 12px;
		}

		.question-box:hover{
			box-shadow: rgb(0 0 0 / 8%) 0px 2px 4px, rgb(0 0 0 / 6%) 0px 2px 20px;
		}

		.question-box i{
			padding: 5px;
			margin-top: 2px;
			font-size: 20px;
		}

		.question-box b{
			font-size: 15px;
		}

		.filed-question-box{
			padding: 10px;
			margin: 20px;
			box-shadow: rgb(0 0 0 / 8%) 0px 2px 4px, rgb(0 0 0 / 6%) 0px 2px 12px;
		}

		.filed-question-box .box-icon{
			padding: 5px;
			margin-top: 2px;
			font-size: 30px;
		}

		.filed-question-box .box-text{
			margin-top: 2px;
			font-size: 20px;
		}

		.welcome-btn{
			background: inherit;
			border: none;
			color: #fff;
			font-size: 18px;
			font-weight: bold;
		}

	 /* Swith key */

	 .switch {
  position: relative;
  display: inline-block;
	width: 46px;
    height: 20px;
    margin-left: 10px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 16px;
  width: 16px;
	left: 2px;
	bottom: 2px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #22f750;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(25px);
  -ms-transform: translateX(25px);
  transform: translateX(25px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
} 


.code-design-box{
        padding: 20px;
        box-shadow: rgb(0 0 0 / 8%) 0px 2px 4px, rgb(0 0 0 / 6%) 0px 2px 12px;
    }

    .code-design-box pre{
        background: #000;
        margin:  20px;
        color: #fff;
        overflow-wrap: break-word;
        white-space: inherit;
        border-radius: 5px;
        box-shadow: rgb(0 0 0 / 10%) 0px 3px 12px 0px;
    }

    /* Loader Inline */


    .loader-inline{
    	position: absolute;
	    height: 100%;
	    background: #000;
	    opacity: 0.5;
	    width: 100%;
	    top: 0;
	    margin: 0px;
	    padding: 0px;
	    left: 0;
	    bottom: 0;
    	}

    .loader-inline .icon-spinner6 {
	    z-index: 9999;
	    font-size: 3em;
	    color: #fff;
	    position: absolute;
	    top: 50%;
	    display: block;
	    left: 50%;
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