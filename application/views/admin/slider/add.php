<?php $this->load->view(ADMIN_VIEW.'header'); ?>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">Add Product</h4>
		<div class="heading-elements"></div><br>
	</div>

	<div class="panel-body">
		<form method="post" action="<?=BASE_URL_ADMIN?>slider/store" enctype="multipart/form-data" class="form-horizontal">

			<div class="form-group">
					<br>
					<label class="control-label">Image Preview<span class="text-danger">*</span></label>

						<div class="multi-select-full">
							<img id="previewHolder" alt="Uploaded Image Preview Holder" width="100px" height="100px"/>		
						</div>
				</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Slider Name : <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="text" name="name" class="form-control" placeholder="Slider Name" value="<?=set_value('name'); ?>">
					<?=form_error('name', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Site Link : </label>
				<div class="col-md-10">
					<input type="text" name="link" class="form-control" placeholder="Site link" value="<?=set_value('link'); ?>">
					<?=form_error('link', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			


			<div class="form-group">
				<label class="col-md-2 control-label">Image: <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="file" id="image" class="file-styled" name="image">
					<?=form_error('image', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>


			<div class="form-group">
				<label class="col-md-2 control-label">Status: <span class="text-danger">*</span></label>
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
				<a href="<?=BASE_URL_ADMIN.'slider/'?>" class="btn btn-danger">Cancel</a>
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

    /* Select City Of the State Selected */
    $( ".category" ).change(function() {
  		var category_id = $('#category_id').val();
    	 $.ajax({
            url: '<?=BASE_URL_ADMIN?>products/fetch_category',
            type:'POST',
            data:{
                category_id: category_id
            },
            success: function(response) {
            	$('#subcategory').html(response);
            }
        });
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