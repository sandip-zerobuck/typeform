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
                                <h3 class="card-title"><input type="text" name="" id="form-name" placeholder="Enter Form name"></h3>


                                <button class="btn btn-success pull-right publish">Publish</button>
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
                                    <li class="nav-item"><a href="#bottom-justified-tab2" id="btn-Integrate" class="nav-link" data-toggle="tab">Integrate</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane fade show active in" id="bottom-justified-tab1">
                                            

                                        <div class="col-md-6 col-sm-12">

                                            <div class="filed-question-box filed_counter_'+counter+'" data-counter="'+counter+'" data-type="short-text">
                                                 <i class="box-icon icon-enter text-danger"></i>
                                                 <b class="box-text">Welcome Screen</b>
                                                 <hr>
                                                 <textarea class="form-control" placeholder="Enter welcome screen text"></textarea>

                                                 <br>
                                                 <button class="btn btn-primary">
                                                     <input type="text" class="form-control welcome-btn" value="Start" placeholder="Button Text" name="">
                                                 </button>

                                            </div>

                                            <div class="filed-box">
                                                

                                            </div>

                                            <div class="filed-question-box filed_counter_'+counter+'" data-counter="'+counter+'" data-type="short-text">
                                                 <i class="box-icon icon-enter text-danger"></i>
                                                 <b class="box-text">Welcome Screen</b>
                                                 <hr>
                                                 <textarea class="form-control" placeholder="Enter welcome screen text"></textarea>

                                                 <br>
                                                 <button class="btn btn-primary">
                                                     <input type="text" class="form-control welcome-btn" value="Start" placeholder="Button Text" name="">
                                                 </button>

                                            </div>


                                            <button class="btn btn-primary" data-toggle="modal" data-target="#questionModal"><i class="icon-plus3"></i> Add your first question</button>
                                        </div>

                                    </div>

                                    <div class="tab-pane fade tab-code-design hidden" id="bottom-justified-tab2">
                                         <div class="col-md-6 col-sm-12">
                                                
                                            <div class="code-design-box">
                                            </div> 

                                        </div>
                                    </div>

                                    
                                </div>
                            </div>
                        </div>

                    </div>

        </div>

    </div>  
</div>

<div class="modal fade" id="questionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Choose a question type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="question-box" data-type="short-text">
            <i class="icon-bubble-dots3 text-info"></i> <b>Short Text</b>
        </div>

        <div class="question-box" data-type="long-text">
            <i class="icon-bubble-lines4 text-success"></i> <b>Long Text</b>
        </div>

        <div class="question-box" data-type="yesorno-text">
            <i class="icon-check text-success"></i> <i class="icon-x text-danger"></i> <b>Yes or No</b>
        </div>

        <!-- <div class="question-box" data-type="yesorno-text">
            <i class="icon-envelop2 text-danger"></i> <b>Email Id</b>
        </div> -->
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Add question</button> -->
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

window.counter = 1;

   $(document).off('click','.question-box').on('click','.question-box',function(){

        var self = $(this);
        var type = self.data('type');

        if (type == "short-text") 
        {
            $('.filed-box').append(short_text(window.counter));
            window.counter++;
            $('#questionModal').modal('hide');
        }else if (type == "long-text") 
        {
             $('.filed-box').append(long_text(window.counter));
            window.counter++;
            $('#questionModal').modal('hide');
        }else if (type == "yesorno-text") 
        {
             $('.filed-box').append(yesorno_text(window.counter));
            window.counter++;
            $('#questionModal').modal('hide');
        }

   });


   $(document).off('click','.remove-box').on('click','.remove-box',function(){

        var self = $(this);
        var counter = self.data('counter');

        if( confirm('Are you sure, you want to remove this filed?') ) {
                $('.filed_counter_'+counter).remove();
        }

   });

   $(document).off('click','.publish').on('click','.publish',function(){

    var data = [];

        $(".filed-question-box").each(function () {
                
            var type = $(this).data('type');
            var counter = $(this).data('counter');
            

            if (type == 'short-text') 
            {
                var short_text_value = $('.short-text-value'+counter).val();
                var short_text_placeholder = $('.short-text-placeholder'+counter).val();

                var required_field = '';

                if ($('.required-value'+counter).is(":checked")) {
                  required_field = 'yes';
                }else{
                    required_field = 'no';
                }   

                data.push({
                 'type': type, 
                 'counter': counter,
                 'value' : {'short_text_value':short_text_value,'short_text_placeholder':short_text_placeholder,'required_field':required_field}
                 });
            }else if (type == 'long-text'){

                var required_field = '';

                if ($('.required-value'+counter).is(":checked")) {
                  required_field = 'yes';
                }else{
                    required_field = 'no';
                }   

                var long_text_value = $('.long-text-value'+counter).val();
                var long_text_placeholder = $('.long-text-placeholder'+counter).val();


                data.push({
                 'type': type, 
                 'counter': counter,
                 'value' : {'long_text_value':long_text_value,'long_text_placeholder':long_text_placeholder,'required_field':required_field}
                 });
            }else if (type == 'yesorno-text'){

                var required_field = '';

                if ($('.required-value'+counter).is(":checked")) {
                  required_field = 'yes';
                }else{
                    required_field = 'no';
                }   

                var yesorno_text_value = $('.yesorno-text-value'+counter).val();
                var yesorno_text_placeholder = $('.yesorno-text-placeholder'+counter).val();


                data.push({
                 'type': type, 
                 'counter': counter,
                 'value' : {'yesorno_text_value':yesorno_text_value,'yesorno_text_placeholder':yesorno_text_placeholder,'required_field':required_field}
                 });

            }


        });

        $.ajax({
            url:'<?=BASE_URL?>typeform/store',
            type:'POST',
            dataType:'JSON',
            data:{
                name:$('#form-name').val(),
                data:data
            },
            success:function(response){
                if (response.statuscode) 
                {
                    show_notify(response.msg, 'bg-success');

                    $('.code-design-box').html('<pre>&lt;iframe id="typeform-full" width="100%"height="100%" src="<?=BASE_URL?>form/'+response.data+'"&gt;&lt;/iframe&gt;</pre>');
                    $('.tab-code-design').removeClass('hidden');
                    $('#btn-Integrate').click();
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


function short_text(counter)
{
    var content = '';

    content += '<div class="filed-question-box filed_counter_'+counter+'" data-counter="'+counter+'" data-type="short-text">';
    content += '<i class="box-icon icon-bubble-dots3 text-danger"></i>';
    content += '<b class="box-text">Short Text</b>';
    content += '<button class="btn btn-danger pull-right remove-box" data-counter="'+counter+'"><i class="icon-trash-alt"></i> Delete</button>';
    content += '<hr>';

    content += '<b>Required :</b>';
    content += '<label class="switch"> <input type="checkbox" name="required-value'+counter+'" class="required-value'+counter+'" value="yes"> <span class="slider round"></span> </label>';

    content += '<br><input type="text" class="form-control short-text-value'+counter+'" placeholder="Your question here" name=""><br>';

    content += '<input type="text" class="form-control short-text-placeholder'+counter+'" placeholder="Type your answer here..." value="Type your answer here...">';


    content += '</div>';
    return content;
}

function long_text(counter)
{
    var content = '';

    content += '<div class="filed-question-box filed_counter_'+counter+'" data-counter="'+counter+'" data-type="long-text">';
    content += '<i class="box-icon icon-bubble-lines4 text-success"></i>';
    content += '<b class="box-text">Long Text</b>';
    content += '<button class="btn btn-danger pull-right remove-box" data-counter="'+counter+'"><i class="icon-trash-alt"></i> Delete</button>';
    content += '<hr>';

    content += '<b>Required :</b>';
    content += '<label class="switch"> <input type="checkbox" name="required-value'+counter+'" class="required-value'+counter+'" value="yes"> <span class="slider round"></span> </label>';

    content += '<input type="text" class="form-control long-text-value'+counter+'" placeholder="Your question here" name=""><br>';

    content += '<input type="text" class="form-control long-text-placeholder'+counter+'" placeholder="Type your answer here..." value="Type your answer here...">';


    content += '</div>';
    return content;
}

function yesorno_text(counter)
{
    var content = '';

    content += '<div class="filed-question-box filed_counter_'+counter+'" data-counter="'+counter+'" data-type="yesorno-text">';
    content += '<i class="icon-check text-success"></i> <i class="icon-x text-danger"></i>';
    content += '<b class="box-text">Yes or No</b>';
    content += '<button class="btn btn-danger pull-right remove-box" data-counter="'+counter+'"><i class="icon-trash-alt"></i> Delete</button>';
    content += '<hr>';

    content += '<b>Required :</b>';
    content += '<label class="switch"> <input type="checkbox" name="required-value'+counter+'" class="required-value'+counter+'" value="yes"> <span class="slider round"></span> </label>';

    content += '<input type="text" class="form-control yesorno-text-value'+counter+'" placeholder="Your question here" name=""><br>';

    content += '<input type="text" class="form-control yesorno-text-placeholder'+counter+'" placeholder="Type your answer here..." value="Select any one Yes or No">';


    content += '</div>';
    return content;
}

</script>

