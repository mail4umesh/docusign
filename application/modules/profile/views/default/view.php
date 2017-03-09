<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
          <b><?php echo $profile->first_name; ?></b>
        </div>
    	<div class="panel-body">

			<dl class="container">

				<dt class="col-md-6">First Name</dt>
				<dd class="col-md-6">
					<?php
						echo $profile->first_name;
					?>
				</dd >

				<dt class="col-md-6">Last Name</dt>
				<dd class="col-md-6">
					<?php
						echo $profile->last_name;
					?>
				</dd>

				<dt class="col-md-6">User Name</dt>
				<dd class="col-md-6">
					<?php
						echo $profile->username;
					?>
				</dd>

				<dt class="col-md-6">Email</dt>
				<dd class="col-md-6">
					<?php
						echo $profile->email;
					?>
				</dd>

				<dt class="col-md-6">Comapny</dt>
				<dd class="col-md-6">
					<?php
						echo $profile->company;
					?>
				</dd>
				

				

				<dt class="col-md-6">Phone</dt>
				<dd class="col-md-6">
					<?php
						echo $profile->phone;
					?>
				</dd>

				<dt class="col-md-6">Password</dt>
				<dd class="col-md-6">
					<a href="<?php echo base_url()."profile/change_password/";?>">Change Password</a>
						
						
					
				</dd>


			</dl>


			<div style="width: 100%">
				<?php echo anchor('profile/edit/','Edit','class="btn left-margin-10 btn-default pull-right"'); ?>	
			</div>

		</div>
	</div>
</div>