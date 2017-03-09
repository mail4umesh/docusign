<div class="navbar toolbar navbar-default">
    <div class="container">
        <div class="navbar-header">
        	<?php echo anchor('client','<i class="glyphicon glyphicon-arrow-left"> </i> Back','class="btn left-margin-10 btn-info pull-right"'); ?>
			<?php echo anchor('client/edit/'.$user->id,'<i class="glyphicon glyphicon-edit"> </i> Modify','class="btn left-margin-10 btn-default pull-right"'); ?>
		</div>
    </div>          
</div>
<div class="container">
	<div class="panel panel-default">
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
					<a href="<?php echo base_url()."client/change_password/".$user->id ?>">Change Password</a>
						
						
					
				</dd>


			</dl>


			<div style="width: 100%">
					
			</div>

		</div>
	</div>
</div>


<div class="container">
	<div class="page-header" >
		<h2>Pending forms currently assigned to this user</h2>
	</div>

	<table id="example" class="table table-striped table-hover top-margin-10">
			<thead>
				<tr>
					<th>#</th>
					<th>Inspection Id</th>
					<th>Form Id</th>
					<th>Scheduled Date</th>
					<th>Client Status</th>
					<th>inspector Status</th>
					
				</tr>
			</thead>
			<tbody>

			<?php $i = 0; foreach ($pending_form_list as $pending_form):  $i++; ?>
			
				<tr>
					<td><?php echo $i; ?></td>
					<td> <a href="<?php echo base_url() ?>inspection/view/<?php echo $pending_form->inspection_id; ?>"><?php echo $pending_form->inspection_id; ?></a> </td>
					<td> <a href="<?php echo base_url() ?>form/view/<?php echo $pending_form->form_id; ?>"><?php echo $pending_form->form_id; ?> </td>
					<td> <?php echo convert_date_mysql_to_usa($pending_form->schedule_date); ?> </td>
					<td> <?php echo show_status($pending_form->client_status); ?> </td>
					<td> <?php echo show_status($pending_form->inspector_status); ?> </td>
					

					
					
					
				</tr>

			<?php endforeach;?>
			</tbody>
			</table>
	
</div>