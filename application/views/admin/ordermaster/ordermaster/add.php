<?php $this->load->view(ADMIN_VIEW.'header'); ?>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">Add Link</h4>
		<div class="heading-elements"></div><br>
	</div>

	<div class="panel-body">
		<form method="post" action="<?=BASE_URL_ADMIN?>campingmaster/linkmaster/store" enctype="multipart/form-data" class="form-horizontal">

			<div class="form-group">
				<label class="col-md-2 control-label">Country : <span class="text-danger">*</span></label>
				<div class="col-md-10">

					<select class="select country" id="country_id" name="country_id">
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

					<select class="select state" id="state_id" name="state_id">
						<option value="">Select State</option>
					</select>
					<?=form_error('state_id', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">City : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<select class="select city" id="city" name="city_id">
						<option value="">Select City</option>
					</select>
					<?=form_error('city_id', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Area : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<select class="select" id="area" name="area_id">
						<option value="">Select Area</option>
					</select>
					<?=form_error('area_id', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			

			<div class="form-group">
				<label class="col-md-2 control-label">Link : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="text" name="link" placeholder="Eneter Link Title" class="form-control" value="<?=set_value('link'); ?>">
					<?=form_error('link', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Image Title : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="text" name="name" placeholder="Eneter Image Title" class="form-control" value="<?=set_value('name'); ?>">
					<?=form_error('name', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Image Coin : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="number" min="1" name="coin" placeholder="Eneter Image Coin" class="form-control" value="<?=set_value('coin'); ?>">
					<?=form_error('coin', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Image Click : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="number" min="1" name="click" placeholder="Eneter Image Click" class="form-control" value="<?=set_value('click'); ?>">
					<?=form_error('click', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Image Timer : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="number" min="1" name="timer" placeholder="Eneter Image Timer" class="form-control" value="<?=set_value('timer'); ?>">
					<?=form_error('timer', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-md-2 control-label">Status: </label>
				<div class="col-md-10">
					<select class="select" name="status">
						<option value="1" <?php echo set_select('status', '1', TRUE); ?>>Active</option>
						<option value="0" <?php echo set_select('status', '0'); ?>>Inactive</option>
					</select>
					<?=form_error('status', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>
			<div class="form-group">
				<input type="submit" value="Submit" class="btn btn-success">
				<a href="<?=BASE_URL_ADMIN.'campingmaster/linkmaster/'?>" class="btn btn-danger">Cancel</a>
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
    $( ".country" ).change(function() {
  		var country_id = $('#country_id').val();

    	 $.ajax({
            url: '<?=BASE_URL_ADMIN?>campingmaster/linkmaster/fetch_state',
            type:'POST',
            data:{
                country_id: country_id
            },
            success: function(response) {
            	$('#state_id').html(response);
            }
        });
	});




/* Select City Of the State Selected */
    $( ".state" ).change(function() {

  		var state_id = $('#state_id').val();
    	 $.ajax({
            url: '<?=BASE_URL_ADMIN?>campingmaster/linkmaster/fetch_city',
            type:'POST',
            data:{
                state_id: state_id
            },
            success: function(response) {
            	$('#city').html(response);
            }
        });
	});

/* Select Area Of the City Selected */
	$( ".city" ).change(function() {

  		var city_id = $('#city').val();

    	 $.ajax({
            url: '<?=BASE_URL_ADMIN?>campingmaster/linkmaster/fetch_area',
            type:'POST',
            data:{
                city_id: city_id
            },
            success: function(response) {
            	$('#area').html(response);
            }
        });
	});

});
</script>