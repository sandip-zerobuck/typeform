<?php $this->load->view(ADMIN_VIEW.'header'); ?>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">Edit Distributor</h4>
		<div class="heading-elements"></div><br>
	</div>

	<div class="panel-body">
		<form method="post" action="<?=BASE_URL_ADMIN?>distributors/distributors/update" class="form-horizontal">
			<input type="hidden" name="id" value="<?=$result->id?>" />
			<div class="form-group">
				<label class="col-md-2 control-label">Name: <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="text" name="name" class="form-control" value="<?=$result->name; ?>">
					<?=form_error('name', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Name of firm: <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="text" name="firm_name" class="form-control" value="<?=$result->firm_name; ?>">
					<?=form_error('firm_name', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Mobile: <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="text" name="mobile" class="form-control" value="<?=$result->mobile; ?>">
					<?=form_error('mobile', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">City: <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<select class="select" name="distributors_city_id">
						<option value="">Select City</option>
						<?php foreach($city as $key => $value): ?> 
							<option value="<?=$value->id?>"
								<?php
									if( $result->distributors_city_id == $value->id ) {
										echo 'selected';
									}
								?>
							><?=$value->name?></option> 
						<?php endforeach; ?>
					</select>
					<?=form_error('distributors_city_id', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Address: <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<textarea class="form-control" name="address"><?=$result->address?></textarea>
					<?=form_error('address', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Status: <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<select class="select" name="status">
						<option value="1"
							<?php
								if( $result->status == 1 ) {
									echo 'selected';
								}
							?>
						>Active</option>
						<option value="0"
							<?php
								if( $result->status == 0 ) {
									echo 'selected';
								}
							?>
						>Inactive</option>
					</select>
					<?=form_error('status', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>
			<div class="form-group">
				<input type="submit" value="Submit" class="btn btn-success">
				<a href="<?=BASE_URL_ADMIN.'distributors/distributors/'?>" class="btn btn-danger">Cancel</a>
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