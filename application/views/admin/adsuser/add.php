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
					<input type="text" name="mobile" class="form-control number" placeholder="Enter Mobile" value="<?=set_value('mobile'); ?>">
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

			<div class="form-group">
				<label class="col-md-2 control-label">Country : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<select class="form-control bootstrap-select" data-live-search="true" data-width="100%" name="country_id" id="country_id">
	                    <option value="">Select Country</option>
	                    
	                    <?php foreach ($country as $key => $value) { ?>
	                        <option value="<?=$value->id?>" <?=set_select('country_id', $value->id)?> ><?=$value->name?></option> 
	                    <?php } ?>
	                </select>

	                <?=form_error('country_id', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">State : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<select class="form-control bootstrap-select" data-live-search="true" data-width="100%" name="state_id" id="state_id">
	                    <option value="">Select State</option>
	                </select>

	                <?=form_error('state_id', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">District : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<select class="form-control bootstrap-select" data-live-search="true" data-width="100%" name="district_id" id="district_id">
	                    <option value="">Select District</option>
	                </select>

	                <?=form_error('district_id', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Taluka : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<select class="form-control bootstrap-select" data-live-search="true" data-width="100%" name="city_id" id="city_id">
	                    <option value="">Select Taluka</option>
	                </select>

	                <?=form_error('city_id', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">City : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<select class="form-control bootstrap-select" data-live-search="true" data-width="100%" name="area_id" id="area_id">
	                    <option value="">Select City</option>
	                </select>

	                <?=form_error('area_id', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Pincode : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<select class="form-control bootstrap-select" data-live-search="true" data-width="100%" name="pincode_id" id="pincode_id">
	                    <option value="">Select Pincode</option>
	                </select>

	                <?=form_error('pincode_id', '<div class="text-danger">', '</div>'); ?>
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

	 $('.number').on('keypress', function(e) {
 var $this = $(this);
 var regex = new RegExp("^[0-9\b]+$");
 var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
 // for 10 digit number only
 if ($this.val().length > 9) {
    e.preventDefault();
    return false;
  }
  if (regex.test(str)) {
    return true;
  }
  e.preventDefault();
  return false;
});
	
// Fetch State.......
 $( "#country_id" ).change(function() {

        var country_id = $('#country_id').val();
       $.ajax({
            url: '<?=BASE_URL?>Fech_location/fetch_state',
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

// Fetch District..
 $( "#state_id" ).change(function() {

        var state_id = $('#state_id').val();
       $.ajax({
            url: '<?=BASE_URL?>Fech_location/fetch_district',
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

// Fetch Taluka
 $( "#district_id" ).change(function() {

        var district_id = $('#district_id').val();
       $.ajax({
            url: '<?=BASE_URL?>Fech_location/fetch_city',
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

// Fetch City
 $( "#city_id" ).change(function() {

        var city_id = $('#city_id').val();
       $.ajax({
            url: '<?=BASE_URL?>Fech_location/fetch_area',
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

// Fetch Pincode
 $( "#area_id" ).change(function() {

        var area_id = $('#area_id').val();
       $.ajax({
            url: '<?=BASE_URL?>Fech_location/fetch_pincode',
            type:'POST',
            data:{
                area_id: area_id
            },
            success: function(response) {
              $('#pincode_id').html(response);
              $('#pincode_id').selectpicker('refresh');
            }
        });
  });

});
</script>