<style type="text/css">

	.container .jumbotron, .container-fluid .jumbotron {
		  padding-right: 30px;
		  padding-left: 30px;
		  padding-top: 30px;
		  padding-bottom: 30px;
		  min-height: 165px;
		
		}

	.jumbotron p {
		margin: 0px;
		margin-bottom: 5px;
	}
	.jumbotron a{
		color: #FFF;
	}
	.jumbotron a:hover{
		text-decoration: underline;
	}

	.jumbotron h2{
		margin: 0px;
		margin-bottom: 15px;
	}
	.jumbotron p{
		font-size: 16px;
	}
	.jumbotron-info{
		background-color: #5bc0de;
  		border-color: #46b8da;
  		color: #FFF;
	}
	.jumbotron-success{
		color: #fff;
	  	background-color: #449d44;
  		border-color: #398439;
  	}

  	.jumbotron-warning{
  		color: #fff;
		background-color: #f0ad4e;
		border-color: #eea236;
	}
	.jumbotron-primary{
  		color: #fff;
  		background-color: #337ab7;
  		border-color: #2e6da4;
	}
	.jumbotron-danger{
		color: #fff;
		background-color: #d9534f;
		border-color: #d43f3a;
	}

	.jumbotron-black{
		color: #fff;
		background-color: #000;
		border-color: #000;
	}
	  
</style>

<div class="container top-margin-10">
	
    		

			<?php if($this->ion_auth->in_group('client') || $this->ion_auth->in_group('inspector'))  { ?>

			<div class="col-md-4">
	    		<div class="jumbotron jumbotron-danger">
				    <a href="<?php echo base_url(); ?>my/inspection_list"><h2>Inspections</h2> </a>
				    <a href="<?php echo base_url(); ?>my/inspection_list"><p>View All Inspections</p></a>

				</div>
			</div>

			<div class="col-md-4">
	    		<div class="jumbotron jumbotron-success">
				    <a href="<?php echo base_url(); ?>document"><h2>Documents</h2> </a> 
				    <a href="<?php echo base_url(); ?>documents"><p>View All Documents</p></a>
				</div>
			</div>


			<?php } ?>


			<?php if($this->ion_auth->in_group('admin')) { ?>

			<div class="col-md-4">
	    		<div class="jumbotron jumbotron-danger">
				    <a href="<?php echo base_url(); ?>inspection"><h2>Inspection</h2> </a>
				    <a href="<?php echo base_url(); ?>inspection/add"><p>Create New Inspection</p></a>
				    <a href="<?php echo base_url(); ?>inspection"><p>View All Inspections</p></a>
				</div>
			</div>

			<div class="col-md-4">
	    		<div class="jumbotron jumbotron-warning">
				    <a href="<?php echo base_url(); ?>form"><h2>Forms</h2> </a>
				    <a href="<?php echo base_url(); ?>form/add"><p>Create New Form</p></a>
				    <a href="<?php echo base_url(); ?>form"><p>View All Forms</p></a>
				</div>
			</div>

			<div class="col-md-4">
	    		<div class="jumbotron jumbotron-success">
				    <a href="<?php echo base_url(); ?>documents"><h2>Documents</h2> </a>
				    <a href="<?php echo base_url(); ?>inspection"><p>View All Documents</p></a>
				</div>
			</div>

			<div class="col-md-4">
	    		<div class="jumbotron jumbotron-info">
				    <a href="<?php echo base_url(); ?>client"><h2>Client</h2> </a>
				    <a href="<?php echo base_url(); ?>client/add"><p>Create New Client</p></a>
				    <a href="<?php echo base_url(); ?>client"><p>View All Clients</p></a>
				</div>
			</div>

			<div class="col-md-4">
	    		<div class="jumbotron jumbotron-black">
				    <a href="<?php echo base_url(); ?>inspector"><h2>Inspector</h2> </a>
				    <a href="<?php echo base_url(); ?>inspector/add"><p>Create New Inspector</p></a>
				    <a href="<?php echo base_url(); ?>inspector"><p>View All Inspector</p></a>

				</div>
			</div>


			<?php } ?>

			<div class="col-md-4">
	    		<div class="jumbotron jumbotron-primary">
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
