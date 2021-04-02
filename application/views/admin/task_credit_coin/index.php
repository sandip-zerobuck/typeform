<?php $this->load->view(ADMIN_VIEW.'header'); ?>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">Add Task Coin</h4>
		<div class="heading-elements"></div><br>
	</div>

	<div class="panel-body">
		<form method="post" action="<?=BASE_URL_ADMIN?>task_credit_coin/store" enctype="multipart/form-data" class="form-horizontal">


			<div class="form-group">
				<label class="col-md-2 control-label">Coin : <span class="text-danger">*</span></label>
				<div class="col-md-4">
					<input type="number" name="coin" class="form-control" placeholder="Enter coin" value="<?=set_value('coin'); ?>">
					<?=form_error('coin', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Description : <span class="text-danger">*</span></label>
				<div class="col-md-4">
					<textarea name="description" class="form-control" placeholder="Enter Description"><?=set_value('description'); ?></textarea>
					<?=form_error('description', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Date : <span class="text-danger">*</span></label>
				<div class="col-md-4">
					<input type="date" name="date" class="form-control" placeholder="date" value="<?=set_value('date'); ?>">
					<?=form_error('date', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Task Type : <span class="text-danger">*</span></label>
				<div class="col-md-4">
					<select class="select" name="type">
						<option value="1" <?php echo set_select('status', '1', TRUE); ?>>Image Ads</option>
						<option value="2" <?php echo set_select('status', '2'); ?>>Video Ads</option>
						<option value="3" <?php echo set_select('status', '3'); ?>>Link Ads</option>
					</select>
					<?=form_error('status', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<!-- <div class="form-group">
				<label class="col-md-2 control-label">Repeat Or No Repeat : <span class="text-danger">*</span></label>
				<div class="col-md-4">
					<select class="select" name="repeat">
						<option value="1" <?php echo set_select('status', '1', TRUE); ?>>No Repeat</option>
						<option value="2" <?php echo set_select('status', '2'); ?>>Repeat</option>
					</select>
					<?=form_error('status', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div> -->


			<div class="form-group">
				<input type="submit" value="Submit" class="btn btn-success"><!-- 
				<a href="<?=BASE_URL_ADMIN.'slider/'?>" class="btn btn-danger">Cancel</a> -->
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