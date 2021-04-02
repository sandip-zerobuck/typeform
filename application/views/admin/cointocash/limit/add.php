<?php $this->load->view(ADMIN_VIEW.'header'); ?>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">Add Coin to Cash limit</h4>
		<div class="heading-elements"></div><br>
	</div>

	<div class="panel-body">
		<form method="post" action="<?=BASE_URL_ADMIN?>cointocash/cashlimit/store" enctype="multipart/form-data" class="form-horizontal">

			<div class="form-group">
				<b class="col-md-2 control-label">Payment Method Name: <span class="text-danger">*</span></b>
				<div class="col-md-4">
					<input type="text" name="name" class="form-control" value="<?=set_value('name'); ?>" placeholder="Enter Payment Method Name">
					<?=form_error('name', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<b class="col-md-2 control-label">Coin: <span class="text-danger">*</span></b>
				<div class="col-md-4">
					<input type="text" name="coin" class="form-control" value="<?=set_value('coin'); ?>" placeholder="Enter Coin">
					<?=form_error('coin', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<b class="col-md-2 control-label">Cash: <span class="text-danger">*</span></b>
				<div class="col-md-4">
					<input type="text" name="cash" class="form-control" value="<?=set_value('cash'); ?>" placeholder="Enter Cash">
					<?=form_error('cash', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<b class="col-md-2 control-label">Status: <span class="text-danger">*</span></b>
				<div class="col-md-4">
					<select class="form-control" name="status">
						<option value="1" <?php echo set_select('status', '1', TRUE); ?>>Active</option>
						<option value="0" <?php echo set_select('status', '0'); ?>>Inactive</option>
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