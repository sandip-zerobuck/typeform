<?php $this->load->view(ADMIN_VIEW.'header'); ?>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">Add Ads User</h4>
		<div class="heading-elements"></div><br>
	</div>

	<div class="panel-body">
		<form method="post" action="<?=BASE_URL_ADMIN?>adsuser/Adsuser/store" enctype="multipart/form-data" class="form-horizontal">


			<div class="form-group">
				<label class="col-md-2 control-label">Name : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="text" name="name" class="form-control" placeholder="Enter Name" value="<?=set_value('name'); ?>">
					<?=form_error('name', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Mobile Number : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="text" name="mobile" class="form-control" placeholder="Enter Mobile" value="<?=set_value('mobile'); ?>">
					<?=form_error('mobile', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Email ID : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="text" name="email" class="form-control" placeholder="Enter Email" value="<?=set_value('email'); ?>">
					<?=form_error('email', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Password : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="text" name="password" class="form-control" placeholder="Enter Password" value="<?=set_value('password'); ?>">
					<?=form_error('password', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<!-- <div class="form-group">
				<label class="col-md-2 control-label">Country : <span class="text-danger">*</span></label>
				<div class="col-md-10">

					<select class="bootstrap-select" data-live-search="true" data-width="100%"  id="country_id" name="country_id">


						<option value="">Select Country</option>
						<?php foreach($country as $key => $value): ?> 
							<option value="<?=$value->id?>" <?=set_select('country_id',$value->id)?>><?=$value->name?></option> 
						<?php endforeach; ?>
					</select>
					<?=form_error('country_id', '<div class="text-danger">', '</div>'); ?>


				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">State : <span class="text-danger">*</span></label>
				<div class="col-md-10">

					<select class="bootstrap-select" data-live-search="true" data-width="100%" id="state_id" name="state_id">
						<option value="">Select State</option>
					</select>
					<?=form_error('state_id', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">City : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<select class="bootstrap-select" data-live-search="true" data-width="100%" id="city_id" name="city_id">
						<option value="">Select City</option>

					</select>
					<?=form_error('city_id', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Area : <span class="text-danger">*</span></label>
				<div class="col-md-10">
						<select class="bootstrap-select" data-live-search="true" data-width="100%" id="area_id" name="area_id">
						<option value="">Select Area</option>

					</select>
					<?=form_error('area_id', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div> -->

			<div class="form-group">
	            <label class="col-md-2 control-label">Pincode : <span class="text-danger">*</span></label>
	            <div class="col-md-10">
		            <select class="bootstrap-select pincode-report" name="pincode_id" data-live-search="true" data-width="100%" id="pincode_id">
		                <option value="">Select Pincode</option>
						<?php foreach($pincode as $key => $value): ?> 
							<option value="<?=$value->id?>" <?=set_select('country_id',$value->id)?>><?=$value->pincode?></option> 
						<?php endforeach; ?>
		            </select>
		            <?=form_error('pincode', '<div class="text-danger">', '</div>'); ?>
	        	</div>
	        </div>

			<div class="form-group">
				<label class="col-md-2 control-label">Status: <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<select class=" form-control" name="status">
						<option value="1" <?php echo set_select('status', '1', TRUE); ?>>Active</option>
						<option value="0" <?php echo set_select('status', '0'); ?>>Inactive</option>
					</select>
					<?=form_error('status', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			
			<div class="form-group">
				<input type="submit" value="Submit" class="btn btn-success">
				<a href="<?=BASE_URL_ADMIN.'adsuser/Adsuser'?>" class="btn btn-danger">Cancel</a>
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
            url: '<?=BASE_URL_ADMIN?>areamaster/pincodemaster/fetch_state',
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
            url: '<?=BASE_URL_ADMIN?>areamaster/pincodemaster/fetch_city',
            type:'POST',
            data:{
                state_id: state_id
            },
            success: function(response) {
            	$('#city_id').html(response);
            	$('#city_id').selectpicker('refresh');
            }
        });
	});

	/* Select City Of the State Selected */
    $( "#city_id" ).change(function() {
  		var city_id = $('#city_id').val();

    	 $.ajax({
            url: '<?=BASE_URL_ADMIN?>areamaster/pincodemaster/fetch_area',
            type:'POST',
            data:{
                city_id: city_id
            },
            success: function(response) {
            	$('#area_id').html(response);
            	$('#area_id').selectpicker('refresh');
            }
        });

	});

	/* Select Area Of the City Selected */
    $( "#area_id" ).change(function() {

        var area_id = $('#area_id').val();
        var areaname = $('#area_id').find(":selected").text();

         $.ajax({
            url: '<?=BASE_URL_ADMIN?>areamaster/pincodemaster/fetch_pincode',
            type:'POST',
            data:{
                area_id: area_id
            },
            success: function(response) {
                $('#pincode_id').html(response);
                $('#pincode_id').selectpicker('refresh');
                table.fnFilter(areaname).draw();
            }
        });
    });



});
</script>