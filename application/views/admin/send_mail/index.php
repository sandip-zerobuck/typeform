<?php $this->load->view(ADMIN_VIEW.'header'); ?>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">Edit Send Mail Details</h4>
		<div class="heading-elements"></div><br>
	</div>

	<div class="panel-body">
		<form method="post" action="<?=BASE_URL_ADMIN?>send_mail/add/update" enctype="multipart/form-data" class="form-horizontal">
			<input type="hidden" name="id" value="<?=$result->id?>" />

			<div class="form-group row">
				<div class="col-md-4">
					<br>
					<label><b>SMTP User :</b></label>
					<input type="text" name="smtp_user" class="form-control" value="<?=$result->smtp_user?>">
					<?=form_error('smtp_user', '<div class="text-danger">', '</div>'); ?>
				</div>

				<div class="col-md-4">
					<br>
					<label><b>SMTP Email Id :</b></label>
					<input type="text" name="smtp_from" class="form-control" value="<?=$result->smtp_from?>">
					<?=form_error('smtp_from', '<div class="text-danger">', '</div>'); ?>
				</div>

				<div class="col-md-4">
					<br>
					<label><b>SMTP Email Password :</b></label>
					<input type="text" name="smtp_pass" class="form-control" value="<?=$result->smtp_pass?>">
					<?=form_error('smtp_pass', '<div class="text-danger">', '</div>'); ?>
				</div>

				<div class="col-md-4">
					<br>
					<label><b>SMTP Host Name :</b></label>
					<input type="text" name="smtp_host" class="form-control" value="<?=$result->smtp_host?>">
					<?=form_error('smtp_host', '<div class="text-danger">', '</div>'); ?>
				</div>

				<div class="col-md-4">
					<br>
					<label><b>SMTP Port :</b></label>
					<input type="text" name="smtp_port" class="form-control" value="<?=$result->smtp_port?>">
					<?=form_error('smtp_port', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			
		

			
			<div class="form-group">
				<input type="submit" value="Submit" class="btn btn-success">
				<a href="<?=BASE_URL_ADMIN.'send_mail/'?>" class="btn btn-danger">Cancel</a>
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


});
</script>