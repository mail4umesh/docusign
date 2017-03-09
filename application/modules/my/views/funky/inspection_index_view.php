<div class="container">
	
	<div class="panel panel-danger">
        <div class="panel-heading">
          <b>Inspection</b>
        </div>
    	<div class="panel-body">
    		
    		<row>
			<table id="example" class="table table-striped table-hover top-margin-10">
			<thead>
				<tr>
					<th>#</th>
					<th>Inspection ID</th>
					<?php if($this->ion_auth->in_group('inspector')) { ?>
					<th>Client Name</th>
					<th>Client Email</th>
					<?php } if($this->ion_auth->in_group('client')) {	?>
					<th>Inspector Name</th>
					<th>Inspector Email</th>
					<?php } ?>
					<th>Created</th>
					<th>Scheduled on </th>
					<th>Status </th>
					<th>ID</th>

					
					
				</tr>
			</thead>
			<tbody>

			<?php $i = 0; foreach ($inspection as $inspection):  $i++; ?>
			
				<tr>
					<td><?php echo $i; ?></td>
					<td> <a href="<?php echo base_url(); ?>my/inspection_detail/<?php echo $inspection->id ?>" ><?php echo $inspection->id; ?></a></td>
					<?php if($this->ion_auth->in_group('inspector')) { ?>
						<td> <?php echo get_username($inspection->client_id); ?> </td>
						<td> <?php echo get_useremail($inspection->client_id); ?> </td>
					<?php } if($this->ion_auth->in_group('client')) {	?>
					<td> <?php echo get_username($inspection->inspector_id); ?> </td>
					<td> <?php echo get_useremail($inspection->inspector_id); ?> </td>
					<?php } ?>
					<td> <?php echo convert_date_mysql_to_usa($inspection->created_at); ?> </td>
					<td> <?php echo convert_date_mysql_to_usa($inspection->schedule_date); ?> </td>
					<td> <?php echo show_status($inspection->status); ?> </td>
					<td> <a href="<?php echo base_url(); ?>my/inspection_detail/<?php echo $inspection->id ?>" ><?php echo $inspection->id; ?></a></td>
					
					
					
					
				</tr>

			<?php endforeach;?>
			</tbody>
			</table>
			</row>
		</div>
	</div>

</div>