<?php $this->load->view(ADMIN_VIEW.'header'); ?>


<div class="row">
        <div class="form-group col-md-4">
            <label>State Country</label>
            <select class="bootstrap-select state-report" data-live-search="true" data-width="100%" id="country_id" >
                <option value="">Select Country</option>
                <?php foreach ($country as $key => $value) { ?>
                    <option value="<?=$value->id?>" ><?=$value->name?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group col-md-4">
            <label>State Select</label>
            <select class="bootstrap-select state-report" data-live-search="true" data-width="100%" id="state_id" >
                <option value="">Select State</option>
                <!-- <?php foreach ($state as $key => $value) { ?>
                    <option value="<?=$value->id?>" ><?=$value->name?></option>
                <?php } ?> -->
            </select>
        </div>

        <div class="form-group col-md-4">
            <label>District Select</label>
            <select class="bootstrap-select state-report" data-live-search="true" data-width="100%" id="district_id" >
                <option value="">Select district</option>
                <!-- <?php foreach ($district as $key => $value) { ?>
                    <option value="<?=$value->id?>" ><?=$value->name?></option>
                <?php } ?> -->
            </select>
        </div>
   

        <div class="form-group col-md-4">
            <label>Select Taluka</label>
            <select class="bootstrap-select city-report" data-live-search="true" data-width="100%" id="city_id">
                <option value="">Select Taluka</option>    
                <!-- <?php foreach ($city as $key => $value) { ?>
                    <option value="<?=$value->id?>" ><?=$value->name?></option>
                <?php } ?>   --> 
            </select>
        </div>


        <div class="form-group col-md-4">
            <label>State City</label>
            <select class="bootstrap-select area-report" data-live-search="true" data-width="100%" id="area_id">
                <option value="">Select City</option>
                <!-- <?php foreach ($area as $key => $value) { ?>
                    <option value="<?=$value->id?>" ><?=$value->name?></option>
                <?php } ?> -->
            </select>
        </div>

        <div class="form-group col-md-4">
            <label>State Pincode</label>
            <select class="bootstrap-select pincode-report" data-live-search="true" data-width="100%" id="pincode_id">
                <option value="">Select pincode</option>
                <!-- <?php foreach ($pincode as $key => $value) { ?>
                    <option value="<?=$value->id?>" ><?=$value->pincode?></option>
                <?php } ?> -->
            </select>
        </div>

</div>





<div class="panel panel-flat">

   

	<div class="panel-heading">
		<h4 class="panel-title">Complated Image Ads</h4>
		<div class="heading-elements">
            <a href="<?=BASE_URL_ADMIN?>campingmaster/imagemaster/add" class="btn btn-primary">Add</a>   
             <div class="col-md-12">
           


        </div>   
        </div><br>
<form method="post" action="<?=BASE_URL_ADMIN?>campingmaster/imagemaster/export_excel_complated">
<button type="submit"  class="btn btn-info"><i class="fa fa-file-excel-o" aria-hidden="true">&nbsp;&nbsp;Excle</i></button>
</form>
        
	</div>

    <div class="panel-body">



        

    	<div class="table-responsive">
    		<table class="table" id="table">
    			<thead>
    				<tr>
    					<th >No.</th>
                        <th>Image</th>
                        <th style="padding-right: 100px;">Title Name</th>
                        <th>Country</th>
                        <th>Status</th>
    					<th>Action</th>
    				</tr>
    			</thead>
    			<tbody></tbody>
    		</table>
    	</div>
    </div>
</div>
<!-- /traffic sources -->


<?php $this->load->view(ADMIN_VIEW.'footer'); ?>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- Theme JS files -->
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/selects/bootstrap_select.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/pages/form_bootstrap_select.js"></script>
<!-- /theme JS files -->

<script type="text/javascript">

	$(document).ready(function(){
		var table = $('#table').dataTable( {
            "processing": true,
            "serverSide": false,
            "order": [[ 0, "asc" ]],

            "aoColumnDefs": [
                { 'bSortable': false, 'aTargets': [ 3 ]},
                { 'bSearchable': false, 'aTargets': [ -5 ] }
            ],
            "ajax": {
                "url": "<?=BASE_URL_ADMIN?>campingmaster/imagemaster/datatable_complated",
                "type": "POST"
            },

            // "bJQueryUI": true,
            "sPaginationType": "full_numbers",
            "iDisplayStart ":20,
            "oLanguage": {
            // "sProcessing": "<img src='<?php //echo base_url(); ?>assets/images/ajax-loader_dark.gif'>"
            },      

            "columns": [
                    { "data": "id" },
                    { "data": "image" },
                    { "data": "name" },
                    { "data": "country_id" },
                    { "data": "status" },
                    { "data": "action" },
            ]
        });

        $(document).off('click','.delete').on('click','.delete',function(e){
            e.preventDefault();
            var self = $(this);
            if( confirm('Are you sure, you want to delete this record?') ) {
                $(".loader").removeClass('hidden');
                var url = self.attr('href');
                $.ajax({
                    url: url,
                    dataType: 'JSON',
                    success: function(response) {
                        if( response.response ) {
                            self.closest('tr').remove();
                        }
                        $(".loader").addClass('hidden');
                    }
                });
            }
        });

 
/* Select City Of the State Selected */
    $( "#country_id" ).change(function() {
        var country_id = $('#country_id').val();
        var countryname = $('#country_id').find(":selected").text();
         $.ajax({
            url: '<?=BASE_URL_ADMIN?>areamaster/Fetch_location/fetch_state',
            type:'POST',
            data:{
                country_id: country_id
            },
            success: function(response) {
                $('#state_id').html(response);
                $('#state_id').selectpicker('refresh');
                table.fnFilter(countryname).draw();
            }
        });
    });

/* Select City Of the State Selected */
    $( "#state_id" ).change(function() {
        var state_id = $('#state_id').val();
        var statename = $('#state_id').find(":selected").text();
         $.ajax({
            url: '<?=BASE_URL_ADMIN?>areamaster/Fetch_location/fetch_district',
            type:'POST',
            data:{
                state_id: state_id
            },
            success: function(response) {
                $('#district_id').html(response);
                $('#district_id').selectpicker('refresh');
                table.fnFilter(statename).draw();
            }
        });
    });


/* Select City Of the State Selected */
    $( "#district_id" ).change(function() {
        var district_id = $('#district_id').val();
        var districtname = $('#district_id').find(":selected").text();
         $.ajax({
            url: '<?=BASE_URL_ADMIN?>areamaster/Fetch_location/fetch_city',
            type:'POST',
            data:{
                district_id: district_id
            },
            success: function(response) {
                $('#city_id').html(response);
                $('#city_id').selectpicker('refresh');
                table.fnFilter(districtname).draw();
            }
        });
    });



    /* Select City Of the State Selected */
    $( "#city_id" ).change(function() {
        var city_id = $('#city_id').val();
         var cityname = $('#city_id').find(":selected").text();
         $.ajax({
            url: '<?=BASE_URL_ADMIN?>areamaster/Fetch_location/fetch_area',
            type:'POST',
            data:{
                city_id: city_id
            },
            success: function(response) {
                $('#area_id').html(response);
                $('#area_id').selectpicker('refresh');
                table.fnFilter(cityname).draw();
            }
        });

    });


    /* Select Area Of the City Selected */
    $( "#area_id" ).change(function() {

        var area_id = $('#area_id').val();
        var areaname = $('#area_id').find(":selected").text();
         $.ajax({
            url: '<?=BASE_URL_ADMIN?>areamaster/Fetch_location/fetch_pincode',
            type:'POST',
            data:{
                area_id: area_id
            },
            success: function(response) {
                $('#pincode_id').html(response);
                $('#pincode_id').selectpicker('refresh');
                table.fnFilter(areaname).draw();
            }
        });
    });

    $( "#pincode_id" ).change(function() {

        var pincode = $('#pincode_id').find(":selected").text();
        table.fnFilter(pincode).draw();

    });

        
	});

</script>
