<?php $this->load->view(ADMIN_VIEW.'header'); ?>

<div class="panel panel-flat">
    <div class="panel-heading">
        <h6 class="panel-title"></h6>
        <div class="heading-elements"></div>
    </div>

    <div class="panel-body">

        <div class="row">

<div class="col-lg-3">
<!-- Members online -->
    <div class="panel">
        <div class="panel-body">
            <h3 class="no-margin">
                
                <i class="fa fa-inr"></i> 
                <?php if (!empty($total)) 
                { echo $total; } else{ echo '0'; } ?>
            </h3>
            <b>Total Turnover</b>
        <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
    </div>
<!-- /members online -->
</div>

<div class="col-lg-3">
<!-- Members online -->
    <div class="panel">
        <div class="panel-body">
            <h3 class="no-margin">
                <!-- <?php if (!empty($image)){
            foreach ($image as $key => $value) {
                
                $Total[] = $value->coin;
            }
           echo array_sum($Total);
                }else{
                    echo '0';
                } ?> -->
                <i class="fa fa-inr"></i>
                <?php if (!empty($commission)) 
                { echo $commission; } else{ echo '0'; } ?>
            </h3>
            <b>Commission</b>
        <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
    </div>
<!-- /members online -->
</div>


<div class="col-lg-3">
<!-- Members online -->
    <div class="panel">
        <div class="panel-body">
            <h3 class="no-margin">
                <!-- <?php if (!empty($image)){
            foreach ($image as $key => $value) {
                
                $Total[] = $value->coin;
            }
           echo array_sum($Total);
                }else{
                    echo '0';
                } ?> -->
                <i class="fa fa-inr"></i>
                <?php if (!empty($discount)) 
                { echo $discount; } else{ echo '0'; } ?>
            </h3>
            <b>Discount</b>
        <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
    </div>
<!-- /members online -->
</div>


<div class="col-lg-3">
<!-- Members online -->
    <div class="panel <?php if($net_amount >= 0){ echo 'bg-success-400'; }else{ echo 'bg-danger-400'; } ?> ">
        <div class="panel-body">
            <h3 class="no-margin">
                <!-- <?php if (!empty($image)){
            foreach ($image as $key => $value) {
                
                $Total[] = $value->coin;
            }
           echo array_sum($Total);
                }else{
                    echo '0';
                } ?> -->
                <i class="fa fa-inr"></i> <?=$net_amount?>
            </h3>
            <b>Net Amount</b>
        <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
    </div>
<!-- /members online -->
</div>


            





        </div>

    </div>  
</div>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">User Request History</h4>
		<div class="heading-elements">
                
        </div><br>
	</div>

    <div class="panel-body">
    	<div class="table-responsive">
    		<table class="table" id="table">
    			<thead>
    				<tr>
    					<th>id.</th>
                        <th>Shop Name</th>
                        <th>Mobile</th>
    					<th>Total Turnover</th>
                        <th>Commission (%)</th>
                        <th>Commission (<i class="fa fa-inr"></i>)</th>
                        <th>Discount</th>
                        <th>Net Amount</th>
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
            "sAjaxSource": '<?=BASE_URL_ADMIN?>merchantuser/Report_history/datatable',
            // "bJQueryUI": true,
            "sPaginationType": "full_numbers",
            "iDisplayStart ":20,
            "oLanguage": {
            // "sProcessing": "<img src='<?php //echo base_url(); ?>assets/images/ajax-loader_dark.gif'>"
            },      

            "columns": [
                    { "data": "id" },
                    { "data": "name" },
                    { "data": "mobile" },
                    { "data": "total" },
                    { "data": "m_commission" },
                    { "data": "admin_commission" },
                    { "data": "user_balance" },
                    { "data": "netamount" },
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
	});

</script>