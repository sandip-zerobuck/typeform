<?php $this->load->view(ADMIN_VIEW.'header'); ?>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">Edit Company Info</h4>
		<div class="heading-elements"></div><br>
	</div>

	<div class="panel-body">
		<form method="post" action="<?=BASE_URL_ADMIN?>company_info/add/update" enctype="multipart/form-data" class="form-horizontal">
			<input type="hidden" name="id" value="<?=$result->id?>" />

			<div class="form-group">
				<label class="col-md-2 control-label"><b>Email Id : <span class="text-danger">*</span></b></label>
				<div class="col-md-4">
					<input type="text" name="email" class="form-control" value="<?=$result->email?>">
					<?=form_error('email', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label"><b>Mobile : <span class="text-danger">*</span></b></label>
				<div class="col-md-4">
					<input type="text" name="mobile" class="form-control" value="<?=$result->mobile?>">
					<?=form_error('mobile', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label"><b>Map Link : <span class="text-danger">*</span></b></label>
				<div class="col-md-10">
					<textarea class="form-control" name="map"><?=$result->map?></textarea>
					<?=form_error('map', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label"><b>Address : <span class="text-danger">*</span></b></label>
				<div class="col-md-10">
					<textarea class="summernote form-control" name="address"><?=$result->address?></textarea>
					<?=form_error('address', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label"><b>Home Page : About Us : <span class="text-danger">*</span></b></label>
				<div class="col-md-12">
					<textarea class="summernote form-control" name="about_home"><?=$result->about_home?></textarea>
					<?=form_error('about_home', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>
			

			<div class="form-group">
				<label class="col-md-2 control-label"><b>Shopping Page : About Us : <span class="text-danger">*</span></b></label>
				<div class="col-md-12">
					<textarea class="summernote form-control" name="about"><?=$result->about?></textarea>
					<?=form_error('about', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label"><b>Disclaimer<span class="text-danger">*</span></b></label>
				<div class="col-md-12">
					<textarea class="summernote form-control" name="disclaimer"><?=$result->disclaimer?></textarea>
					<?=form_error('disclaimer', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label"><b>Privacy Policy<span class="text-danger">*</span></b></label>
				<div class="col-md-12">
					<textarea class="summernote form-control" name="privacy_policy"><?=$result->privacy_policy?></textarea>
					<?=form_error('privacy_policy', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>


			
			<div class="form-group">
				<input type="submit" value="Submit" class="btn btn-success">
				<a href="<?=BASE_URL_ADMIN.'company_info/'?>" class="btn btn-danger">Cancel</a>
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