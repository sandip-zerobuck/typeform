<?php $this->load->view(ADMIN_VIEW.'header'); ?>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">Change Password</h4>
		<div class="heading-elements"></div><br>
	</div>

	<div class="panel-body">
		<form method="post" action="<?=BASE_URL_ADMIN?>Dashboard/updatepassword" enctype="multipart/form-data" class="form-horizontal">
			<input type="hidden" name="id" value="<?=$id?>" />

			<div class="form-group">
				<label class="col-md-2 control-label"><b>New Password : <span class="text-danger">*</span></b></label>
				<div class="col-md-4">
					<input type="password" name="password" class="form-control" placeholder="Enter Password" value="">
					<?=form_error('password', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label"><b>Confirm Password : <span class="text-danger">*</span></b></label>
				<div class="col-md-4">
					<input type="password" name="cpassword" class="form-control" placeholder="Enter Confirm Password" value="">
					<?=form_error('cpassword', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			

			


			
			<div class="form-group">
				<input type="submit" value="Submit" class="btn btn-success">
				<a href="<?=BASE_URL_ADMIN.'company_info/'?>" class="btn btn-danger">Cancel</a>
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
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/editors/summernote/summernote.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	$('.summernote').summernote();
	
	

});
</script>