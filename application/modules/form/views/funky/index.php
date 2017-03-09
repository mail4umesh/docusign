<div class="container">
	
	<div class="panel panel-warning">
        <div class="panel-heading">
          <b>Form Product Price List</b>
        </div>
    	<div class="panel-body">
    		<row style="margin:0 0 50px 0">
    			<a href="<?php echo base_url(); ?>form/add" class="btn btn-info">Add New</a>
    		</row>
    		<row>

			<table id="example" class="table table-striped table-hover top-margin-10"  >
				<thead>
					<tr>
						<th>#</th>
						<th>Document Name</th>
						<th>Creaed on</th>
						<th>Last Update</th>
						<th>Description </th>
						<th>ID </th>
						<th>Action</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>#</th>
						<th>Document Name</th>
						<th>Creaed on</th>
						<th>Last Update</th>
						<th>Description </th>
						<th>ID </th>
						<th>Action</th>
					</tr>
				</tfoot>

				<tbody>
				<?php $i=0; foreach ($forms as $form): $i++; ?>
				
					<tr>
						<td> <?php echo $i; ?></td>
						<td> <?php echo $form->name; ?> </td>
						<td> <?php echo $form->created_at; ?> </td>
						<td> <?php echo $form->updated_at; ?> </td>
						<td> <?php echo $form->description; ?> </td>
						<td> <?php echo $form->id; ?> </td>
						

						
						
						
						<td> 
							<a href="<?php echo base_url(); ?>form/edit/<?php echo $form->id ?>" ><i class="glyphicon glyphicon-pencil"></i></a>
							<a href="<?php echo base_url(); ?>form/view/<?php echo $form->id ?>"><i class="glyphicon glyphicon-eye-open"></i></a>
							<a href="<?php echo base_url(); ?>form/remove/<?php echo $form->id ?>" onclick="return confirm('Are you sure you want to delete this form product?')" ><i class="glyphicon glyphicon-remove"></i></a>
						</td>
					</tr>

				<?php endforeach;?>
				</tbody>
			</table>
			</row>
    	</div>
    </div>
</div>