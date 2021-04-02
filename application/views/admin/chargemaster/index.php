<?php $this->load->view(ADMIN_VIEW.'header'); ?>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">Header - Product Delivery Charge</h4>
		<!-- <div class="heading-elements">
            <a href="<?=BASE_URL_ADMIN?>areamaster/statemaster/add" class="btn btn-primary">Add</a>      
        </div><br> -->
	</div>

    <div class="panel-body">
    	<div class="table-responsive">
    		<table class="table" id="table">
    			<thead>
    				<tr>
    					<th>Id</th>
    					<th>Product Name</th>                  
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
            "processing": true,
            "serverSide": true,
            "order": [[ 0, "asc" ]],

            "aoColumnDefs": [
                { 'bSortable': false, 'aTargets': [ 1 ]},
                { 'bSearchable': false, 'aTargets': [ -1 ] }
            ],
            "ajax": {
                "url": "<?=BASE_URL_ADMIN?>chargemaster/datatable",
                "type": "POST"
            },
            // "bJQueryUI": true,
            "sPaginationType": "full_numbers",
            "iDisplayStart ":20,
            "oLanguage": {
            // "sProcessing": "<img src='<?php //echo base_url(); ?>assets/images/ajax-loader_dark.gif'>"
            },   
            initComplete: function() {
                $('.dataTables_filter input[type=search]').attr('placeholder','Type to filter...');


                    // Enable Select2 select for the length option
                    $('.dataTables_length select').select2({
                        minimumResultsForSearch: "-1"
                    });
            },   

            "columns": [
                    { "data": "id" },
                    { "data": "name" },
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
	});

</script>