<?php if($this->ion_auth->in_group('admin')) { ?>

<div class="navbar toolbar1 navbar-default">
    <div class="container">
        <div class="navbar-header">
        	
           
		</div>
    </div>          
</div>

<?php } ?>



<style type="text/css">
.jumbotron{
	max-height: 200px;
	min-height: 200px;
	padding-top: 10px; 
}

.jumbotron p{
	
	font-size: 18px;
}  
</style>



<div class="container top-margin-10">
	
    		

			<?php if($this->ion_auth->in_group('client') || $this->ion_auth->in_group('inspector'))  { ?>

			<div class="col-md-4">
	    		<div class="jumbotron">
				    <a href="<?php echo base_url(); ?>my/inspection_list"><h2>Inspections</h2> </a>
				    <a href="<?php echo base_url(); ?>my/inspection_list"><p>View All Inspections</p></a>

				</div>
			</div>

			<div class="col-md-4">
	    		<div class="jumbotron">
				    <a href="<?php echo base_url(); ?>document"><h2>Documents</h2> </a> 
				    <a href="<?php echo base_url(); ?>documents"><p>View All Documents</p></a>
				</div>
			</div>


			<?php } ?>


			<?php if($this->ion_auth->in_group('admin')) { ?>

			<div class="col-md-4">
	    		<div class="jumbotron ">
				    <a href="<?php echo base_url(); ?>inspection"><h2>Inspection</h2> </a>
				    <a href="<?php echo base_url(); ?>inspection/add"><p>Create New Inspection</p></a>
				    <a href="<?php echo base_url(); ?>inspection"><p>View All Inspections</p></a>
				</div>
			</div>

			<div class="col-md-4">
	    		<div class="jumbotron ">
				    <a href="<?php echo base_url(); ?>form"><h2>Forms</h2> </a>
				    <a href="<?php echo base_url(); ?>form/add"><p>Create New Form</p></a>
				    <a href="<?php echo base_url(); ?>form"><p>View All Forms</p></a>
				</div>
			</div>

			<div class="col-md-4">
	    		<div class="jumbotron ">
				    <a href="<?php echo base_url(); ?>documents"><h2>Documents</h2> </a>
				    <a href="<?php echo base_url(); ?>inspection"><p>View All Documents</p></a>
				</div>
			</div>

			<div class="col-md-4">
	    		<div class="jumbotron ">
				    <a href="<?php echo base_url(); ?>client"><h2>Client</h2> </a>
				    <a href="<?php echo base_url(); ?>client/add"><p>Create New Client</p></a>
				    <a href="<?php echo base_url(); ?>client"><p>View All Clients</p></a>
				</div>
			</div>

			<div class="col-md-4">
	    		<div class="jumbotron ">
				    <a href="<?php echo base_url(); ?>inspector"><h2>Inspector</h2> </a>
				    <a href="<?php echo base_url(); ?>inspector/add"><p>Create New Inspector</p></a>
				    <a href="<?php echo base_url(); ?>inspector"><p>View All Inspector</p></a>

				</div>
			</div>


			<?php } ?>

			<div class="col-md-4">
	    		<div class="jumbotron ">
				    <a href="<?php echo base_url(); ?>profile"><h2>Profile</h2> </a>
				    <a href="<?php echo base_url(); ?>profile/change_password"><p>Change Password</p></a>

				</div>
			</div>
			    		
    	
</div>

<div class="container">
	<?php if($this->ion_auth->in_group('client')) { ?>
	<div class="page-header">
	  <h1>Pending Requested Inspections</h1>
	</div>
	
	
	<table id="example" class="table table-striped table-hover top-margin-10">
			<thead>
				<tr>
					<th>#</th>
					<th>Inspection ID</th>
					<th>Inspector Name</th>
					<th>Inspector Email</th>
					<th>Created</th>
					<th>Scheduled on </th>
					<th>Status </th>
					<th>ID</th>

					
					
				</tr>
			</thead>
			<tbody>

			<?php $i = 0; foreach ($pending_inspection_list as $inspection):  $i++; ?>
			
				<tr>
					<td> <?php echo $i; ?></td>
					<td> <a href="<?php echo base_url(); ?>my/inspection_detail/<?php echo $inspection->id ?>" ><?php echo $inspection->id; ?></a></td>
					<td> <?php echo get_username($inspection->inspector_id); ?> </td>
					<td> <?php echo get_useremail($inspection->inspector_id); ?> </td>
					<td> <?php echo convert_date_mysql_to_usa($inspection->created_at); ?> </td>
					<td> <?php echo convert_date_mysql_to_usa($inspection->schedule_date); ?> </td>
					<td> <?php echo show_status($inspection->status); ?> </td>
					<td><?php echo $inspection->id; ?></td>

					
					
					
				</tr>

			<?php endforeach;?>
			</tbody>
			</table>
<?php } ?>

<?php if($this->ion_auth->in_group('inspector')) { ?>
	<div class="page-header">
	  <h1>Pending Assigned Inspections</h1>
	</div>
	
	
	<table id="example" class="table table-striped table-hover top-margin-10">
			<thead>
				<tr>
					<th>#</th>
					<th>Inspection ID</th>
					<th>Client Name</th>
					<th>Client Email</th>
					<th>Created</th>
					<th>Scheduled on </th>
					<th>Status </th>
					<th>ID</th>

					
					
				</tr>
			</thead>
			<tbody>

			<?php $i = 0; foreach ($pending_inspection_list as $inspection):  $i++; ?>
			
				<tr>
					<td> <?php echo $i; ?></td>
					<td> <a href="<?php echo base_url(); ?>my/inspection_detail/<?php echo $inspection->id ?>" ><?php echo $inspection->id; ?></a></td>
					<td> <?php echo get_username($inspection->client_id); ?> </td>
					<td> <?php echo get_useremail($inspection->client_id); ?> </td>
					<td> <?php echo convert_date_mysql_to_usa($inspection->created_at); ?> </td>
					<td> <?php echo convert_date_mysql_to_usa($inspection->schedule_date); ?> </td>
					<td> <?php echo show_status($inspection->status); ?> </td>
					<td><?php echo $inspection->id; ?></td>

					
					
					
				</tr>

			<?php endforeach;?>
			</tbody>
			</table>
<?php } ?>
</div>
