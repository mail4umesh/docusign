<div class="navbar toolbar navbar-default">
    <div class="container">
        <div class="navbar-header">
           <a href="<?php echo base_url(); ?>users/add" class="btn btn-success"> <i class="glyphicon glyphicon-plus"></i> Add New</a>
           <button type="button" id="button-edit-selected" class="btn btn-default"> <i class="glyphicon glyphicon-pencil"></i> Edit</button>
           <button type="button" id="button-remove-selected" class="btn btn-default" > <i class="glyphicon glyphicon-remove"></i> Remove</button>
        </div>
    </div>          
</div>

<div class="container">
	
	<div class="panel panel-default">
        <div class="panel-heading">
          <b>Users</b>
        </div>
    	<div class="panel-body">
    		<row>
   
    		</row>
    		<row>
			<table id="example" class="table table-striped table-hover top-margin-10">
			<thead>
				<tr>
					<th></th>
					<th>Name</th>
					<th>Email </th>
					<th>Phone </th>

					
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($users as $user):?>
			
				<tr>
					<td> <input type="checkbox" class="check_selected" value="<?php echo $user->id ?>"> </td>
					<td> <?php echo $user->first_name." ".$user->last_name; ?> </td>
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

<script type="text/javascript">
$(document).ready(function(){	
	$("#button-edit-selected").on('click',function(){
		var url = base_url + "users/edit/"
		
		var val = [];
		$(':checkbox:checked').each(function(i){
          val[i] = $(this).val();
        });
        if(typeof(val[0]) != "undefined" && val[0] !== null){
			window.location = url+val[0];	
		} else {
			alert("Please Select an admin user  to edit");
		}
	});

	$("#button-remove-selected").on('click',function(){
	

		
					
		var val = [];
		$(':checkbox:checked').each(function(i){
			val[i] = $(this).val();
		});
		if(typeof(val[0]) != "undefined" && val[0] !== null){

			if(confirm("Are You sure you want to remove admin user?")){
			var url = base_url + "users/remove/"

			

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
			alert("Please Select an admin user to Delete")
		}
			

			
	});
});
</script>