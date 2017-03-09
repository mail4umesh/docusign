<div class="container">
	<div class="panel panel-info">
		<div class="panel-heading">
          <b><?php echo $user->first_name; ?></b>
        </div>
    	<div class="panel-body">

			<dl class="container">

				<dt class="col-md-6">First Name</dt>
				<dd class="col-md-6">
					<?php
						echo $user->first_name;
					?>
				</dd >

				<dt class="col-md-6">Last Name</dt>
				<dd class="col-md-6">
					<?php
						echo $user->last_name;
					?>
				</dd>

				<dt class="col-md-6">User Name</dt>
				<dd class="col-md-6">
					<?php
						echo $user->username;
					?>
				</dd>

				<dt class="col-md-6">Email</dt>
				<dd class="col-md-6">
					<?php
						echo $user->email;
					?>
				</dd>

				<dt class="col-md-6">Comapny</dt>
				<dd class="col-md-6">
					<?php
						echo $user->company;
					?>
				</dd>
				

				<dt class="col-md-6">Email</dt>
				<dd class="col-md-6">
					<?php
						echo $user->email;
					?>
				</dd>

				<dt class="col-md-6">Phone</dt>
				<dd class="col-md-6">
					<?php
						echo $user->phone;
					?>
				</dd>

				<dt class="col-md-6">Password</dt>
				<dd class="col-md-6">
					<a href="<?php echo base_url()."users/change_password/".$user->id ?>">Change Password</a>
						
						
					
				</dd>


			</dl>


			<div style="width: 100%">
				<?php echo anchor('users','Back','class="btn left-margin-10 btn-info pull-right"'); ?>
				<?php echo anchor('users/edit/'.$user->id,'Modify','class="btn left-margin-10 btn-default pull-right"'); ?>	
			</div>

		</div>
	</div>
</div>