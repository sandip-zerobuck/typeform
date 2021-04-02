<?php $this->load->view(ADMIN_VIEW.'header'); ?>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">Edit</h4>
		<div class="heading-elements"></div><br>
	</div>

	<div class="panel-body">
		<form method="post" action="<?=BASE_URL_ADMIN?>merchant/update_request" enctype="multipart/form-data" class="form-horizontal">
			<input type="hidden" name="id" value="<?=$result->id?>" />

			<div class="form-group">
				<label class="col-md-2 control-label">Message : <span class="text-danger">*</span></label>
				<div class="col-md-10">
			
					<textarea name="message" class="form-control" placeholder="Enter message"><?=$result->message; ?></textarea>
					<?=form_error('message', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			

			<div class="form-group">
				<label class="col-md-2 control-label">Remark : <span class="text-danger">*</span></label>
				<div class="col-md-10">
			
					<textarea name="admin_remark" class="form-control" placeholder="Enter Remark"><?=$result->admin_remark; ?></textarea>
					<?=form_error('admin_remark', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

		

			
			<div class="form-group">
				<label class="col-md-2 control-label">Status: <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<select class=" form-control" name="status">
						<option value="1"
                        	<?php
                        		if($result->status == '1') {
                        			echo 'selected';
                        		}
                        	?>
                        >Accept</option>
						<option value="0"
                        	<?php
                        		if($result->status == '0') {
                        			echo 'selected';
                        		}
                        	?>
                        >Reject</option>

                        <option value="2"
                        	<?php
                        		if($result->status == '2') {
                        			echo 'selected';
                        		}
                        	?>
                        >Pendiing</option>
					</select>
					<?=form_error('status', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>
			
			<div class="form-group">
				<input type="submit" value="Submit" class="btn btn-success">
				<a href="<?=BASE_URL_ADMIN.'merchant/request'?>" class="btn btn-danger">Cancel</a>
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