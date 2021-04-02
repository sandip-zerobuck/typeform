<?php $this->load->view(ADMIN_VIEW.'header'); ?>
<!-- 
<div class="panel panel-flat">
    <div class="panel-heading">
        <h6 class="panel-title"></h6>
        <div class="heading-elements"></div>
    </div>

    <div class="panel-body">

        <div class="row">

 <div class="col-lg-4">
<div class="panel bg-teal-400">
    <div class="panel-body">
        

        <h3 class="no-margin">
            <?php if (!empty($image)){
        foreach ($image as $key => $value) {
            
            $Total[] = $value->coin;
        }
       echo array_sum($Total);
            }else{
                echo '0';
            } ?>
        </h3>
        Image Click Coin
        
    <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
</div>
</div> 
 <div class="col-lg-4">
<div class="panel bg-pink-400">
    <div class="panel-body">
        

        <h3 class="no-margin">
              <?php if (!empty($video)){
        foreach ($video as $key => $value) {
            
            $Totalvideo[] = $value->coin;
        }
       echo array_sum($Totalvideo);
            }else{
                echo '0';
            } ?>
        </h3>
        Video Click Coin
        
    <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
</div>
</div>

<div class="col-lg-4">
<div class="panel bg-blue-400">
    <div class="panel-body">
        

        <h3 class="no-margin">
            <?php if (!empty($link)){
        foreach ($link as $key => $value) {
            
            $Totallink[] = $value->coin;
        }
       echo array_sum($Totallink);
            }else{
                echo '0';
            } ?>
        </h3>
        Link Click Coin     
    <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
</div>
</div>
            
        </div>

    </div>  
</div> -->

<div class="panel panel-flat">
    <div class="panel-heading">
        <h4 class="panel-title"> <b>Link Ads Report</b></h4>
        <h4 class="panel-title"> <b>Ads Name :</b> <?=$result->name?></h4>
        <div class="heading-elements">
            <form method="post" action="<?=BASE_URL_ADMIN?>ads_report/Link/export_excel/<?=$result->id?>">
            <button type="submit"  class="btn btn-success"><i class="icon-file-excel" aria-hidden="true"> Export Excle</i></button>
            </form>   
        </div>
    </div>



    <div class="panel-body">
        <div class="table-responsive">
            <table class="table" id="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Date</th>
                        <th>User Name</th>
                        <th>Mobile Number</th>
                        <th>Details</th>
                        <th>Coin</th>
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
            "sAjaxSource": '<?=BASE_URL_ADMIN?>ads_report/Link/datatable/<?=$result->id?>',
            // "bJQueryUI": true,
            "sPaginationType": "full_numbers",
            "iDisplayStart ":20,
            "oLanguage": {
            // "sProcessing": "<img src='<?php //echo base_url(); ?>assets/images/ajax-loader_dark.gif'>"
            },      

            "columns": [
                    { "data": "id" },
                    { "data": "created_at" },
                    { "data": "name" },
                    { "data": "mobile" },
                    { "data": "details" },
                    { "data": "coin" }
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