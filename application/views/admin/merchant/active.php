<?php $this->load->view(ADMIN_VIEW.'header'); ?>



<div class="panel panel-flat">
    <div class="panel-heading">
        <h4 class="panel-title">Active Merchant User</h4>
        <div class="heading-elements">
            <a href="<?=BASE_URL_ADMIN?>Merchant/add" class="btn btn-primary">Add</a>      
        </div><br>
    </div>

    <div class="panel-body">
        <div class="table-responsive">
            <table class="table" id="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Image</th>
                        <th>Personal Details</th>
                        <th>Address</th>
                        <th>Refer Info</th>
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
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/selects/select2.min.js"></script>

<!-- Theme JS files -->
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/selects/bootstrap_select.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/pages/form_bootstrap_select.js"></script>
<!-- /theme JS files -->

<script type="text/javascript">

    $(document).ready(function(){
        var table = $('#table').dataTable( {
            "Processing": true,
            "ServerSide": true,
            "order": [[ 0, "asc" ]],

            "aoColumnDefs": [
                { 'bSortable': false, 'aTargets': [ 3 ]},
                { 'bSearchable': true }
            ],
            "sAjaxSource": '<?=BASE_URL_ADMIN?>merchant/datatable_active',
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
                    { "data": "shop" },
                    { "data": "location" },
                    { "data": "status" },
                    { "data": "action" }
            ],  

            'fnServerData': function(sSource, aoData, fnCallback)
            {
                $.ajax
                ({
                    'dataType': 'json',
                    'type'    : 'POST',
                    'url'     : sSource,
                    'data'    : aoData,
                    'success' : fnCallback
                });
            }
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