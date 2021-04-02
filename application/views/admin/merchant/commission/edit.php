<?php $this->load->view(ADMIN_VIEW.'header'); ?>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">Edit Slider Content</h4>
		<div class="heading-elements"></div><br>
	</div>

	<div class="panel-body">
		<form method="post" action="<?=BASE_URL_ADMIN?>merchantuser/Commission/update" enctype="multipart/form-data" class="form-horizontal">
			<input type="hidden" name="id" value="<?=$result->id?>" />

			<div class="row">
				<div class="col-md-4">
					<div class="multi-select-full">
						<label class="control-label">Percentage <span class="text-danger">*</span></label>
						<input type="text" name="percentage" class="form-control number" placeholder="Enter percentage" value="<?=$result->percentage?>" autocomplete="off">
					<?=form_error('percentage', '<div class="text-danger">', '</div>'); ?>
					</div>
				</div>

				<div class="col-md-4">
					<div class="multi-select-full">
						<label class="control-label">Name <span class="text-danger">*</span></label>
						<input type="text" name="name" class="form-control" placeholder="Enter Name" value="<?=$result->name?>" autocomplete="off">
					<?=form_error('name', '<div class="text-danger">', '</div>'); ?>
					</div>
				</div>

				<div class="col-md-4">
					<div class="multi-select-full">
						<label class="control-label">Status: </label>
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

			</div>


		
			<div class="form-group">
				<br><br>
				<input type="submit" value="Submit" class="btn btn-success">
				<a href="<?=BASE_URL_ADMIN.'merchantuser/Commission'?>" class="btn btn-danger">Cancel</a>
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