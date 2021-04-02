<?php $this->load->view(ADMIN_VIEW.'header'); ?>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">Add Product</h4>
		<div class="heading-elements"></div><br>
	</div>

	<div class="panel-body">
		<form method="post" action="<?=BASE_URL_ADMIN?>products_subcategory/store" enctype="multipart/form-data" class="form-horizontal">
			
			<div class="form-group">
				<label class="col-md-2 control-label">Category: <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<select class="select" name="category_id">
						<option value="">Select Category</option>
						<?php foreach($category as $key => $value): ?> 
							<option value="<?=$value->id?>" <?=set_select('category_id',$value->id)?>><?=$value->name?></option> 
						<?php endforeach; ?>
					</select>
					<?=form_error('category_id', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Name: <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<input type="text" name="name" class="form-control" value="<?=set_value('name'); ?>">
					<?=form_error('name', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<input type="submit" value="Submit" class="btn btn-success">
				<a href="<?=BASE_URL_ADMIN?>products_subcategory?>" class="btn btn-danger">Cancel</a>
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

});
</script>