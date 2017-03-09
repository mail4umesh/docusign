<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link href="<?php echo base_url(); ?>assets/themes/default/css/bootstrap.css" rel="stylesheet" id="bootstrap-css">
    <link href="<?php echo base_url(); ?>assets/themes/default/css/main.css" rel="stylesheet" id="bootstrap-css">
    <link href="<?php echo base_url(); ?>assets/themes/default/css/default.css" rel="stylesheet" id="bootstrap-css">
    <link href="<?php echo base_url(); ?>assets/themes/default/css/default.date.css" rel="stylesheet" id="bootstrap-css">
    <link href="<?php echo base_url(); ?>assets/themes/default/css/default.time.css" rel="stylesheet" id="bootstrap-css">


    <link href="<?php echo base_url(); ?>assets/themes/default/css/fullcalendar/fullcalendar.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/themes/default/css/fullcalendar/fullcalendar.print.css" rel='stylesheet' media='print'>
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/default/css/fileupload/jquery.fileupload.css">


    <link href="<?php echo base_url(); ?>assets/themes/default/css/panel-daini.css" rel="stylesheet">


    <script src="<?php echo base_url(); ?>assets/themes/default/js/fullcalender/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/themes/default/js/jquery-1.10.2.min.js"></script>
    

    
    <script src="<?php echo base_url(); ?>assets/themes/default/js/fullcalender/jquery-ui.custom.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/themes/default/js/fullcalender/fullcalendar.min.js"></script>



    <script src="<?php echo base_url(); ?>assets/themes/default/js/fileupload/vendor/jquery.ui.widget.js"></script>
    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
    <script src="<?php echo base_url(); ?>assets/themes/default/js/fileupload/jquery.iframe-transport.js"></script>
    <!-- The basic File Upload plugin -->
    <script src="<?php echo base_url(); ?>assets/themes/default/js/fileupload/jquery.fileupload.js"></script>




    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>DocuSign</title>


<style type="text/css">
    
    .navbar-default .navbar-nav > .nav-info > a{
        color: #FFF;
        background-color: #5bc0de;
        border-color: #46b8da;
    }

    .navbar-default .navbar-nav > .nav-success > a{
        color: #fff;
        background-color: #449d44;
        border-color: #398439;
    }

    .navbar-default .navbar-nav > .nav-primary > a{
        color: #fff;
        background-color: #337ab7;
        border-color: #2e6da4;
    }

    .navbar-default .navbar-nav > .nav-danger > a{
        color: #fff;
        background-color: #d9534f;
        border-color: #d43f3a;
    }

    .navbar-default .navbar-nav > .nav-inverse > a{
        color: #fff;
        background-color: #111;
        border-color: #111;
    }



    .navbar-inverse .navbar-nav > .nav-info > a{
        color: #5bc0de;
        
    }

    .navbar-inverse .navbar-nav > .nav-success > a{
        color: #449d44;
        
    }

    .navbar-inverse .navbar-nav > .nav-primary > a{
        color: #337ab7;
        
    }

    

    .navbar-inverse .navbar-nav > .nav-warning > a{
        color: #F0AD4E;
        
    }

    .navbar-inverse .navbar-nav > .nav-danger > a{
        color: #d9534f;
        
    }

    .navbar-inverse .navbar-nav > .nav-inverse > a{
        color: #fff;
       
    }

</style>

</head>

<body>

<div class="navbar navbar-inverse navbar-static-top">
    	<div class="container">
        	<div class="navbar-header">
                <a href="#" class="navbar-brand">DocuSign</a>
                <button class="navbar-toggle" data-toggle  = "collapse"	 data-target = ".navHeaderCollapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
    		<div class="collapse navbar-collapse navHeaderCollapse">
            	<ul class="nav navbar-nav navbar-right">
                	<li class="nav-inverse"><a href="<?php echo base_url(); ?>dashboard">Dashboard</a> </li>
                    <?php if($this->ion_auth->in_group('client')) { ?>
                    <li class="nav-danger"><a href="<?php echo base_url(); ?>my/inspection_list">Inspections</a> </li>
                    <li class="nav-success"><a href="<?php echo base_url(); ?>my/document_list">Documents</a> </li>
                    <?php } ?>

                    <?php if($this->ion_auth->in_group('inspector')) { ?>
                    <li class="nav-danger"><a href="<?php echo base_url(); ?>my/inspection_list">Inspections</a> </li>
                    <li class="nav-success"><a href="<?php echo base_url(); ?>my/document_list">Documents</a> </li>
                    <?php } ?>

                    <?php if($this->ion_auth->in_group('admin')) { ?>
                    <li class="nav-success"><a href="<?php echo base_url(); ?>documents">Docements</a> </li>

                    <?php } ?>

                    <?php if($this->ion_auth->in_group('admin')) { ?>
                    <li class="nav-danger" class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle = "dropdown">Inspections <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            
                                <li><a href="<?php echo base_url(); ?>inspection/add">Create New Inspection</a></li>
                                <li><a href="<?php echo base_url(); ?>inspection">View Inspection</a></li>
                                 
                        </ul>
                    </li>

                    <?php } ?>

                    

                    

                    <?php if($this->ion_auth->in_group('admin')) { ?>
                    <li class="nav-warning" class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle = "dropdown">Forms <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            
                                <li><a href="<?php echo base_url(); ?>form/add">Create New</a></li>
                                <li><a href="<?php echo base_url(); ?>form">View All Forms</a></li>
                                
                        </ul>
                    </li>
                    <?php } ?>

                    <?php if($this->ion_auth->in_group('admin')) { ?>
                    <li class="nav-info" class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle = "dropdown">Manage Users <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            
                                <li><a href="<?php echo base_url(); ?>client">Manage Client</a></li>
                                <li><a href="<?php echo base_url(); ?>inspector">Manage Inspector</a></li>
                                <li><a href="<?php echo base_url(); ?>users">Manage Admin Users</a></li> 
                        </ul>
                    </li>
                    <?php } ?>
                    

                    <li class="nav-primary" class="dropdown">
                    	<a href="#" class="dropdown-toggle" data-toggle = "dropdown"><?php echo ucfirst($this->session->userdata( 'username' )); ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                        	<?php if($this->ion_auth->logged_in()) { ?> <li><?php echo anchor('profile', "Profile"); ?></li> <?php } ?>
                            
                        	<li class="divider"></li>
                            <li><?php echo anchor('auth/logout', "Logout"); ?></li>
                       	</ul>
                    </li>
                </ul>
            	
            </div>      
        </div>
    
    </div>
