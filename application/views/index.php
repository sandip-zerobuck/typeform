<?php $this->load->view('header'); ?>
<main class="dt-main">
<!-- Sidebar -->
<?php $this->load->view('sidebar'); ?>


<!-- /sidebar -->
            <!-- Site Content Wrapper -->
            <div class="dt-content-wrapper">

                <!-- Site Content -->
                <div class="dt-content">

                    <?php if (!empty($draw)) { ?>
                    <div class="row">

                        <?php foreach ($draw as $key_draw => $value_draw) { ?>

                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div class="dt-card" style="background-color: #222D35;">
                                <div class="dt-card__body" style=" color: #fff; padding: 0rem 0rem;">

                                <div class="row">

                                        <div class="col-md-6">
                                            <img style="width: 100%;" src="<?=base_url().IMAGE_UPLOADS.$value_draw->image?>">
                                        </div>

                                    <div class="col-md-6">
                                        <div style="padding: 10px 10px;">
                                            <h2 class="text-white"><?=$value_draw->name?></h2>

                                            <table style="width: 100%; text-align: center;">
                                                <tr>
                                                    <th><?=$value_draw->participat_user?></th>
                                                    <th><?=$value_draw->winners_user?></th>
                                                </tr>
                                                <tr>
                                                    <td>Participat User</td>
                                                    <td>Winners User</td>
                                                </tr>
                                            </table>

                                            <table style="width: 100%; margin-top: 10px; text-align: center;">
                                                <tr>
                                                    <th><?=$value_draw->draw_date?></th>
                                                    <th><?=$value_draw->required_task?></th>
                                                </tr>
                                                <tr>
                                                    <td>Draw Date</td>
                                                    <td>Invite Refer</td>
                                                </tr>
                                            </table>

                                            <table style="width: 100%; margin-top: 10px; text-align: center;">
                                                <tr>
                                                    <th>
                                                        <a href="<?=BASE_URL.'drawuser/index/'.$value_draw->id?>" class="btn btn-primary">Participat User <?=$value_draw->remingn_user?>/<?=$value_draw->participat_user?></a>
                                                    </th>
                                                    <th><button data-draw_id="<?=$value_draw->id?>" class="btn btn-primary btn-join-draw">Join Now 2 Invite</button></th>
                                                </tr>
                                            </table>

                                            <table style="width: 100%; margin-top: 10px; text-align: center;">
                                                <tr>
                                                    <th>
                                                        <a href="<?=BASE_URL.'drawresult/index/'.$value_draw->id?>"  class="text-danger">View Result Winingn 10 Users</a>
                                                    </th>
                                                </tr>
                                            </table>

                                            <br>


                                            <?php 

                                            if ($value_draw->remingn_user != 0) 
                                            {
                                                $total_user = round((($value_draw->participat_user/$value_draw->participat_user)*100) - ((($value_draw->participat_user - $value_draw->remingn_user)/$value_draw->participat_user)*100));
                                            }else
                                            {
                                                $total_user = 0;
                                            }

                                         

                                            ?>

                                            <div class="dt-indicator-item__info" data-fill="<?=$total_user?>" data-max="100" data-percent="true" style="width: 100%">
                                            <div class="dt-indicator-item__bar">
                                                <div class="dt-indicator-item__fill bg-success" style="width: <?=$total_user?>%;"></div>
                                            </div>
                                            <span class="dt-indicator-item__count ml-3"><?=$total_user?> </span>
                                            </div>


                                        </div>
                                        
                                    </div>
                                </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-1"></div>

                    <?php } ?>


                    </div>

                <?php } ?>

                    

                     <!-- Top Banner Ads -->
                     <div id="top_banner"></div><br>

           
       

                     <div class="col-12 order-xl-5" style="display: none;">
                         <!-- Card -->
                         <div class="dt-card">

                            <h4 class="card-header text-white bg-primary">COVID-19 Cases Overview</h4>
                            


                             <!-- Card Body -->
                             <div class="dt-card__body" style="padding: 0rem 3.2rem;">

                                 <!-- Card Header -->
                             <div class="dt-card__header" style="margin-bottom: 0rem;padding: 1rem 3.2rem 0;">

                                 <!-- Card Heading -->
                                 <div class="dt-card__heading">
                                     <h2 class="dt-card__title">World</h2>
                                 </div>
                                 <!-- /card heading -->

                             </div>
                             <!-- /card header -->

                             <!-- Grid -->
                                 <div class="row">
                                     <div class="col-xl-12 col-sm-12 col-12">
                                             <!-- Card -->
                                             <!-- <div class="dt-card"> -->
                                                 <!-- Card Body -->
                                                 <div class="row">
                                                     <div class="col-xl-4 col-sm-4 col-4">
                                                         <div class="dt-card__body px-5 py-4">
                                                             <h4 class="  mb-2">Confirmed</h4>
                                                             <div class="d-flex align-items-baseline mb-4">
                                                                 <span class="display-4 font-weight-500 text-danger mr-2"><?=$covid_world->confirmed?></span>
                                                             </div>
                                                         </div>
                                                     </div>

                                                     <div class="col-xl-4 col-sm-4 col-4">
                                                         <div class="dt-card__body px-5 py-4">
                                                             <h4 class="  mb-2">Recovered</h4>
                                                             <div class="d-flex align-items-baseline mb-4">
                                                                 <span class="display-4 font-weight-500 text-success mr-2"><?=$covid_world->recovered?></span>
                                                             </div>
                                                         </div>
                                                     </div>

                                                     <div class="col-xl-4 col-sm-4 col-4">
                                                         <div class="dt-card__body px-5 py-4">
                                                             <h4 class="  mb-2">Deceased</h4>
                                                             <div class="d-flex align-items-baseline mb-4">
                                                                 <span class="display-4 font-weight-500 text-dark mr-2"><?=$covid_world->deceased?></span>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <!-- /bard body -->
                                             <!-- </div> -->
                                             <!-- /card -->
                                         </div>

                                         
                                </div>


                                <hr style="margin-top: 0rem;margin-bottom: 0rem;">

                                 <!-- Card Header -->
                             <div class="dt-card__header" style="margin-bottom: 0rem;padding: 1rem 3.2rem 0;">

                                 <!-- Card Heading -->
                                 <div class="dt-card__heading">
                                     <h2 class="dt-card__title">India</h2>
                                 </div>
                                 <!-- /card heading -->

                             </div>
                             <!-- /card header -->

                              <!-- Grid -->
                                 <div class="row">

                                    <div class="col-xl-12 col-sm-12 col-12">
                                             <!-- Card -->
                                             <!-- <div class="dt-card"> -->
                                                 <!-- Card Body -->
                                                 <div class="row">
                                                     <div class="col-xl-4 col-sm-4 col-4">
                                                         <div class="dt-card__body px-5 py-4">
                                                             <h4 class="  mb-2">Confirmed</h4>
                                                             <div class="d-flex align-items-baseline mb-4">
                                                                 <span class="display-4 font-weight-500 text-danger mr-2"><?=$covid_india->confirmed?></span>
                                                             </div>
                                                         </div>
                                                     </div>

                                                     <div class="col-xl-4 col-sm-4 col-4">
                                                         <div class="dt-card__body px-5 py-4">
                                                             <h4 class="  mb-2">Recovered</h4>
                                                             <div class="d-flex align-items-baseline mb-4">
                                                                 <span class="display-4 font-weight-500 text-success mr-2"><?=$covid_india->recovered?></span>
                                                             </div>
                                                         </div>
                                                     </div>

                                                     <div class="col-xl-4 col-sm-4 col-4">
                                                         <div class="dt-card__body px-5 py-4">
                                                             <h4 class="  mb-2">Deceased</h4>
                                                             <div class="d-flex align-items-baseline mb-4">
                                                                 <span class="display-4 font-weight-500 text-dark mr-2"><?=$covid_india->deceased?></span>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <!-- /bard body -->
                                             <!-- </div> -->
                                             <!-- /card -->
                                         </div>

                       
                                 </div>


                             
                             </div>
                             

                         </div>
                     </div>
                    

                     <div class="col-md-4 col-sm-12 ">
                         <div id="today_task"></div>
                     </div>
                    
                    
                    


                    <!-- Page Header -->
                    <div class="dt-page__header">
                        <h1 class="dt-page__title">Home - Welcome</h1>
                    </div>



                    <!-- /page header -->

                    
<div class="row">


<div class="col-xl-12">

                            <!-- Card -->
                            <div class="dt-card dt-card__full-height">

                                <!-- Card Header -->
                                <div class="dt-card__header mb-4">

                                    <!-- Card Heading -->
                                    <div class="dt-card__heading">
                                        <h3 class="dt-card__title">
                                            <i class="icon icon-revenue mr-3 icon-xl"></i><span class="align-bottom">Your Main Balance</span>
                                        </h3>
                                    </div>
                                    <!-- /card heading -->

                                    

                                </div>
                                <!-- /card header -->

                                <!-- Card Body -->
                                <div class="dt-card__body pb-4">
                                    <!-- Grid -->
                                    <div class="row no-gutters">
                                        <!-- Grid Item -->
                                        <div class="col-sm-7 mb-8 mb-sm-0">
                                            <div class="d-flex align-items-baseline mb-1">
                                                <span class="display-2 font-weight-500 text-dark mr-2"> <i class="fas fa-coins"></i> <?=$this->wallet?></span>
                                               
                                            </div>
                                        </div>
                                        <!-- /grid item -->
                                        <!-- Grid Item -->
                                        <div class="col-sm-5">
                                            <div class="mb-3">
                                                <a href="<?=base_url()?>Myaccount" class="btn btn-secondary btn-sm mr-2">My Account
                                                </a>
                                            </div>
                                        </div>
                                        <!-- /grid item -->
                                    </div>
                                    <!-- /grid -->

                                    <!-- Separator -->
                                    <!-- <hr class="my-5"> -->
                                    <!-- /separator -->

                                    
                                </div>
                                <!-- /card body -->

                            </div>
                            <!-- /card -->

                        </div>



<!-- Middel Banner Ads -->
<div id="middel_banner"></div><br>




                        <!--  <div class="col-xl-4 col-sm-6 col-12">

                            
                            <div class="dt-card">

                                
                                <div class="dt-card__body px-5 py-4">
                                    
                                    <div class="d-flex align-items-baseline mb-4">
                                        <span class="display-4 font-weight-500 text-dark mr-2">Image Ads</span>
                                    </div>

                                    <div class="dt-indicator-item__info mb-2" data-fill="48" data-max="100">
                                        <a href="<?=base_url()?>Image" class="btn btn-primary btn-sm mr-2">Click Here</a>
                                    </div>
                                </div>
                                

                            </div>
                           

                        </div> -->
                        

                        
                        <!-- <div class="col-xl-4 col-sm-6 col-12">

                            
                            <div class="dt-card">

                                
                                <div class="dt-card__body px-5 py-4">
                                    
                                    <div class="d-flex align-items-baseline mb-4">
                                        <span class="display-4 font-weight-500 text-dark mr-2">Video Ads</span>
                                    </div>

                                    <div class="dt-indicator-item__info mb-2" data-fill="48" data-max="100">
                                        <a href="<?=base_url()?>Video" class="btn btn-primary btn-sm mr-2">Click Here</a>
                                    </div>
                                </div>
                                

                            </div>
                           

                        </div> -->

                        <!-- <div class="col-xl-4 col-sm-6 col-12">

                            
                            <div class="dt-card">

                                
                                <div class="dt-card__body px-5 py-4">
                                    
                                    <div class="d-flex align-items-baseline mb-4">
                                        <span class="display-4 font-weight-500 text-dark mr-2">Link Ads</span>
                                    </div>

                                    <div class="dt-indicator-item__info mb-2" data-fill="48" data-max="100">
                                        <a href="<?=base_url()?>Link" class="btn btn-primary btn-sm mr-2">Click Here</a>
                                    </div>
                                </div>
                                

                            </div>
                           

                        </div> -->
                        
<div class="dt-content-wrapper">
<!-- Site Content -->
<div class="dt-content">                       
                       
    <!-- ============================ Image Ads Start  =========================
       ========================================================================================= -->                  
    <div class="dt-entry__header">
        <!-- Entry Heading -->
        <div class="dt-entry__heading">
            <h3 class="dt-entry__title">Image View & Click Earn Coin</h3>
        </div>
        <!-- /entry heading -->
    </div>

    <div class="row mb-sm-12">
        <div class="col-12 row" id="image_row">
            

        </div>
     </div>

    <!-- Modal -->
        <div class="modal fade" id="image-modal" tabindex="-1" role="dialog"
             aria-labelledby="model-1"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <!-- Modal Content -->
                <div class="modal-content">
                    <!-- Modal Body -->
                    <div class="modal-body">
                        <div id="image-view-model">
                        </div>
                    </div>
                    <!-- /modal body -->
                    <div class="modal-footer image-footer">
                       <h1 class="text-primary" id="timer"></h1>
                        <a href="<?=base_url()?>" class="btn btn-secondary btn-sm image-close"
                        >Close
                        </a>
                    </div>
                </div>
                <!-- /modal content -->
            </div>
        </div>
    <!-- /modal -->

    <!-- ============================ Image Ads End  =========================
       ========================================================================================= -->
       <br>
       <div class="dt-entry__header">
            <!-- Entry Heading -->
            <div class="dt-entry__heading">
                <h3 class="dt-entry__title">Video View & Click Earn Coin</h3>
            </div>
            <!-- /entry heading -->
        </div>

        <div class="row mb-sm-12">
          <div class="col-12 row" id="video_row">
              

          </div>
       </div>

    <!-- Modal -->
<div class="modal fade" id="content-modal" tabindex="-1" role="dialog"
     aria-labelledby="model-1"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <!-- Modal Content -->
        <div class="modal-content">
            <!-- Modal Body -->
            <div class="modal-body">
                <div id="content-view-model">     
                </div>
            </div>
            <!-- /modal body -->
             <div class="modal-footer image-footer">
               <h1 class="text-primary" id="timer-video"></h1>
                <a href="<?=base_url()?>" class="btn btn-secondary btn-sm video-close" 
                >Close
                </a>
            </div>
        </div>
        <!-- /modal content -->
    </div>
</div>
<!-- /modal -->

    <!-- ============================ Video Ads Start  =========================
       ========================================================================================= -->

   <!-- ============================ Link Ads Start  =========================
   ========================================================================================= -->

   <br>
    <div class="dt-entry__header">
        <!-- Entry Heading -->
        <div class="dt-entry__heading">
            <h3 class="dt-entry__title">Link View & Click Earn Coin</h3>
        </div>
        <!-- /entry heading -->
    </div>

        <div class="row mb-sm-12">
            <div class="col-12 row" id="link_row">
                

            </div>
         </div>

   <!-- ============================ Link Ads Start  =========================
   ========================================================================================= -->

   <!-- ============================ AppLink Ads Start  =========================
   ========================================================================================= -->

   <br>
    <div class="dt-entry__header">
        <!-- Entry Heading -->
        <div class="dt-entry__heading">
            <h3 class="dt-entry__title">App Download Link View & Click Earn Coin</h3>
        </div>
        <!-- /entry heading -->
    </div>

        <div class="row mb-sm-12">
            <div class="col-12 row" id="applink_row">
            </div>
         </div>

   <!-- ============================ appLink Ads Start  =========================
   ========================================================================================= -->
                        

</div>
</div>


<!-- Bottom Banner Ads -->
<div id="bottom_banner"></div><br>

</div>


<!-- Modal -->
<div class="modal fade" id="link-modal" tabindex="-1" role="dialog"
     aria-labelledby="model-1"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <!-- Modal Content -->
        <div class="modal-content">
            <!-- Modal Body -->
            <div class="modal-body">
                <div id="link-view-model">
                    <style>
.dot {
  height: 150px;
  width: 150px;
  background-color: #b23737;
  border-radius: 50%;
  display: inline-block;
  
 }

.dot span
{
    line-height:150px;
    font-size: 40px;
    color: #fff;
}

</style>

                    <div style="text-align:center">
                      <span class="dot"><span id="timer_index"></span></span>
                      <span class="msg"></span>
                    </div>
                </div>
            </div>
            <!-- /modal body -->
            <div class="modal-footer link-footer">
                <a href="<?=base_url()?>" class="btn btn-secondary btn-sm link-close"
                >Close
                </a>
            </div>
        </div>
        <!-- /modal content -->
    </div>
</div>
<!-- /modal -->
                  


<?php $this->load->view('footer'); ?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script type="text/javascript">

$(document).ready(function(){
$(".link-close").hide(); 
$(".image-close").hide();
$(".video-close").hide();

setTimeout(function() {
    today_task();
}, 3000);

top_banner();
middel_banner();
bottom_banner();  
load_link();
load_applink();
load_video();
load_image();


// Banner Ads...
function top_banner()
{
    $.ajax
    ({
        url: '<?=BASE_URL?>backend_load/load/topbanner',
        type:'POST',
        data:{
            status: true
        },
        success: function(response) {
            $('#top_banner').html(response);
        }
    });
}

function middel_banner()
{
    $.ajax
    ({
        url: '<?=BASE_URL?>backend_load/load/middelbanner',
        type:'POST',
        data:{
            status: true
        },
        success: function(response) {
            $('#middel_banner').html(response);
        }
    });
}

function bottom_banner()
{
    $.ajax
    ({
        url: '<?=BASE_URL?>backend_load/load/bottombanner',
        type:'POST',
        data:{
            status: true
        },
        success: function(response) {
            $('#bottom_banner').html(response);
        }
    });
}


function today_task()
{
    $.ajax
    ({
        url: '<?=BASE_URL?>backend_load/load/today_task',
        type:'POST',
        data:{
            status: true
        },
        success: function(response) {
            $('#today_task').html(response);
        }
    });
}



    function load_image()
    {
        $.ajax
        ({
            url: '<?=BASE_URL?>image/load_image',
            type:'POST',
            data:{
                status: true
            },
            success: function(response) {
                $('#image_row').html(response);
                
            }
        });
    }

      

  function load_video()
  {
      $.ajax
      ({
          url: '<?=BASE_URL?>video/load_video',
          type:'POST',
          data:{
              status: true
          },
          success: function(response) {
              $('#video_row').html(response);
              
          }
      });
  }



    function load_link()
    {
        $.ajax
        ({
            url: '<?=BASE_URL?>link/load_link',
            type:'POST',
            data:{
                status: true
            },
            success: function(response) {
                $('#link_row').html(response);
                
            }
        });
    }

    function load_applink()
    {
        $.ajax
        ({
            url: '<?=BASE_URL?>applink/load_applink',
            type:'POST',
            data:{
                status: true
            },
            success: function(response) {
                $('#applink_row').html(response);
            }
        });
    }

// App Link...

$(document).on('click','.applink-view',function(){
    var id = $(this).data("applink-id");
    var link = $(this).data("applink-link");
    var win = window.open(link,"Watch Link");
    $.ajax({
            url: '<?=BASE_URL?>applink/addcoin',
            type:'POST',
            data:{
                addcoin: id
            },
            success: function(response) {
                window.location='<?=BASE_URL?>';
            }
    });
});

//Link Ads...
$(document).on('click','.link-view',function(){

    var id = $(this).data("link-id");

    
    var timer = $(this).data("link-timer");
    var link = $(this).data("link-link");

    var time = timer*1000;

    var timeleft = $(this).data("link-timer");
    var downloadTimer = setInterval(function(){
      document.getElementById("timer_index").innerHTML = timeleft;
      timeleft -= 1;
      if(timeleft <= 0){
        clearInterval(downloadTimer);
        $('#timer_index').hide(); 
        $('.dot').hide(); 
        $(".link-close").show();

      }
    }, 1000);



    var win = window.open(link, 
        "Watch Link");

    var timer1 = setTimeout(function() {
        var check = 0;

        var youtube_link = link.startsWith("https://www.youtube.com");

        if (youtube_link) 
        {
            $.ajax({
                        url: '<?=BASE_URL?>link/addcoin',
                        type:'POST',
                        data:{
                            addcoin: id
                        },
                        success: function(response) {
                            window.location='<?=BASE_URL.'index'?>';
                        }
                });
        }else
        {
            if (win.closed) 
            {
                clearInterval(timer1);
                if (check == 0) 
                {
                    $('.msg').html('<div class="alert-danger">Complate Watch in ' + timer + ' secound</div>');
                    const toast = swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    toast({
                        type: 'error',
                        title: 'Complate Watch in ' + timer + ' secound'
                    });
                }
                
            }else{
                    $.ajax({
                            url: '<?=BASE_URL?>link/addcoin',
                            type:'POST',
                            data:{
                                addcoin: id
                            },
                            success: function(response) {
                                var check = 1;
                                window.location='<?=BASE_URL?>';
                            }
                    });
                    window.close()
            }
        }

        
    }, time);


    $('#link-modal').modal({
           backdrop: 'static',
           keyboard: false
    });


});

// Image Video Reward Add...
$(document).on('click','.image-view',function(){
    $id = $(this).data("image-id");
    $coin = $(this).data("image-coin");
    $timer = $(this).data("image-timer");
    $click = $(this).data("image-click");
    $userid = $(this).data("userid");
    $description = 'Earn Coin Image Click';

    $time = $timer*1000;

var timeleft = $(this).data("image-timer");
var downloadTimer = setInterval(function(){
  document.getElementById("timer").innerHTML = timeleft + " seconds remaining";
  timeleft -= 1;
  if(timeleft <= 0){
    clearInterval(downloadTimer);
    $('#timer').hide(); 
    $(".image-close").show();
  }
}, 1000);

// Show Image in Model...
$.ajax({
            url: '<?=BASE_URL?>image/showimage',
            type:'POST',
            data:{
                showimage: $id
            },
            success: function(response) {
                $('#image-view-model').html(response);
            }
    });


    /*$('#image-modal').modal('show');*/
    $('#image-modal').modal({
           backdrop: 'static',
           keyboard: false
    }); 

    setTimeout(function() {

        $.ajax({
            url: '<?=BASE_URL?>image/addcoin',
            type:'POST',
            data:{
                addcoin: $id,
                userid:$userid,
                coin:$coin,
                click:$click,
                description:$description
            },
            success: function(response) {
                add_refer_commision_image($coin);
            }
    });

    },$time);

});

function add_refer_commision_image(coin)
{
    $.ajax({
            url: '<?=BASE_URL?>image/add_refer_commision',
            type:'POST',
            data:{
                coin: coin
            },
            success: function(response) {
            }
    });
}


// Video Reward Add...
$(document).on('click','.video-view',function(){

    $id = $(this).data("video-id");
    $coin = $(this).data("video-coin");
    $click = $(this).data("video-click");
    $timer = $(this).data("video-timer");
    $userid = $(this).data("userid");
    $description = 'Earn Coin Watch Video Click';

    $time = $timer*1000;

var timeleft = $(this).data("video-timer");
var downloadTimer = setInterval(function(){
  document.getElementById("timer-video").innerHTML = timeleft + " seconds remaining";
  timeleft -= 1;
  if(timeleft <= 0){
    clearInterval(downloadTimer);
    $('#timer-video').hide(); 
  }
}, 1000);
    
// Show Image in Model...
$.ajax({
            url: '<?=BASE_URL?>video/showvideo',
            type:'POST',
            data:{
                showvideo: $id
            },
            success: function(response) {
                $('#content-view-model').html(response);
            }
    });

   
    $('#content-modal').modal({
           backdrop: 'static',
           keyboard: false
    }); 
    setTimeout(function() {
        $.ajax({
            url: '<?=BASE_URL?>video/addcoin',
            type:'POST',
            data:{
                addcoin: $id,
                userid:$userid,
                click:$click,
                coin:$coin,
                description:$description
            },
            success: function(response) {
                $(".video-close").show();
                add_refer_commision_video($coin);
            }
    });
    },$time);
});

function add_refer_commision_video(coin)
{
    $.ajax({
            url: '<?=BASE_URL?>video/add_refer_commision',
            type:'POST',
            data:{
                coin: coin
            },
            success: function(response) {
            }
    });
}


$(document).on('click','.btn-join-draw',function(){
    var draw_id = $(this).data("draw_id");
    $.ajax({
            url: '<?=BASE_URL?>backend_load/load/join_draw',
            type:'POST',
            data:{
                draw_id: draw_id
            },
            success: function(response) {
                window.location='<?=BASE_URL.'myaccount'?>';
            }
    });
});


});

</script>
