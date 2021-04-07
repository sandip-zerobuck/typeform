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
                                <h3 class="card-title"><input type="text" id="form-name" placeholder="Enter Form name" value="<?=$result->name?>"></h3>


                                <button class="btn btn-primary pull-right editForm">Edit Form</button>
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
                                                
                                            <div class="code-design-box">
                                                <pre>&lt;iframe id="typeform-full" width="100%"height="100%"
                                                src="<?=BASE_URL?>form/<?=$result->access_token?>"&gt;&lt;/iframe&gt;</pre>
                                            </div>  

                                            <div class="filed-open-box">
                                                 <i class="box-icon icon-enter text-danger"></i>
                                                 <b class="box-text">Welcome Screen</b>
                                                 <hr>
                                                 <textarea class="form-control welcome-details" placeholder="Enter welcome screen text"><?=$welcome_screen->details?></textarea>

                                                 <br>
                                                 <button class="btn btn-primary">
                                                     <input type="text" class="form-control welcome-btn edittable-btn" value="<?=$welcome_screen->button_text?>" placeholder="Button Text" name="">
                                                 </button>

                                                 <input type="hidden" class="welcome-id" value="<?=$welcome_screen->id?>" name="">

                                            </div>

                                            

                                            <div class="filed-open-box ">
                                                 <i class="box-icon icon-enter text-danger"></i>
                                                 <b class="box-text">End Screen</b>
                                                 <hr>
                                                 <textarea class="form-control end-details" placeholder="Enter End screen text"><?=$end_screen->details?></textarea>

                                                 <br>
                                                 <button class="btn btn-success">
                                                     <input type="text" class="form-control end-btn edittable-btn" value="<?=$end_screen->button_text?>" alue="<?=$end_screen->id?>" placeholder="Button Text" name="">
                                                 </button>

                                                 <input type="hidden" class="end-id" value="<?=$end_screen->id?>" name="">

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
window.deleteId = [];

vieweditData();

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

        if (self.data('edit') == 'yes') 
        {
            window.deleteId.push({
                 'id': self.data('id'),
                 'type': self.data('type'),
                 });
        }


        if( confirm('Are you sure, you want to remove this filed?') ) {
                $('.filed_counter_'+counter).remove();
        }

        console.log(window.deleteId);

   });

   $(document).off('click','.editForm').on('click','.editForm',function(){

    var data = [];
    var welcome_data = {
                 'id': $('.welcome-id').val(),
                 'details': $('.welcome-details').val(),
                 'button_text': $('.welcome-btn').val()
                 };

    var end_data = {
                 'id': $('.end-id').val(),
                 'details': $('.end-details').val(),
                 'button_text': $('.end-btn').val()
                 };

        $(".filed-question-box").each(function () {
                
            var type = $(this).data('type');
            var counter = $(this).data('counter');
            var edit = $(this).data('edit');
            var edit_id = $(this).data('edit_id');

            if ($('.required-value'+counter).is(":checked")) {
                  required_field = 'yes';
                }else{
                    required_field = 'no';
                } 

            data.push({
                 'type': type, 
                 'counter': counter,
                 'edit':edit,
                 'name':$('.text-value'+counter).val(),
                 'value':$('.text-placeholder'+counter).val(),
                 'required_field':required_field,
                 'edit_id':edit_id,
                 });
        
        });

        $.ajax({
            url:'<?=BASE_URL?>typeform/update',
            type:'POST',
            dataType:'JSON',
            data:{
                name:$('#form-name').val(),
                id:'<?=$result->id?>',
                data:data,
                deleteId:window.deleteId,
                welcome_data:welcome_data,
                end_data:end_data
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

function vieweditData()
{
    $.ajax({
            url:'<?=BASE_URL?>typeform/editdata/<?=$result->access_token?>',
            type:'GET',
            dataType:'JSON',
            success:function(response){
                if (response.statuscode) 
                {
                    $('.filed-box').append(response.data);
                    window.counter = response.total + 1;
                }else{
                   show_notify(response.msg, 'bg-danger');
                }
            },
            error:function(response){
                show_notify('Something went wrong! Please try again.', 'bg-danger');
            }
        });
}


function short_text(counter)
{
    var content = '';

    content += '<div class="filed-question-box filed_counter_'+counter+'" data-counter="'+counter+'" data-type="short-text" data-edit="no" data-edit_id="0">';
    content += '<i class="box-icon icon-bubble-dots3 text-danger"></i>';
    content += '<b class="box-text">Short Text</b>';
    content += '<button class="btn btn-danger pull-right remove-box" data-counter="'+counter+'"><i class="icon-trash-alt" data-edit="no"></i> Delete</button>';
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

    content += '<div class="filed-question-box filed_counter_'+counter+'" data-counter="'+counter+'" data-type="long-text" data-edit="no" data-edit_id="0">';
    content += '<i class="box-icon icon-bubble-lines4 text-success"></i>';
    content += '<b class="box-text">Long Text</b>';
    content += '<button class="btn btn-danger pull-right remove-box" data-counter="'+counter+'"><i class="icon-trash-alt" data-edit="no"></i> Delete</button>';
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

    content += '<div class="filed-question-box filed_counter_'+counter+'" data-counter="'+counter+'" data-type="yesorno-text" data-edit="no" data-edit_id="0">';
    content += '<i class="icon-check text-success"></i> <i class="icon-x text-danger"></i>';
    content += '<b class="box-text">Yes or No</b>';
    content += '<button class="btn btn-danger pull-right remove-box" data-counter="'+counter+'"><i class="icon-trash-alt" data-edit="no"></i> Delete</button>';
    content += '<hr>';

    content += '<b>Required :</b>';
    content += '<label class="switch"> <input type="checkbox" name="required-value'+counter+'" class="required-value'+counter+'" value="yes"> <span class="slider round"></span> </label>';

    content += '<input type="text" class="form-control text-value'+counter+'" placeholder="Your question here" name=""><br>';

    content += '<input type="text" class="form-control text-placeholder'+counter+'" placeholder="Type your answer here..." value="Select any one Yes or No">';


    content += '</div>';
    return content;
}

</script>

