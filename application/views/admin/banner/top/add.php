<?php $this->load->view(ADMIN_VIEW.'header'); ?>





<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">Add Ads</h4>
		<div class="heading-elements"></div><br>
	</div>

	<div id="city_id_ok">
		
	</div>

	<div class="panel-body">

		<div id="calendar" class="vertical-box-column calendar"></div>

		<form method="post" action="<?=BASE_URL_ADMIN?>banner/top/store" enctype="multipart/form-data" class="form-horizontal">

			<div class="row">
			
				<div class="col-md-4">
					<br>
					<label class="control-label">Banner Name <span class="text-danger">*</span></label>

						<div class="multi-select-full">
							<input type="text" name="name" placeholder="Enter Banner Name" class="form-control" value="<?=set_value('name'); ?>">
							<?=form_error('name', '<div class="text-danger">', '</div>'); ?>

							<!-- <input type='text' class='datepicker-here' data-language='en' /> -->
						</div>
				</div>

				<div class="col-md-4">
					<br>
					<label class="control-label">Site URL</label>

						<div class="multi-select-full">
							<input type="text" name="link" placeholder="Enter Site link" class="form-control" value="<?=set_value('link'); ?>">
							<?=form_error('link', '<div class="text-danger">', '</div>'); ?>

							<!-- <input type='text' class='datepicker-here' data-language='en' /> -->
						</div>
				</div>

				
				<div class="col-md-4">
					<br>
					<label class="control-label">Select Date <span class="text-danger">*</span></label>

						<div class="multi-select-full">
							<input type="text" autocomplete="off"  name="select_date" value="<?=set_value('start_date'); ?>"  class="form-control form-control date">	
							<?=form_error('start_date', '<div class="text-danger">', '</div>'); ?>	
						</div>
				</div>

				<!-- <div class="col-md-4">
					<br>
					<label class="control-label">End Date <span class="text-danger">*</span></label>

						<div class="multi-select-full"> 
							<input type="date"  name="end_date"  value="<?=set_value('end_date'); ?>" class="form-control">	
							<?=form_error('end_date', '<div class="text-danger">', '</div>'); ?>	
						</div>
				</div> -->

				

				


				<div class="col-md-4">
					<br>
					<label class="control-label">Image <span class="text-danger">*</span></label>

						<div class="multi-select-full">
							<input type="file" class="file-styled" id="image" name="image">
						<?=form_error('image', '<div class="text-danger">', '</div>'); ?>		
						</div>
				</div>

				

				<div class="col-md-4">
					<br>
					<label class="control-label"><b>Image Preview</b></label>

						<div class="multi-select-full">
							<img id="previewHolder" alt="Uploaded Image Preview" width="100px" height="100px"/>		
						</div>

					
				</div>



				
			</div>
			<div class="form-group">
				<br>
				<input type="submit" value="Submit" class="btn btn-success">
				<a href="<?=BASE_URL_ADMIN?>banner/Top" class="btn btn-danger">Cancel</a>
			</div>
		</form>
	</div>
</div>
<!-- /traffic sources -->
<?php $this->load->view(ADMIN_VIEW.'footer'); ?>

<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/styling/uniform.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/core/app.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/pages/form_multiselect.js"></script>



<script type="text/javascript">
$(document).ready(function(){

	var disabledDays = <?=json_encode($date)?>;

	$('.date').datepicker({
  		multidate: true,
		format: 'dd-mm-yyyy',startDate: "dateToday",
			beforeShowDay: function(date)
			{
				var date = new Date(date);
				var string = ("0" + date.getDate()).slice(-2) + "-" + ("0" + (date.getMonth() + 1)).slice(-2) + "-" + date.getFullYear();
	         	var isDisabled = ($.inArray(string, disabledDays) != -1);
	         	return !isDisabled;
	      	}
	});


	$(".file-styled").uniform({
        fileButtonHtml: '<i class="icon-googleplus5"></i>',
        wrapperClass: 'bg-warning'
    });

    $('.select').select2({
        minimumResultsForSearch: "-1"
    });

    //Only Number Validation
  $(".number").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        $("#errmsg").html("Only Number Valid").show().fadeOut("slow");
               return false;
    }
   });


 // Image Preview.....

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