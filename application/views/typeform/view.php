<?php $this->load->view('header'); ?>

<style type="text/css">
    
    .count{
        font-size: 20px;
    }

    .form-design-box{
        box-shadow: rgb(0 0 0 / 8%) 0px 2px 4px, rgb(0 0 0 / 6%) 0px 2px 12px;
    }

    .code-design-box{
        padding: 20px;
        box-shadow: rgb(0 0 0 / 8%) 0px 2px 4px, rgb(0 0 0 / 6%) 0px 2px 12px;
    }

    .code-design-box pre{
        background: #000;
        margin:  20px;
        color: #fff;
        overflow-wrap: break-word;
        white-space: inherit;
        border-radius: 5px;
        box-shadow: rgb(0 0 0 / 10%) 0px 3px 12px 0px;
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

    .btn-submit{
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
        background-color: #22f750;
        color: rgb(255, 255, 255);
        border-radius: 4px;
        font-size: 25px;
    }

    .btn-submit:hover{
        background-color: #22f750;
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


        .btn_choose_sent input {
          -webkit-appearance: none;
          display: block;
          margin: 10px;
          width: 18px;
          height: 18px;
          border-radius: 12px;
          cursor: pointer;
          vertical-align: middle;
          box-shadow: hsla(0,0%,100%,.15) 0 1px 1px, inset hsla(0,0%,0%,.5) 0 0 0 1px;
          background-color: hsla(0,0%,0%,.2);
              background-image: -webkit-radial-gradient( #fff 0%, #fff 15%, #fff 28%, #fff 70% );
          background-repeat: no-repeat;
          -webkit-transition: background-position .15s cubic-bezier(.8, 0, 1, 1),
            -webkit-transform .25s cubic-bezier(.8, 0, 1, 1);
          outline: none;
        }
        .btn_choose_sent input:checked {
          -webkit-transition: background-position .2s .15s cubic-bezier(0, 0, .2, 1),
            -webkit-transform .25s cubic-bezier(0, 0, .2, 1);
        }
        .btn_choose_sent input:active {
          -webkit-transform: scale(1.5);
          -webkit-transition: -webkit-transform .1s cubic-bezier(0, 0, .2, 1);
        }




/* The up/down direction logic */

.btn_choose_sent input,
.btn_choose_sent input:active {
  background-position: 0 24px;
}
.btn_choose_sent input:checked {
  background-position: 0 0;
}
.btn_choose_sent input:checked ~ input,
 .btn_choose_sent input:checked ~ input:active {
  background-position: 0 -24px;
}

.btn_choose_sent{
        background: #EF2D56;
    color: #fff;
    box-shadow: 0 10px 20px rgba(125, 147, 178, .3);
    border: none; 
     border-radius: 3px;
    font-size: 16px;
    line-height: 10px;
    padding:  16px 20px 16px 38px;
    text-align: center;
    display: inline-block;
    text-decoration: none;
    margin-right: 30px;
    transition: all .3s;
    height: auto;
    cursor: pointer;
    position: relative;
    outline: none;
}

.btn_choose_sent input{
    position: absolute;
    left: 0;
    right: 0;
    z-index: 99;
    top: 2px;
}

.btn_choose_sent input:after{
     position: absolute;
    content: '';
    width: 15rem;
    left: 0;
    right: 0;
    /* background: red; */
    /* z-index: -1; */
    height: 40px;
    top: -10px;
}

.bg_btn_chose_success{
    background-color: #4CAF50 !important;
}


.bg_btn_chose_danger{
    background-color: #F44336 !important;
}

.checkbox-input{
    padding: 10px;
    font-size: 15px;
    font-weight: bold;
}


h2 {
    font-size: 18px;
    margin-bottom: 8px;
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
                                    

                                    <div class="code-design-box">
                                            
<pre>&lt;iframe id="typeform-full" width="100%"height="100%"
    src="<?=BASE_URL?>form/<?=$result->access_token?>"&gt;&lt;/iframe&gt;</pre>

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

    window.counter = '';

    viewform();


    $(document).off('click','.btn-start').on('click','.btn-start',function(){

        next($(this).data('from'), $(this).data('to'),$(this).data('type'),$(this).data('required'));

    });

    $(document).off('change','.btn-start').on('change','.btn-start',function(){

        next($(this).data('from'), $(this).data('to'),$(this).data('type'),$(this).data('required'));

    });


    $(document).off('click','.btn-submit').on('click','.btn-submit',function(){

        var data = [];

        $(".next_lable").each(function () {
                    
                var type = $(this).data('type');
                var counter = $(this).data('counter');
                var name = $(this).data('name');

                if (type == 'short_text') 
                {
                    data.push({
                     'type': type, 
                     'name' : name,
                     'value': $('.short_text_value'+counter).val()
                     });
                }else if(type == 'long_text'){

                    data.push({
                     'type': type, 
                     'name' : name,
                     'value': $('.long_text_value'+counter).val()
                     });

                }else if(type == 'yesorno_text'){

                    data.push({
                     'type': type, 
                     'name' : name,
                     'value': $('.yesorno_text_value'+counter).val()
                     });

                }else if(type == 'checkbox_text'){

                    data.push({
                     'type': type, 
                     'name' : name,
                     'value': $("input[name='checkbox_text_value"+counter+"[]']:checked").map(function(){return $(this).val();}).get()
                     });

                }

        });

        $.ajax({
            url:'<?=BASE_URL?>typeform/storeUserResponse',
            type:'POST',
            dataType:'JSON',
            data:{
                id:$('#form-id').val(),
                data:data
            },
            success:function(response){
                if (response.statuscode) 
                {
                    show_notify(response.msg, 'bg-success');
                }else{
                   show_notify(response.msg, 'bg-danger');
                }
            },
            error:function(response){
                
            }
        });

        console.log(data);

    });

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


function next(from, to,type,required)
{

    window.is_complate = true;

    if (type == 'short_text') 
    {
        if (required == 'yes') 
        {
            if ($('.short_text_value'+to).val() == '') {
                $('.error-msg').removeClass('hidden');
                $('.text-error').text('Required');
                window.is_complate = false;
            }else{
                $('.text-error').text('');
                 window.is_complate = true;
            }
        }

    }else if (type == 'long_text'){
       if (required == 'yes') 
        {
            if ($('.long_text_value'+to).val() == '') {
                $('.error-msg').removeClass('hidden');
                $('.text-error').text('Required');
                window.is_complate = false;
            }else{
                $('.text-error').text('');
                 window.is_complate = true;
            }
        }
    }else if (type == 'yesorno_text'){
       if (required == 'yes') 
        {
            if ($('.yesorno_text_value'+to).val() == '') {
                $('.error-msg').removeClass('hidden');
                $('.text-error').text('Required');
                window.is_complate = false;
            }else{
                $('.text-error').text('');
                 window.is_complate = true;
            }
        }
    }

    if (window.is_complate) {
        $('.next_lable'+from).fadeIn( "fast" );
        $('.next_lable'+to).fadeOut( "fast" );
        $('.next_lable'+from).addClass('is-visible');
        $('.next_lable'+to).removeClass('is-visible');
    }

}


</script>

