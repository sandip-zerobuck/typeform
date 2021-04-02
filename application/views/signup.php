<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>assets/admin/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>assets/admin/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>assets/admin/css/minified/core.min.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>assets/admin/css/minified/components.min.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>assets/admin/css/minified/colors.min.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/admin/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/admin/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->


    <!-- Theme JS files -->
    <script type="text/javascript" src="<?=base_url()?>assets/admin/js/core/app.js"></script>
    <!-- /theme JS files -->

</head>

<body>

    <!-- Page container -->
    <div class="page-container login-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Content area -->
                <div class="content">

                    <!-- Simple login form -->
                    <form action="<?=base_url()?>signup/store" method="post">
                        <div class="panel panel-body login-form">
                            <div class="text-center">
                                <h5 class="content-group">Register</h5>
                            </div>

                            <?php if( !empty($_SESSION['error']) ): ?>
                                <div class="alert alert-danger">
                                    <?=$_SESSION['error']?>
                                </div>
                            <?php endif; ?>

                            <div class="form-group has-feedback has-feedback-left">
                                <input type="text" class="form-control" name="username" placeholder="Username">
                                <div class="form-control-feedback">
                                    <i class="icon-user text-muted"></i>
                                </div>
                                <?php echo form_error('username', '<div class="text-danger">', '</div>'); ?>
                            </div>

                            <div class="form-group has-feedback has-feedback-left">
                                <input type="email" class="form-control" name="email" placeholder="email">
                                <div class="form-control-feedback">
                                    <i class="icon-inbox text-muted"></i>
                                </div>
                                <?php echo form_error('email', '<div class="text-danger">', '</div>'); ?>
                            </div>

                            <div class="form-group has-feedback has-feedback-left">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                                <div class="form-control-feedback">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>
                                <?php echo form_error('password', '<div class="text-danger">', '</div>'); ?>
                            </div>

                            <div class="form-group has-feedback has-feedback-left">
                                <input type="password" class="form-control" name="cpassword" placeholder="Confirm Password">
                                <div class="form-control-feedback">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>
                                <?php echo form_error('cpassword', '<div class="text-danger">', '</div>'); ?>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Register <i class="icon-circle-right2 position-right"></i></button>

                                <hr>
                                <small class="display-block">Already exist account?</small>
                                <a href="<?=base_url()?>login" class="btn btn-danger btn-block">Login <i class="icon-circle-right2 position-right"></i></a>
                            </div>
                        </div>
                    </form>
                    <!-- /simple login form -->

                </div>
                <!-- /content area -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

    </div>
    <!-- /page container -->

</body>
</html>
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