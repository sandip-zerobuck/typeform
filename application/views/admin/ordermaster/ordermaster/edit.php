<?php $this->load->view(ADMIN_VIEW.'header'); ?>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">Edit User</h4>
		<div class="heading-elements"></div><br>
	</div>

	<div class="panel-body">
		<form method="post" action="<?=BASE_URL_ADMIN?>ordermaster/ordermaster/update" enctype="multipart/form-data" class="form-horizontal">

			<input type="hidden" name="id" value="<?=$result->id?>" />

		
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
						>Order Confirm Success</option>
						<option value="0"
							<?php
								if( $result->status == 0 ) {
									echo 'selected';
								}
							?>
						>Order Cancel</option>
						<option value="2"
							<?php
								if( $result->status == 2 ) {
									echo 'selected';
								}
							?>
						>Order Pending</option>
					</select>
					<?=form_error('status', '<div class="text-danger">', '</div>'); ?>
				</div>
			</div>


			<div class="form-group">
				<input type="submit" value="Submit" class="btn btn-success">
				<a href="<?=BASE_URL_ADMIN?>ordermaster/ordermaster?>" class="btn btn-danger">Cancel</a>
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
	$(".file-styled").uniform({
        fileButtonHtml: '<i class="icon-googleplus5"></i>',
        wrapperClass: 'bg-warning'
    });

    $('.select').select2({
        minimumResultsForSearch: "-1"
    });

/* Select City Of the State Selected */
    $( ".country" ).change(function() {
  		var country_id = $('#country_id').val();

    	 $.ajax({
            url: '<?=BASE_URL_ADMIN?>usermaster/usermaster/fetch_state',
            type:'POST',
            data:{
                country_id: country_id
            },
            success: function(response) {
            	$('#state_id').html(response);
            }
        });
	});

/* Select City Of the State Selected */
    $( ".state" ).change(function() {

  		var state_id = $('#state_id').val();
    	 $.ajax({
            url: '<?=BASE_URL_ADMIN?>usermaster/usermaster/fetch_city',
            type:'POST',
            data:{
                state_id: state_id
            },
            success: function(response) {
            	$('#city').html(response);
            }
        });
	});

/* Select Area Of the City Selected */
	$( ".city" ).change(function() {

  		var city_id = $('#city').val();

    	 $.ajax({
            url: '<?=BASE_URL_ADMIN?>usermaster/usermaster/fetch_area',
            type:'POST',
            data:{
                city_id: city_id
            },
            success: function(response) {
            	$('#area').html(response);
            }
        });
	});

});
</script>