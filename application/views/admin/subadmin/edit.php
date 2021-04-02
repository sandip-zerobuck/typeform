<?php $this->load->view(ADMIN_VIEW.'header'); ?>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">Edit Ads User</h4>
		<div class="heading-elements"></div><br>
	</div>

	<div class="panel-body">
		<form method="post" action="<?=BASE_URL_ADMIN?>adsuser/Adsuser/update" enctype="multipart/form-data" class="form-horizontal">
			<input type="hidden" name="id" value="<?=$result->id?>" />

			<div class="row">


				<div class="col-md-4">
					<label class="control-label">UserName :</label>

						<div class="multi-select-full">
							<input type="text" name="username" class="form-control" placeholder="Enter UserName" value="<?=$result->username; ?>">
					<?=form_error('username', '<div class="text-danger">', '</div>'); ?>
						</div>

				</div>


				<!-- <div class="col-md-4">
					<label class="control-label">Password : </label>

						<div class="multi-select-full">
							<input type="text" name="password" class="form-control" placeholder="Enter Password" value="<?=$result->password; ?>">
					<?=form_error('password', '<div class="text-danger">', '</div>'); ?>
						</div>

				</div> -->



				<div class="col-md-4">
					<label class="control-label">Select Module</label>

						<div class="multi-select-full">
							<select class="multiselect-select-all-filtering module" multiple="multiple" name="module[]" id="module">


								 <option value="">Select Module</option>
								<?php foreach($module as $key => $value): ?> 
									<option value="<?=$value->id?>" 
										<?php

										foreach ($admin_module as $key => $value_m) {
											
											if( $value->id == $value_m->module_id ) {
												echo 'selected';
											}
										}		
										?>
									><?=$value->name?></option> 
								<?php endforeach; ?> 


							</select>
						</div>

				</div>

			</div>


			<!-- <div class="form-group">
				<label class="col-md-2 control-label">Status: <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<select class=" form-control" name="status">
						<option value="1" <?php echo set_select('status', '1', TRUE); ?>>Active</option>
						<option value="0" <?php echo set_select('status', '0'); ?>>Inactive</option>
					</select>
					<?=form_error('status', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div> -->

			
			<div class="form-group">
				<br><br>
				<input type="submit" value="Submit" class="btn btn-success">
				<a href="<?=BASE_URL_ADMIN.'subadmin/index'?>" class="btn btn-danger">Cancel</a>
			</div>

		</form>
	</div>
</div>
<!-- /traffic sources -->
<?php $this->load->view(ADMIN_VIEW.'footer'); ?>	

<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/styling/uniform.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/core/app.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/pages/form_multiselect.js"></script>

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