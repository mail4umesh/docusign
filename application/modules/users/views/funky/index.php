<div class="container">
	
	<div class="panel panel-info">
        <div class="panel-heading">
          <b>Users</b>
        </div>
    	<div class="panel-body">
    		<row>
    			<a href="<?php echo base_url(); ?>users/add" class="btn btn-info">Add New</a>
    		</row>
    		<row>
			<table id="example" class="table table-striped table-hover top-margin-10">
			<thead>
				<tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email </th>
					<th>Phone </th>

					
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($users as $user):?>
			
				<tr>
					<td><?php echo $user->first_name; ?></td>
					<td> <?php echo $user->last_name; ?> </td>
					<td> <?php echo $user->email; ?> </td>
					<td> <?php echo $user->phone; ?> </td>
					
					
					<td> 
						<a href="<?php echo base_url(); ?>users/edit/<?php echo $user->id ?>" ><i class="glyphicon glyphicon-pencil"></i></a>
						<a href="<?php echo base_url(); ?>users/view/<?php echo $user->id ?>" ><i class="glyphicon glyphicon-eye-open"></i></a>
						<a href="<?php echo base_url(); ?>users/remove/<?php echo $user->id ?>" onclick="return confirm('Are you sure you want to delete this Admin User?')" ><i class="glyphicon glyphicon-remove"></i></a>

					</td>
				</tr>

			<?php endforeach;?>
			</tbody>
			</table>
			</row>
		</div>
	</div>

</div>