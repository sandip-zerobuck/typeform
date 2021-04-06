<?php $this->load->view('header'); ?>

<style type="text/css">


   
    .response-box{
        box-shadow: rgb(0 0 0 / 8%) 0px 2px 4px, rgb(0 0 0 / 6%) 0px 2px 12px;
        padding: 20px;
        font-size: 20px;
        cursor: pointer;
        margin: 10px;
    }

    .response-box:hover{
        background: rgb(230, 243, 247) !important;
    }

    .active-box{
        background: rgb(230, 243, 247) !important;
    }

    .response-details{
        box-shadow: rgb(0 0 0 / 8%) 0px 2px 4px, rgb(0 0 0 / 6%) 0px 2px 12px;
        overflow: auto;
        height: 500px;
        padding: 20px;
    }

    .hr-response{
        margin-top: 10px;
        margin-bottom: 10px;
    }
   

    
</style>

<div class="panel panel-flat">
    <div class="panel-heading">
        <h6 class="panel-title"></h6>
        <div class="heading-elements"></div>
    </div>

    <div class="panel-body">

        <div class="row">

            <div class="col-md-12">
                        <div class="card">
                            <div class="card-header header-elements-inline">
                                <h3 class="card-title">Response</h3>
                            </div>

                            <div class="card-body">
                                <hr>



                                <div class="col-md-4 col-sm-4">

                                    <?php if (!empty($result)) { ?>

                                    <b><?php echo count($result); ?> responses in total</b>

                                    <hr>
                                        
                                    

                                        <?php $no = 1; foreach ($result as $key => $value) {
                                            $active = '';
                                            $onclick = '';
                                            $read = '';

                                            if ($no == 1) {
                                                $active = 'active-box onclick';
                                                $onclick = 'true';
                                            }

                                            if ($value->read_mark == 'not_read') {
                                                $read = '<span class=" badge badge-pill bg-warning-400 ml-auto ml-md-0">new</span>';
                                            }
                                         ?>

                                            <div class="response-box <?=$active?>" data-id="<?=$value->id?>">
                                                <span class="badge-content<?=$value->id?>"><?=$read?></span>
                                                <b><?=date("M-d", strtotime($value->created_at))?></b>
                                                <span><?=date("H:i", strtotime($value->created_at))?></span>
                                                <a href="<?=BASE_URL?>typeform/deleteRespponse/<?=$value->id?>" class="btn btn-danger pull-right delete" style="padding: 2px 5px;font-size: 11px;"> <i class="fa fa-close"></i> Delete</a>
                                            </div> 

                                        <?php $no++; } ?>  

                                    <?php }else{ ?>

                                    <div class="alert alert-danger">No response available</div> 

                                    <?php } ?>

                                </div>

                                <div class="col-md-8 col-sm-8">

                                    <div class="response-details hidden">

                                        <div class="loader-inline hidden">
                                                <i class="icon-spinner6 spinner"></i>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

        </div>

    </div>  
</div>



<!-- /traffic sources -->
<?php $this->load->view('footer'); ?>

<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/visualization/d3/d3.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/visualization/d3/d3_tooltip.js"></script>
<script src="<?=base_url()?>assets/admin/js/plugins/visualization/echarts/echarts.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){

    var active_id = $('.active-box').data('id');

    response_details(active_id);

    $(document).off('click','.response-box').on('click','.response-box', function(){

        $('.response-box').removeClass('active-box');
        $(this).addClass('active-box');
        var id  = $(this).data('id');

        response_details(id);

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
                        if( response.statuscode ) {
                            self.closest('div').remove();
                            $(".loader").addClass('hidden');
                            show_notify(response.msg, 'bg-success');
                        }else{
                            $(".loader").addClass('hidden');
                            show_notify(response.msg, 'bg-danger');
                        }
                    },
                    error:function(response){
                        $(".loader").addClass('hidden');
                        show_notify('Something went wrong! Please try again.', 'bg-danger');
                    }
                });
            }
        });

});

function response_details(id)
{
    $('.loader-inline').removeClass('hidden');
    $.ajax({

            'url': '<?=BASE_URL?>typeform/response_details/'+id,
            'type':'GET',
            'dataType':'JSON',
            success:function(response){
                if (response.statuscode) 
                {
                    $('.response-details').removeClass('hidden');
                    $('.response-details').html(response.data);
                    $('.loader-inline').addClass('hidden');
                    $('.badge-content'+id).html('');
                }else{
                    $('.response-details').addClass('hidden');
                   $('.loader-inline').addClass('hidden');
                   show_notify(response.msg, 'bg-danger');
                }
            },
            error:function(response){
                $('.loader-inline').addClass('hidden');
                show_notify('Something went wrong! Please try again.', 'bg-danger');
            }


        });
}
</script>

