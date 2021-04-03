<?php $this->load->view(ADMIN_VIEW.'header'); ?>





<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">Add Image</h4>
		<div class="heading-elements"></div><br>
	</div>

	<div id="city_id_ok">
		
	</div>

	<div class="panel-body">
		<form method="post" action="<?=BASE_URL_ADMIN?>campingmaster/imagemaster/store" enctype="multipart/form-data" class="form-horizontal">

			<div class="row">
				<div class="col-md-4">
					<label class="control-label">Select country</label>

						<div class="multi-select-full">
							<select class="multiselect-select-all-filtering country" multiple="multiple" name="country_id[]" id="country">

								<?php foreach ($country as $key => $value) { ?>

								<option value="<?=$value->id?>"><?=$value->name?></option>

							<?php } ?>
							</select>
						</div>

				</div>

				<div class="col-md-4">
					<label class="control-label">Select State</label>

						<div class="multi-select-full">
							<select class="multiselect-select-all-filtering state" multiple="multiple" name="state_id[]" id="state">

							</select>
						</div>
				</div>

				<div class="col-md-4">
					<label class="control-label">Select District</label>

						<div class="multi-select-full">
							<select class="multiselect-select-all-filtering district" multiple="multiple" name="district_id[]" id="district">

							</select>
						</div>
				</div>

				<div class="col-md-4">
					<br>
					<label class="control-label">Select Taluka</label>

						<div class="multi-select-full">
							<select class="multiselect-select-all-filtering city" multiple="multiple" name="city_id[]" id="city">

							</select>
						</div>
				</div>

				<div class="col-md-4">
					<br>
					<label class="control-label">Select City</label>

						<div class="multi-select-full">
							<select class="multiselect-select-all-filtering area" multiple="multiple" name="area_id[]" id="area">

							</select>
						</div>
				</div>

				<div class="col-md-4">
					<br>
					<label class="control-label">Select Pincode</label>

						<div class="multi-select-full">
							<select class="multiselect-select-all-filtering pincode" multiple="multiple" name="pincode_id[]" id="pincode">

							</select>
						</div>
				</div>


				<div class="col-md-4">
					<br>
					<label class="control-label">Image Title <span class="text-danger">*</span></label>

						<div class="multi-select-full">
							<input type="text" name="name" placeholder="Eneter Image Title" class="form-control" value="<?=set_value('name'); ?>">
							<?=form_error('name', '<div class="text-danger">', '</div>'); ?>
						</div>
				</div>

				<div class="col-md-4">
					<br>
					<label class="control-label">Image Coin <span class="text-danger">*</span></label>

						<div class="multi-select-full">
							<input type="text" min="1" name="coin"  placeholder="Eneter Image Coin" class="form-control number" value="<?=set_value('name'); ?>">

							<!-- <input type="hidden"  name="coin"   value="<?=$coin_rate->image?>"> -->

					<?=form_error('coin', '<div class="text-danger">', '</div>'); ?>
						</div>
				</div>



				<div class="col-md-4">
					<br>
					<label class="control-label">Image Click <span class="text-danger">*</span></label>

						<div class="multi-select-full">
							<input type="text" min="1" name="click" placeholder="Eneter Image Click" class="form-control number" value="<?=set_value('click'); ?>">
							<?=form_error('click', '<div class="text-danger">', '</div>'); ?>	
						</div>
				</div>

				<div class="col-md-4">
					<br>
					<label class="control-label">Image Timer <span class="text-danger">*</span></label>

						<div class="multi-select-full">
							<input type="text" min="1" name="timer" placeholder="Eneter Image Timer" class="form-control number" value="<?=set_value('timer'); ?>">
							<?=form_error('timer', '<div class="text-danger">', '</div>'); ?>		
						</div>
				</div>

				<div class="col-md-4">
					<br>
					

						<div class="multi-select-full">
							<div class="col-md-6">
					<label>Minimum Age</label>
					<input type="text" min="1" name="age" placeholder="Eneter Minimum Age" class="form-control number" value="<?=set_value('age'); ?>">
					<?=form_error('age', '<div class="text-danger">', '</div>'); ?>
				</div>

				<div class="col-md-6">
					<label>Maximum Age</label>
					<input type="text" min="1" name="age_max" placeholder="Eneter Maximum Age" class="form-control number" value="<?=set_value('age_max'); ?>">
					<?=form_error('age_max', '<div class="text-danger">', '</div>'); ?>
				</div>		
						</div>
				</div>

				<div class="col-md-4">
					<br>
					<label class="control-label">Start Date <span class="text-danger">*</span></label>

						<div class="multi-select-full">
							<input type="date"  name="start_date"  class="form-control">		
						</div>
				</div>

				<div class="col-md-4">
					<br>
					<label class="control-label">Status:<span class="text-danger">*</span></label>

						<div class="multi-select-full">
							<select class="select" name="status">
							<option value="1" <?php echo set_select('status', '1', TRUE); ?>>Active</option>
							<option value="0" <?php echo set_select('status', '0'); ?>>Inactive</option>

							<option value="2" <?php echo set_select('status', '2'); ?>>Schedule Set</option>
						</select>
						<?=form_error('status', '<div class="text-danger">', '</div>'); ?>		
						</div>
				</div>

			
				<div class="col-md-4">
					<br>
					<label class="control-label">Image <span class="text-danger">*</span></label>

						<div class="multi-select-full">
							<input type="file" class="file-styled" id="image" name="image">
						<?=form_error('image', '<div class="text-danger">', '</div>'); ?>		
						</div>
				</div>

				<div class="col-md-4">
					<br>
					<label class="control-label">Image Preview<span class="text-danger">*</span></label>

						<div class="multi-select-full">
							<img id="previewHolder" alt="Uploaded Image Preview Holder" width="100px" height="100px"/>		
						</div>
				</div>


				<div class="col-md-6">
					<br>
					<label class="control-label">Note : </label>

						<div class="multi-select-full">
							<textarea class="form-control" name="note"><?=set_value('note'); ?></textarea>
						</div>
				</div>


			</div>



			<div class="form-group">
				<br>
				<input type="submit" value="Submit" class="btn btn-success">
				<a href="<?=BASE_URL_ADMIN.'campingmaster/imagemaster/'?>" class="btn btn-danger">Cancel</a>
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

    //Only Number Validation
  $(".number").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        $("#errmsg").html("Only Number Valid").show().fadeOut("slow");
               return false;
    }
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
            url: '<?=BASE_URL_ADMIN?>campingmaster/imagemaster/fetch_district',
            type:'POST',
            data:{
                state_id: values
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
            }
        });
	});

    $( "#district" ).change(function() {
		var values = [];
			$("select.district").each(function(i, sel){
			    var selectedVal = $(sel).val();
			    values.push(selectedVal);
			});

    	 $.ajax({
            url: '<?=BASE_URL_ADMIN?>campingmaster/imagemaster/fetch_city',
            type:'POST',
            data:{
                district_id: values
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



});
</script>