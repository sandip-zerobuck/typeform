<!DOCTYPE html>
<html lang="en">

<head>
<!-- Meta tags -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="My Coin Station - Watch Video,image,link and Earn Coin">
<meta name="keywords" content="My Coin Station, Watch Video, Watch Image, Watch Link, Earn Money">
<meta property="og:image" content="<?=base_url()?>assets/home/img/logo_new2.png">
<!-- /meta tags -->
<title>Register User</title>

<!-- Site favicon -->
<link rel="shortcut icon" href="<?=base_url()?>assets/home/img/logo_new2.png" type="image/x-icon">
<!-- /site favicon -->



<link rel="stylesheet" href="<?=base_url()?>assets/css/flag-icon.min.css">
<link rel="stylesheet" href="vendors/gaxon-icon/styles.css">
<link rel="stylesheet" href="http://drift.g-axon.work/html-bs4/node_modules/perfect-scrollbar/css/perfect-scrollbar.css">
<link rel="stylesheet" href="<?=base_url()?>assets/css/semidark-style-1.min.css">


<link href="<?=base_url()?>assets/admin/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>assets/admin/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>assets/admin/css/minified/core.min.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>assets/admin/css/minified/components.min.css" rel="stylesheet" type="text/css">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-162732817-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-162732817-1');
</script>


<style type="text/css">
    .dropdown-toggle::after {
    content: '';
}
.dropup .dropdown-toggle::after {
    content: '';
}
.form-group {
    margin-bottom: 20px;
    position: unset;
}
</style>

</head>
<body class="dt-sidebar--fixed dt-header--fixed">



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
<div class="dt-root">
    <div class="dt-root__inner">

        <!-- Login Container -->
        <div class="dt-login--container">

            <!-- Login Content -->
            <div class="dt-login__content-wrapper ">

                <!-- Login Background Section -->
                <div class="dt-login__bg-section col-md-12" >

                    <div class="dt-login__bg-content">
                        <!-- Login Title -->
                        <h1 class="dt-login__title">Sign Up</h1>
                        <!-- /login title -->

                        <p class="f-16">Sign in and explore in-built apps of Mycoinstation.</p>
                    </div>


                    <!-- Brand logo -->
                    <div class="dt-login__logo">
                        <a class="dt-brand__logo-link" href="<?=base_url()?>">
                            <img class="" src="<?=base_url()?>assets/home/img/logo_new2.png" alt="Drift">
                        </a>
                    </div>
                    <!-- /brand logo -->

                </div>
                <!-- /login background section -->

                <!-- Login Content Section -->
                <div class="dt-login__content col-md-12">

                    <!-- Login Content Inner -->
                    <div class="dt-login__content-inner">

                        <!-- Form -->
                        <form method="post" action="<?=base_url()?>signup/store">


<div class="col-md-12">
    <div class="row">


        <input type="hidden" name="ip_address" value="<?=$this->input->ip_address()?>">
            
        <div class="col-md-6">
            <div class="form-group">
                <label for="user-name">First Name</label>
                <input type="text" autocomplete="off" name="firstname" class="form-control char" 
                       placeholder="First Name" value="<?=set_value('firstname'); ?>">
                <?=form_error('firstname', '<div class="text-danger">', '</div>'); ?>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="user-name">Last Name</label>
                <input type="text" autocomplete="off" value="<?=set_value('lastname'); ?>" class="form-control char" name="lastname" 
                       placeholder="Last Name">
            <?=form_error('lastname', '<div class="text-danger">', '</div>'); ?>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="user-name">Mobile Number</label>
                <input type="text" autocomplete="off"  value="<?=set_value('mobile'); ?>" class="form-control number" name="mobile" 
                       placeholder="Mobile Number">
                <div class="text-danger" id="errmsg"></div>
             <?=form_error('mobile', '<div class="text-danger">', '</div>'); ?>
            </div>
        </div>

       

        <div class="col-md-6">
            <div class="form-group">
                <label for="user-name">Email Id</label>
                <input type="email" autocomplete="off" value="<?=set_value('email'); ?>" class="form-control" name="email" 
                       placeholder="Email Id (Optional)">
             <?=form_error('email', '<div class="text-danger">', '</div>'); ?>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="user-name">Password</label>
                <input type="password" autocomplete="off" value="<?=set_value('password'); ?>"  class="form-control" name="password" 
                       placeholder="Password">
             <?=form_error('password', '<div class="text-danger">', '</div>'); ?>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="user-name">Confirm Password</label>
                <input type="password" autocomplete="off" value="<?=set_value('cpassword'); ?>" class="form-control" name="cpassword" 
                       placeholder="Confirm Password">
             <?=form_error('cpassword', '<div class="text-danger">', '</div>'); ?>
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group">
                <label for="user-name">Date of birth</label>
                <input type="date" class="form-control" value="<?=set_value('dob'); ?>" name="dob" 
                       placeholder="Date of birth">
            <?=form_error('dob', '<div class="text-danger">', '</div>'); ?>
            </div>
        </div>


       

        <div class="col-md-6">
            <div class="form-group">
                <label for="user-name">Qualification</label>
                <select class="form-control" name="qulification">
                    <option value="" >Select Qualification</option>
                    
                    <?php foreach($qualification as $key => $value){  ?> 
                        <option value="<?=$value->name?>" <?=set_select('qulification', $value->name)?> ><?=$value->name?></option> 
                    <?php } ?>
                </select>
            <?=form_error('qulification', '<div class="text-danger">', '</div>'); ?>
            </div>
        </div>



        <div class="col-md-6">
            <div class="form-group">
                <label for="user-name">Gender</label>


               <!--  <input type="text" value="<?=set_value('qulification'); ?>" class="form-control char" name="qulification" 
                       placeholder="Qualification"> -->
                <br>
                <input type="radio" name="gender" value="male">Male
                <input type="radio" name="gender" value="female">Female
                <input type="radio" name="gender" value="others">Others

            <?=form_error('gender', '<div class="text-danger">', '</div>'); ?>



            </div>
        </div>

        <!--  <div class="col-md-6">
            <div class="form-group">
                <label for="user-name">Country</label>
                <select class="form-control country" id="country_id" name="country_id">
                    <option value="">Select Country</option>


                    <?php foreach($country as $key => $value){  ?> 
                        <option value="<?=$value->id?>" ><?=$value->name?></option> 
                    <?php } ?>

                </select>
           <?=form_error('country_id', '<div class="text-danger">', '</div>'); ?>
            </div>
        </div>

         <div class="col-md-6">
            <div class="form-group">
                <label for="user-name">State</label>
                <select class="form-control" id="state_id" name="state_id">
                    <option value="">Select State</option>
                </select>
            <?=form_error('state_id', '<div class="text-danger">', '</div>'); ?>
            </div>
        </div>

         <div class="col-md-6">
            <div class="form-group">
                <label for="user-name">City</label>
                <select class="form-control" name="city_id" id="city_id">
                    <option value="">Select City</option>
                </select>
            <?=form_error('city_id', '<div class="text-danger">', '</div>'); ?>
            </div>
        </div>

         <div class="col-md-6">
            <div class="form-group">
                <label for="user-name">Area</label>
                <select class="form-control" name="area_id" id="area_id">
                    <option value="">Select Area</option>
                </select>
            <?=form_error('area_id', '<div class="text-danger">', '</div>'); ?>
            </div>
        </div> -->

        <div class="col-md-6">
            <div class="form-group">
                <label for="user-name">Refer Code (Optional)</label>


         <input type="text" autocomplete="off"  id="refercode" value="<?=set_value('refercode'); ?>"  class="form-control" name="refercode" 
                       placeholder="Refer Code">

            <?=form_error('refercode', '<div class="text-danger">', '</div>'); ?>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="user-name">Country</label>
                <select class="bootstrap-select country_id" name="country_id" id="country_id" data-live-search="true" data-width="100%">
                    <option value="">Select Country</option>
                    
                    <?php foreach($country as $key => $value){  ?> 
                        <option value="<?=$value->id?>" <?php echo set_select('country_id', '1', TRUE); ?>  ><?=$value->name?></option> 
                    <?php } ?>
                </select>
            <?=form_error('country_id', '<div class="text-danger">', '</div>'); ?>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="user-name">State</label>
                <select class="bootstrap-select" name="state_id" id="state_id" data-live-search="true" data-width="100%">
                                <option value="">Select State</option>
                </select>
                <input type="hidden"  class="selected_state" value="<?=set_value('state_id')?>">
            <?=form_error('state_id', '<div class="text-danger">', '</div>'); ?>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="user-name">District</label>
                <select class="bootstrap-select" name="district_id" id="district_id" data-live-search="true" data-width="100%">
                                <option value="">Select District</option>
                </select>

                <input type="hidden"  class="selected_district" value="<?=set_value('district_id')?>">
            <?=form_error('district_id', '<div class="text-danger">', '</div>'); ?>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="user-name">Taluka</label>
                <select class="bootstrap-select" name="city_id" id="city_id" data-live-search="true" data-width="100%">
                                <option value="">Select Taluka</option>
                </select>
                <input type="hidden"  class="select_city_id" value="<?=set_value('city_id')?>">
            <?=form_error('city_id', '<div class="text-danger">', '</div>'); ?>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="user-name">City</label>
                <select class="bootstrap-select" name="area_id" id="area_id" data-live-search="true" data-width="100%">
                                <option value="">Select City</option>
                </select>
                <input type="hidden"  class="select_area_id" value="<?=set_value('area_id')?>">
            <?=form_error('area_id', '<div class="text-danger">', '</div>'); ?>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="user-name">Pincode</label>
                <select class="bootstrap-select" name="pincode_id" id="pincode_id" data-live-search="true" data-width="100%">
                                <option value="">Select Pincode</option>
                </select>
                <input type="hidden"  class="select_pincode_id" value="<?=set_value('pincode_id')?>">
            <?=form_error('pincode_id', '<div class="text-danger">', '</div>'); ?>
            </div>
        </div>

         <!-- <div class="col-md-12">
            <div class="form-group">
                <label for="user-name">Address</label>
                <textarea class="form-control" value="<?=set_value('address'); ?>" name="address" placeholder="Address"></textarea>
            <?=form_error('address', '<div class="text-danger">', '</div>'); ?>
            </div>
        </div> -->
<!-- 

         <div class="col-md-6">
            <div id="location"></div>
        </div> -->

         

       

        <?php $invitedcode = mt_rand(9999, 99999); ?>
        <input type="hidden" name="invitedcode" value="<?=$invitedcode?>">

    </div>
</div>

                            <!-- Form Group -->
                           <!--  <div class="dt-checkbox d-block mb-6">
                                <input type="checkbox" id="checkbox-1">
                                <label class="dt-checkbox-content" for="checkbox-1"> by signing up, I accept
                                    <a href="javascript:void(0)">Term &amp; Condition</a>
                                </label>
                            </div> -->
                            <!-- /form group -->

                            <!-- Form Group -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary text-uppercase">Sign up</button>
                                <span class="d-inline-block ml-4">Or
              <a class="d-inline-block font-weight-500 ml-3" href="<?=base_url()?>login">Login</a>
            </span>


                            </div>
                            <!-- /form group -->

                       


                        </form>
                        <!-- /form -->

                    </div>
                    <!-- /login content inner -->

                    <!-- Login Content Footer -->
                    <div class="dt-login__content-footer">
                        <a href="<?=base_url()?>">Back to Home</a>
                    </div>
                    <!-- /login content footer -->

                </div>
                <!-- /login content section -->

            </div>
            <!-- /login content -->

        </div>
        <!-- /login container -->

    </div>
</div>
<!-- /root -->

<script type="text/javascript" src="<?=base_url()?>assets/admin/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/selects/bootstrap_select.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/pages/form_bootstrap_select.js"></script>


<script src="<?=base_url()?>assets/js/script.js"></script>

<?php if (!empty($refercode)) { ?>
<span id="refercode_value"><?=$refercode?></span>
<?php } ?>

<script type="text/javascript">
 $(document).ready(function () {

<?php if (!empty($refercode)) { ?>
    var refercode_value = $('#refercode_value').text();
    $('#refercode').val(refercode_value);
<?php } ?>


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


$('.char').keypress(function (e) {
    var regex = new RegExp("^[a-zA-Z ]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }
    else
    {
    e.preventDefault();
    alert('Please Enter Only Alphabate');
    return false;
    }
});

/* Select Area Of the City Selected */
    $( "#pincode_id" ).change(function() {

        var pincode_id = $('#pincode_id').val();

         $.ajax({
            url: '<?=BASE_URL?>signup/fetch_location',
            type:'POST',
            data:{
                pincode_id: pincode_id
            },
            success: function(response) {
                $('#location').html(response);
            }
        });
    });

fetch_all();
// Fetch State.......
 $( "#country_id" ).change(function() {
       fetch_state();
  });

 $( "#state_id" ).change(function() {
    fetch_district();
  });

 // Fetch Taluka
 $( "#district_id" ).change(function() {
    fetch_city();
  });

 // Fetch City
 $( "#city_id" ).change(function() {
    fetch_area();
  });

 // Fetch Pincode
 $( "#area_id" ).change(function() {
    fetch_pincode();
  });

 function fetch_state() {
    var country_id = $('#country_id').val();
       $.ajax({
            url: '<?=BASE_URL?>Fech_location/fetch_state',
            type:'POST',
            data:{
                country_id: country_id,
                selected_state: $(".selected_state").val()
            },
            success: function(response) {
              $('#state_id').html(response);
              $('#state_id').selectpicker('refresh');

                if($("#state_id").val() != '') {
                    fetch_district();
                }
            }
        });
 }



 function fetch_district()
 {
    var state_id = $('#state_id').val();
       $.ajax({
            url: '<?=BASE_URL?>Fech_location/fetch_district',
            type:'POST',
            data:{
                state_id: state_id,
                select_district_id: $(".selected_district").val()
            },
            success: function(response) {
              $('#district_id').html(response);
              $('#district_id').selectpicker('refresh');

              if($("#district_id").val() != '') {
                    fetch_city();
                }
            }
        });
 }

 function fetch_city(){
    var district_id = $('#district_id').val();
       $.ajax({
            url: '<?=BASE_URL?>Fech_location/fetch_city',
            type:'POST',
            data:{
                district_id: district_id,
                select_city_id: $(".select_city_id").val()
            },
            success: function(response) {
              $('#city_id').html(response);
              $('#city_id').selectpicker('refresh');

              if($("#district_id").val() != '') {
                    fetch_area();
                }
            }
        });
 }

 function fetch_area(){
    var city_id = $('#city_id').val();
       $.ajax({
            url: '<?=BASE_URL?>Fech_location/fetch_area',
            type:'POST',
            data:{
                city_id: city_id,
                select_area_id: $(".select_area_id").val()
            },
            success: function(response) {
              $('#area_id').html(response);
              $('#area_id').selectpicker('refresh');

              if($("#area_id").val() != '') {
                    fetch_pincode();
                }
            }
        });
 }

 function fetch_pincode()
 {
        var area_id = $('#area_id').val();
       $.ajax({
            url: '<?=BASE_URL?>Fech_location/fetch_pincode',
            type:'POST',
            data:{
                area_id: area_id,
                select_pincode_id: $(".select_pincode_id").val()
            },
            success: function(response) {
              $('#pincode_id').html(response);
              $('#pincode_id').selectpicker('refresh');
            }
        });
 }

 function fetch_all() {
    if($("#country_id").val() != '') {
        fetch_state();
    }

 }

// Fetch District..
 




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

<?php $this->load->view('message'); ?>

</body>
</html>