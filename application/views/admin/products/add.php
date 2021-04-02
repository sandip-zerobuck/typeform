<?php $this->load->view(ADMIN_VIEW.'header'); ?>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">Add Product</h4>
		<div class="heading-elements"></div><br>
	</div>

	<div class="panel-body">
		<form method="post" action="<?=BASE_URL_ADMIN?>products/store" enctype="multipart/form-data" class="form-horizontal">


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
					<label class="control-label">Select Category</label>

						<div class="multi-select-full">
							<select class="select category" id="category_id" name="category_id">
								<option value="">Select Category</option>
								<?php foreach($category as $key => $value): ?> 
									<option value="<?=$value->id?>" <?=set_select('category_id',$value->id)?>><?=$value->name?></option> 
								<?php endforeach; ?>
							</select>
							<?=form_error('category_id', '<div class="text-danger">', '</div>'); ?>
						</div>

				</div>

				<div class="col-md-4">
					<br>
					<label class="control-label">Select Subcategory</label>

						<div class="multi-select-full">
							<select class="select category" id="subcategory" name="subcategory_id">
								<option value="">Select Subcategory</option>
								<!-- <?php foreach($subcategory as $key => $value): ?> 
									<option value="<?=$value->id?>" <?=set_select('subcategory_id',$value->id)?>><?=$value->name?></option> 
								<?php endforeach; ?> -->
							</select>
							<?=form_error('subcategory_id', '<div class="text-danger">', '</div>'); ?>
						</div>

				</div>

				<div class="col-md-4">
					<br>
					<label class="control-label">Product Name</label>

						<div class="multi-select-full">
							<input type="text" name="name" class="form-control" placeholder="Product Name" value="<?=set_value('name'); ?>">
							<?=form_error('name', '<div class="text-danger">', '</div>'); ?>
						</div>

				</div>

				<div class="col-md-4">
					<br>
					<label class="control-label">Price :</label>

						<div class="multi-select-full">
							<input type="text" name="price" class="form-control" placeholder="Product Price" value="<?=set_value('price'); ?>">
							<?=form_error('price', '<div class="text-danger">', '</div>'); ?>
						</div>
				</div>

				<div class="col-md-4">
					<br>
					<label class="control-label"><b>GST %:</b></label>

						<div class="multi-select-full">
							<input type="text" name="gst" class="form-control" placeholder="Product GST (%)" value="<?=set_value('gst'); ?>">
							<?=form_error('gst', '<div class="text-danger">', '</div>'); ?>
						</div>
				</div>

				<div class="col-md-4">
					<br>
					<label class="control-label">Stock :</label>

						<div class="multi-select-full">
							<input type="text" name="stock" class="form-control" placeholder="Product Stock" value="<?=set_value('stock'); ?>">
					<?=form_error('stock', '<div class="text-danger">', '</div>'); ?>
						</div>
				</div>

				<div class="col-md-4">
					<br>
					<label class="control-label">Coin :</label>

						<div class="multi-select-full">
							<input type="text" name="coin" class="form-control" value="<?=set_value('coin'); ?>" placeholder="Product Coin">
					<?=form_error('coin', '<div class="text-danger">', '</div>'); ?>
						</div>
				</div>

				<div class="col-md-4">
					<br>
					<label class="control-label">Required Coin :</label>

						<div class="multi-select-full">
							<input type="text" name="required_coin" class="form-control" value="<?=set_value('required_coin'); ?>" placeholder="Product Required Coin">
					<?=form_error('required_coin', '<div class="text-danger">', '</div>'); ?>
						</div>
				</div>



				<div class="col-md-4">
					<br>
					<label class="control-label">Delivery Charge (GUJARAT) :</label>

						<div class="multi-select-full">
							<input type="text" name="delivery_charge" class="form-control" value="<?=set_value('delivery_charge'); ?>" placeholder="Enter Delivery Charge (GUJARAT)">
					<?=form_error('delivery_charge', '<div class="text-danger">', '</div>'); ?>
						</div>
				</div>

				<div class="col-md-4">
					<br>
					<label class="control-label">Delivery Charge (OUT OF GUJARAT) :</label>

						<div class="multi-select-full">
							<input type="text" name="out_of_delivery_charge" class="form-control" value="<?=set_value('out_of_delivery_charge'); ?>" placeholder="Enter Delivery Charge (OUT OF GUJARAT)">
					<?=form_error('out_of_delivery_charge', '<div class="text-danger">', '</div>'); ?>
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



				<div class="col-md-4">
					<br>
					<label class="control-label">Status :<span class="text-danger">*</span></label>

						<div class="multi-select-full">
							<select class="select" name="status">
								<option value="1" <?php echo set_select('status', '1', TRUE); ?>>Active</option>
								<option value="0" <?php echo set_select('status', '0'); ?>>Inactive</option>
							</select>
							<?=form_error('status', '<div class="text-danger">', '</div>'); ?>	
						</div>
				</div>


				<div class="col-md-12">
					<br>
					<label class="control-label">Short Description :<span class="text-danger">*</span></label>

						<div class="multi-select-full">
							<textarea class="form-control" name="shortdesc" placeholder="Enter Short Description" ><?=set_value('shortdesc')?></textarea>
						<?=form_error('shortdesc', '<div class="text-danger">', '</div>'); ?>
						</div>
				</div>
				

				<div class="col-md-12">
					<br>
					<label class="control-label">Description :<span class="text-danger">*</span></label>

						<div class="multi-select-full">
							<textarea class="form-control" name="description1"><?=set_value('description')?></textarea>
							<script>CKEDITOR.replace( 'description1' );</script>
						<?=form_error('description1', '<div class="text-danger">', '</div>'); ?>		
						</div>
				</div>

			</div>







			<div class="form-group">
				<br>
				<input type="submit" value="Submit" class="btn btn-success">
				<a href="<?=BASE_URL_ADMIN.'products/'?>" class="btn btn-danger">Cancel</a>
			</div>
		</form>
	</div>
</div>
<!-- /traffic sources -->
<?php $this->load->view(ADMIN_VIEW.'footer'); ?>	

<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/selects/select2.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/styling/uniform.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/core/libraries/jquery_ui/interactions.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/selects/select2.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/editors/summernote/summernote.min.js"></script>

<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/styling/uniform.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/core/app.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/pages/form_multiselect.js"></script>


<script type="text/javascript">
$(document).ready(function(){
	$('.summernote').summernote();
	
	$(".file-styled").uniform({
        fileButtonHtml: '<i class="icon-googleplus5"></i>',
        wrapperClass: 'bg-warning'
    });

    $('.select').select2({
        minimumResultsForSearch: "-1"
    });

    /* Select City Of the State Selected */
    $( ".category" ).change(function() {
  		var category_id = $('#category_id').val();
    	 $.ajax({
            url: '<?=BASE_URL_ADMIN?>products/fetch_category',
            type:'POST',
            data:{
                category_id: category_id
            },
            success: function(response) {
            	$('#subcategory').html(response);
            }
        });
	});

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

});
</script>