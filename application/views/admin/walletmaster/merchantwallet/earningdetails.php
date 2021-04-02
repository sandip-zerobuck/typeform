<?php $this->load->view(ADMIN_VIEW.'header'); ?>

<div class="panel panel-flat">
    <div class="panel-heading">
        <h4 class="panel-title">Merchant Wallete History</h4>
        <h4>
        <?php foreach ($merchant_user as $key => $value) { ?>

            <b>
              Name :   <?=$value->name?>
            </b>
            <br>
            <b>
              Mobile :   <?=$value->mobile?>
            </b>

            <?php } ?>
        </h4>
        <div class="heading-elements">
            <!-- <a href="<?=BASE_URL_ADMIN?>campingmaster/linkmaster/add" class="btn btn-primary">Add</a>   -->    
        </div><br>
    </div>

    <div class="panel-body">
        <div class="table-responsive">
            <table class="table" id="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Coin</th>
                        <th>Details</th>
                        <th>Date And Time</th>
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

<script type="text/javascript">

    $(document).ready(function(){
        var table = $('#table').dataTable( {
            "Processing": true,
            "ServerSide": true,
            "order": [[ 0, "asc" ]],

            "aoColumnDefs": [
                { 'bSortable': false, 'aTargets': [ 1 ]},
                { 'bSearchable': true }
            ],
            "sAjaxSource": '<?=BASE_URL_ADMIN?>walletmaster/merchantwallet/datatableearningdetails/<?=$id?>',
            // "bJQueryUI": true,
            "sPaginationType": "full_numbers",
            "iDisplayStart ":20,
            "oLanguage": {
            // "sProcessing": "<img src='<?php //echo base_url(); ?>assets/images/ajax-loader_dark.gif'>"
            },      

            "columns": [
                    { "data": "id" },
                    { "data": "coin" },
                    { "data": "description"},
                    { "data": "created_at" }
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