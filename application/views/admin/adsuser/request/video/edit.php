<?php $this->load->view(ADMIN_VIEW.'header'); ?>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">Edit Video</h4>
		<div class="heading-elements"></div><br>
	</div>

	<div class="panel-body">
		<form method="post" action="<?=BASE_URL_ADMIN?>adsuser/request/video/update" enctype="multipart/form-data" class="form-horizontal">

			<input type="hidden" name="id" value="<?=$result->id?>" />
			<input type="hidden" name="old_video" value="<?=$result->video?>" />

			<center>
				<video width="500" controls>
				  <source src="<?=base_url().PRODUCTS_UPLOADS.$result->video?>" type="video/mp4">
				</video>
			</center>
			
			<br>


			<div class="row">
				<div class="col-md-4">
					<label class="control-label">Select country</label>

						<div class="multi-select-full">
							<select class="multiselect-select-all-filtering country" multiple="multiple" name="country_id[]" id="country">

						<?php $da =  explode("-", $result->country_id); foreach ($country as $key => $country) { ?>

						<option value="<?=$country->id?>" <?php if (in_array($country->id, $da)){ echo 'selected'; } ?> ><?=$country->name?></option>

					<?php } ?>
					</select>
							</select>
						</div>

				</div>

				<div class="col-md-4">
					<label class="control-label">Select State</label>

						<div class="multi-select-full">
							<select class="multiselect-select-all-filtering state" multiple="multiple" name="state_id[]" id="state">

						<?php $da =  explode("-", $result->state_id); foreach ($state as $key => $state) { ?>

						<option value="<?=$state->id?>" <?php if (in_array($state->id, $da)){ echo 'selected'; } ?> ><?=$state->name?></option>

					<?php } ?>
					</select>
						</div>
				</div>

				<div class="col-md-4">
					<label class="control-label">Select District</label>

						<div class="multi-select-full">
							<select class="multiselect-select-all-filtering district" multiple="multiple" name="district_id[]" id="district">

						<?php $da =  explode("-", $result->state_id); foreach ($district as $key => $district) { ?>

						<option value="<?=$district->id?>" <?php if (in_array($district->id, $da)){ echo 'selected'; } ?> ><?=$district->name?></option>

					<?php } ?>
					</select>
						</div>
				</div>

				<div class="col-md-4">
					<br>
					<label class="control-label">Select Taluka</label>

						<div class="multi-select-full">
							<select class="multiselect-select-all-filtering city" multiple="multiple" name="city_id[]" id="city">

						<?php $da =  explode("-", $result->city_id); foreach ($city as $key => $city) { ?>

						<option value="<?=$city->id?>" <?php if (in_array($city->id, $da)){ echo 'selected'; } ?> ><?=$city->name?></option>

					<?php } ?>
					</select>
						</div>
				</div>

				<div class="col-md-4">
					<br>
					<label class="control-label">Select City</label>

						<div class="multi-select-full">
							<select class="multiselect-select-all-filtering area" multiple="multiple" name="area_id[]" id="area">

						<?php $da =  explode("-", $result->area_id); foreach ($area as $key => $area) { ?>

						<option value="<?=$area->id?>" <?php if (in_array($area->id, $da)){ echo 'selected'; } ?> ><?=$area->name?></option>

					<?php } ?>
					</select>
						</div>
				</div>

				<div class="col-md-4">
					<br>
					<label class="control-label">Select Pincode</label>

						<div class="multi-select-full">
							<select class="multiselect-select-all-filtering pincode" multiple="multiple" name="pincode_id[]" id="pincode">

						<?php $da =  explode("-", $result->pincode_id); foreach ($pincode as $key => $value) { ?>

						<option value="<?=$value->id?>" <?php if (in_array($value->id, $da)){ echo 'selected'; } ?> ><?=$value->pincode?></option>

					<?php } ?>
					</select>
						</div>
				</div>


				<div class="col-md-4">
					<br>
					<label class="control-label">Select Video<span class="text-danger">*</span></label>

						<div class="multi-select-full">
							<input type="file" class="file-styled" name="video">
					<?=form_error('video', '<div class="text-danger">', '</div>'); ?>
						</div>
				</div>

				<div class="col-md-4">
					<br>
					<label class="control-label">Video Title <span class="text-danger">*</span></label>

						<div class="multi-select-full">
							<input type="text" name="name" placeholder="Eneter Video Title" class="form-control" value="<?=$result->name?>">
					<?=form_error('name', '<div class="text-danger">', '</div>'); ?>
						</div>
				</div>

				<div class="col-md-4">
					<br>
					<label class="control-label">Video Coin <span class="text-danger">*</span></label>

						<div class="multi-select-full">
							<input type="number" min="1" name="coin" placeholder="Eneter Video Coin" class="form-control" value="<?=$result->coin?>">
					<?=form_error('coin', '<div class="text-danger">', '</div>'); ?>
						</div>
				</div>

				<!-- <input type="hidden"  name="coin"   value="<?=$result->coin?>">
				<?=form_error('coin', '<div class="text-danger">', '</div>'); ?> -->

				<div class="col-md-4">
					<br>
					<label class="control-label">Video Click <span class="text-danger">*</span></label>

						<div class="multi-select-full">
							<input type="number" min="1" name="click" placeholder="Eneter Video Click" class="form-control" value="<?=$result->click?>">
					<?=form_error('click', '<div class="text-danger">', '</div>'); ?>
						</div>
				</div>

				<div class="col-md-4">
					<br>
					<label class="control-label">Video Timer <span class="text-danger">*</span></label>

						<div class="multi-select-full">
							<input type="number" min="1" name="timer" placeholder="Eneter Video Timer" class="form-control" value="<?=$result->timer?>">
					<?=form_error('timer', '<div class="text-danger">', '</div>'); ?>	
						</div>
				</div>

				<div class="col-md-4">
					<br>
					

						<div class="multi-select-full">
							<div class="col-md-6">
					<label>Minimum Age</label>
					<input type="text" min="1" name="age" placeholder="Eneter Minimum Age" class="form-control number" value="<?=$result->age?>">
			    <?=form_error('age', '<div class="text-danger">', '</div>'); ?>
				</div>

				<div class="col-md-6">
					<label>Maximum Age</label>
					<input type="text" min="1" name="age_max" placeholder="Eneter Maximum Age" class="form-control number" value="<?=$result->age_max?>">
			    <?=form_error('age_max', '<div class="text-danger">', '</div>'); ?>
				</div>		
						</div>
				</div>

				<div class="col-md-4">
					<br>
					<label class="control-label">Start Date <span class="text-danger">*</span></label>

						<div class="multi-select-full">
							<input type="date"  name="start_date"  class="form-control" value="<?=$result->start_date?>" >	
						</div>
				</div>

				<div class="col-md-4">
					<br>
					<label class="control-label">Status:<span class="text-danger">*</span></label>

						<div class="multi-select-full">
							<select class="select" name="status">
						<option value="1"
							<?php
								if( $result->status == 1 ) {
									echo 'selected';
								}
							?>
						>Approve</option>
						<option value="5"
							<?php
								if( $result->status == 5 ) {
									echo 'selected';
								}
							?>
						>Cancel</option>
					</select>
					<?=form_error('status', '<div class="text-danger">', '</div>'); ?>		
						</div>
				</div>

			
				
			</div>

			
			


			<div class="form-group">
				<br>
				<input type="submit" value="Submit" class="btn btn-success">
				<a href="<?=BASE_URL_ADMIN.'campingmaster/videomaster/'?>" class="btn btn-danger">Cancel</a>
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



// Fetch State.......
 $( ".country" ).change(function() {
		var values = [];
			$("select.country").each(function(i, sel){
			    var selectedVal = $(sel).val();
			    values.push(selectedVal);
			});

    	 $.ajax({
            url: '<?=BASE_URL_ADMIN?>campingmaster/imagemaster/fetch_state',
            type:'POST',
            data:{
                country_id: values
            },
            success: function(response) {
            	$('#state').html(response);
            	$('#state').multiselect('destroy');
            	$('#state').multiselect({
			        includeSelectAllOption: true,
			        enableFiltering: true,
			        templates: {
			            filter: '<li class="multiselect-item multiselect-filter"><i class="icon-search4"></i> <input class="form-control" type="text"></li>'
			        },
			        onChange: function() {
			            $.uniform.update();
			        }
			    });
			    $(".styled, .multiselect-container input").uniform({ radioClass: 'choice'});
            }
        });
	});


    $( "#state" ).change(function() {
		var values = [];
			$("select.state").each(function(i, sel){
			    var selectedVal = $(sel).val();
			    values.push(selectedVal);
			});

    	 $.ajax({
            url: '<?=BASE_URL_ADMIN?>campingmaster/imagemaster/fetch_city',
            type:'POST',
            data:{
                state_id: values
            },
            success: function(response) {
            	$('#city').html(response);
            	$('#city').multiselect('destroy');
            	$('#city').multiselect({
			        includeSelectAllOption: true,
			        enableFiltering: true,
			        templates: {
			            filter: '<li class="multiselect-item multiselect-filter"><i class="icon-search4"></i> <input class="form-control" type="text"></li>'
			        },
			        onChange: function() {
			            $.uniform.update();
			        }
			    });
			    $(".styled, .multiselect-container input").uniform({ radioClass: 'choice'});
            }
        });
	});


// Area 

  $( "#city" ).change(function() {
		var values = [];
			$("select.city").each(function(i, sel){
			    var selectedVal = $(sel).val();
			    values.push(selectedVal);
			});

    	 $.ajax({
            url: '<?=BASE_URL_ADMIN?>campingmaster/imagemaster/fetch_area',
            type:'POST',
            data:{
                city_id: values
            },
            success: function(response) {
            	$('#area').html(response);
            	$('#area').multiselect('destroy');
            	$('#area').multiselect({
			        includeSelectAllOption: true,
			        enableFiltering: true,
			        templates: {
			            filter: '<li class="multiselect-item multiselect-filter"><i class="icon-search4"></i> <input class="form-control" type="text"></li>'
			        },
			        onChange: function() {
			            $.uniform.update();
			        }
			    });
			    $(".styled, .multiselect-container input").uniform({ radioClass: 'choice'});
            }
        });
	});

 // Pincode...
 $( "#area" ).change(function() {
		var values = [];
			$("select.area").each(function(i, sel){
			    var selectedVal = $(sel).val();
			    values.push(selectedVal);
			});

    	 $.ajax({
            url: '<?=BASE_URL_ADMIN?>campingmaster/imagemaster/fetch_pincode',
            type:'POST',
            data:{
                area_id: values
            },
            success: function(response) {
            	$('#pincode').html(response);
            	$('#pincode').multiselect('destroy');
            	$('#pincode').multiselect({
			        includeSelectAllOption: true,
			        enableFiltering: true,
			        templates: {
			            filter: '<li class="multiselect-item multiselect-filter"><i class="icon-search4"></i> <input class="form-control" type="text"></li>'
			        },
			        onChange: function() {
			            $.uniform.update();
			        }
			    });
			    $(".styled, .multiselect-container input").uniform({ radioClass: 'choice'});
            }
        });
	});



});
</script>