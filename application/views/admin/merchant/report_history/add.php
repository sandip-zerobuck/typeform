<?php $this->load->view(ADMIN_VIEW.'header'); ?>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">Settlement</h4>
		<b>Name : </b> <?=$user->name?>
		<div class="heading-elements"></div><br>
	</div>

	<div class="panel-body">
		<form method="post" action="<?=BASE_URL_ADMIN?>merchantuser/Report_history/settlement" enctype="multipart/form-data" class="form-horizontal">

			<input type="hidden" name="merchant_id" value="<?=$id?>">

			<div class="row">
				<div class="col-md-4">
					<div class="multi-select-full">
						<label class="control-label">Amount <span class="text-danger">*</span></label>
						<input type="text" name="amount" class="form-control number" placeholder="Enter amount" value="<?php echo $total = $user->wallet_balance - $user->total_commission; ?>" autocomplete="off">
					<?=form_error('amount', '<div class="text-danger">', '</div>'); ?>
					</div>
				</div>

				<div class="col-md-4">
					<div class="multi-select-full">
						<label class="control-label">Check No. / Transfer No. / Txt no. <span class="text-danger">*</span></label>
						<input type="text" name="txt_no" class="form-control" placeholder="Enter Check No. / Transfer No. / Txt no." value="<?=set_value('txt_no'); ?>" autocomplete="off">
					<?=form_error('txt_no', '<div class="text-danger">', '</div>'); ?>
					</div>
				</div>

				<div class="col-md-4">
					<div class="multi-select-full">
						<label class="control-label">Date <span class="text-danger">*</span></label>
						<input type="text" autocomplete="off"  name="date" value="<?=set_value('date'); ?>"  class="form-control form-control date">	
							<?=form_error('date', '<div class="text-danger">', '</div>'); ?>
					</div>
				</div>


				<div class="col-md-4">
					<div class="multi-select-full">
						<br>
						<label class="control-label">Description <span class="text-danger">*</span></label>
						<input type="text" name="description" class="form-control" placeholder="Enter Description" value="<?=set_value('description'); ?>" autocomplete="off">
					<?=form_error('description', '<div class="text-danger">', '</div>'); ?>
					</div>
				</div>

			</div>


			
			<div class="form-group">
				<br><br>
				<input type="submit" value="Submit" class="btn btn-success">
				<a href="<?=BASE_URL_ADMIN.'merchantuser/Report_history'?>" class="btn btn-danger">Cancel</a>
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

<script type="text/javascript">
$(document).ready(function(){

	$('.date').datepicker({
  		multidate: true,
		format: 'dd-mm-yyyy'
	});

	$(".number").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        $("#errmsg").html("Only Number Valid").show().fadeOut("slow");
               return false;
    }
   });


	$(".file-styled").uniform({
        fileButtonHtml: '<i class="icon-googleplus5"></i>',
        wrapperClass: 'bg-warning'
    });

    $('.select').select2({
        minimumResultsForSearch: "-1"
    });

});
</script>