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

            <div class="col-md-12">
                        <div class="card">
                            <div class="card-header header-elements-inline">
                                <h3 class="card-title">Create Form</h3>
                                <div class="header-elements">
                                    <div class="list-icons">
                                        <a class="list-icons-item" data-action="collapse"></a>
                                        <a class="list-icons-item" data-action="reload"></a>
                                        <a class="list-icons-item" data-action="remove"></a>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <ul class="nav nav-tabs nav-tabs-bottom">
                                    <li class="nav-item active"><a href="#bottom-justified-tab1" class="nav-link active" data-toggle="tab">Create</a></li>
                                    <li class="nav-item"><a href="#bottom-justified-tab2" class="nav-link" data-toggle="tab">Integrate</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane fade show active in" id="bottom-justified-tab1">
                                        To use in tabs with equal widths add <code>.nav-justified .nav-tabs-bottom</code> classes.
                                    </div>

                                    <div class="tab-pane fade" id="bottom-justified-tab2">
                                        Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid laeggin.
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

       

    });


</script>

