<?php $this->load->view(ADMIN_VIEW.'header'); ?>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">Add Sub Admin</h4>
		<div class="heading-elements"></div><br>
	</div>

	<div class="panel-body">
		<form method="post" action="<?=BASE_URL_ADMIN?>subadmin/index/store" enctype="multipart/form-data" class="form-horizontal">

			<div class="row">


				<div class="col-md-4">
					<label class="control-label">UserName :</label>

						<div class="multi-select-full">
							<input type="text" name="username" class="form-control" placeholder="Enter UserName" value="<?=set_value('username'); ?>">
					<?=form_error('username', '<div class="text-danger">', '</div>'); ?>
						</div>

				</div>


				<div class="col-md-4">
					<label class="control-label">Password : </label>

						<div class="multi-select-full">
							<input type="text" name="password" class="form-control" placeholder="Enter Password" value="<?=set_value('password'); ?>">
					<?=form_error('password', '<div class="text-danger">', '</div>'); ?>
						</div>

				</div>



				<div class="col-md-4">
					<label class="control-label">Select Module</label>

						<div class="multi-select-full">
							<select class="multiselect-select-all-filtering module" multiple="multiple" name="module[]" id="module">

								<?php foreach ($module as $key => $value) { ?>
								<option value="<?=$value->id?>"><?=$value->name?></option>

							   <?php } ?>
							</select>
						</div>

				</div>

			</div>


	

		

			

			<!-- <div class="form-group">
				<label class="col-md-2 control-label">Status: <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<select class=" form-control" name="status">
						<option value="1" <?php echo set_select('status', '1', TRUE); ?>>Active</option>
						<option value="0" <?php echo set_select('status', '0'); ?>>Inactive</option>
					</select>
					<?=form_error('status', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div> -->

			
			<div class="form-group">
				<br><br>
				<input type="submit" value="Submit" class="btn btn-success">
				<a href="<?=BASE_URL_ADMIN.'subadmin'?>" class="btn btn-danger">Cancel</a>
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