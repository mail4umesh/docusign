<div class="navbar toolbar1 navbar-default">
    <div class="container">
        <div class="navbar-header">
        	<?php echo anchor('inspection','<i class="glyphicon glyphicon-arrow-left"> </i> Back','class="btn left-margin-10 btn-default "'); ?>
			<?php echo anchor('inspection/edit/'.$inspection->id,'<i class="glyphicon glyphicon-edit"> </i> Modify','class="btn left-margin-10 btn-success "'); ?>	

           
		</div>
    </div>          
</div>

<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
          <b>Inspection Detail ID : <?php echo $inspection->id; ?></b>
        </div>
    	<div class="panel-body">

			<dl class="container">

				<dt class="col-md-6">Inspection</dt>
				<dd class="col-md-6">
					<?php
						echo $inspection->id;
					?>
				</dd >

				<dt class="col-md-6">Cient</dt>
				<dd class="col-md-6">
					<?php
						echo make_detail($inspection->client_id);
					?>
				</dd >

				<dt class="col-md-6">Cient Email</dt>
				<dd class="col-md-6">
					<?php
						echo get_useremail($inspection->client_id);
					?>
				</dd >

				<dt class="col-md-6">Inspector</dt>
				<dd class="col-md-6">
					<?php
						echo make_detail($inspection->inspector_id);
					?>
				</dd>

				<dt class="col-md-6">Inspector Email</dt>
				<dd class="col-md-6">
					<?php
						echo get_useremail($inspection->inspector_id);
					?>
				</dd>

				<dt class="col-md-6">Create Date</dt>
				<dd class="col-md-6">
					<?php
						echo convert_date_mysql_to_usa($inspection->created_at);
					?>
				</dd>

				<dt class="col-md-6">Scheduled Date</dt>
				<dd class="col-md-6">
					<?php
						echo convert_date_mysql_to_usa($inspection->schedule_date);
					?>
				</dd>



			</dl>
			<hr>
			<dl class="container">

				<dt class="col-md-6">Location</dt>
				<dd class="col-md-6">
					<?php
						echo $inspection->location;
					?>
				</dd>

				<dt class="col-md-6">Address Line 1</dt>
				<dd class="col-md-6">
					<?php
						echo $inspection->address1;
					?>
				</dd>

				<dt class="col-md-6">Address Line 2</dt>
				<dd class="col-md-6">
					<?php
						echo $inspection->address2;
					?>
				</dd>

				<dt class="col-md-6">Country</dt>
				<dd class="col-md-6">
					<?php
						echo $inspection->country;
					?>
				</dd>

				<dt class="col-md-6">State</dt>
				<dd class="col-md-6">
					<?php
						echo $inspection->state;
					?>
				</dd>

				<dt class="col-md-6">City</dt>
				<dd class="col-md-6">
					<?php
						echo $inspection->city;
					?>
				</dd>

				<dt class="col-md-6">Note</dt>
				<dd class="col-md-6">
					<?php
						echo $inspection->note;
					?>
				</dd>
				

				<dt class="col-md-3">Status</dt>
				<dd class="col-md-9">
					<?php
						echo show_status($inspection->status);
						if($inspection->status == '1'){
							echo "<span class='green' > Complete</span>";
						} else {
							echo "<span class='red' > Pending</span>";
						}
					?>
				</dd>

				



			</dl>


			<div style="width: 100%">
			</div>

		</div>
	</div>
</div>

<div class="container">
	<div class="page-header">
		<h2>Form Assigned To this Inspection</h2>
	</div>

			<table id="example" class="table table-striped table-hover top-margin-10"  >
				<thead>
					<tr>
						<th>#</th>
						<th>Document Name</th>
						<th>Creaed on</th>
						<th>Client Status</th>
						<th>Inspector Status</th>

						<th>ID </th>
						
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>#</th>
						<th>Document Name</th>
						<th>Creaed on</th>
						<th>Client Status</th>
						<th>Inspector Status</th>

						<th>ID </th>
						
					</tr>
				</tfoot>

				<tbody>
				<?php $i=0; foreach ($inspection_form_list as $eform): $i++; ?>
				
					<tr>
						<td> <?php echo $i; ?></td>
						<td> <a href="<?php echo base_url(); ?>eform/load/<?php echo $eform->id ?>"><?php echo $eform->name ?></a> </td>
						<td> <?php echo convert_date_mysql_to_usa($eform->created_at); ?> </td>
						<td> <?php echo show_status($eform->client_status); ?> </td>
						<td> <?php echo show_status($eform->inspector_status); ?> </td>
						<td> <?php echo $eform->id; ?> </td>
						

						
						
						
						
					</tr>

				<?php endforeach;?>
				</tbody>
			</table>

	

</div>