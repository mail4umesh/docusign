<div class="navbar toolbar navbar-default">
    <div class="container">
        <div class="navbar-header">
           <a href="<?php echo base_url(); ?>form/add" class="btn btn-success"> <i class="glyphicon glyphicon-plus"></i> Add New</a>
           <button type="button" id="button-edit-selected" class="btn btn-default"> <i class="glyphicon glyphicon-pencil"></i> Edit</button>
           <button type="button" id="button-remove-selected" class="btn btn-default" > <i class="glyphicon glyphicon-remove"></i> Remove</button>
        </div>
    </div>          
</div>

<div class="container">
	
	<div class="panel panel-default">
        <div class="panel-heading">
          <b>Form Product Price List</b>
        </div>
    	<div class="panel-body">
    		<row style="margin:0 0 50px 0">
    			
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
						<td> <?php echo $i; ?> <input type="checkbox" class="check_selected" value="<?php echo $form->id; ?>"></td>
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

<script type="text/javascript">
$(document).ready(function(){	
	$("#button-edit-selected").on('click',function(){
		var url = base_url + "form/edit/"
		
		var val = [];
		$(':checkbox:checked').each(function(i){
          val[i] = $(this).val();
        });
        if(typeof(val[0]) != "undefined" && val[0] !== null){
			window.location = url+val[0];	
		} else {
			alert("Please Select an form  to edit");
		}
	});

	$("#button-remove-selected").on('click',function(){
	

		
					
		var val = [];
		$(':checkbox:checked').each(function(i){
			val[i] = $(this).val();
		});
		if(typeof(val[0]) != "undefined" && val[0] !== null){

			if(confirm("Are You sure you want to remove inspector?")){
			var url = base_url + "form/remove/"

			

			//var ids = val.join();
				for (i = 0; i < val.length-1; i++){
					$.ajax({
		            	type : 'POST',
		            	url : url + val[i],
		            	dataType : 'html',
		            	async: true,
		            	
			            success : function(data){
			                //$('#add-task-content').html(data);
			            },
			            
	        		});

				}

				window.location = url+val[i];

			} 
		} else {
			alert("Please Select an form to Delete")
		}
			

			
	});
});
</script>