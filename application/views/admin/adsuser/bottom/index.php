<?php $this->load->view(ADMIN_VIEW.'header'); ?>





<div class="panel panel-flat">

   

	<div class="panel-heading">
		<h4 class="panel-title">Top Banner Ads Request</h4>
		<div class="heading-elements">
            <!-- <a href="<?=BASE_URL_ADMIN?>campingmaster/imagemaster/add" class="btn btn-primary">Add</a>   
             <div class="col-md-12">
           


        </div>  -->  
        </div><!-- <br>
<form method="post" action="<?=BASE_URL_ADMIN?>campingmaster/imagemaster/export_excel_running">
<button type="submit"  class="btn btn-info"><i class="fa fa-file-excel-o" aria-hidden="true">&nbsp;&nbsp;Excle</i></button>
</form> -->
        
	</div>

    <div class="panel-body">



        

    	<div class="table-responsive">
    		<table class="table" id="table">
    			<thead>
    				<tr>
    					<th >No.</th>
                        <th>Image</th>
                        <th style="padding-right: 100px;">Title Name</th>
                        <th>Date</th><!-- 
                        <th>Click</th>
                        <th>Total Click</th>
                        <th>Timer</th> -->
                        <th>Payment Info.</th>
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
                "url": "<?=BASE_URL_ADMIN?>adsuser/banner/Bottom/datatable",
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
                    { "data": "date" },/*
                    { "data": "coin" },
                    { "data": "click" },
                    { "data": "remaining_click" },
                    { "data": "timer" },*/
                    { "data": "user_name" },
                    { "data": "user_status" },
                    { "data": "action" }
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


        
});

</script>
