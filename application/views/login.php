<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BFC | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.8/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/flat/blue.css">
    <link rel="icon" href="<?php echo base_url('assets/upload/images/'); ?>favicon.ico" type="image/x-icon">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <style type="text/css">
  .login-background {
  background-image: url(<?php echo base_url('assets/upload/images/login-bg.jpeg'); ?>);
  background-size: cover;
  background-repeat: no-repeat;
  background-attachment: fixed;
  }
  .login-background:after{
  content: '';
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  width: 100%;
  background-color: rgba(0,0,0,.5);
  z-index: -1;
  }
  </style>
  <body class="hold-transition login-page login-background" oncontextmenu="return false;">
    <div class="login-box" style="background-color: white; opacity: 0.82">
      <div class="login-logo">
        <a href="#"><br>
          <img height="120px" width="120px" class="img-responsive center-block" src="<?php echo base_url('assets/upload/images/bfc.png'); ?>">
        <b><h2>Benevolent Fund Cell</b><br></h2></a></div><div class="login-box-body">
        <?php $this->load->view('templates/alerts');?>
        <p class="login-box-msg">Sign in to start your session</p>
        <?php validation_errors();?>
        <?php echo form_open('auth/admin_login', 'id="formID"'); ?>
        <div class="form-group has-feedback">
          <input type="text" class="form-control validate[required,minSize[5],maxSize[15]]" value="<?php echo set_value('username'); ?>" autocomplete="off"  name="username" id="username" placeholder="Username">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          <?php echo form_error('username'); ?>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control validate[required,minSize[5],maxSize[15]]" value="<?php echo set_value('password'); ?>"  name="password"  id="password" placeholder="Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          <?php echo form_error('password'); ?>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-xs-6 pull-right">
            <button type="submit" id="submit" value="submit" name="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
          <div class="col-xs-6 pull-left">
            <a type="button" href="<?php echo base_url(); ?>" class="btn btn-success btn-block btn-flat">Back to Website</a>
          </div>
          <br><br>
          <!-- <div class="col-xs-12 pull-right">
            <a type="button" href="<?php echo base_url('admin_recover'); ?>" class="btn btn-info btn-block btn-flat">Forgot Your Password?</a>
          </div> -->
          <!-- /.col -->
        </div>
      </form>
      <?php echo form_close(); ?>
    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->
  <!-- jQuery 2.2.3 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
  <script>
  $(function () {
  $('input').iCheck({
  checkboxClass: 'icheckbox_square-blue',
  radioClass: 'iradio_square-blue',
  increaseArea: '20%' // optional
  });
  });
  </script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/validationEngine.jquery.css" type="text/css"/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/jquery.validationEngine.js" type="text/javascript" charset="utf-8">
  </script>
  <script>
  jQuery(document).ready(function(){
  // binds form submission and fields to the validation engine
  jQuery("#formID").validationEngine();
  //jQuery("#formID").validationEngine('attach', {bindMethod:"live"});
  jQuery("#formID").validationEngine('attach', {autoHidePrompt:true});
  jQuery("#formID").validationEngine('attach', {promptPosition : "topLeft", scroll: false});
  $("#formID").bind("jqv.field.result", function(event, field, errorFound, prompText){ console.log(errorFound) });
  });
  </script>
  <script type="text/javascript">
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

  <script>
        setTimeout(function() {
            $('.alert').slideUp('slow');
        }, 5000); // 5 sec
    </script>
</body>
</html>