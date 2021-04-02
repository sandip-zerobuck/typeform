<?php $this->load->view(ADMIN_VIEW.'header'); ?>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">User Request</h4>
		<div class="heading-elements">
              
        </div><br>
	</div>

    <div class="panel-body">
    	<div class="table-responsive">
    		<table class="table" id="table">
    			<thead>
    				<tr>
    					<th>id.</th>
                        <th>Date</th>
    					<th>User</th>
                        <th>Details</th>
                        <th>Status</th>
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
            "sAjaxSource": "<?=BASE_URL_ADMIN.'merchantuser/Request_user/datatable/'.$id?>",
            // "bJQueryUI": true,
            "sPaginationType": "full_numbers",
            "iDisplayStart ":20,
            "oLanguage": {
            // "sProcessing": "<img src='<?php //echo base_url(); ?>assets/images/ajax-loader_dark.gif'>"
            },      

            "columns": [
                    { "data": "id" },
                    { "data": "date_time" },
                    { "data": "name" },
                    { "data": "details" },
                    { "data": "status" }
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