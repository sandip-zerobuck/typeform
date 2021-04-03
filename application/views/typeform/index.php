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
                                <h3 class="card-title">Create Form <input type="text" name="" id="form-name" placeholder="Enter Form name"></h3>


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
                                    <li class="nav-item"><a href="#bottom-justified-tab2" class="nav-link" data-toggle="tab">Integrate</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane fade show active in" id="bottom-justified-tab1">
                                            

                                        <div class="col-md-6 col-sm-12">


                                            <div class="filed-box">
                                                    




                                            </div>


                                            <button class="btn btn-primary" data-toggle="modal" data-target="#questionModal"><i class="icon-plus3"></i> Add your first question</button>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            
                                        </div>


                                    </div>

                                    <div class="tab-pane fade" id="bottom-justified-tab2">
                                         <div class="col-md-12 col-sm-12">
                                            
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
            <i class="icon-bubble-dots3 text-danger"></i> <b>Short Text</b>
        </div>

        <div class="question-box" data-type="long-text">
            <i class="icon-bubble-lines4 text-success"></i> <b>Long Text</b>
        </div>
        
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
                var short_text_value = $('.short-text-value').val();

                data.push({
                 'type': type, 
                 'counter': counter,
                 'value' : {'short_text_value':short_text_value}
                 });
            }else{

                var long_text_value = $('.long-text-value').val();
                data.push({
                 'type': type, 
                 'counter': counter,
                 'value' : {'long_text_value':long_text_value}
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
    content += '<b class="box-text">Short Text '+counter+'</b>';
    content += '<button class="btn btn-danger pull-right remove-box" data-counter="'+counter+'"><i class="icon-trash-alt"></i> Delete</button>';
    content += '<hr>';
    content += '<input type="text" class="form-control short-text-value" placeholder="Your question here" name="">';
    content += '</div>';
    return content;
}

function long_text(counter)
{
    var content = '';

    content += '<div class="filed-question-box filed_counter_'+counter+'" data-counter="'+counter+'" data-type="long-text">';
    content += '<i class="box-icon icon-bubble-lines4 text-success"></i>';
    content += '<b class="box-text">Long Text '+counter+'</b>';
    content += '<button class="btn btn-danger pull-right remove-box" data-counter="'+counter+'"><i class="icon-trash-alt"></i> Delete</button>';
    content += '<hr>';
    content += '<textarea class="form-control long-text-value" placeholder="Your question here"></textarea>';
    content += '</div>';
    return content;
}

</script>

