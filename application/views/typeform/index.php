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
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane fade show active in" id="bottom-justified-tab1">
                                            

                                        <div class="col-md-6 col-sm-12">

                                          <div class="filed-box">
                                                

                                          </div>

                                            <button class="btn btn-primary" data-toggle="modal" data-target="#questionModal"><i class="icon-plus3"></i> Add your first question</button>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                                
                                            <div class="filed-open-box">
                                                 <i class="box-icon icon-enter text-danger"></i>
                                                 <b class="box-text">Welcome Screen</b>
                                                 <hr>
                                                 <textarea class="form-control welcome-details" placeholder="Enter welcome screen text"></textarea>

                                                 <br>
                                                 <button class="btn btn-primary">
                                                     <input type="text" class="form-control welcome-btn edittable-btn" value="Start" placeholder="Button Text" name="">
                                                 </button>

                                            </div>

                                            

                                            <div class="filed-open-box ">
                                                 <i class="box-icon icon-enter text-danger"></i>
                                                 <b class="box-text">End Screen</b>
                                                 <hr>
                                                 <textarea class="form-control end-details" placeholder="Enter End screen text"></textarea>

                                                 <br>
                                                 <button class="btn btn-success">
                                                     <input type="text" class="form-control end-btn edittable-btn" value="Submit" placeholder="Button Text" name="">
                                                 </button>

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

        <div class="question-box" data-type="checkbox-text">
            <i class="icon-checkbox-checked2 text-primary"></i> <b>Checkbox</b>
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
        }else if (type == "checkbox-text") 
        {
             $('.filed-box').append(checkbox_text(window.counter));
            window.counter++;
            $('#questionModal').modal('hide');
        }

   });

      $(document).off('click','.btn-add-choice').on('click','.btn-add-choice',function(){

        var self = $(this);
        var counter = self.data('counter');

        $('.choice-content'+counter).append('<div><input type="text" class="form-control choice-box choice-value'+counter+'" name="choice-value'+counter+'[]" placeholder="Choice"> <span class="remove-choice-box" data-counter="'+counter+'"><i class="icon-close2 text-danger"></i></span> </div>');

      });

      $(document).off('click','.remove-choice-box').on('click','.remove-choice-box',function(){

        var self = $(this);
        var counter = self.data('counter');

        if( confirm('Are you sure, you want to remove this filed?') ) {

                $(this).closest("div").remove();

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
    var welcome_data = {
                 'details': $('.welcome-details').val(),
                 'button_text': $('.welcome-btn').val()
                 };

    var end_data = {
                 'details': $('.end-details').val(),
                 'button_text': $('.end-btn').val()
                 };

        $(".filed-question-box").each(function () {
                
            var type = $(this).data('type');
            var counter = $(this).data('counter');

            if ($('.required-value'+counter).is(":checked")) {
                  required_field = 'yes';
                }else{
                    required_field = 'no';
                }


              var value = $('.text-placeholder'+counter).val();

              if (type == "checkbox-text") {
                        value = $("input[name='choice-value"+counter+"[]']:checked").map(function(){return $(this).val();}).get();
              }else{
                 value = $('.text-placeholder'+counter).val();
              }

              data.push({
                 'type': type, 
                 'counter': counter,
                 'name':$('.text-value'+counter).val(),
                 'value':value,
                 'required_field':required_field,
                 });

          
        });

        $.ajax({
            url:'<?=BASE_URL?>typeform/store',
            type:'POST',
            dataType:'JSON',
            data:{
                name:$('#form-name').val(),
                data:data,
                welcome_data:welcome_data,
                end_data:end_data
            },
            success:function(response){
                if (response.statuscode) 
                {
                    show_notify(response.msg, 'bg-success');

                    window.location='<?=BASE_URL?>typeform/edit/'+response.data;
                }else{
                   show_notify(response.msg, 'bg-danger');
                }
            },
            error:function(response){
                
            }
        });

         // console.log(data);

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

    content += '<br><input type="text" class="form-control text-value'+counter+'" placeholder="Your question here" name=""><br>';

    content += '<input type="text" class="form-control text-placeholder'+counter+'" placeholder="Type your answer here..." value="Type your answer here...">';


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

    content += '<input type="text" class="form-control text-value'+counter+'" placeholder="Your question here" name=""><br>';

    content += '<input type="text" class="form-control text-placeholder'+counter+'" placeholder="Type your answer here..." value="Type your answer here...">';


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

    content += '<input type="text" class="form-control text-value'+counter+'" placeholder="Your question here" name=""><br>';

    content += '<input type="text" class="form-control text-placeholder'+counter+'" placeholder="Type your answer here..." value="Select any one Yes or No">';


    content += '</div>';
    return content;
}

function checkbox_text(counter)
{
    var content = '';

    content += '<div class="filed-question-box filed_counter_'+counter+'" data-counter="'+counter+'" data-type="checkbox-text">';
    content += '<i class="icon-checkbox-checked2 text-primary"></i> ';
    content += '<b class="box-text">Checkbox</b>';
    content += '<button class="btn btn-danger pull-right remove-box" data-counter="'+counter+'"><i class="icon-trash-alt"></i> Delete</button>';
    content += '<hr>';

    content += '<b>Required :</b>';
    content += '<label class="switch"> <input type="checkbox" name="required-value'+counter+'" class="required-value'+counter+'" value="yes"> <span class="slider round"></span> </label>';

    content += '<input type="text" class="form-control text-value'+counter+'" placeholder="Your question here" name=""><br>';

    content += '<div class="choice-content'+counter+' list-choice">';
    content += '<div><input type="text" class="form-control choice-box choice-value'+counter+'" name="choice-value'+counter+'[]" placeholder="Choice"></div>';
    content += '</div>';

    content += '<button class="btn btn-primary btn-add-choice" data-counter="'+counter+'">Add choice</button>';

    content += '</div>';
    return content;
}

</script>

