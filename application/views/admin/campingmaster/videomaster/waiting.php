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
                <?php foreach ($state as $key => $value) { ?>
                    <option value="<?=$value->id?>" ><?=$value->name?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group col-md-4">
            <label>District Select</label>
            <select class="bootstrap-select state-report" data-live-search="true" data-width="100%" id="district_id" >
                <option value="">Select district</option>
                <?php foreach ($district as $key => $value) { ?>
                    <option value="<?=$value->id?>" ><?=$value->name?></option>
                <?php } ?>
            </select>
        </div>
   

        <div class="form-group col-md-4">
            <label>Select Taluka</label>
            <select class="bootstrap-select city-report" data-live-search="true" data-width="100%" id="city_id">
                <option value="">Select Taluka</option>    
                <?php foreach ($city as $key => $value) { ?>
                    <option value="<?=$value->id?>" ><?=$value->name?></option>
                <?php } ?>   
            </select>
        </div>


        <div class="form-group col-md-4">
            <label>State City</label>
            <select class="bootstrap-select area-report" data-live-search="true" data-width="100%" id="area_id">
                <option value="">Select City</option>
                <?php foreach ($area as $key => $value) { ?>
                    <option value="<?=$value->id?>" ><?=$value->name?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group col-md-4">
            <label>State Pincode</label>
            <select class="bootstrap-select pincode-report" data-live-search="true" data-width="100%" id="pincode_id">
                <option value="">Select pincode</option>
                <?php foreach ($pincode as $key => $value) { ?>
                    <option value="<?=$value->id?>" ><?=$value->pincode?></option>
                <?php } ?>
            </select>
        </div>

</div>

<div class="panel panel-flat">
    <div class="panel-heading">
        <h4 class="panel-title">Header - Waiting Video Running</h4>
        <div class="heading-elements">
            <a href="<?=BASE_URL_ADMIN?>campingmaster/videomaster/add" class="btn btn-primary">Add</a>      
        </div><br>

<form method="post" action="<?=BASE_URL_ADMIN?>campingmaster/videomaster/export_excel_waiting">
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
            "Processing": true,
            "ServerSide": true,
            "order": [[ 0, "asc" ]],

            "aoColumnDefs": [
                { 'bSortable': false, 'aTargets': [ 3 ]},
                { 'bSearchable': true }
            ],
            "sAjaxSource": '<?=BASE_URL_ADMIN?>campingmaster/videomaster/datatable_waiting',
            // "bJQueryUI": true,
            "sPaginationType": "full_numbers",
            "iDisplayStart ":20,
            "oLanguage": {
            // "sProcessing": "<img src='<?php //echo base_url(); ?>assets/images/ajax-loader_dark.gif'>"
            },      

            "columns": [
                    { "data": "id" },
                    { "data": "video" },
                    { "data": "name" },
                    { "data": "country_id" },
                    { "data": "status" },
                    { "data": "action" },
                   
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

       
  
});

</script>