<?php $this->load->view(ADMIN_VIEW.'header'); ?>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">Add Slider Content</h4>
		<div class="heading-elements"></div><br>
	</div>

	<div class="panel-body">
		<form method="post" action="<?=BASE_URL_ADMIN?>home/header_slider/store" enctype="multipart/form-data" class="form-horizontal">
			<div class="form-group">
				<label class="col-md-2 control-label">Title: </label>
				<div class="col-md-10">
					<input type="text" name="title" class="form-control" value="<?=set_value('title'); ?>">
					<?=form_error('title', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Image: </label>
				<div class="col-md-10">
					<input type="file" class="file-styled" name="image">
					<?=form_error('image', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Video: </label>
				<div class="col-md-10">
					<input type="file" class="file-styled" name="video">
					<?=form_error('video', '<div class="text-danger">', '</div>'); ?>
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
				<a href="<?=BASE_URL_ADMIN.'home/header_slider/'?>" class="btn btn-danger">Cancel</a>
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

});
</script>