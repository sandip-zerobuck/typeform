<?php $this->load->view(ADMIN_VIEW.'header'); ?>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">Edit Product</h4>
		<div class="heading-elements"></div><br>
	</div>

	<div class="panel-body">
		<form method="post" action="<?=BASE_URL_ADMIN?>products/update" enctype="multipart/form-data" class="form-horizontal">
			<input type="hidden" name="id" value="<?=$result->id?>" />
			<input type="hidden" name="old_image" value="<?=$result->image?>" />

			<div class="form-group">
				<label class="col-md-2 control-label">Name: <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="text" name="name" class="form-control" value="<?=$result->name?>">
					<?=form_error('name', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Category: <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<select class="select" name="category_id">
						<option value="">Select Category</option>
						<?php foreach($category as $key => $value): ?> 
							<option value="<?=$value->id?>" 
								<?php
									if( $value->id == $result->category_id ) {
										echo 'selected';
									}
								?>
							><?=$value->name?></option> 
						<?php endforeach; ?>
					</select>
					<?=form_error('category_id', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Subategory: <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<select class="select" name="subcategory_id">
						<option value="">Select Category</option>
						<?php foreach($subcategory as $key => $value): ?> 
							<option value="<?=$value->id?>" 
								<?php
									if( $value->id == $result->subcategory_id ) {
										echo 'selected';
									}
								?>
							><?=$value->name?></option> 
						<?php endforeach; ?>
					</select>
					<?=form_error('subcategory_id', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Product Price : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="text" name="price" class="form-control" value="<?=$result->price?>">
					<?=form_error('price', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">GST % :<span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="text" name="gst" class="form-control" value="<?=$result->gst?>">
					<?=form_error('gst', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>


			<div class="form-group">
				<label class="col-md-2 control-label">Product Stock : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="text" name="stock" class="form-control" value="<?=$result->stock?>">
					<?=form_error('stock', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Coin: <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="text" name="coin" class="form-control" value="<?=$result->coin?>">
					<?=form_error('coin', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Required Coin: <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="text" name="required_coin" class="form-control" value="<?=$result->required_coin?>">
					<?=form_error('required_coin', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Delivery Charge (GUJARAT): <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="text" name="delivery_charge" class="form-control" value="<?=$result->delivery_charge?>">
					<?=form_error('delivery_charge', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Delivery Charge (OUT OF GUJARAT): <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="text" name="out_of_delivery_charge" class="form-control" value="<?=$result->out_of_delivery_charge?>">
					<?=form_error('out_of_delivery_charge', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>


			<div class="form-group">
				
				<div class="col-md-10">
					<img src="<?=base_url().PRODUCTS_UPLOADS.$result->image?>" style="height: 100px; width: 100px;">
				</div>
			</div>


			<div class="form-group">
				<img id="previewHolder" alt="Uploaded Image Preview Holder" width="250px" height="250px"/>
				<br><br>
				<label class="col-md-2 control-label">Image: </label>
				<div class="col-md-10">
					<input type="file" class="file-styled" name="image" id="image">
					<?=form_error('image', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
					<br>
					<label class="col-md-2 control-label">Short Description :<span class="text-danger">*</span></label>

						<div class="multi-select-full col-md-10">
							<textarea class="form-control" name="shortdesc" placeholder="Enter Short Description" ><?=$result->shortdesc?></textarea>
						<?=form_error('shortdesc', '<div class="text-danger">', '</div>'); ?>		
						</div>
				</div>



			<div class="form-group">
				<label class="col-md-2 control-label">Description: <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<textarea class="form-control" name="description1"><?=$result->description?></textarea>

					<script>CKEDITOR.replace( 'description1' );</script>
					<?=form_error('description1', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Status: <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<select class="select" name="status">
						<option value="1"
							<?php
								if( $result->status == 1 ) {
									echo 'selected';
								}
							?>
						>Active</option>
						<option value="0"
							<?php
								if( $result->status == 0 ) {
									echo 'selected';
								}
							?>
						>Inactive</option>
					</select>
					<?=form_error('status', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			
			<div class="form-group">
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