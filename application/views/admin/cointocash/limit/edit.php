<?php $this->load->view(ADMIN_VIEW.'header'); ?>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">Edit Coin to Cash limit</h4>
		<div class="heading-elements"></div><br>
	</div>

	<div class="panel-body">
		<form method="post" action="<?=BASE_URL_ADMIN?>cointocash/cashlimit/update" enctype="multipart/form-data" class="form-horizontal">
			<input type="hidden" name="id" value="<?=$result->id?>" />

			<div class="form-group">
				<b class="col-md-2 control-label">Payment Method Name: <span class="text-danger">*</span></b>
				<div class="col-md-4">
					<input type="text" name="name" class="form-control" value="<?=$result->name?>" placeholder="Enter Payment Method Name">
					<?=form_error('name', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<b class="col-md-2 control-label">Coin: <span class="text-danger">*</span></b>
				<div class="col-md-4">
					<input type="text" name="coin" class="form-control" value="<?=$result->coin?>" placeholder="Enter Coin">
					<?=form_error('coin', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<b class="col-md-2 control-label">Cash: <span class="text-danger">*</span></b>
				<div class="col-md-4">
					<input type="text" name="cash" class="form-control" value="<?=$result->cash?>" placeholder="Enter Cash">
					<?=form_error('cash', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>
			
			<div class="form-group">
				<b class="col-md-2 control-label">Status: <span class="text-danger">*</span></b>
				<div class="col-md-4">
					<select class="select" name="status">
						<option value="1" <?php 
							if( $result->status == 1 ) {
								echo 'selected';
							}
						?>>Active</option>
						<option value="0" <?php 
							if( $result->status == 0 ) {
								echo 'selected';
							}
						?>>Inactive</option>
					</select>
					<?=form_error('status', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>
			<div class="form-group">
				<input type="submit" value="Submit" class="btn btn-success">
				<a href="<?=BASE_URL_ADMIN.'cointocash/cashlimit/'?>" class="btn btn-danger">Cancel</a>
			</div>
		</form>
	</div>
</div>
<!-- /traffic sources -->
<?php $this->load->view(ADMIN_VIEW.'footer'); ?>	

<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/selects/select2.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/styling/uniform.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/core/libraries/jquery_ui/interactions.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/selects/select2.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	$(".file-styled").uniform({
        fileButtonHtml: '<i class="icon-googleplus5"></i>',
        wrapperClass: 'bg-warning'
    });

    $('.select').select2({
        minimumResultsForSearch: "-1"
    });

});
</script>