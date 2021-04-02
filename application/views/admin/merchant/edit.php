<?php $this->load->view(ADMIN_VIEW.'header'); ?>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">Edit</h4>
		<div class="heading-elements"></div><br>
	</div>

	<div class="panel-body">
		<form method="post" action="<?=BASE_URL_ADMIN?>merchant/update" enctype="multipart/form-data" class="form-horizontal">
			<input type="hidden" name="id" value="<?=$result->id?>" />
			<input type="hidden" name="old_image" value="<?=$result->image?>" />

			<div class="form-group">
				<label class="col-md-2 control-label">Shop Name : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="text" name="shopname" class="form-control" placeholder="Shop Name" value="<?=$result->shopname?>">
					<?=form_error('shopname', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Commission Type : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<select class="form-control bootstrap-select" data-live-search="true" data-width="100%" name="m_commission">
	                    <option value="">Select Commission Type</option>

	                    
	                    <?php foreach($m_commission as $key => $value){  ?> 
	                        <option value="<?=$value->id?>" <?php
	                        		if($result->m_commission == $value->id) {
	                        			echo 'selected';
	                        		}
	                        	?> <?=set_select('m_commission', $value->percentage)?> ><?=$value->percentage?> %</option> 
	                    <?php } ?>
	                </select>

	                <?=form_error('m_commission', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Discount Range : <span class="text-danger">*</span></label>
				<div class="col-md-3">
					<label><b>Discount Start (%)</b></label>
					<input type="text"  name="discount_range" autocomplete="off"  class="form-control number" value="<?=$result->discount_range?>" placeholder="Discount Start (%)">
					<?=form_error('discount_range', '<div class="text-danger">', '</div>'); ?>
				</div>

				<div class="col-md-3">
					<label><b>Discount End (%)</b></label>
					<input type="text"  name="discount_range_end" autocomplete="off"  class="form-control number" value="<?=$result->discount_range_end?>" placeholder="Discount End (%)">
					<?=form_error('discount_range_end', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Discount Amount Limit : <span class="text-danger">*</span></label>
				<div class="col-md-3">
					<label><b>Discount Set</b></label>
					<select class="form-control bootstrap-select" data-live-search="true" data-width="100%" name="m_discount_id" id="m_discount_id">
	                    <?php foreach($m_discount as $key => $value){  ?> 
	                        <option value="<?=$value->id?>" <?php
	                        		if($result->m_discount_id == $value->id) {
	                        			echo 'selected';
	                        		}
	                        	?> <?=set_select('m_discount_id', $value->percentage)?> ><?=$value->percentage?> %</option> 
	                    <?php } ?>
	                </select>
					<?=form_error('m_discount_id', '<div class="text-danger">', '</div>'); ?>
				</div>

				<div class="col-md-3">
					<label><b>Amount Limit (Rs.)</b></label>
					<input type="text"  name="amount_limit" autocomplete="off"  class="form-control number" value="<?=$result->amount_limit?>" placeholder="Amount Limit">
					<?=form_error('amount_limit', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Target: <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="text"  name="target" class="form-control" value="<?=$result->target?>" placeholder="Enter Target">
					<?=form_error('target', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Target Alert: <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="text"  name="target_alert" class="form-control" value="<?=$result->target_alert?>" placeholder="Target Alert">
					<?=form_error('target_alert', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Shop Type : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<select class="form-control bootstrap-select" data-live-search="true" data-width="100%" name="shop_type">
	                    <option value="">Select Shop Type</option>
	                    
	                    <?php foreach($shoptype as $key => $value){  ?> 
	                        <option value="<?=$value->name?>" <?php
	                        		if($result->shop_type == $value->name) {
	                        			echo 'selected';
	                        		}
	                        	?> <?=set_select('shop_type', $value->name)?> <?=set_select('shop_type', $value->name)?> ><?=$value->name?></option> 
	                    <?php } ?>
	                </select>

	                <?=form_error('shop_type', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			

			<div class="form-group">
				<label class="col-md-2 control-label">Name : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="text" name="name" class="form-control" placeholder="Name" value="<?=$result->name?>">
					<?=form_error('name', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			

			<div class="form-group">
				<label class="col-md-2 control-label">Mobile Number : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="text" id="number" name="mobile" class="form-control" value="<?=$result->mobile; ?>" placeholder="Mobile Number">
					<?=form_error('mobile', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Email Id : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="email"  name="email" class="form-control" value="<?=$result->email; ?>" placeholder="Email Id">
					<?=form_error('email', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>


			<div class="form-group">
				<label class="col-md-2 control-label">Password: <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="text"  name="password" class="form-control" value="<?=base64_decode($result->password)?>" placeholder="Password">
					<?=form_error('password', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>


			<div class="form-group">
				<label class="col-md-2 control-label">Country : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<select class="form-control bootstrap-select" data-live-search="true" data-width="100%" name="country_id" id="country_id">
	                    <option value="">Select Country</option>
	                    
	                    <?php foreach ($country as $key => $value) { ?>
	                        <option value="<?=$value->id?>" <?php
	                        		if($location->country_id == $value->id) {
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
	                        		if($location->state_id == $value->id) {
	                        			echo 'selected';
	                        		}
	                        	?> ><?=$value->name?></option> 
	                    <?php } ?>
	                </select>

	                <?=form_error('state_id', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<input type="hidden" class="select_district_id" value="<?=$location->district_id?>">
				<label class="col-md-2 control-label">District : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<select class="form-control bootstrap-select" data-live-search="true" data-width="100%" name="district_id" id="district_id">
	                    <option value="">Select District</option>
	                </select>

	                <?=form_error('district_id', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<input type="hidden" class="select_city_id" value="<?=$location->city_id?>">
				<label class="col-md-2 control-label">Taluka : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<select class="form-control bootstrap-select" data-live-search="true" data-width="100%" name="city_id" id="city_id">
	                    <option value="">Select Taluka</option>
	                </select>

	                <?=form_error('city_id', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<input type="hidden" class="select_area_id" value="<?=$location->area_id?>">
				<label class="col-md-2 control-label">City : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<select class="form-control bootstrap-select" data-live-search="true" data-width="100%" name="area_id" id="area_id">
	                    <option value="">Select City</option>
	                </select>

	                <?=form_error('area_id', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<input type="hidden" class="select_pincode_id" value="<?=$location->id?>">
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
					

					<textarea class=" form-control" name="address" placeholder="Enter Address"><?=$result->address?></textarea>
					<?=form_error('address', '<div class="text-danger">', '</div>'); ?>

				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Shop Details : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					

					<textarea class=" form-control" name="details" placeholder="Enter Details"><?=$result->details?></textarea>
					<?=form_error('details', '<div class="text-danger">', '</div>'); ?>

				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Shop Time : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					

					<textarea class=" form-control" name="shop_time" placeholder="Enter Shop Time"><?=$result->shop_time?></textarea>
					<?=form_error('shop_time', '<div class="text-danger">', '</div>'); ?>

				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2  control-label">Image<span class="text-danger">*</span></label>
				<div class="col-md-5">
					
					<img src="<?=base_url().IMAGE_UPLOADS.$result->image?>" alt="" width="100px" height="100px"/>	

				</div>
				<div class="col-md-5">
					
					<img id="previewHolder" alt="Uploaded Image Preview Holder" width="100px" height="100px"/>	

				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2  control-label">Image <span class="text-danger">*</span></label>
				<div class="col-md-10">
					
					<input type="file" class="file-styled" id="image" name="image">
						<?=form_error('image', '<div class="text-danger">', '</div>'); ?>

				</div>
			</div>

			
			<div class="form-group">
				<label class="col-md-2 control-label">Status: <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<select class=" form-control" name="status">
						<option value="1"
                        	<?php
                        		if($result->status == '1') {
                        			echo 'selected';
                        		}
                        	?>
                        >Active</option>
						<option value="2"
                        	<?php
                        		if($result->status == '2') {
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
				<a href="<?=BASE_URL_ADMIN.'merchant/'?>" class="btn btn-danger">Cancel</a>
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
	/*$('.summernote').summernote();*/
	
	/*$(".file-styled").uniform({
        fileButtonHtml: '<i class="icon-googleplus5"></i>',
        wrapperClass: 'bg-warning'
    });*/

   /* $('.select').select2({
        minimumResultsForSearch: "-1"
    });*/

    function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#previewHolder').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}


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

$("#image").change(function() {
  readURL(this);
});

});
</script>