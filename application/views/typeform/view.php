<?php $this->load->view('header'); ?>

<style type="text/css">
    
    .count{
        font-size: 20px;
    }

    .form-design-box{
        box-shadow: rgb(0 0 0 / 8%) 0px 2px 4px, rgb(0 0 0 / 6%) 0px 2px 12px;
    }

    .form-design-box{
        padding: 200px 0px 200px 0px;
    }

    /* form view Css */

    .label-welcome{
        width: 100%;
    }

    .next_lable{
        width: 100%;
    }

    .question-no{
        font-size: 25px;
        font-weight: bold;
        color: rgb(4, 69, 175);
    }

    .btn-start{
        position: relative;
        font-family: inherit;
        font-weight: 700;
        cursor: pointer;
        transition-duration: 0.1s;
        transition-property: background-color, color, border-color, opacity, box-shadow;
        transition-timing-function: ease-out;
        outline: none;
        border: 1px solid transparent;
        margin: 0px;
        box-shadow: rgb(0 0 0 / 10%) 0px 3px 12px 0px;
        padding: 8px 18px;
        min-height: 48px;
        background-color: rgb(4, 69, 175);
        color: rgb(255, 255, 255);
        border-radius: 4px;
        font-size: 25px;
    }

    .btn-start:hover{
        background-color: rgb(42, 97, 187);
    }

    .label-heading{
        color: rgb(38, 38, 39);
    }

    .short_text_input{
         padding: 0px 0px 8px;
        border: none;
        outline: none;
        border-radius: 0px;
        appearance: none;
        background-image: none;
        background-position: initial;
        background-size: initial;
        background-repeat: initial;
        background-attachment: initial;
        background-origin: initial;
        background-clip: initial;
        transform: translateZ(0px);
        -webkit-font-smoothing: antialiased;
        line-height: unset;
        -webkit-text-fill-color: rgba(4, 69, 175, 0.3);
        animation: 1ms ease 0s 1 normal none running native-autofill-in;
        transition: background-color 1e+08s ease 0s, box-shadow 0.1s ease-out 0s;
        box-shadow: rgb(4 69 175 / 30%) 0px 1px;
        background-color: transparent !important;
        font-size: 25px;
    }

    .long_text_input{
         padding: 0px 0px 8px;
        border: none;
        outline: none;
        border-radius: 0px;
        appearance: none;
        background-image: none;
        background-position: initial;
        background-size: initial;
        background-repeat: initial;
        background-attachment: initial;
        background-origin: initial;
        background-clip: initial;
        transform: translateZ(0px);
        
        -webkit-font-smoothing: antialiased;
        line-height: unset;
        -webkit-text-fill-color: rgba(4, 69, 175, 0.3);
        animation: 1ms ease 0s 1 normal none running native-autofill-in;
        transition: background-color 1e+08s ease 0s, box-shadow 0.1s ease-out 0s;
        box-shadow: rgb(4 69 175 / 30%) 0px 1px;
        background-color: transparent !important;
        font-size: 25px;
    }

    .prev{
        position: relative;
        font-family: inherit;
        font-weight: 700;
        cursor: pointer;
        transition-duration: 0.1s;
        transition-property: background-color, color, border-color, opacity, box-shadow;
        transition-timing-function: ease-out;
        outline: none;
        border: 1px solid transparent;
        margin: 0px;
        padding: 0px;
        width: 36px;
        min-width: 36px;
        height: 32px;
        -webkit-box-pack: center;
        justify-content: center;
        background-color: rgb(14, 112, 237);
        color: rgb(255, 255, 255);
        border-radius: 4px 0px 0px 4px;
        margin-left: 20px;
        }

        .next{
        position: relative;
        font-family: inherit;
        font-weight: 700;
        cursor: pointer;
        transition-duration: 0.1s;
        transition-property: background-color, color, border-color, opacity, box-shadow;
        transition-timing-function: ease-out;
        outline: none;
        border: 1px solid transparent;
        margin: 0px;
        padding: 0px;
        width: 36px;
        min-width: 36px;
        height: 32px;
        -webkit-box-pack: center;
        justify-content: center;
        background-color: rgb(14, 112, 237);
        color: rgb(255, 255, 255);
        border-radius: 0px 4px 4px 0px;
        }

        .next_lable{
        display: none;
    }

        .is-visible{
            display: block;
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
                                <h3 class="card-title"><?=$result->name?></h3>
                            </div>

                            <div class="card-body">
                                <hr>

                                <div class="col-md-6 col-sm-6">
                                        
                                    <div class="form-design-box">
                                            
                                    </div>    

                                </div>

                                <div class="col-md-6 col-sm-6">
                                    
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

window.counter = '';

viewform();

});


function viewform()
{
    $.ajax({
            url:'<?=BASE_URL?>typeform/viewform/<?=$result->access_token?>',
            type:'GET',
            dataType:'JSON',
            success:function(response){
                if (response.statuscode) 
                {
                    $('.form-design-box').html(response.data);
                    window.counter = response.total;
                }else{
                   show_notify(response.msg, 'bg-danger');
                }
            },
            error:function(response){
                show_notify('Something went wrong! Please try again.', 'bg-danger');
            }
        });
}


function next(from, to)
{
    $('.next_lable'+from).addClass('is-visible');
    $('.next_lable'+to).removeClass('is-visible');
}


</script>

