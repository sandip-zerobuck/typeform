<?php $this->load->view(ADMIN_VIEW.'header'); ?>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">Edit User</h4>
		<div class="heading-elements"></div><br>
	</div>

	<div class="panel-body">
		<form method="post" action="<?=BASE_URL_ADMIN?>usermaster/usermaster/update" enctype="multipart/form-data" class="form-horizontal">

			<input type="hidden" name="id" value="<?=$result->id?>" />

			


			<!-- <div class="form-group">
				<label class="col-md-2 control-label">Pincode : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<select class="select" id="pincode_id" name="pincode_id">
						<option value="">Select Pincode</option>
						<?php foreach($pincode as $key => $value): ?> 
							<option value="<?=$value->id?>" 
								<?php
									if( $value->id == $result->pincode_id ) {
										echo 'selected';
									}
								?>
							><?=$value->pincode?></option> 
						<?php endforeach; ?>
					</select>
					<?=form_error('pincode_id', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div> -->


			
			

			<div class="form-group">
				<label class="col-md-2 control-label">First Name : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="text" name="firstname" placeholder="Eneter First Name" class="form-control" value="<?=$result->firstname?>">
					<?=form_error('firstname', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Last Name : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="text" name="lastname" placeholder="Eneter Last Name" class="form-control" value="<?=$result->lastname?>">
					<?=form_error('lastname', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Mobile Number : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="text" name="mobile" placeholder="Eneter Mobile Number" class="form-control" value="<?=$result->mobile?>">
					<?=form_error('mobile', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Email ID : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="text" name="email" placeholder="Eneter Email Id" class="form-control" value="<?=$result->email?>">
					<?=form_error('email', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<!-- <div class="form-group">
				<label class="col-md-2 control-label">Password : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="text" name="password" placeholder="Eneter Password" class="form-control" value="<?=$result->password?>">
					<?=form_error('password', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div> -->


			<div class="form-group">
				<label class="col-md-2 control-label">Date Of Birth : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="date" name="dob" placeholder="Eneter Date Of Birth" class="form-control" value="<?=$result->dob?>">

					<?=form_error('dob', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>


			<div class="form-group">
				<label class="col-md-2 control-label">Qulification : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<select class="form-control bootstrap-select" data-live-search="true" data-width="100%" name="qulification">
	                    <option value="">Select Qulification</option>
	                    
	                    <?php foreach ($qulification as $key => $value) { ?>
	                        <option value="<?=$value->name?>" <?php
	                        		if($result->qulification == $value->name) {
	                        			echo 'selected';
	                        		}
	                        	?> ><?=$value->name?></option> 
	                    <?php } ?>
	                </select>

	                <?=form_error('qulification', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Country : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<select class="form-control bootstrap-select" data-live-search="true" data-width="100%" name="country_id" id="country_id">
	                    <option value="">Select Country</option>
	                    
	                    <?php foreach ($country as $key => $value) { ?>
	                        <option value="<?=$value->id?>" <?php
	                        		if($result->country_id == $value->id) {
	                        			echo 'selected';
	                        		}
	                        	?> ><?=$value->name?></option> 
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
	                    
	                    <?php foreach ($state as $key => $value) { ?>
	                        <option value="<?=$value->id?>" <?php
	                        		if($result->state_id == $value->id) {
	                        			echo 'selected';
	                        		}
	                        	?> ><?=$value->name?></option> 
	                    <?php } ?>
	                </select>

	                <?=form_error('state_id', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<input type="hidden" class="select_district_id" value="<?=$result->district_id?>">
				<label class="col-md-2 control-label">District : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<select class="form-control bootstrap-select" data-live-search="true" data-width="100%" name="district_id" id="district_id">
	                    <option value="">Select District</option>
	                </select>

	                <?=form_error('district_id', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<input type="hidden" class="select_city_id" value="<?=$result->city_id?>">
				<label class="col-md-2 control-label">Taluka : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<select class="form-control bootstrap-select" data-live-search="true" data-width="100%" name="city_id" id="city_id">
	                    <option value="">Select Taluka</option>
	                </select>

	                <?=form_error('city_id', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<input type="hidden" class="select_area_id" value="<?=$result->area_id?>">
				<label class="col-md-2 control-label">City : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<select class="form-control bootstrap-select" data-live-search="true" data-width="100%" name="area_id" id="area_id">
	                    <option value="">Select City</option>
	                </select>

	                <?=form_error('area_id', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<input type="hidden" class="select_pincode_id" value="<?=$result->pincode_id?>">
				<label class="col-md-2 control-label">Pincode : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<select class="form-control bootstrap-select" data-live-search="true" data-width="100%" name="pincode_id" id="pincode_id">
	                    <option value="">Select Pincode</option>
	                </select>

	                <?=form_error('pincode_id', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Address : <span class="text-danger">*</span></label>
				<div class="col-md-10">

					<textarea name="address" placeholder="Eneter Address" class="form-control"><?=$result->address?></textarea>
					<?=form_error('address', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Refercode : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="text" name="refercode" placeholder="Eneter Refercode" class="form-control" value="<?=$result->refercode?>">
					<?=form_error('refercode', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Invitedcode : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="text" name="invitedcode" placeholder="Eneter Invitedcode" class="form-control" value="<?=$result->invitedcode?>">
					<?=form_error('invitedcode', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			
			
			<div class="form-group">
				<label class="col-md-2 control-label">Status: <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<select class="form-control bootstrap-select" name="status">
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
				<a href="<?=BASE_URL_ADMIN.'usermaster/usermaster/'?>" class="btn btn-danger">Cancel</a>
			</div>
		</form>
	</div>
</div>
<!-- /traffic sources -->
<?php $this->load->view(ADMIN_VIEW.'footer'); ?>	
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- Theme JS files -->
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/selects/bootstrap_select.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/pages/form_bootstrap_select.js"></script>
<!-- /theme JS files -->

<script type="text/javascript">
$(document).ready(function(){
	
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


 fetch_district();

// Fetch District..
 $( "#state_id" ).change(function() {
 	fetch_district();   
  });
 function fetch_district()
 {
 	var state_id = $('#state_id').val();
       $.ajax({
            url: '<?=BASE_URL?>Fech_location/fetch_district',
            type:'POST',
            data:{
                state_id: state_id,
            	select_district_id: $(".select_district_id").val()
            },
            success: function(response) {
            	$('#district_id').html(response);
            	$('#district_id').selectpicker('refresh');
            	fetch_city();
            }
        });
 }

// Fetch Taluka
 $( "#district_id" ).change(function() {
 	 fetch_city();
  });
 function fetch_city()
{
	var district_id = $('#district_id').val();
       $.ajax({
            url: '<?=BASE_URL?>Fech_location/fetch_city',
            type:'POST',
            data:{
                district_id: district_id,
                select_city_id: $(".select_city_id").val()
            },
            success: function(response) {
              $('#city_id').html(response);
              $('#city_id').selectpicker('refresh');
              fetch_area();
            }
        });
}

// Fetch City
 $( "#city_id" ).change(function() {
 	fetch_area();
  });
function fetch_area()
{
	var city_id = $('#city_id').val();
       $.ajax({
            url: '<?=BASE_URL?>Fech_location/fetch_area',
            type:'POST',
            data:{
                city_id: city_id,
                select_area_id: $(".select_area_id").val()
            },
            success: function(response) {
              $('#area_id').html(response);
              $('#area_id').selectpicker('refresh');
              fetch_pincode();
            }
        });
}

// Fetch Pincode
 $( "#area_id" ).change(function() {
       fetch_pincode();
  });
function fetch_pincode()
{
	var area_id = $('#area_id').val();
       $.ajax({
            url: '<?=BASE_URL?>Fech_location/fetch_pincode',
            type:'POST',
            data:{
                area_id: area_id,
                select_pincode_id: $(".select_pincode_id").val()
            },
            success: function(response) {
              $('#pincode_id').html(response);
              $('#pincode_id').selectpicker('refresh');
            }
        });
}

});
</script>