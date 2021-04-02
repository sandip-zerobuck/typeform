<?php $this->load->view(ADMIN_VIEW.'header'); ?>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">COVID-19 Cases Update</h4>
		<div class="heading-elements"></div><br>
	</div>

	<div class="panel-body">
		

			<h4>World	</h4>
			<form method="post" action="<?=BASE_URL_ADMIN?>covid/covid/update" enctype="multipart/form-data" class="form-horizontal">
			<div class="form-group">	

				<input type="hidden" name="id" value="<?=$covid_world->id?>">	

				<div class="col-md-2">
					<b class="control-label">Confirmed : <span class="text-danger">*</span></b>
					<input type="number" name="confirmed" class="form-control" placeholder="Enter Confirmed" value="<?=$covid_world->confirmed?>">
					<?=form_error('confirmed', '<div class="text-danger">', '</div>'); ?>
				</div>

				<div class="col-md-2">
					<b class="control-label">Recovered : <span class="text-danger">*</span></b>
					<input type="number" name="recovered" class="form-control" placeholder="Enter Recovered" value="<?=$covid_world->recovered?>">
					<?=form_error('recovered', '<div class="text-danger">', '</div>'); ?>
				</div>

				<div class="col-md-2">
					<b class="control-label">Deceased : <span class="text-danger">*</span></b>
					<input type="number" name="deceased" class="form-control" placeholder="Enter Deceased" value="<?=$covid_world->deceased?>">
					<?=form_error('deceased', '<div class="text-danger">', '</div>'); ?>
				</div>

				<div class="col-md-2">
					<br>
					<input type="submit" value="Update" class="btn btn-success">
				</div>
			</div>

			</form>

			<hr>
			<h4>India	</h4>
			<form method="post" action="<?=BASE_URL_ADMIN?>covid/covid/update" enctype="multipart/form-data" class="form-horizontal">
				<input type="hidden" name="id" value="<?=$covid_india->id?>">
			<div class="form-group">
				<div class="col-md-2">
					<b class="control-label">Confirmed : <span class="text-danger">*</span></b>
					<input type="number" name="confirmed" class="form-control" placeholder="Enter Confirmed" value="<?=$covid_india->confirmed?>">
					<?=form_error('confirmed', '<div class="text-danger">', '</div>'); ?>
				</div>

				<div class="col-md-2">
					<b class="control-label">Recovered : <span class="text-danger">*</span></b>
					<input type="number" name="recovered" class="form-control" placeholder="Enter Recovered" value="<?=$covid_india->recovered?>">
					<?=form_error('recovered', '<div class="text-danger">', '</div>'); ?>
				</div>

				<div class="col-md-2">
					<b class="control-label">Deceased : <span class="text-danger">*</span></b>
					<input type="number" name="deceased" class="form-control" placeholder="Enter Deceased" value="<?=$covid_india->deceased?>">
					<?=form_error('deceased', '<div class="text-danger">', '</div>'); ?>
				</div>

				<div class="col-md-2">
					<br>
					<input type="submit" value="Update" class="btn btn-success">
				</div>
			</div>
		</form>



			<div class="form-group">
				<!-- 
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

   



});
</script>