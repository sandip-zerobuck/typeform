<?php $this->load->view(ADMIN_VIEW.'header'); ?>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">Edit Link</h4>
		<div class="heading-elements"></div><br>
	</div>

	<div class="panel-body">
		<form method="post" action="<?=BASE_URL_ADMIN?>campingmaster/applinkmaster/update" enctype="multipart/form-data" class="form-horizontal">

			<input type="hidden" name="id" value="<?=$result->id?>" />

			<div class="row">
				<div class="col-md-4">
					<label class="control-label">Select country</label>

						<div class="multi-select-full">
							<select class="multiselect-select-all-filtering country" multiple="multiple" name="country_id[]" id="country">

						<?php $da =  explode("-", $result->country_id); foreach ($country as $key => $country) { ?>

						<option value="<?=$country->id?>" <?php if (in_array($country->id, $da)){ echo 'selected'; } ?> ><?=$country->name?></option>

					<?php } ?>
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
						<input type="hidden" class="select_district_id" value="<?=$result->district_id?>">
						<div class="multi-select-full">
							<select class="multiselect-select-all-filtering district" multiple="multiple" name="district_id[]" id="district">

						
					</select>
						</div>
				</div>

				<div class="col-md-4">
					<br>
					<label class="control-label">Select Taluka</label>

						<input type="hidden" class="select_city_id" value="<?=$result->city_id?>">
						<div class="multi-select-full">
							<select class="multiselect-select-all-filtering city" multiple="multiple" name="city_id[]" id="city">

						
					</select>
						</div>
				</div>

				<div class="col-md-4">
					<br>
					<label class="control-label">Select City</label>
						<input type="hidden" class="select_area_id" value="<?=$result->area_id?>">
						<div class="multi-select-full">
							<select class="multiselect-select-all-filtering area" multiple="multiple" name="area_id[]" id="area">

						
					</select>
						</div>
				</div>

				<div class="col-md-4">
					<br>
					<label class="control-label">Select Pincode</label>

						<div class="multi-select-full">
							<input type="hidden" class="select_pincode_id" value="<?=$result->pincode_id?>">
							<select class="multiselect-select-all-filtering pincode" multiple="multiple" name="pincode_id[]" id="pincode">

						
					</select>
						</div>
				</div>


				<div class="col-md-4">
					<br>
					<label class="control-label">Link URL <span class="text-danger">*</span></label>

						<div class="multi-select-full">
							<input type="text" name="link" placeholder="Eneter Link URL" class="form-control" value="<?=$result->link?>">
					<?=form_error('link', '<div class="text-danger">', '</div>'); ?>
						</div>
				</div>

				<div class="col-md-4">
					<br>
					<label class="control-label">Link Title <span class="text-danger">*</span></label>

						<div class="multi-select-full">
							<input type="text" name="name" placeholder="Eneter Link Title" class="form-control" value="<?=$result->name?>">
					<?=form_error('name', '<div class="text-danger">', '</div>'); ?>
						</div>
				</div>

				<div class="col-md-4">
					<br>
					<label class="control-label">Link Coin <span class="text-danger">*</span></label>

						<div class="multi-select-full">
							<!-- <input type="text" min="1"  placeholder="Eneter Link Coin" class="form-control number" value="<?=$coin_rate->link?>" disabled> -->

							<input type="text" min="1" name="coin"  placeholder="Eneter Link Coin" class="form-control number" value="<?=$result->coin?>">

							<!-- <input type="hidden"  name="coin"   value="<?=$coin_rate->link?>"> -->
					<?=form_error('coin', '<div class="text-danger">', '</div>'); ?>
						</div>
				</div>

				<div class="col-md-4">
					<br>
					<label class="control-label">Link Click <span class="text-danger">*</span></label>

						<div class="multi-select-full">
							<input type="number" min="1" name="click" placeholder="Eneter Link Click" class="form-control" value="<?=$result->click?>">
					<?=form_error('click', '<div class="text-danger">', '</div>'); ?>
						</div>
				</div>

				<div class="col-md-4">
					<br>
					<label class="control-label">Link Timer <span class="text-danger">*</span></label>

						<div class="multi-select-full">
							<input type="number" min="1" name="timer" placeholder="Eneter Link Timer" class="form-control" value="<?=$result->timer?>">
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
						>Active</option>
						<option value="0"
							<?php
								if( $result->status == 0 ) {
									echo 'selected';
								}
							?>
						>Inactive</option>

						<option value="2"
							<?php
								if( $result->status == 2 ) {
									echo 'selected';
								}
							?>
						>Schedule Set</option>
					</select>
					<?=form_error('status', '<div class="text-danger">', '</div>'); ?>	
						</div>
				</div>

				<div class="col-md-6">
					<br>
					<label class="control-label">Note : </label>

						<div class="multi-select-full">
							<textarea class="form-control" name="note"><?=$result->note?></textarea>
						</div>
				</div>
				
			</div>




			<div class="form-group">
				<br>
				<input type="submit" value="Submit" class="btn btn-success">
				<a href="<?=BASE_URL_ADMIN.'campingmaster/applinkmaster/'?>" class="btn btn-danger">Cancel</a>
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



	fetch_district();

    $( "#state" ).change(function() {
			fetch_district();
	});

    function fetch_district()
    {
    	
		var values = [];
		$("select.state").each(function(i, sel){
		    var selectedVal = $(sel).val();
		    values.push(selectedVal);
		});

	 $.ajax({
        url: '<?=BASE_URL_ADMIN?>campingmaster/imagemaster/fetch_district',
        type:'POST',
        data:{
            state_id: values,
            select_district_id: $(".select_district_id").val()
        },
        success: function(response) {
        	$('#district').html(response);
        	$('#district').multiselect('destroy');
        	$('#district').multiselect({
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

			fetch_city();
        }
    });
    }

	$( "#district" ).change(function() {
		fetch_city();
	});

	function fetch_city()
	{
		var values = [];
			$("select.district").each(function(i, sel){
			    var selectedVal = $(sel).val();
			    values.push(selectedVal);
			});

    	 $.ajax({
            url: '<?=BASE_URL_ADMIN?>campingmaster/imagemaster/fetch_city',
            type:'POST',
            data:{
                district_id: values,
                select_city_id: $(".select_city_id").val()
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


				fetch_area();
            }
        });
	}

// Area 

  $( "#city" ).change(function() {
		fetch_area();
	});

  function fetch_area()
  {
  	var values = [];
			$("select.city").each(function(i, sel){
			    var selectedVal = $(sel).val();
			    values.push(selectedVal);
			});

    	 $.ajax({
            url: '<?=BASE_URL_ADMIN?>campingmaster/imagemaster/fetch_area',
            type:'POST',
            data:{
                city_id: values,
                select_area_id: $(".select_area_id").val()
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

			    
				fetch_pincode();
            }
        });
  }

 // Pincode...
 $( "#area" ).change(function() {
		fetch_pincode();
	});


 function fetch_pincode()
 {
	var values = [];
		$("select.area").each(function(i, sel){
		    var selectedVal = $(sel).val();
		    values.push(selectedVal);
		});

	 $.ajax({
        url: '<?=BASE_URL_ADMIN?>campingmaster/imagemaster/fetch_pincode',
        type:'POST',
        data:{
            area_id: values,
            select_pincode_id: $(".select_pincode_id").val()
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
 }


});
</script>