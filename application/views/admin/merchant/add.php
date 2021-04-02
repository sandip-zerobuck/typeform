<?php $this->load->view(ADMIN_VIEW.'header'); ?>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">Add Merchant</h4>
		<div class="heading-elements"></div><br>
	</div>

	<div class="panel-body">
		<form method="post" action="<?=BASE_URL_ADMIN?>merchant/store" enctype="multipart/form-data" class="form-horizontal">

			<div class="form-group">
				<label class="col-md-2 control-label">Shop Name : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="text" name="shopname" autocomplete="off" class="form-control" placeholder="Shop Name" value="<?=set_value('shopname'); ?>">
					<?=form_error('shopname', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Commission Type : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<select class="form-control bootstrap-select" data-live-search="true" data-width="100%" name="m_commission" id="m_commission">
	                    <option value="">Select Commission Type</option>
	                    
	                    <?php foreach($m_commission as $key => $value){  ?> 
	                        <option value="<?=$value->id?>" <?=set_select('m_commission', $value->percentage)?> ><?=$value->percentage?> %</option> 
	                    <?php } ?>
	                </select>

	                <?=form_error('m_commission', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Discount Range : <span class="text-danger">*</span></label>
				<div class="col-md-3">
					<label><b>Discount Start (%)</b></label>
					<input type="text"  name="discount_range" autocomplete="off"  class="form-control number" value="<?=set_value('discount_range'); ?>" placeholder="Discount Start (%)">
					<?=form_error('discount_range', '<div class="text-danger">', '</div>'); ?>
				</div>

				<div class="col-md-3">
					<label><b>Discount End (%)</b></label>
					<input type="text"  name="discount_range_end" autocomplete="off"  class="form-control number" value="<?=set_value('discount_range_end'); ?>" placeholder="Discount End (%)">
					<?=form_error('discount_range_end', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Discount Amount Limit : <span class="text-danger">*</span></label>
				<div class="col-md-3">
					<label><b>Discount Set</b></label>
					<select class="form-control bootstrap-select" data-live-search="true" data-width="100%" name="m_discount_id">


	                    <option value="">Select Dicount</option>

	                    <?php foreach($discount as $key => $value){  ?> 
	                        <option value="<?=$value->id?>" <?=set_select('m_discount_id', $value->percentage)?> ><?=$value->percentage?> %</option> 
	                    <?php } ?>

	                </select>
					<?=form_error('m_discount_id', '<div class="text-danger">', '</div>'); ?>
				</div>

				<div class="col-md-3">
					<label><b>Amount Limit (Rs.)</b></label>
					<input type="text"  name="amount_limit" autocomplete="off"  class="form-control number" value="<?=set_value('amount_limit'); ?>" placeholder="Amount Limit">
					<?=form_error('amount_limit', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Target: <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="text"  name="target" autocomplete="off" class="form-control number" value="<?=set_value('target'); ?>" placeholder="Enter Target">
					<?=form_error('target', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Target Alert: <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="text"  name="target_alert" autocomplete="off" class="form-control number" value="<?=set_value('target_alert'); ?>" placeholder="Enter Target Alert">
					<?=form_error('target_alert', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Shop Type : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<select class="form-control bootstrap-select" data-live-search="true" data-width="100%" name="shop_type">
	                    <option value="">Select Shop Type</option>
	                    
	                    <?php foreach($shoptype as $key => $value){  ?> 
	                        <option value="<?=$value->name?>" <?=set_select('shop_type', $value->name)?> ><?=$value->name?></option> 
	                    <?php } ?>
	                </select>

	                <?=form_error('shop_type', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<!-- <div class="form-group">
				<label class="col-md-2 control-label">Shop Type : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="text" name="shop_type" class="form-control" placeholder="Shop Type" value="<?=set_value('shop_type'); ?>">
					<?=form_error('shop_type', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div> -->


			<div class="form-group">
				<label class="col-md-2 control-label">Name : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="text" name="name" autocomplete="off" class="form-control" placeholder="Name" value="<?=set_value('name'); ?>">
					<?=form_error('name', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			

			<div class="form-group">
				<label class="col-md-2 control-label">Mobile Number : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="text" id="number" autocomplete="off" name="mobile" class="form-control number" value="<?=set_value('mobile'); ?>" placeholder="Mobile Number">
					<?=form_error('mobile', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Email Id : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="email"  name="email" autocomplete="off" class="form-control" value="<?=set_value('email'); ?>" placeholder="Email Id">
					<?=form_error('email', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>


			<div class="form-group">
				<label class="col-md-2 control-label">Password: <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="text"  name="password" autocomplete="off" class="form-control" value="<?=set_value('password'); ?>" placeholder="Password">
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
				<label class="col-md-2 control-label">Address : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					

					<textarea class=" form-control" autocomplete="off" name="address" placeholder="Enter Address"><?=set_value('address'); ?></textarea>
					<?=form_error('address', '<div class="text-danger">', '</div>'); ?>

				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Shop Details : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					

					<textarea class=" form-control" autocomplete="off" name="details" placeholder="Enter Shop Details"><?=set_value('details'); ?></textarea>
					<?=form_error('details', '<div class="text-danger">', '</div>'); ?>

				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Shop Time : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					

					<textarea class=" form-control" autocomplete="off" name="shop_time" placeholder="Enter Shop Shop Time"><?=set_value('shop_time'); ?></textarea>
					<?=form_error('shop_time', '<div class="text-danger">', '</div>'); ?>

				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2  control-label">Image Preview<span class="text-danger">*</span></label>
				<div class="col-md-10">
					
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
					<select class=" form-control bootstrap-select" data-live-search="true" data-width="100%" name="status">
						<option value="1" <?php echo set_select('status', '1', TRUE); ?>>Active</option>
						<option value="2" <?php echo set_select('status', '2'); ?>>Inactive</option>
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


	 //Only Number Validation


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

 

   // Image Preview.....

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#previewHolder').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#image").change(function() {
  readURL(this);
});

/* Select Discount Of the Selected */
$( "#m_commission" ).change(function() {
		var m_commission = $('#m_commission').val();

	 $.ajax({
        url: '<?=BASE_URL_ADMIN?>Merchant/fetch_discount',
        type:'POST',
        data:{
            m_commission: m_commission
        },
        success: function(response) {
        	$('#m_discount_id').html(response);
        	$('#m_discount_id').selectpicker('refresh');
        }
    });
});

});
</script>