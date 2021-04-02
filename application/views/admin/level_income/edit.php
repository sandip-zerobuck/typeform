<?php $this->load->view(ADMIN_VIEW.'header'); ?>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">Edit Level  Income</h4>
		<div class="heading-elements"></div><br>
	</div>

	<div class="panel-body">
		<form method="post" action="<?=BASE_URL_ADMIN?>level_income/update" enctype="multipart/form-data" class="form-horizontal">
			<input type="hidden" name="id" value="<?=$result->id?>" />


			<div class="form-group">
				<b class="col-md-3 control-label">Signup Bouns Percentage(%) : <span class="text-danger">*</span></b>
				<div class="col-md-2">
					<input type="text" name="signup_bouns_percentage" class="form-control" value="<?=$result->signup_bouns_percentage?>">
					<?=form_error('signup_bouns_percentage', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<b class="col-md-3 control-label">Earn Coin Commision Percentage(%) : <span class="text-danger">*</span></b>
				<div class="col-md-2">
					<input type="text" name="income_bouns_percentage" class="form-control" value="<?=$result->income_bouns_percentage?>">
					<?=form_error('income_bouns_percentage', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			

			<div class="form-group">
				<b class="col-md-2 control-label">Status : </b>
				<div class="col-md-5">
					<select class="select form-control" name="status">
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
				<a href="<?=BASE_URL_ADMIN.'level_income/'?>" class="btn btn-danger">Cancel</a>
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