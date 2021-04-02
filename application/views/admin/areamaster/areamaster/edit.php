<?php $this->load->view(ADMIN_VIEW.'header'); ?>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">Edit City</h4>
		<div class="heading-elements"></div><br>
	</div>

	<div class="panel-body">
		<form method="post" action="<?=BASE_URL_ADMIN?>areamaster/areamaster/update" enctype="multipart/form-data" class="form-horizontal">
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
					<select class="bootstrap-select" data-live-search="true" data-width="100%" id="state_id" name="state_id">
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
				<label class="col-md-2 control-label">District Name : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<select class="bootstrap-select" data-live-search="true" data-width="100%" id="district_id" name="district_id">
						<option value="">Select District</option>
						<?php foreach($district as $key => $value): ?> 
							<option value="<?=$value->id?>" 
								<?php
									if( $value->id == $result->district_id ) {
										echo 'selected';
									}
								?>
							><?=$value->name?></option> 
						<?php endforeach; ?>
					</select>
					<?=form_error('district_id', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Taluka : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<select class="bootstrap-select" data-live-search="true" data-width="100%" id="city_id" name="city_id">
						<option value="">Select Taluka</option>
						<?php foreach($city as $key => $value): ?> 
							<option value="<?=$value->id?>" 
								<?php
									if( $value->id == $result->city_id ) {
										echo 'selected';
									}
								?>
							><?=$value->name?></option> 
						<?php endforeach; ?>
					</select>
					<?=form_error('city_id', '<div class="text-danger">', '</div>'); ?>
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
					<select class="select state" id="state_id" name="status">
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
				<a href="<?=BASE_URL_ADMIN.'areamaster/areamaster/'?>" class="btn btn-danger">Cancel</a>
			</div>
		</form>
	</div>
</div>
<!-- /traffic sources -->
<?php $this->load->view(ADMIN_VIEW.'footer'); ?>	

<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/selects/select2.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/styling/uniform.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/core/libraries/jquery_ui/interactions.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/selects/bootstrap_select.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/pages/form_bootstrap_select.js"></script>

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
            url: '<?=BASE_URL_ADMIN?>areamaster/Fetch_location/fetch_state',
            type:'POST',
            data:{
                country_id: country_id
            },
            success: function(response) {
            	$('#state_id').html(response);
            	$('#state_id').selectpicker('refresh');
            }
        });
	});

/* Select City Of the State Selected */
    $( "#state_id" ).change(function() {
  		var state_id = $('#state_id').val();
    	 $.ajax({
            url: '<?=BASE_URL_ADMIN?>areamaster/Fetch_location/fetch_district',
            type:'POST',
            data:{
                state_id: state_id
            },
            success: function(response) {
            	$('#district_id').html(response);
            	$('#district_id').selectpicker('refresh');
            }
        });
	});


/* Select City Of the State Selected */
    $( "#district_id" ).change(function() {
  		var district_id = $('#district_id').val();
    	 $.ajax({
            url: '<?=BASE_URL_ADMIN?>areamaster/Fetch_location/fetch_city',
            type:'POST',
            data:{
                district_id: district_id
            },
            success: function(response) {
            	$('#city_id').html(response);
            	$('#city_id').selectpicker('refresh');
            }
        });
	});

});
</script>