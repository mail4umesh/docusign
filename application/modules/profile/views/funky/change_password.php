<div class="container">
<div class="panel panel-info">
	<div class="panel-heading">
		<b><?php echo (@$edit) ? 'Change Password for  Client - "'.$edit[0]->first_name.'"' : 'Add Admin User'; ?></b>
	</div>
	<div class="panel-body" style="padding-left: 10%; ">

		<?php echo form_open('profile/do_change_password','class="form-horizontal"'); ?>
			

			

			

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
					
					$submit_value = (@$edit) ? 'Update Password' : 'Update Password';
					echo form_submit('submit',$submit_value,'class="left-margin-10 btn btn-info pull-right"');
					echo anchor('profile','Back','class="btn left-margin-10 btn-info pull-right"'); 
				?>
			</p>
		<?php echo form_close(); ?>
	</div>
</div>
</div>