<?php $this->load->view(ADMIN_VIEW.'header'); ?>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">Merchant User Request</h4>
		<div class="heading-elements">
            <!-- <a href="<?=BASE_URL_ADMIN?>merchant/add" class="btn btn-primary">Add</a>   -->    
        </div><br>
	</div>

    <div class="panel-body">
    	<div class="table-responsive">
    		<table class="table datatable-sorting" id="table">
    			<thead>
    				<tr>
                        <th>ID</th>
                        <th>Personal Details</th>
                        <th>Coin</th>
    					<th>Status</th>
    					<th>Action</th>
                        <th>Remark</th>
    				</tr>
    			</thead>
    			<tbody>

                    <?php  if (!empty($admin_wallet_accept)) { $no = 1; foreach ($admin_wallet_accept as $key => $value) { ?>

                    <tr>
                        <td>
                            <?=$no?>
                        </td>

                        <td>
                            <div style="width: 180px;">
                                <b>Name : </b><?=$value->name?><br>
                                <b>Mobile : </b><?=$value->mobile?><br>
                                <b>Email : </b><?=$value->email?><br>
                            </div>

                        </td>

                        <td><b><?=$value->coin?><b/></td>
                        <td>
                            <?php if ($value->status == 1) { ?>
                                <lable class="label label-success">Accept</lable>
                            <?php }elseif($value->status == 0){ ?>
                             <lable class="label label-danger">Reject</lable>
                         <?php }elseif($value->status == 2){ ?>
                             <lable class="label label-warning">Pendiing</lable>
                            <?php } ?>
                        </td>

                        <td>
                            <a href="<?=BASE_URL_ADMIN.'merchant/edit_request/'.$value->id?>" class=""><i class="icon-pencil3"></i> Edit</a>
                        </td>

                        <td><div style="width: 200px;">
                            <b>Remark :</b> <?=$value->remark?><br>
                            <b>Amount :</b> <?=$value->rupees?><br>
                            <b>Bank Name :</b> <?=$value->bank?><br>
                            <b>Payment :</b> <?=$value->payment?><br>
                            <b>Date :</b> <?=$value->at_date?><br>

                            </div>
                        </td>
                    </tr>

                <?php $no++; } } ?>

                </tbody>
    		</table>
    	</div>
    </div>
</div>
<!-- /traffic sources -->
<?php $this->load->view(ADMIN_VIEW.'footer'); ?>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/selects/select2.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/pages/datatables_sorting.js"></script>

<script type="text/javascript">

	$(document).ready(function(){
		
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