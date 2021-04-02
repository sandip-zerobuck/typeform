<?php $this->load->view(ADMIN_VIEW.'header'); ?>


<div class="panel panel-flat">
    <div class="panel-heading">
        <h4 class="panel-title">Delivery Charge</h4>
        <div class="heading-elements">

            <a href="<?=BASE_URL_ADMIN?>Chargemaster/add/<?=$id?>" class="btn btn-primary">Add New Charge</a>   
        </div><br>
    </div>

<form method="post" action="<?=BASE_URL_ADMIN?>Chargemaster/update_charge" enctype="multipart/form-data" class="form-horizontal">

    <div class="panel-body">
        <div class="table-responsive ">
            <table class="table datatable-sorting" id="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>State</th>
                        <th>Charge</th>
                        <th>Action</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    <?php  if (!empty($result)) { $no = 1; foreach ($result as $key => $value) { ?>

                    <tr>
                        <td>
                            <?=$no?>
                        </td>

                        <input type="hidden" name="id[]" value="<?=$value->id?>">

                        <td><?=$value->state?></td>
                        <td><input type="number" name="charge[]" value="<?=$value->charge?>" class="form-control"></td>
                        <td>
                            <button type="submit" class="btn btn-primary">Update Charge</button>
                        </td>
                        <td></td>
                        <td></td>
                    </tr>

                <?php $no++; } } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /traffic sources -->

</form>



<?php $this->load->view(ADMIN_VIEW.'footer'); ?>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/selects/select2.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/pages/datatables_sorting.js"></script>

<script type="text/javascript">
$(document).ready(function(){

        /*$(document).off('click','.delete').on('click','.delete',function(e){
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
    });*/

        
});

</script>