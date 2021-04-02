<?php $this->load->view(ADMIN_VIEW.'header'); ?>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">Edit Shop Banners Ads</h4>
		<div class="heading-elements"></div><br>
	</div>

	<div class="panel-body">
		<form method="post" action="<?=BASE_URL_ADMIN?>shop/shop_banner/update" enctype="multipart/form-data" class="form-horizontal">
			<input type="hidden" name="id" value="<?=$result->id?>" />
			<input type="hidden" name="old_image" value="<?=$result->image?>" />

			<div class="form-group">
				
				<div class="col-md-10">
					<img src="<?=base_url().PRODUCTS_UPLOADS.$result->image?>" style="height: 150px; width: 150px;">

					<img id="previewHolder" alt="Uploaded Image Preview Holder" width="250px" height="250px"/>
				<br><br>
				</div>
			</div>


			<div class="form-group">
				<label class="col-md-2 control-label">Ads Name: </label>
				<div class="col-md-10">
					<input type="text" name="name" class="form-control" value="<?=$result->name; ?>">
					<?=form_error('name', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Site Link: </label>
				<div class="col-md-10">
					<input type="text" name="link" class="form-control" value="<?=$result->link; ?>">
					<?=form_error('link', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">

				

				<label class="col-md-2 control-label">Image : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="file" class="file-styled" id="image" name="image">
					<?=form_error('image', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			

			<div class="form-group">
				<label class="col-md-2 control-label">Status: </label>
				<div class="col-md-10">
					<select class="select" name="status">
						<option value="1" <?php 
							if( $result->status == 1 ) {
								echo 'selected';
							}
						?>>Active</option>
						<option value="0" <?php 
							if( $result->status == 0 ) {
								echo 'selected';
							}
						?>>Inactive</option>
					</select>
					<?=form_error('status', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>
			<div class="form-group">
				<input type="submit" value="Submit" class="btn btn-success">
				<a href="<?=BASE_URL_ADMIN.'shop/shop_banner'?>" class="btn btn-danger">Cancel</a>
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

<script type="text/javascript">
$(document).ready(function(){
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