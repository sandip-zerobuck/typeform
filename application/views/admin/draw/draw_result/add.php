<?php $this->load->view(ADMIN_VIEW.'header'); ?>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">Add</h4>
		<div class="heading-elements"></div><br>
	</div>

	<div class="panel-body">
		<form method="post" action="<?=BASE_URL_ADMIN?>draw/draw_result/store" enctype="multipart/form-data" class="form-horizontal">

			<input type="hidden" name="draw_id" value="<?=$id?>">

			<div class="form-group">
				<b class="col-md-2 control-label ">Select User : <span class="text-danger">*</span></b>
				<div class="col-md-4">
					<select name="user_id" class="select user_id">
						<option value="">Select</option>
						<?php
							if(isset($user)) {
								if( !empty($user) && is_array($user) ) {

									foreach ($user as $key => $value) {
						?>
										<option value="<?=$value->user_id?>" <?=set_select('user_id',$value->user_id)?>>
											<?=$value->firstname.' '.$value->lastname?>
										</option>
						<?php
									}
								}

							}
						?>
					</select>
					<?=form_error('user_id', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>

			<div class="form-group">
				<b class="col-md-2 control-label ">Select Rank No. : <span class="text-danger">*</span></b>
				<div class="col-md-4">
					<select name="rank_no" class="select rank_no">
						<option value="">Select</option>
						
						<?php
							if(isset($draw)) {
								if( !empty($draw)) {

									for ($i=1; $i <= $draw->winners_user; $i++) {  ?>
										<option value="<?=$i?>" <?=set_select('rank_no',$i)?>>
											<b>Rank <?=$i?></b>
										</option>
								<?php	}
								}

							}
						?>
					</select>
					<?=form_error('rank_no', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div> 

			<div class="form-group">
				<b class="col-md-2 control-label">Wining Price Name : <span class="text-danger">*</span></b>
				<div class="col-md-4">
					<input type="text" name="name" class="form-control" placeholder="Wining Price Name" value="<?=set_value('name'); ?>">
					<?=form_error('name', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>
			
			<div class="form-group">
				<input type="submit" value="Submit" class="btn btn-success">
				<a href="<?=BASE_URL_ADMIN.'draw/draw_result/index/'.$id?>" class="btn btn-danger">Cancel</a>
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

    // $('.select').select2({
    //     minimumResultsForSearch: "-1"
    // });

    $('.select').select2();

   
});
</script>