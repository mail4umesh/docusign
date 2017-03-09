<?php echo form_open('client/do_add','class="form-horizontal"'); ?>
<div class="navbar toolbar navbar-default">
    <div class="container">
        <div class="navbar-header">
           <?php
					if(@$edit) echo form_hidden('users_id',@$edit[0]->id);
					$submit_value = (@$edit) ? 'Update Client' : 'Add Client';
					echo form_submit('submit',$submit_value,'class="left-margin-10 btn btn-success"');
					echo anchor('client','Cancel','class="btn left-margin-10 btn-default"'); 
				?>        
		</div>
    </div>          
</div>

<div class="container">
<div class="panel panel-default">
	<div class="panel-heading">
		<b><?php echo (@$edit) ? 'Update Client - "'.$edit[0]->first_name.'"' : 'Add Client'; ?></b>
	</div>
	<div class="panel-body" style="padding-left: 10%; ">

		
			

			<div class="form-group">
				<div class="col-md-2">
					<label class = "control-label">First Name</label>
				</div>
				<div class="col-md-4">
					<?php echo form_input('first_name',set_value('first_name',@$edit[0]->first_name),'class="form-control"'); ?>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-2">
					<label class = "control-label">Last Name</label>
				</div>
				<div class="col-md-4">
					<?php echo form_input('last_name',set_value('last_name',@$edit[0]->last_name),'class="form-control"'); ?>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-2">
					<label class = "control-label">Username</label>
				</div>
				<div class="col-md-4">
					<?php //if(@$edit) { $disabled = " disabled"; } else { $disabled =""; } ?>
					<?php echo form_input('username',set_value('username',@$edit[0]->username),'class="form-control"'); ?>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-2">
					<label class = "control-label">Company</label>
				</div>
				<div class="col-md-4">
					<?php echo form_input('company',set_value('company',@$edit[0]->company),'class="form-control"'); ?>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-2">
					<label class = "control-label">Email</label>
				</div>
				<div class="col-md-4">
					<?php //if(@$edit) { $disabled = " disabled"; } else { $disabled =""; } ?>
					<?php echo form_input('email',set_value('email',@$edit[0]->email),'class="form-control"'); ?>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-2">
					<label class = "control-label">Phone</label>
				</div>
				<div class="col-md-4">
					<?php echo form_input('phone',set_value('phone',@$edit[0]->phone),'class="form-control"'); ?>
				</div>
			</div>

			<?php if(!@$edit) { ?>

			<div class="form-group">
				<div class="col-md-2">
					<label class = "control-label">Password</label>
				</div>
				<div class="col-md-4">
					<?php echo form_password('password',set_value(""),'class="form-control"'); ?>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-2">
					<label class = "control-label">Confirm Password</label>
				</div>
				<div class="col-md-4">
					<?php echo form_password('passconf',set_value(""),'class="form-control"'); ?>
				</div>
			</div>

			<?php } ?>

			

				


			
			
			
		
	</div>
</div>
</div>
<?php echo form_close(); ?>