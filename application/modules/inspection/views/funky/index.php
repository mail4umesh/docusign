<div class="container">
	
	<div class="panel panel-danger">
        <div class="panel-heading">
          <b>Inspection</b>
        </div>
    	<div class="panel-body">
    		<row>
    			<a href="<?php echo base_url(); ?>inspection/add" class="btn btn-info">Add New Inspection</a>
    		</row>
    		<row>
			<table id="example" class="table table-striped table-hover top-margin-10">
			<thead>
				<tr>
					<th>#</th>
					<th>Client Name</th>
					<th>Client Email</th>
					<th>Inspector Name</th>
					<th>Inspector Email</th>
					<th>Created</th>
					<th>Scheduled on </th>
					<th>Status </th>
					<th>ID</th>

					
					<th>Action</th>
				</tr>
			</thead>
			<tbody>

			<?php $i = 0; foreach ($inspection as $inspection):  $i++; ?>
			
				<tr>
					<td><?php echo $i; ?></td>
					<td> <?php echo get_username($inspection->client_id); ?> </td>
					<td> <?php echo get_useremail($inspection->client_id); ?> </td>
					<td> <?php echo get_username($inspection->inspector_id); ?> </td>
					<td> <?php echo get_useremail($inspection->inspector_id); ?> </td>
					<td> <?php echo convert_date_mysql_to_usa($inspection->created_at); ?> </td>
					<td> <?php echo convert_date_mysql_to_usa($inspection->schedule_date); ?> </td>
					<td> <?php echo show_status($inspection->status); ?> </td>
					<td><?php echo $inspection->id; ?></td>

					
					
					<td> 
						<a href="<?php echo base_url(); ?>inspection/edit/<?php echo $inspection->id ?>" ><i class="glyphicon glyphicon-pencil"></i></a>
						<a href="<?php echo base_url(); ?>inspection/view/<?php echo $inspection->id ?>" ><i class="glyphicon glyphicon-eye-open"></i></a>
						<a href="<?php echo base_url(); ?>inspection/remove/<?php echo $inspection->id ?>" onclick="return confirm('Are you sure you want to delete this inspection?')" ><i class="glyphicon glyphicon-remove"></i></a>

					</td>
				</tr>

			<?php endforeach;?>
			</tbody>
			</table>
			</row>
		</div>
	</div>

</div>