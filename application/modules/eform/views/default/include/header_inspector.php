<?php echo form_open('eform/do_add_sign','class="form-horizontal add_eform"'); ?>
<div class="navbar toolbar navbar-default">
    <div class="container">
        <div class="navbar-header">
        	<?php if(!$this->ion_auth->in_group('admin')) { ?>
			<p class="submit">
				<button  type="button" class="btn btn-info save-progress">Save Progress</button>
				<a href="#add-signature"  class="btn btn-info save-and-sign" data-toggle = "modal">Save and Sign</a>
				
				<?php
					echo form_hidden('eform_id',$eform_id);

					//echo anchor('#save','Save Progress','class="btn left-margin-10 btn-info pull-righ save-progress"');
					//echo form_submit('submit',"Save & Sign",'class="left-margin-10 btn btn-info"');
					 
				?>
				
			</p>
			<?php } ?>
        </div>
    </div>
</div>
<div class="container">
<div class="panel panel-default">
