<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <link href="<?php echo base_url(); ?>assets/themes/default/css/bootstrap.css" rel="stylesheet" id="bootstrap-css">
  <link href="<?php echo base_url(); ?>assets/themes/default/css/login.css" rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Lion Inspection Services | Inspection Document Portal</title>
</head>



<body>

<div class="container">
  
  <div class="row vertical-center-row">
    <p style="font-size:48px; color: #262674" align="center"><img src="/assets/themes/default/img/logo.png"><br>Inspection Document Portal</p>
    <div class="col-md-4 col-xs-12 col-md-offset-4">

      <div class="panel panel-inverted">
        <div class="panel-heading">
          <b><?php echo lang('login_heading');?></b>
        </div>
        <div class="panel-body">
          <?php if(isset($message) && $message != "" ) { ?>
          <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss= "alert">&times;</button>
            <?php echo $message;?>
          </div> 
          <?php } ?>
          <p><?php echo lang('login_subheading');?></p>
          <form action="" method="post" accept-charset="utf-8" class="form-horizontal">
          <div class="input-group col-md-12 " style="font-size:24px;" >
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input style="font-size:18px;"  type="text" name="identity" class="form-control" value="" id="identity" placeholder = "Email/Username" />
          </div>

          <div class="input-group col-md-12 top-margin-10">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input style="font-size:18px;"  type="password" name="password" value="" id="password" class="form-control" placeholder = "Password" />
          </div>

          <div class="row">
          <div class="input-group col-md-6 top-margin-10" style=" margin-left: 20px; float:left;">

            <input type="checkbox" name="remember"  value="1" id="remember" />
            <span class="input-group-label"> <label for="remember">Remember Me</label></span>
            
          </div>

          <div class="col-md-4 top-margin-10" style=" float:left;">
            <input type="submit" name="submit" value="Login" class="btn btn-info"  />
          </div>
          </div>

          <div class="input-group col-md-6 top-margin-10">

          <?php echo form_close();?>

          <p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
              
        </div>
      </div>


    </div>
  </div>
</div>


<script src="<?php echo base_url(); ?>assets/themes/default/js/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/themes/default/js/bootstrap.min.js"></script>
</body>
</html>
