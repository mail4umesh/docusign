<div class="navbar toolbar navbar-default">
    <div class="container">
        <div class="navbar-header">
           
        </div>
    </div>          
</div>
<div class="container">
<div class="panel panel-default">
	<div class="panel-heading">
		<b><?php echo (@$edit) ? 'Change Password for  - "'.$edit[0]->first_name.'"' : 'Add Admin User'; ?></b>
	</div>
	<div class="panel-body" style="padding-left: 10%; ">

		<?php echo form_open('users/do_change_password','class="form-horizontal"'); ?>
			

			

			

			<div class="form-group">
				<div class="col-md-4">
					<label class = "control-label">New Password</label>
				</div>
				<div class="col-md-4">
					<?php echo form_password('password',set_value(""),'class="form-control"'); ?>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-4">
					<label class = "control-label">Confirm New Password</label>
				</div>
				<div class="col-md-4">
					<?php echo form_password('passconf',set_value(""),'class="form-control"'); ?>
				</div>
			</div>

			

			

				


			
			
			<p class="submit">
				<?php
					
					if(@$edit) echo form_hidden('users_id',@$edit[0]->id);
					$submit_value = (@$edit) ? 'Update User' : 'Update Password';
					echo form_submit('submit',$submit_value,'class="left-margin-10 btn btn-info pull-right"');
					echo anchor('users','Back','class="btn left-margin-10 btn-info pull-right"'); 
				?>
			</p>
		<?php echo form_close(); ?>
	</div>
</div>
</div>