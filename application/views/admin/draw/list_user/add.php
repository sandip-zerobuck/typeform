<?php $this->load->view(ADMIN_VIEW.'header'); ?>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">Add</h4>
		<div class="heading-elements"></div><br>
	</div>

	<div class="panel-body">
		<form method="post" action="<?=BASE_URL_ADMIN?>draw/index/store" enctype="multipart/form-data" class="form-horizontal">

			<div class="form-group">
				<b class="col-md-2 control-label">Draw Name : <span class="text-danger">*</span></b>
				<div class="col-md-4">
					<input type="text" name="name" class="form-control" placeholder="Name" value="<?=set_value('name'); ?>">
					<?=form_error('name', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<b class="col-md-2 control-label">Participat User : <span class="text-danger">*</span></b>
				<div class="col-md-4">
					<input type="number" name="participat_user" class="form-control" placeholder="Participat User" value="<?=set_value('participat_user'); ?>">
					<?=form_error('participat_user', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<b class="col-md-2 control-label">Join User : <span class="text-danger">*</span></b>
				<div class="col-md-4">
					<input type="number" name="remingn_user" class="form-control" placeholder="Join User" value="<?=set_value('remingn_user'); ?>">
					<?=form_error('remingn_user', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<b class="col-md-2 control-label">Task User : <span class="text-danger">*</span></b>
				<div class="col-md-4">
					<input type="number" name="required_task" class="form-control" placeholder="Task User (Invite Refer Task)" value="<?=set_value('required_task'); ?>">
					<?=form_error('required_task', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<b class="col-md-2 control-label">Draw Date : <span class="text-danger">*</span></b>
				<div class="col-md-4">
					<input type="text" autocomplete="off"  name="draw_date"  class="form-control form-control date" value="<?=set_value('draw_date'); ?>" placeholder="Select Draw Date">
					<?=form_error('draw_date', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<b class="col-md-2 control-label">Status: <span class="text-danger">*</span></b>
				<div class="col-md-4">
					<select class="select" name="status">
						<option value="1" <?php echo set_select('status', '1', TRUE); ?>>Active</option>
						<option value="0" <?php echo set_select('status', '0'); ?>>Inactive</option>
					</select>
					<?=form_error('status', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<b class="col-md-2 control-label">Image: <span class="text-danger">*</span></b>
				<div class="col-md-4">
					<input type="file" id="image" class="file-styled" name="image">
					<?=form_error('image', '<div class="text-danger">', '</div>'); ?>
					<br>
					<img id="previewHolder" alt="Uploaded Image Preview Holder" width="300px" height="100px"/>	
				</div>
			</div>

			<div class="form-group">
				
				<div class="col-md-6">
					<b class="control-label">Draw Details : <span class="text-danger">*</span></b>
					<br>
					<textarea class="summernote" name="short_details"><?=set_value('short_details'); ?></textarea>
					<?=form_error('short_details', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			
			<div class="form-group">
				<input type="submit" value="Submit" class="btn btn-success">
				<a href="<?=BASE_URL_ADMIN.'draw/index'?>" class="btn btn-danger">Cancel</a>
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

<script type="text/javascript">
$(document).ready(function(){
	$('.summernote').summernote();

	$('.date').datepicker({
		format: 'yyyy-mm-dd',startDate: "dateToday",
	});
	
	$(".file-styled").uniform({
        fileButtonHtml: '<i class="icon-googleplus5"></i>',
        wrapperClass: 'bg-warning'
    });

    $('.select').select2({
        minimumResultsForSearch: "-1"
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

});
</script>