<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta tags -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="My Coin Station - Watch Video,image,link and Earn Coin">
<meta name="keywords" content="My Coin Station, Watch Video, Watch Image, Watch Link, Earn Money">

<!-- /meta tags -->
<title>Login - User</title>

<!-- Site favicon -->
<link rel="shortcut icon" href="<?=base_url()?>assets/home/img/logo_new2.png" type="image/x-icon">
<!-- /site favicon -->

<link rel="stylesheet" href="<?=base_url()?>assets/css/perfect-scrollbar.css">   
<link rel="stylesheet" href="<?=base_url()?>assets/css/flag-icon.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/css/flag-icon.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/vendors/gaxon-icon/styles.css">
<link rel="stylesheet" href="<?=base_url()?>assets/css/semidark-style-1.min.css">
 
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-162732817-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-162732817-1');
</script>

<style type="text/css">
    
</style>

</head>
<body class="dt-sidebar--fixed dt-header--fixed" style="background-image: url(<?=base_url()?>assets/images/login-background.png); height: 100%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover; width: 100%;" >

<!-- Loader -->
<div class="dt-loader-container">
  <div class="dt-loader">
    <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"></circle>
    </svg>
  </div>
</div>
<!-- /loader -->
<!-- Root -->
<div class="dt-root login-background" >
    <div class="dt-root__inner">

        <!-- Login Container -->
        <div class="dt-login--container">

            <!-- Login Content -->
            <div class="dt-login__content-wrapper" style="max-width: 350px; background-color: rgb(255, 255, 255,0.1)">

                <!-- Login Background Section -->
                <div class="dt-login__bg-section" style="display: none;">

                    <div class="dt-login__bg-content">
                        <!-- Login Title -->
                        <h1 class="dt-login__title">Login</h1>
                        <!-- /login title -->

                        <div class="dt-card">
<h4 class="card-header text-white bg-primary">COVID-19 Cases Overview</h4>
 <div class="dt-card__body" style="padding: 0rem 3.2rem;">
 <div class="dt-card__header" style="margin-bottom: 0rem;padding: 1rem 3.2rem 0;">
     <div class="dt-card__heading">
         <h2 class="dt-card__title">World</h2>
     </div>
 </div>
     <div class="row">
         <div class="col-xl-12 col-sm-12 col-12">
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
             </div> 
    </div>
    <hr style="margin-top: 0rem;margin-bottom: 0rem;">
 <div class="dt-card__header" style="margin-bottom: 0rem;padding: 1rem 3.2rem 0;">
     <div class="dt-card__heading">
         <h2 class="dt-card__title">India</h2>
     </div>
 </div>
     <div class="row">
        <div class="col-xl-12 col-sm-12 col-12">
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
             </div>
     </div>
 </div>
</div>

                        <p class="f-16">Sign in and explore in-built apps of Mycoinstation.</p>
                    </div>


                    

                </div>
                <!-- /login background section -->

                <!-- Login Content Section -->
                <div class="dt-login__content" style="width: 100%;">

                    <!-- Login Content Inner -->
                    <div class="dt-login__content-inner">

                      <!-- Brand logo -->
                    <div class="dt-login__logo">
                        <a class="dt-brand__logo-link" href="<?=base_url()?>">
                            <img class="" src="<?=base_url()?>assets/home/img/logo_new2.png" alt="">
                        </a>
                    </div>
                    <!-- /brand logo -->

                        <!-- Form -->
                        <form method="post" action="<?=base_url()?>login/authenticate" >

                            <!-- <?php if( !empty($_SESSION['error']) ): ?>
                                <div class="alert alert-danger">
                                    <?=$_SESSION['error']?>
                                </div>
                            <?php endif; ?> -->

                            <br><br><br>

                            <!-- Form Group -->
                            <div class="form-group">
                                <label class="sr-only" for="email-1">Mobile Number</label>
                                <input type="text" name="mobile" class="form-control number" 
                                       placeholder="Enter Mobile Number" readonly onfocus="this.removeAttribute('readonly');" autocomplete="false">

                                <?php echo form_error('mobile', '<div class="text-danger">', '</div>'); ?>
                            </div>
                            <!-- /form group -->

                           

                            <!-- Form Group -->
                            <div class="form-group">
                                <label class="sr-only" for="password-1">Password</label>
                                <input type="password" name="password" class="form-control"  placeholder="Password" readonly onfocus="this.removeAttribute('readonly');" autocomplete="false">
                                <?php echo form_error('password', '<div class="text-danger">', '</div>'); ?>
                            </div>
                            <!-- /form group -->

                            <!-- Form Group -->
                           <!--  <div class="dt-checkbox d-block mb-6">
                                <input type="checkbox" id="checkbox-1">
                                <label class="dt-checkbox-content" for="checkbox-1">
                                    Keep me login on this device
                                </label>
                            </div> -->
                            <!-- /form group -->

                            <br>

                            <!-- Form Group -->
                            <div class="form-group" style="">
                                <button type="submit" class="btn btn-primary text-uppercase">Login</button>

                                <a href="<?=base_url()?>signup" class="btn btn-danger text-uppercase text-white">Create New Account</a>



                                <!-- <span class="d-inline-block ml-4">
              <a class="d-inline-block font-weight-500 ml-3" href="<?=base_url()?>signup">Create New Account</a>
            </span> -->
                            </div>
                            <!-- /form group -->

                            <!-- Form Group -->
                            
                            <!-- /form group -->


                        </form>
                        <!-- /form -->

                    </div>
                    <!-- /login content inner -->

                    <br><br>

                    <!-- Login Content Footer -->
                    <div class="dt-login__content-footer">
                        <a href="<?=base_url()?>forgot/Userforgot">Forget Password For User?</a>
                    </div>
                    <!-- /login content footer -->

                    <div class="dt-login__content-footer">
                        <a href="<?=base_url()?>">Back to home</a>
                    </div>

                </div>
                <!-- /login content section -->

            </div>
            <!-- /login content -->

        </div>
        <!-- /login container -->

    </div>
</div>
<!-- /root -->



<div id="live_visitor_count"></div>



<!-- Optional JavaScript -->
<script src="<?=base_url()?>assets/js/jquery.min.js"></script>

<script src="<?=base_url()?>assets/js/moment.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap.bundle.min.js"></script>
<!-- Perfect Scrollbar jQuery -->
<script src="<?=base_url()?>assets/js/perfect-scrollbar.min.js"></script>
<!-- /perfect scrollbar jQuery -->

<!-- masonry script -->
<script src="<?=base_url()?>assets/js/masonry.pkgd.min.js"></script>
<script src="<?=base_url()?>assets/js/functions.js"></script>
<script src="<?=base_url()?>assets/js/customizer.js"></script>
<script src="<?=base_url()?>assets/js/script.js"></script>

<?php $this->load->view('message'); ?>
</body>
</html>

<script type="text/javascript">
 $(document).ready(function () {

     $(document).on('click', '#btn_more', function(){

        var last_user_id = $(this).data("uid");
        $('#btn_more').html("Loading...");

         $.ajax
        ({
            url: '<?=BASE_URL?>backend_load/load/userdata_more',
            type:'POST',
            data:{
                last_user_id: last_user_id
            },
            success: function(response) {
                if (response != '') 
                {
                    $('#remove_row').remove();
                    $('#new').append(response);
                }
            }
        });


     });


  $('.number').on('keypress', function(e) {
 var $this = $(this);
 var regex = new RegExp("^[0-9\b]+$");
 var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
 // for 10 digit number only
 if ($this.val().length > 9) {
    e.preventDefault();
    return false;
  }
  if (regex.test(str)) {
    return true;
  }
  e.preventDefault();
  return false;
});


live_visitor_count();

function live_visitor_count()
{

  $.ajax
        ({
            url: '<?=BASE_URL?>backend_load/load/live_visitor_count',
            type:'POST',
            data:{
                status: true
            },
            success: function(response) {
                $('#live_visitor_count').html(response);
            }
        });
}


    

 });

</script>
<script>
//
document.onkeydown = function(e) {
  if(event.keyCode == 123) {
     return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
     return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
     return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
     return false;
  }
  if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
     return false;
  }
}
</script>