<?php $this->load->view(ADMIN_VIEW.'header'); ?>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">Edit Testimonial</h4>
		<div class="heading-elements"></div><br>
	</div>

	<div class="panel-body">
		<form method="post" action="<?=BASE_URL_ADMIN?>home/testimonial/update" enctype="multipart/form-data" class="form-horizontal">
			<input type="hidden" name="id" value="<?=$result->id?>" />
			<div class="form-group">
				<label class="col-md-2 control-label">Name: <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="text" name="name" class="form-control" value="<?=$result->name; ?>">
					<?=form_error('name', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Designation: </label>
				<div class="col-md-10">
					<input type="text" name="designation" class="form-control" value="<?=$result->designation; ?>">
					<?=form_error('designation', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Company: </label>
				<div class="col-md-10">
					<input type="text" name="company" class="form-control" value="<?=$result->company; ?>">
					<?=form_error('company', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Content: <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<textarea name="content" class="form-control"><?=$result->content?></textarea>
					<?=form_error('content', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>
			<div class="form-group">
				<input type="submit" value="Submit" class="btn btn-success">
				<a href="<?=BASE_URL_ADMIN.'home/testimonial/'?>" class="btn btn-danger">Cancel</a>
			</div>
		</form>
	</div>
</div>
<!-- /traffic sources -->
<?php $this->load->view(ADMIN_VIEW.'footer'); ?>	
