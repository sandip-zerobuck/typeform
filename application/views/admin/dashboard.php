<?php $this->load->view(ADMIN_VIEW.'header'); ?>

<style type="text/css">
	
	.count{
		font-size: 20px;
	}

</style>


<!-- 	<script src="http://demo.interface.club/limitless/demo/Template/global_assets/js/demo_charts/echarts/light/bars/columns_basic.js"></script> -->
<!-- <div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">Coin Rate</h4>
	</div>

	<div class="panel-body">
		<form method="post" action="<?=BASE_URL_ADMIN?>Dashboard/update_coinrate" enctype="multipart/form-data" class="form-horizontal">

			<input type="hidden" name="id" value="<?=$coin_rate->id?>">

			<div class="row">

				<div class="col-md-4">
					<label class="col-md-12 control-label"><b>Image : <span class="text-danger">*</span></b></label>
					<div class="col-md-6">
						<input type="number" name="image" class="form-control" placeholder="Image Coin" value="<?=$coin_rate->image?>">
						<?=form_error('image', '<div class="text-danger">', '</div>'); ?>
					</div>
					<div class="col-md-6">
						<input type="submit" value="Update" class="btn btn-primary">
					</div>
				</div>

				<div class="col-md-4">
					<label class="col-md-12 control-label"><b>Link : <span class="text-danger">*</span></b></label>
					<div class="col-md-6">
						<input type="number" name="link" class="form-control" placeholder="Link Coin" value="<?=$coin_rate->link?>">
						<?=form_error('link', '<div class="text-danger">', '</div>'); ?>
					</div>
					<div class="col-md-6">
						<input type="submit" value="Update" class="btn btn-primary">
					</div>
				</div>

				<div class="col-md-4">
					<label class="col-md-12 control-label"><b>Video : <span class="text-danger">*</span></b></label>
					<div class="col-md-6">
						<input type="number" name="video" class="form-control" placeholder="Video Coin" value="<?=$coin_rate->video?>">
						<?=form_error('video', '<div class="text-danger">', '</div>'); ?>
					</div>
					<div class="col-md-6">
						<input type="submit" value="Update" class="btn btn-primary">
					</div>
				</div>
			</div>

			

		</form>
	</div>
</div> -->

<div class="panel panel-flat">
	<div class="panel-heading">
		<h6 class="panel-title"></h6>
		<div class="heading-elements"></div>
	</div>

	<div class="panel-body">

		<div class="row">

<?php if($this->crud->is_admin_authorized(USERMASTER)) { ?>

<!-- Live Total Visitor -->

<div class="card">
<div class="card-header header-elements-inline">
	<h5 class="card-title">User Visitor</h5>
	<p><b>Total Visitor :</b> <?=$total_visitor?> &nbsp;&nbsp;&nbsp; <b>Current Date : </b><?php echo date("d-m-Y"); ?></p>
	<div class="header-elements">
		<div class="list-icons">
    		<a class="list-icons-item" data-action="collapse"></a>
    		<a class="list-icons-item" data-action="reload"></a>
    		<a class="list-icons-item" data-action="remove"></a>
    	</div>
	</div>
</div>

<div class="card-body">
	<div class="chart-container live_visitor">
		<?php $this->load->view(ADMIN_VIEW.'visitor'); ?>
	</div>
</div>
</div>

<div class="card">
<div class="card-header header-elements-inline">
	<h5 class="card-title">Today Login User</h5>
	<div class="header-elements">
		<div class="list-icons">
    		<a class="list-icons-item" data-action="collapse"></a>
    		<a class="list-icons-item" data-action="reload"></a>
    		<a class="list-icons-item" data-action="remove"></a>
    	</div>
	</div>
</div>

<div class="card-body">
	<div class="chart-container live_todaylogin">
		<?php $this->load->view(ADMIN_VIEW.'visitor_todaylogin'); ?>
	</div>
</div>
</div>


<!-- New User -->
<div class="card">
<div class="card-header header-elements-inline">
	<br>
	<h5 class="card-title">New User Visitor</h5>
	<p><b>Total Visitor :</b> <?=$total_user_visitor?> &nbsp;&nbsp;&nbsp; <b>Current Date : </b><?php echo date("d-m-Y"); ?></p>
	<div class="header-elements">
		<div class="list-icons">
    		<a class="list-icons-item" data-action="collapse"></a>
    		<a class="list-icons-item" data-action="reload"></a>
    		<a class="list-icons-item" data-action="remove"></a>
    	</div>
	</div>
</div>

<div class="card-body">
	<div class="chart-container new_visitor">
	<?php $this->load->view(ADMIN_VIEW.'visitor_user'); ?>
	</div>
</div>
</div>

<!-- New Ads User -->
<div class="card">
<div class="card-header header-elements-inline">
	<br>
	<h5 class="card-title">New Ads User Visitor</h5>
	<p><b>Total Visitor :</b> <?=$total_ads_user_visitor?> &nbsp;&nbsp;&nbsp; <b>Current Date : </b><?php echo date("d-m-Y"); ?></p>
	<div class="header-elements">
		<div class="list-icons">
    		<a class="list-icons-item" data-action="collapse"></a>
    		<a class="list-icons-item" data-action="reload"></a>
    		<a class="list-icons-item" data-action="remove"></a>
    	</div>
	</div>
</div>

<div class="card-body">
	<div class="chart-container new_ads_user_visitor">
	<?php $this->load->view(ADMIN_VIEW.'visitor_ads_user'); ?>
	</div>
</div>
</div>
<!-- New Merchant User -->
<div class="card">
<div class="card-header header-elements-inline">
	<br>
	<h5 class="card-title">New Merchant User Visitor</h5>
	<p><b>Total Visitor :</b> <?=$total_merchant_user_visitor?> &nbsp;&nbsp;&nbsp; <b>Current Date : </b><?php echo date("d-m-Y"); ?></p>
	<div class="header-elements">
		<div class="list-icons">
    		<a class="list-icons-item" data-action="collapse"></a>
    		<a class="list-icons-item" data-action="reload"></a>
    		<a class="list-icons-item" data-action="remove"></a>
    	</div>
	</div>
</div>

<div class="card-body">
	<div class="chart-container new_merchant_user_visitor">
	<?php $this->load->view(ADMIN_VIEW.'visitor_merchant_user'); ?>
	</div>
</div>
</div>

<br><br>
<div class="panel panel-flat col-md-4">
	<div class="panel-heading">
		<h6 class="panel-title">Total Users</h6>
	<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
	<div class="table-responsive">
		<table class="table table-xlg text-nowrap">
			<tbody>
				<tr>
					<td class="col-md-6">
						<div class="media-left media-middle">
							<a href="JavaScript:Void(0);" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-xs btn-icon"><i class="icon-users2"></i></a>
						</div>

						<div class="media-left">
							<h5 class="text-semibold no-margin">
								<?=$user?> <a href="<?=BASE_URL_ADMIN?>usermaster/usermaster" ><small class="display-block no-margin">Total Users</small></a>
							</h5>
						</div>
					</td>
				</tr>
			</tbody>
		</table>	
	</div>
</div>






<div class="panel panel-flat col-md-4">
	<div class="panel-heading">
		<h6 class="panel-title">Active Users</h6>
	<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
	<div class="table-responsive">
		<table class="table table-xlg text-nowrap">
			<tbody>
				<tr>
					<td class="col-md-6">
						<div class="media-left media-middle">
							<a href="JavaScript:Void(0);" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-xs btn-icon"><i class="icon-users2"></i></a>
						</div>

						<div class="media-left">
							<h5 class="text-semibold no-margin">
								<?=$activeuser?> <a href="<?=BASE_URL_ADMIN?>usermaster/Active" ><small class="display-block no-margin">Active Users</small></a>
							</h5>
						</div>
					</td>
				</tr>
			</tbody>
		</table>	
	</div>
</div>

<div class="panel panel-flat col-md-4">
	<div class="panel-heading">
		<h6 class="panel-title">Inactive Users</h6>
	<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
	<div class="table-responsive">
		<table class="table table-xlg text-nowrap">
			<tbody>
				<tr>
					<td class="col-md-6">
						<div class="media-left media-middle">
							<a href="JavaScript:Void(0);" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-xs btn-icon"><i class="icon-users2"></i></a>
						</div>

						<div class="media-left">
							<h5 class="text-semibold no-margin">
								<?=$inactiveuser?> <a href="<?=BASE_URL_ADMIN?>usermaster/Inactive" ><small class="display-block no-margin">Inactive Users</small></a>
							</h5>
						</div>
					</td>
				</tr>
			</tbody>
		</table>	
	</div>
</div>

<?php } ?>
<?php if($this->crud->is_admin_authorized(MERCHANT)) { ?>

<div class="panel panel-flat col-md-4">
	<div class="panel-heading">
		<h6 class="panel-title">Total Merchant Users</h6>
	<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
	<div class="table-responsive">
		<table class="table table-xlg text-nowrap">
			<tbody>
				<tr>
					<td class="col-md-6">
						<div class="media-left media-middle">
							<a href="JavaScript:Void(0);" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-xs btn-icon"><i class="icon-users2"></i></a>
						</div>

						<div class="media-left">
							<h5 class="text-semibold no-margin">
								<?=$m_user?> <a href="<?=BASE_URL_ADMIN?>merchant" ><small class="display-block no-margin">Total Merchant Users </small></a>
							</h5>
						</div>
					</td>
				</tr>
			</tbody>
		</table>	
	</div>
</div>

<div class="panel panel-flat col-md-4">
	<div class="panel-heading">
		<h6 class="panel-title">Active Merchant Users</h6>
	<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
	<div class="table-responsive">
		<table class="table table-xlg text-nowrap">
			<tbody>
				<tr>
					<td class="col-md-6">
						<div class="media-left media-middle">
							<a href="JavaScript:Void(0);" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-xs btn-icon"><i class="icon-users2"></i></a>
						</div>

						<div class="media-left">
							<h5 class="text-semibold no-margin">
								<?=$activem_user?> <a href="<?=BASE_URL_ADMIN?>merchantuser/Active" ><small class="display-block no-margin">Active Merchant Users </small></a>
							</h5>
						</div>
					</td>
				</tr>
			</tbody>
		</table>	
	</div>
</div>

<div class="panel panel-flat col-md-4">
	<div class="panel-heading">
		<h6 class="panel-title">Inactive Merchant Users</h6>
	<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
	<div class="table-responsive">
		<table class="table table-xlg text-nowrap">
			<tbody>
				<tr>
					<td class="col-md-6">
						<div class="media-left media-middle">
							<a href="JavaScript:Void(0);" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-xs btn-icon"><i class="icon-users2"></i></a>
						</div>

						<div class="media-left">
							<h5 class="text-semibold no-margin">
								<?=$inactivem_user?> <a href="<?=BASE_URL_ADMIN?>merchantuser/Inactive" ><small class="display-block no-margin">Inactive Merchant Users </small></a>
							</h5>
						</div>
					</td>
				</tr>
			</tbody>
		</table>	
	</div>
</div>

<?php } ?>

<?php if($this->crud->is_admin_authorized(ADSUSER)) { ?>

<div class="panel panel-flat col-md-4">
	<div class="panel-heading">
		<h6 class="panel-title">Total Ads Users</h6>
	<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
	<div class="table-responsive">
		<table class="table table-xlg text-nowrap">
			<tbody>
				<tr>
					<td class="col-md-6">
						<div class="media-left media-middle">
							<a href="JavaScript:Void(0);" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-xs btn-icon"><i class="icon-users2"></i></a>
						</div>

						<div class="media-left">
							<h5 class="text-semibold no-margin">
								<?=$ads_user?> <a href="<?=BASE_URL_ADMIN?>adsuser/Adsuser" ><small class="display-block no-margin">Total Ads Users </small></a>
							</h5>
						</div>
					</td>
				</tr>
			</tbody>
		</table>	
	</div>
</div>

<div class="panel panel-flat col-md-4">
	<div class="panel-heading">
		<h6 class="panel-title">Active Ads Users</h6>
	<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
	<div class="table-responsive">
		<table class="table table-xlg text-nowrap">
			<tbody>
				<tr>
					<td class="col-md-6">
						<div class="media-left media-middle">
							<a href="JavaScript:Void(0);" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-xs btn-icon"><i class="icon-users2"></i></a>
						</div>

						<div class="media-left">
							<h5 class="text-semibold no-margin">
								<?=$activeads_user?> <a href="<?=BASE_URL_ADMIN?>adsuser/Active" ><small class="display-block no-margin">Active Ads Users </small></a>
							</h5>
						</div>
					</td>
				</tr>
			</tbody>
		</table>	
	</div>
</div>

<div class="panel panel-flat col-md-4">
	<div class="panel-heading">
		<h6 class="panel-title">Inactive Ads Users</h6>
	<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
	<div class="table-responsive">
		<table class="table table-xlg text-nowrap">
			<tbody>
				<tr>
					<td class="col-md-6">
						<div class="media-left media-middle">
							<a href="JavaScript:Void(0);" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-xs btn-icon"><i class="icon-users2"></i></a>
						</div>

						<div class="media-left">
							<h5 class="text-semibold no-margin">
								<?=$inactiveads_user?> <a href="<?=BASE_URL_ADMIN?>adsuser/Inactive" ><small class="display-block no-margin">Inactive Ads Users </small></a>
							</h5>
						</div>
					</td>
				</tr>
			</tbody>
		</table>	
	</div>
</div>

<?php } ?>

<?php if($this->crud->is_admin_authorized(IMAGEMASTER)) { ?>

<div class="panel panel-flat col-md-3">
	<div class="panel-heading">
		<h6 class="panel-title">Image Camping</h6>
	<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
	<div class="table-responsive">
		<table class="table table-xlg text-nowrap">
			<tbody>
				<tr>
					<td class="col-md-6">
						<div class="media-left media-middle">
							<a href="JavaScript:Void(0);" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-xs btn-icon"><i class="icon-stack-empty"></i></a>
						</div>

						<div class="media-left">
							<h5 class="text-semibold no-margin">
								<?=$image?> 
								<a href="<?=BASE_URL_ADMIN?>campingmaster/imagemaster" class="display-block no-margin"><small class="display-block no-margin">Active</small></a>
							</h5>
							<br>
							<h5 class="text-semibold no-margin">
								<?=$image_complated?> 
								<a href="<?=BASE_URL_ADMIN?>campingmaster/imagemaster/complatedimage" class="display-block no-margin"><small class="display-block no-margin">Complated</small></a>
							
							</h5>
						</div>
					</td>					
				</tr>
			</tbody>
		</table>	
	</div>
</div>

<?php } ?>


<?php if($this->crud->is_admin_authorized(LINKMASTER)) { ?>

<div class="panel panel-flat col-md-3">
	<div class="panel-heading">
		<h6 class="panel-title">Link Camping</h6>
	<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
	<div class="table-responsive">
		<table class="table table-xlg text-nowrap">
			<tbody>
				<tr>
					<td class="col-md-6">
						<div class="media-left media-middle">
							<a href="JavaScript:Void(0);" class="btn border-success-400 text-success-400 btn-flat btn-rounded btn-xs btn-icon"><i class="icon-magic-wand"></i></a>
						</div>

						<div class="media-left">
							<h5 class="text-semibold no-margin">
								<?=$link?> 
								<a href="<?=BASE_URL_ADMIN?>campingmaster/linkmaster" class="display-block no-margin"><small class="display-block no-margin">Active</small></a>
							</h5>
							<br>
							<h5 class="text-semibold no-margin">
								<?=$link_complated?>
								 <a href="<?=BASE_URL_ADMIN?>campingmaster/linkmaster/complatedlink"><small class="display-block no-margin">Complated</small></a>
							</h5>
						</div>
					</td>					
				</tr>
			</tbody>
		</table>	
	</div>
</div>

<?php } ?>

<?php if($this->crud->is_admin_authorized(VIDEOMASTER)) { ?>
<div class="panel panel-flat col-md-3">
	<div class="panel-heading">
		<h6 class="panel-title">Video Camping</h6>
	<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
	<div class="table-responsive">
		<table class="table table-xlg text-nowrap">
			<tbody>
				<tr>
					<td class="col-md-6">
						<div class="media-left media-middle">
							<a href="JavaScript:Void(0);" class="btn border-danger-400 text-danger-400 btn-flat btn-rounded btn-xs btn-icon"><i class="icon-presentation"></i></a>
						</div>

						<div class="media-left">
							<h5 class="text-semibold no-margin">
								<?=$video?><a href="<?=BASE_URL_ADMIN?>campingmaster/videomaster" class="display-block no-margin"><small class="display-block no-margin">Active</small></a> 
							</h5>
							<br>
							<h5 class="text-semibold no-margin">
								<?=$video_complated?> <a href="<?=BASE_URL_ADMIN?>campingmaster/videomaster/complatedvideo" class="display-block no-margin"><small class="display-block no-margin">Complated</small></a> 
							</h5>
						</div>
					</td>					
				</tr>
			</tbody>
		</table>	
	</div>
</div>

<?php } ?>

<?php if($this->crud->is_admin_authorized(APPLINKMASTER)) { ?>

<div class="panel panel-flat col-md-3">
	<div class="panel-heading">
		<h6 class="panel-title">App Link Camping</h6>
	<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
	<div class="table-responsive">
		<table class="table table-xlg text-nowrap">
			<tbody>
				<tr>
					<td class="col-md-6">
						<div class="media-left media-middle">
							<a href="JavaScript:Void(0);" class="btn border-success-400 text-success-400 btn-flat btn-rounded btn-xs btn-icon"><i class="icon-magic-wand"></i></a>
						</div>

						<div class="media-left">
							<h5 class="text-semibold no-margin">
								<?=$applink?> 
								<a href="<?=BASE_URL_ADMIN?>campingmaster/applinkmaster" class="display-block no-margin"><small class="display-block no-margin">Active</small></a>
							</h5>
							<br>
							<h5 class="text-semibold no-margin">
								<?=$applink_complated?>
								 <a href="<?=BASE_URL_ADMIN?>campingmaster/applinkmaster/complatedapplink"><small class="display-block no-margin">Complated</small></a>
							</h5>
						</div>
					</td>					
				</tr>
			</tbody>
		</table>	
	</div>
</div>

<?php } ?>


<?php if($this->crud->is_admin_authorized(SHOP)) { ?>

<div class="panel panel-flat col-md-4">
	<div class="panel-heading">
		<h6 class="panel-title">All Product</h6>
	<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
	<div class="table-responsive">
		<table class="table table-xlg text-nowrap">
			<tbody>
				<tr>
					<td class="col-md-6">
						<div class="media-left media-middle">
							<a href="JavaScript:Void(0);" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-xs btn-icon"><i class="icon-stack-empty"></i></a>
						</div>

						<div class="media-left">
							<h5 class="text-semibold no-margin">
								<?=$product?><a href="<?=BASE_URL_ADMIN?>products" class="display-block no-margin"><small class="display-block no-margin">Total Product</small></a>  
							</h5>
							<br>
							<h5 class="text-semibold no-margin">
								<?=$product_active?><a href="<?=BASE_URL_ADMIN?>product_all/active" class="display-block no-margin"><small class="display-block no-margin">Active Product</small></a>
							</h5>
							<br>
							<h5 class="text-semibold no-margin">
								<?=$product_inactive?> <a href="<?=BASE_URL_ADMIN?>product_all/inactive" class="display-block no-margin"><small class="display-block no-margin">Inactive Product</small></a>
							</h5>
						</div>
					</td>					
				</tr>
			</tbody>
		</table>	
	</div>
</div>



<div class="panel panel-flat col-md-4">
	<div class="panel-heading">
		<h6 class="panel-title">All Order</h6>
	<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
	<div class="table-responsive">
		<table class="table table-xlg text-nowrap">
			<tbody>
				<tr>
					<td class="col-md-6">
						<div class="media-left media-middle">
							<a href="JavaScript:Void(0);" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-xs btn-icon"><i class="icon-cart5"></i></a>
						</div>

						<div class="media-left">
							<h5 class="text-semibold no-margin">
								<?=$order?> <a href="<?=BASE_URL_ADMIN?>ordermaster/ordermaster" class="display-block no-margin"><small class="display-block no-margin">Total Order</small></a> 
							</h5>
							<br>
							<h5 class="text-semibold no-margin">
								<?=$product_pending?><a href="<?=BASE_URL_ADMIN?>ordermaster/Neworder" class="display-block no-margin"><small class="display-block no-margin">New Order</small></a>
							</h5>
							<br>
							<h5 class="text-semibold no-margin">
								<?=$product_dilivered?> <a href="<?=BASE_URL_ADMIN?>ordermaster/Complated" class="display-block no-margin"><small class="display-block no-margin">Complated Order</small></a>
							</h5>
						</div>
					</td>					
				</tr>
			</tbody>
		</table>	
	</div>
</div>

<?php } ?>

<?php if($this->crud->is_admin_authorized(MERCHANT)) { ?>

<div class="panel panel-flat col-md-4">
	<div class="panel-heading">
		<h6 class="panel-title">All Merchant Request</h6>
	<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
	<div class="table-responsive">
		<table class="table table-xlg text-nowrap">
			<tbody>
				<tr>
					<td class="col-md-6">
						<div class="media-left media-middle">
							<a href="JavaScript:Void(0);" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-xs btn-icon"><i class="icon-stack-empty"></i></a>
						</div>

						<div class="media-left">
							<h5 class="text-semibold no-margin">
								<?=$merchant_request?> <a href="<?=BASE_URL_ADMIN?>merchant/request" class="display-block no-margin"><small class="display-block no-margin">All Merchant Request</small></a> 
							</h5>
							<br>
							<h5 class="text-semibold no-margin">
								<?=$inactivemerchant_request?> <a href="<?=BASE_URL_ADMIN?>merchant/newrequest" class="display-block no-margin"><small class="display-block no-margin">New Merchant Request</small></a> 
							</h5>
							<br>
							<h5 class="text-semibold no-margin">
								<?=$activemerchant_request?> <a href="<?=BASE_URL_ADMIN?>merchant/acceptrequest" class="display-block no-margin"><small class="display-block no-margin">Accept Merchant Request</small></a> 
							</h5>
						</div>
					</td>					
				</tr>
			</tbody>
		</table>	
	</div>
</div>

<div class="panel panel-flat col-md-4">
	<div class="panel-heading">
		<h6 class="panel-title">All Merchant User Return Request</h6>
	<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
	<div class="table-responsive">
		<table class="table table-xlg text-nowrap">
			<tbody>
				<tr>
					<td class="col-md-6">
						<div class="media-left media-middle">
							<a href="JavaScript:Void(0);" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-xs btn-icon"><i class="icon-stack-empty"></i></a>
						</div>

						<div class="media-left">
							<h5 class="text-semibold no-margin">
								<?=$return_request?> <a href="<?=BASE_URL_ADMIN?>merchant/returnrequest" class="display-block no-margin"><small class="display-block no-margin">Total Merchant Return Request</small></a>  
							</h5>
							<br>
							<h5 class="text-semibold no-margin">
								<?=$inactivereturn_request?> <a href="<?=BASE_URL_ADMIN?>merchant/newreturnrequest" class="display-block no-margin"><small class="display-block no-margin">New Merchant Return Request</small></a>  
							</h5>
							<br>
							<h5 class="text-semibold no-margin">
								<?=$activereturn_request?> <a href="<?=BASE_URL_ADMIN?>merchant/acceptreturnrequest" class="display-block no-margin"><small class="display-block no-margin">Accept Merchant Return Request</small></a>
							</h5>
						</div>
					</td>					
				</tr>
			</tbody>
		</table>	
	</div>
</div>

<?php } ?>

<?php if($this->crud->is_admin_authorized(ADSUSER)) { ?>

<div class="panel panel-flat col-md-4">
	<div class="panel-heading">
		<h6 class="panel-title">All Ads User  Request</h6>
	<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
	<div class="table-responsive">
		<table class="table table-xlg text-nowrap">
			<tbody>
				<tr>
					<td class="col-md-6">
						<div class="media-left media-middle">
							<a href="JavaScript:Void(0);" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-xs btn-icon"><i class="icon-stack-empty"></i></a>
						</div>

						<div class="media-left">
							<h5 class="text-semibold no-margin">
								<?=$Image_ads_request?> <a href="<?=BASE_URL_ADMIN?>adsuser/request/Image" class="display-block no-margin"><small class="display-block no-margin">Image Ads Request</small></a>
							</h5>
							<br>
							<h5 class="text-semibold no-margin">
								<?=$video_ads_request?> <a href="<?=BASE_URL_ADMIN?>adsuser/request/Video" class="display-block no-margin"><small class="display-block no-margin">Video Ads  Request</small></a> 
							</h5>
							<br>
							<h5 class="text-semibold no-margin">
								<?=$Link_ads_request?> <a href="<?=BASE_URL_ADMIN?>adsuser/request/Link" class="display-block no-margin"><small class="display-block no-margin">Link Ads  Request</small></a>  
							</h5>
						</div>
					</td>					
				</tr>
			</tbody>
		</table>	
	</div>
</div>

<?php } ?>

<?php if($this->session->userdata('admin_type') == 'admin') { ?>					

<div class="col-lg-4">
<!-- Members online -->
<div class="panel bg-teal-400">
	<div class="panel-body">
		<h3 class="no-margin">
			<?php if (!empty($image_total)){
        foreach ($image_total as $key => $value) {
            
            $Total[] = $value->coin;
        }
       echo array_sum($Total).' Coin';
            }else{
                echo '0 Coin';
            } ?>
		</h3>
		Image Click Coin
		
	<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

</div>
<!-- /members online -->
</div>

<div class="col-lg-4">
<!-- Members online -->
<div class="panel bg-teal-400">
	<div class="panel-body">
		

		<h3 class="no-margin">
			<?php if (!empty($video_total)){
        foreach ($video_total as $key => $value) {
            
            $Totalvideo[] = $value->coin;
        }
       echo array_sum($Totalvideo).' Coin';
            }else{
                echo '0 Coin';
            } ?>
		</h3>
		Video Click Coin
		
	<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
</div>
<!-- /members online -->
</div>

<div class="col-lg-4">
<!-- Members online -->
<div class="panel bg-teal-400">
	<div class="panel-body">
		<h3 class="no-margin">
			<?php if (!empty($link_total)){
        foreach ($link_total as $key => $value) {
            
            $Totallink[] = $value->coin;
        }
       echo array_sum($Totallink).' Coin';
            }else{
                echo '0 Coin';
            } ?>
		</h3>
		Link Click Coin
		
	<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
</div>
<!-- /members online -->
</div>

<div class="col-lg-4">
<!-- Members online -->
<div class="panel bg-indigo-400">
	<div class="panel-body">
		<h3 class="no-margin">
			<?php if (!empty($user_balance)){
        foreach ($user_balance as $key => $value) {
            
            $Totaluser[] = $value->wallet_balance;
        }
       echo array_sum($Totaluser).' Coin';
            }else{
                echo '0 Coin';
            } ?>
		</h3>
		Total User Balance
		
	<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
</div>
<!-- /members online -->
</div>

<div class="col-lg-4">
<!-- Members online -->
<div class="panel bg-indigo-400">
	<div class="panel-body">
		<h3 class="no-margin">
			<?php if (!empty($admin_balance)){
        foreach ($admin_balance as $key => $value) 
        { echo  $value->balance.' Coin'; }
            }else{
                echo '0 Coin';
            } ?>
		</h3>
		Admin Balance
		
	<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

</div>
<!-- /members online -->
</div>




<div class="col-lg-4">
<!-- Members online -->
<div class="panel bg-teal-400">
	<div class="panel-body">
		<h3 class="no-margin">
			<?php if (!empty($admin_balance)){
        foreach ($admin_balance as $key => $value) 
        { echo  $value->refer_bonus.' Coin'; }
            }else{
                echo '0 Coin';
            } ?>
		</h3>
		Refer Balance
		
	<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

</div>
<!-- /members online -->
</div>





<div class="col-lg-4">
<!-- Members online -->
<div class="panel bg-indigo-400">
	<div class="panel-body">
		<h3 class="no-margin">
			<?php if (!empty($merchant_balance)){
        foreach ($merchant_balance as $key => $value) {
            
            $Totalmerchant[] = $value->wallet_balance;
        }
       echo array_sum($Totalmerchant).' Coin';
            }else{
                echo '0 Coin';
            } ?>
		</h3>
		Total Merchant Balance
		
	<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
</div>
<!-- /members online -->
</div>



<div class="col-lg-4">
<!-- Members online -->
<div class="panel bg-indigo-400">
	<div class="panel-body">
		<h3 class="no-margin">
			<?php if (!empty($admin_balance)){
        foreach ($admin_balance as $key => $value) 
        { echo  $value->charge.' Coin'; }
            }else{
                echo '0 Coin';
            } ?>
		</h3>
		User Charge Balance
		
	<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

</div>
<!-- /members online -->
</div>

<div class="col-lg-4">
<!-- Members online -->
<div class="panel bg-teal-400">
	<div class="panel-body">
		<h3 class="no-margin">
			<?php if (!empty($admin_balance)){
        foreach ($admin_balance as $key => $value) 
        { echo  $value->signup_bonus.' Coin'; }
            }else{
                echo '0 Coin';
            } ?>
		</h3>
		Signup Balance
		
	<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

</div>
<!-- /members online -->
</div>





<div class="col-lg-4">
<!-- Members online -->
<div class="panel bg-indigo-400">
	<div class="panel-body">
		<h3 class="no-margin">
			<?php if (!empty($admin_balance)){
        foreach ($admin_balance as $key => $value) 
        { echo  $value->shop.' Coin'; }
            }else{
                echo '0 Coin';
            } ?>
		</h3>
		Admin Shop Balance
		
	<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

</div>
<!-- /members online -->
</div>

<div class="col-lg-4">
<!-- Members online -->
<div class="panel bg-pink-400">
	<div class="panel-body">
		<h3 class="no-margin">
			<?php 


			 	$admin_b = $admin_balance[0]->balance;
				$admin_c = $admin_balance[0]->charge;
				$admin_shop = $admin_balance[0]->shop;

		if (!empty($user_balance)) {
			foreach ($user_balance as $key => $valueu) 
			{$Totaluser1[] = $valueu->wallet_balance;}
		}else{
			$Totaluser1[] = array('0');
		}

	
		if (!empty($merchant_balance)) {
					foreach ($merchant_balance as $key => $valuem) 
       	{$Totalmerchant1[] = $valuem->wallet_balance;}
		}else{
			$Totalmerchant1[] = array('0');
		}

     	

       $merchant_b =  array_sum($Totalmerchant1);

       $user_b = array_sum($Totaluser1);


       		echo $total = $admin_b + $admin_c + $admin_shop + $merchant_b + $user_b.' Coin';

       	


			 ?>
		</h3>
		Total Coin
		
	<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

</div>
<!-- /members online -->
</div>

<div class="col-lg-4">
<!-- Members online -->
<div class="panel bg-teal-400">
	<div class="panel-body">
		<h3 class="no-margin">
			<?=$user_credit_balance->user_credit_balance?>
		</h3>
		User Credit Balance
		
	<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

</div>
<!-- /members online -->
</div>


			
		



<?php } ?>


		</div>

	</div>	
</div>
<!-- /traffic sources -->
<?php $this->load->view(ADMIN_VIEW.'footer'); ?>

<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/visualization/d3/d3.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/visualization/d3/d3_tooltip.js"></script>
<script src="<?=base_url()?>assets/admin/js/plugins/visualization/echarts/echarts.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){

		var bardata = [];
		var bardata = $('.visitor').map(function(){
          return Number($(this).text())
        }).get();

        var new_user_visitor = [];
		var new_user_visitor = $('.new_user_visitor').map(function(){
          return Number($(this).text())
        }).get();

        var ads_user_visitor = [];
		var ads_user_visitor = $('.ads_user_visitor').map(function(){
          return Number($(this).text())
        }).get();

        var merchant_user_visitor = [];
		var merchant_user_visitor = $('.merchant_user_visitor').map(function(){
          return Number($(this).text())
        }).get();

        var date_data = [];
		var date_data = $('.date_data').map(function(){
          return Number($(this).text())
        }).get();

        // Today Login...
        var todaylogin = [];
		var todaylogin = $('.todaylogin').map(function(){
          return Number($(this).text())
        }).get();

        var date_todaylogin = [];
		var date_todaylogin = $('.date_todaylogin').map(function(){
          return Number($(this).text())
        }).get();

        EchartsColumnsBasicLight('visitor_todaylogin',todaylogin,date_todaylogin,'Today Login User');


        ///

		EchartsColumnsBasicLight('user_visitor',bardata,date_data,'Visitor');
		EchartsColumnsBasicLight('new_visitor',new_user_visitor,date_data,'New User');
		EchartsColumnsBasicLight('ads_users_adsads_user',ads_user_visitor,date_data,'Ads User');
		EchartsColumnsBasicLight('users_merchantuser',merchant_user_visitor,date_data,'Merchant User');


		// Today Login...
		setInterval(function(){
    	$.ajax({
    		url: '<?=BASE_URL_ADMIN?>dashboard/todaylogin_user',
    		type: 'POST',
    		success: function(response) {
    			$(".live_todaylogin").html(response);

    			var todaylogin = [];
				var todaylogin = $('.todaylogin').map(function(){
		          return Number($(this).text())
		        }).get();

		        var date_todaylogin = [];
				var date_todaylogin = $('.date_todaylogin').map(function(){
		          return Number($(this).text())
		        }).get();

		        EchartsColumnsBasicLight('visitor_todaylogin',todaylogin,date_todaylogin,'Today Login User');
    		}
    	})
    }, 60000);

		setInterval(function(){
    	$.ajax({
    		url: '<?=BASE_URL_ADMIN?>dashboard/get_live_visitor',
    		type: 'POST',
    		success: function(response) {
    			$(".live_visitor").html(response);

    			var bardata = [];
				var bardata = $('.visitor').map(function(){
		          return Number($(this).text())
		        }).get();

				EchartsColumnsBasicLight('user_visitor',bardata,date_data,'Visitor');
    		}
    	})
    }, 60000);

		setInterval(function(){
    	$.ajax({
    		url: '<?=BASE_URL_ADMIN?>dashboard/get_newuser_visitor',
    		type: 'POST',
    		success: function(response) {
    			$(".new_visitor").html(response);

    			var new_user_visitor = [];
				var new_user_visitor = $('.new_user_visitor').map(function(){
		          return Number($(this).text())
		        }).get();

				EchartsColumnsBasicLight('new_visitor',new_user_visitor,date_data,'New User');
    		}
    	})
    }, 60000);

		setInterval(function(){
    	$.ajax({
    		url: '<?=BASE_URL_ADMIN?>dashboard/get_new_ads_user_visitor',
    		type: 'POST',
    		success: function(response) {
    			$(".new_ads_user_visitor").html(response);

    			var ads_user_visitor = [];
				var ads_user_visitor = $('.ads_user_visitor').map(function(){
		          return Number($(this).text())
		        }).get();

				EchartsColumnsBasicLight('ads_users_adsads_user',ads_user_visitor,date_data,'Ads User');
    		}
    	})
    }, 60000);

		setInterval(function(){
    	$.ajax({
    		url: '<?=BASE_URL_ADMIN?>dashboard/get_new_merchant_user_visitor',
    		type: 'POST',
    		success: function(response) {
    			$(".new_merchant_user_visitor").html(response);

    			var merchant_user_visitor = [];
				var merchant_user_visitor = $('.merchant_user_visitor').map(function(){
		          return Number($(this).text())
		        }).get();

				EchartsColumnsBasicLight('users_merchantuser',merchant_user_visitor,date_data,'Merchant User');
    		}
    	})
    }, 60000);


	});


/* ------------------------------------------------------------------------------
 *
 *  # Echarts - Basic column example
 *
 *  Demo JS code for basic column chart [light theme]
 *
 * ---------------------------------------------------------------------------- */


// Visitor 
// ------------------------------
function EchartsColumnsBasicLight(id,bardata,date_data,name) {

	

    //
    // Setup module components
    //

    // Basic column chart
    var _columnsBasicLightExample = function() {
        if (typeof echarts == 'undefined') {
            console.warn('Warning - echarts.min.js is not loaded.');
            return;
        }

        // Define element
        var columns_basic_element = document.getElementById(id);


        //
        // Charts configuration
        //

        if (columns_basic_element) {

            // Initialize chart
            var columns_basic = echarts.init(columns_basic_element);


            //
            // Chart config
            //

            // Options
            columns_basic.setOption({

                // Define colors
                color: ['#2ec7c9','#b6a2de','#5ab1ef','#ffb980','#d87a80'],

                // Global text styles
                textStyle: {
                    fontFamily: 'Roboto, Arial, Verdana, sans-serif',
                    fontSize: 13
                },

                // Chart animation duration
                animationDuration: 750,

                // Setup grid
                grid: {
                    left: 0,
                    right: 40,
                    top: 35,
                    bottom: 0,
                    containLabel: true
                },

                // Add legend
                legend: {
                    data: [name, 'Precipitation'],
                    itemHeight: 8,
                    itemGap: 20,
                    textStyle: {
                        padding: [0, 5]
                    }
                },

                // Add tooltip
                tooltip: {
                    trigger: 'axis',
                    backgroundColor: 'rgba(0,0,0,0.75)',
                    padding: [10, 15],
                    textStyle: {
                        fontSize: 13,
                        fontFamily: 'Roboto, sans-serif'
                    }
                },

                // Horizontal axis
                xAxis: [{
                    type: 'category',
                    data: date_data,
                    axisLabel: {
                        color: '#333'
                    },
                    axisLine: {
                        lineStyle: {
                            color: '#999'
                        }
                    },
                    splitLine: {
                        show: true,
                        lineStyle: {
                            color: '#eee',
                            type: 'dashed'
                        }
                    }
                }],

                // Vertical axis
                yAxis: [{
                    type: 'value',
                    axisLabel: {
                        color: '#333'
                    },
                    axisLine: {
                        lineStyle: {
                            color: '#999'
                        }
                    },
                    splitLine: {
                        lineStyle: {
                            color: ['#eee']
                        }
                    },
                    splitArea: {
                        show: true,
                        areaStyle: {
                            color: ['rgba(250,250,250,0.1)', 'rgba(0,0,0,0.01)']
                        }
                    }
                }],

                // Add series
                series: [
                    {
                        name: name,
                        type: 'bar',
                        data: bardata,
                        itemStyle: {
                            normal: {
                                label: {
                                    show: true,
                                    position: 'top',
                                    textStyle: {
                                        fontWeight: 500
                                    }
                                }
                            }
                        },
                        markLine: {
                            data: [{type: 'average', name: 'Average'}]
                        }
                    }
                ]
            });
        }


        //
        // Resize charts
        //

        // Resize function
        var triggerChartResize = function() {
            columns_basic_element && columns_basic.resize();
        };

        // On sidebar width change
        var sidebarToggle = document.querySelector('.sidebar-control');
        sidebarToggle && sidebarToggle.addEventListener('click', triggerChartResize);

        // On window resize
        var resizeCharts;
        window.addEventListener('resize', function() {
            clearTimeout(resizeCharts);
            resizeCharts = setTimeout(function () {
                triggerChartResize();
            }, 200);
        });
    };


    //
    // Return objects assigned to module
    //

    // return {
    //     init: function() {
            _columnsBasicLightExample();
    //     }
    // }
}


</script>

