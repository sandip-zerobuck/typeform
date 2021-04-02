<?php $this->load->view(ADMIN_VIEW.'header'); ?>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">Add Coming Soon Product</h4>
		<div class="heading-elements"></div><br>
	</div>

	<div class="panel-body">
		<form method="post" action="<?=BASE_URL_ADMIN?>dealads/Comming/store" enctype="multipart/form-data" class="form-horizontal">
			<div class="form-group">
				<label class="col-md-2 control-label">Name : <span class="text-danger">*</span></label>
				<div class="col-md-4">
					<input type="text" name="name" class="form-control" placeholder="Enter  Name" value="<?=set_value('name'); ?>">
					<?=form_error('name', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Select Date : <span class="text-danger">*</span></label>
				<div class="col-md-10 row">

					<div class="col-md-6">
						<label><b>Date</b></label>
						<input type="text" autocomplete="off"  name="date_timer" value="<?=set_value('date_timer'); ?>"  class="form-control form-control date">	
							<?=form_error('date_timer', '<div class="text-danger">', '</div>'); ?>
					</div>

					<div class="col-md-6">
						<label><b>Time</b></label>
						<input type="text" autocomplete="off"  name="time_timer" value="<?=set_value('time_timer'); ?>"  class="form-control form-control timepicker">	
							<?=form_error('time_timer', '<div class="text-danger">', '</div>'); ?>
					</div>

						
				</div>
			</div>



		<!-- 	<div class="form-group">
				
				<img id="previewHolder" alt="Uploaded Image Preview Holder" width="250px" height="250px"/>
				<br><br>

				<label class="col-md-2 control-label">Image : <span class="text-danger">*</span></label>
				<div class="col-md-4">
					<input type="file" class="file-styled" id="image" name="image">
					<?=form_error('image', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div> -->

			<div class="form-group">
				<label class="col-md-2 control-label">Select Product : <span class="text-danger">*</span></label>
				<div class="col-md-4">

					<select class="bootstrap-select" data-live-search="true" data-width="100%"  name="product_id">
						<option value="">Select Product</option>
						<?php foreach($product as $key => $value): ?> 
							<option value="<?=$value->id?>" <?=set_select('product_id',$value->id)?>><?=$value->name?></option> 
						<?php endforeach; ?>
					</select>
					<?=form_error('product_id', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Status: <span class="text-danger">*</span></label>
				<div class="col-md-4">
					<select class="select" name="status">
						<option value="1" <?php echo set_select('status', '1', TRUE); ?>>Active</option>
						<option value="0" <?php echo set_select('status', '0'); ?>>Inactive</option>
					</select>
					<?=form_error('status', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			
			<div class="form-group">
				<input type="submit" value="Submit" class="btn btn-success">
				<a href="<?=BASE_URL_ADMIN.'dealads/Comming'?>" class="btn btn-danger">Cancel</a>
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
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/selects/bootstrap_select.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/pages/form_bootstrap_select.js"></script>


<script type="text/javascript" src="<?=base_url()?>assets/admin/js/wickedpicker.min.js"></script>
<link rel="stylesheet" href="<?=base_url()?>assets/admin/css/wickedpicker.min.css">


<script type="text/javascript">
$(document).ready(function(){

	$('.timepicker').wickedpicker();

	 /*$(".date").datetimepicker({format: 'yyyy-mm-dd hh:ii'});*/


	$('.date').datepicker({
		format: 'M dd, yyyy',startDate: "dateToday",
	});


	$(".file-styled").uniform({
        fileButtonHtml: '<i class="icon-googleplus5"></i>',
        wrapperClass: 'bg-warning'
    });

    $('.select').select2({
        minimumResultsForSearch: "-1"
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