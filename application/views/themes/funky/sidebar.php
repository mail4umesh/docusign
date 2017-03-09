<style type="text/css">
.container{
	width:auto;
}
@media(min-width:992px){
	.sidebar{
		width:250px; position:fixed; top:55px; bottom:0px; left:0px; padding:5px;
	}
	.main_content{
		position:fixed; overflow-x: scroll; overflow-y: scroll; right:0px; left:250px; top:55px; bottom:0px; padding-top:10px;
	}

}
.panel-body > ul{
	margin: 0 10px;
	padding: 0;
	font-size: 16px;
}

.panel-body > ul > li a{
	
}
</style>
<div class="sidebar hidden-sm hidden-xs ">
	 
	<div class="panel-group" >	

			<?php if($this->ion_auth->in_group('client')) { ?>

            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a style="display:block" href="<?php echo base_url(); ?>">Dashboard</a>
                    </h4>
                </div>
            </div>

            <div class="panel panel-danger">
            	<div class="panel-heading">
                	<h4 class="panel-title">
                		<a style="display:block" href="<?php echo base_url(); ?>my/inspection_list">Inspections</a>
                    </h4>
                </div>
            </div>

            <div class="panel panel-success">
            	<div class="panel-heading">
                	<h4 class="panel-title">
                		<a href="<?php echo base_url(); ?>my/document_list">Documents</a>
                    </h4>
                </div>
            </div>
                
            <?php } ?>

            <?php if($this->ion_auth->in_group('inspector')) { ?>

            <div class="panel panel-danger">
            	<div class="panel-heading">
                	<h4 class="panel-title">
                		<a style="display:block" href="<?php echo base_url(); ?>my/inspection_list">Inspections</a>
                    </h4>
                </div>
            </div>

            <div class="panel panel-success">
            	<div class="panel-heading">
                	<h4 class="panel-title">
                		<a href="<?php echo base_url(); ?>my/document_list">Documents</a>
                    </h4>
                </div>
            </div>

            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a style="display:block" href="<?php echo base_url(); ?>">Dashboard</a>
                    </h4>
                </div>
            </div>
                
            <?php } ?>

			<?php if($this->ion_auth->in_group('admin')) { ?>
            <div class="panel panel-info ">
            	<div class="panel-heading">
                	
                	<h4 class="panel-title">
                		<a data-toggle="collapse" style="display:block" href="#a4_section1">Manage Users<span class="livicon pull-right" data-name="collapse-down" data-onparent="true" data-size="24" data-color="#FFF" data-hc="#FFF"></span></a>
                    </h4>
                </div>
                <div class="panel-collapse collapse in" id="a4_section1">
                    <div class="panel-body">
                    	<ul>
                			<li><a href="<?php echo base_url(); ?>client">Manage Client</a></li>
                            <li><a href="<?php echo base_url(); ?>inspector">Manage Inspector</a></li>
                            <li><a href="<?php echo base_url(); ?>users">Manage Admin Users</a></li> 
                		</ul>
                    </div>
                </div>
            </div>

            
            <div class="panel panel-danger">
            	<div class="panel-heading">
                	<h4 class="panel-title">
                		<a data-toggle="collapse" style="display:block"  href="#a4_section2">Inspections<span class="livicon pull-right" data-name="collapse-down" data-onparent="true" data-size="24" data-color="#FFF" data-hc="#FFF"></span></a>
                    </h4>
                </div>
                <div class="panel-collapse collapse in" id="a4_section2">
                    <div class="panel-body">
                    	<ul>
                            <li><a href="<?php echo base_url(); ?>inspection/add">Create New Inspection</a></li>
                            <li><a href="<?php echo base_url(); ?>inspection">View Inspection</a></li>                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="panel panel-warning">
            	<div class="panel-heading">
                	<h4 class="panel-title">
                		<a data-toggle="collapse" style="display:block" data-parent="#accordion4" href="#a4_section3">Forms<span class="livicon pull-right" data-name="collapse-down" data-onparent="true" data-size="24" data-color="#FFF" data-hc="#FFF"></span></a>
                    </h4>
                </div>
                <div class="panel-collapse collapse in" id="a4_section3">
                    <div class="panel-body">
                    	<ul>
                            
                            <li><a href="<?php echo base_url(); ?>form/add">Create New</a></li>
                            <li><a href="<?php echo base_url(); ?>form">View All Forms</a></li>
                                
                        </ul>
                    </div>
                </div>
            </div>

            <div class="panel panel-success">
            	<div class="panel-heading">
                	<h4 class="panel-title">
                		<a style="display:block" href="<?php echo base_url(); ?>my/document_list">Documents</a>
                    </h4>
                </div>
            </div>

            

            


            <?php } ?> 


            <div class="panel panel-primary">
            	<div class="panel-heading">
                	<h4 class="panel-title">
                		<a data-toggle="collapse" style="display:block" data-parent="#accordion4" href="#a4_section4">Account Setting<span class="livicon pull-right" data-name="collapse-down" data-onparent="true" data-size="24" data-color="#FFF" data-hc="#FFF"></span></a>
                    </h4>
                </div>
                <div class="panel-collapse collapse" id="a4_section4">
                    <div class="panel-body">
                    	<ul>
                        	<?php if($this->ion_auth->logged_in()) { ?> <li><?php echo anchor('profile', "Profile"); ?></li> <?php } ?>
                            <li><?php echo anchor('auth/logout', "Logout"); ?></li>
                       	</ul>
                    </div>
                </div>
            </div>
            
            
    </div>

</div>
<div class="main_content">
<?php $this->template->check_validation(); ?>


