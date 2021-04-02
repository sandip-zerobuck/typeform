<?php $this->load->view(ADMIN_VIEW.'header'); ?>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">Edit District</h4>
		<div class="heading-elements"></div><br>
	</div>

	<div class="panel-body">
		<form method="post" action="<?=BASE_URL_ADMIN?>areamaster/citymaster/update" enctype="multipart/form-data" class="form-horizontal">
			<input type="hidden" name="id" value="<?=$result->id?>" />


			<div class="form-group">
				<label class="col-md-2 control-label">Country Name : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<select class="bootstrap-select" data-live-search="true" data-width="100%"  id="country_id" name="country_id">
						<option value="">Select Country</option>
						<?php foreach($country as $key => $value): ?> 
							<option value="<?=$value->id?>" 
								<?php
									if( $value->id == $result->country_id ) {
										echo 'selected';
									}
								?>
							><?=$value->name?></option> 
						<?php endforeach; ?>
					</select>
					<?=form_error('country_id', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">State Name : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<select class="bootstrap-select" data-live-search="true" data-width="100%" id="state" name="state_id">
						<option value="">Select State</option>
						<?php foreach($state as $key => $value): ?> 
							<option value="<?=$value->id?>" 
								<?php
									if( $value->id == $result->state_id ) {
										echo 'selected';
									}
								?>
							><?=$value->name?></option> 
						<?php endforeach; ?>
					</select>
					<?=form_error('state_id', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>


			<div class="form-group">
				<label class="col-md-2 control-label">City Name : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="text" name="name" class="form-control" value="<?=$result->name?>">
					<?=form_error('name', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>



			
			<div class="form-group">
				<label class="col-md-2 control-label">Status : </label>
				<div class="col-md-10">
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
				<a href="<?=BASE_URL_ADMIN.'areamaster/citymaster/'?>" class="btn btn-danger">Cancel</a>
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

/* Select City Of the State Selected */
    $( "#country_id" ).change(function() {
  		var country_id = $('#country_id').val();
    	 $.ajax({
            url: '<?=BASE_URL_ADMIN?>areamaster/citymaster/fetch_state',
            type:'POST',
            data:{
                country_id: country_id
            },
            success: function(response) {
            	$('#state').html(response);
            	$('#state').selectpicker('refresh');
            }
        });
	});

});
</script>