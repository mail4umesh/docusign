<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <link href="<?php echo base_url(); ?>assets/themes/default/css/bootstrap.css" rel="stylesheet" id="bootstrap-css">
  <link href="<?php echo base_url(); ?>assets/themes/default/css/login.css" rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Inspection Document Portal</title>
</head>


<body>

<div class="container">
	<div class="row vertical-center-row">
	    <p style="font-size:72px; color: #262674" align="center">Inspection Document Portal</p>
	    <div class="col-md-6 col-xs-12 col-md-offset-3">
			<div class="panel panel-inverted">
			    <div class="panel-heading">
			    	<b><?php echo lang('forgot_password_heading');?></b>
			    </div>
			    <div class="panel-body">
			    	<?php if(isset($message) && $message != "" ) { ?>
			        	<div class="alert alert-danger alert-dismissable">
			            	<button type="button" class="close" data-dismiss= "alert">&times;</button>
			            	<?php echo $message;?>
			          	</div> 
			        <?php } ?>
			    	<?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?>
			    	<?php echo form_open("auth/forgot_password");?>
				    <p>
				      	<label for="email"><?php echo sprintf(lang('forgot_password_email_label'), $identity_label);?></label> <br />
				      	<input type="text" name="email" value="" id="email" class="form-control" style="width: 400px;" />
				    </p>

				    <p><input type="submit" name="submit" value="Submit" class="btn btn-info"  /></p>

					<?php echo form_close();?>
			    </div>
			</div>
		</div>
	</div>

</div>

<script src="<?php echo base_url(); ?>assets/themes/default/js/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/themes/default/js/bootstrap.min.js"></script>
</body>
</html>
