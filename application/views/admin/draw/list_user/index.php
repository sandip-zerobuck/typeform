<?php $this->load->view(ADMIN_VIEW.'header'); ?>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">List User - <b><?=$result->name?></b></h4>
		<!-- <div class="heading-elements">
            <a href="<?=BASE_URL_ADMIN?>draw/index/add" class="btn btn-primary">Add</a>      
        </div><br> -->
	</div>

    <div class="panel-body">
    	<div class="table-responsive">
    		<table class="table" id="table">
    			<thead>
    				<tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Mobile Number</th>
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
            "order": [[ 0, "desc" ]],

            "aoColumnDefs": [
                { 'bSortable': false, 'aTargets': [ 2 ]},
                { 'bSearchable': true }
            ],
            "sAjaxSource": "<?=BASE_URL_ADMIN.'draw/list_user/datatable/'.$id?>",
            // "bJQueryUI": true,
            "sPaginationType": "full_numbers",
            "iDisplayStart ":20,
            "oLanguage": {
            // "sProcessing": "<img src='<?php //echo base_url(); ?>assets/images/ajax-loader_dark.gif'>"
            },      

            "columns": [
                    { "data": "id" },
                    { "data": "username" },
                    { "data": "mobile" }
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
                        $(".loader").addClass('hidden');
                        if( response.response ) {
                            self.closest('tr').remove();
                        }
                        
                    }
                });
            }
        });
	});

</script>