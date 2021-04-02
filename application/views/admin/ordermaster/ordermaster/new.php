<?php $this->load->view(ADMIN_VIEW.'header'); ?>

<style type="text/css">
    .table-padding th,td{
        padding: 5px;
    }

    .dark-th th{
        background-color: #212529;
        color: #fff;
    }

    .Total-th th{
        font-size: 13px;
    }
</style>


<div class="panel panel-flat">
    <div class="panel-heading">
        <h4 class="panel-title">New Order</h4>
        <div class="heading-elements">


            <br>
        <form method="post" action="<?=BASE_URL_ADMIN?>ordermaster/Ordermaster/export_excel_running">
<button type="submit"  class="btn btn-info"><i class="fa fa-file-excel-o" aria-hidden="true">&nbsp;&nbsp;Excle</i></button>
</form>


            <!-- <a href="<?=BASE_URL_ADMIN?>campingmaster/linkmaster/add" class="btn btn-primary">Add</a>    -->   
        </div><br>
    </div>

    <div class="panel-body">
        <div class="table-responsive ">
            <table class="table datatable-sorting" id="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Date</th>
                        <th>Order Details</th>
                        <th>User Details</th>
                        <th>Payment Status</th>
                        <th>Status</th>
                        <th>Details</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /traffic sources -->



<!-- Ordre Details...  -->

<!-- Modal -->
<div class="modal fade" id="orderdetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Order Deatils</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="col-md-12 col-xs-12 table-data">
            
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>


<!-- Order Status Change -->
<form method="post" action="<?=BASE_URL_ADMIN?>ordermaster/ordermaster/update">
<div class="modal fade" id="orderstatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Order Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="col-md-12 col-xs-12 table-data-status">

            
                
            
            
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update Status</button>
      </div>
    </div>
  </div>
</div>

</form>



<?php $this->load->view(ADMIN_VIEW.'footer'); ?>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/selects/select2.min.js"></script>

<!-- Theme JS files -->
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/selects/bootstrap_select.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/pages/form_bootstrap_select.js"></script>

<script type="text/javascript">
$(document).ready(function(){

     var table = $('#table').dataTable( {
            "Processing": true,
            "ServerSide": true,
            "order": [[ 0, "desc" ]],

            "aoColumnDefs": [
                { 'bSortable': false, 'aTargets': [ 3 ]},
                { 'bSearchable': true }
            ],
            "sAjaxSource": '<?=BASE_URL_ADMIN?>ordermaster/neworder/datatable',
            // "bJQueryUI": true,
            "sPaginationType": "full_numbers",
            "iDisplayStart ":20,
            "oLanguage": {
            // "sProcessing": "<img src='<?php //echo base_url(); ?>assets/images/ajax-loader_dark.gif'>"
            },      

            "columns": [
                    { "data": "id" },
                    { "data": "order_date" },
                    { "data": "order_details" },
                    { "data": "user_details" },
                    { "data": "payment_status" },
                    { "data": "status" },
                    { "data": "details" },
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

        // Order Details : 
        
    $(document).on('click','.order_id',function(){
        var order_id = $(this).data("order_id");
        $.ajax({
        url: '<?=BASE_URL_ADMIN?>ordermaster/ordermaster/order_details',
        type:'POST',
        data:{
        order_id: order_id
        },
        success: function(response) {
        $('.table-data').html(response);
        }
        });
    });


    $(document).on('click','.order_status',function(){
        var order_id = $(this).data("order_id");

        $.ajax({
        url: '<?=BASE_URL_ADMIN?>ordermaster/ordermaster/order_status',
        type:'POST',
        data:{
        order_id: order_id
        },
        success: function(response) {
        $('.table-data-status').html(response);
        }
        });
    });

        
});

</script>