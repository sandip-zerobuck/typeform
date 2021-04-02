<?php $this->load->view('header'); ?>

<style type="text/css">
    
    .count{
        font-size: 20px;
    }

</style>

<div class="panel panel-flat">
    <div class="panel-heading">
        <h6 class="panel-title"></h6>
        <div class="heading-elements"></div>
    </div>

    <div class="panel-body">

        <div class="row">

            <div class="col-md-3 col-sm-6">
                <div class="new-form-box">
                    
                    <h1>New Typeform</h1>

                    <a href="<?=BASE_URL?>typeform" class="btn btn-deafult btn-create">Create</a>

                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="form-box">
                    
                    

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

       

    });


</script>

