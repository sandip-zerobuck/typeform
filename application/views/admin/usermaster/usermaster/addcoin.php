<?php $this->load->view(ADMIN_VIEW.'header'); ?>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">Add Coin</h4>
		<div class="heading-elements"></div><br>
	</div>

	<div class="panel-body">
		<form method="post" action="<?=BASE_URL_ADMIN?>usermaster/usermaster/addcoinuser" enctype="multipart/form-data" class="form-horizontal">

			<input type="hidden" name="userid" value="<?=$result->id?>" />
	
			<div class="form-group">
				<label class="col-md-2 control-label">Coin <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="text" name="coin" placeholder="Eneter Coin" class="form-control" value="<?=set_value('coin')?>">
					<?=form_error('coin', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Description <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="text" name="description" placeholder="Eneter Description" class="form-control" value="<?=set_value('description')?>">
					<?=form_error('description', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>


			<div class="form-group">
				<input type="submit" value="Add Coin" class="btn btn-primary">
				<a href="<?=BASE_URL_ADMIN.'usermaster/usermaster/'?>" class="btn btn-danger">Cancel</a>
			</div>
		</form>
	</div>
</div>
<!-- /traffic sources -->
<?php $this->load->view(ADMIN_VIEW.'footer'); ?>	
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- Theme JS files -->
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/selects/bootstrap_select.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/pages/form_bootstrap_select.js"></script>
<!-- /theme JS files -->
