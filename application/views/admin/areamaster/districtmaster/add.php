<?php $this->load->view(ADMIN_VIEW.'header'); ?>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">Add District</h4>
		<div class="heading-elements"></div><br>
	</div>

	<div class="panel-body">
		<form method="post" action="<?=BASE_URL_ADMIN?>areamaster/districtmaster/store" enctype="multipart/form-data" class="form-horizontal">

			<div class="form-group">
				<label class="col-md-2 control-label">Country : <span class="text-danger">*</span></label>
				<div class="col-md-10">

					<select class="bootstrap-select" data-live-search="true" data-width="100%"  id="country_id" name="country_id">
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
					<select class="bootstrap-select" data-live-search="true" data-width="100%" id="state" name="state_id">
						<option value="">Select State</option>

					</select>
					<?=form_error('state_id', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">District Name: <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="text" name="name" class="form-control" value="<?=set_value('name'); ?>">
					<?=form_error('name', '<div class="text-danger">', '</div>'); ?>
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
				<a href="<?=BASE_URL_ADMIN.'areamaster/areamaster/'?>" class="btn btn-danger">Cancel</a>
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
            url: '<?=BASE_URL_ADMIN?>areamaster/Fetch_location/fetch_state',
            type:'POST',
            data:{
                country_id: country_id
            },
            success: function(response) {
            	$('#state').html(response);
            	$('#state').selectpicker('refresh');
            }
        });
	});

});
</script>