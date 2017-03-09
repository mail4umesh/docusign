<div class="navbar toolbar navbar-default">
    <div class="container">
        <div class="navbar-header">
           <a href="<?php echo base_url(); ?>inspector/add" class="btn btn-success"> <i class="glyphicon glyphicon-plus"></i> Add New</a>
           <button type="button" id="button-edit-selected" class="btn btn-default"> <i class="glyphicon glyphicon-pencil"></i> Edit</button>
           <button type="button" id="button-remove-selected" class="btn btn-default" > <i class="glyphicon glyphicon-remove"></i> Remove</button>
        </div>
    </div>          
</div>
<div class="container">
	
	<div class="panel panel-default">
        <div class="panel-heading">
          <b>Inspector</b>
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
					<th>Date Created </th>
					<th>Inspections</th>
					<th>Pending</th>
					<th>Documents</th>

					
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
						<?php 
						$date = new DateTime();
						echo $date->format('m-d-Y');
						$date->setTimestamp($user->created_on);
						?> 
					</td>	

					<td> <?php echo get_total_inspection($user->id); ?> </td>
					<td> <?php echo get_pending_inspection($user->id); ?> </td>
					<td> 
						<a href="<?php echo base_url(); ?>document/inspector_list/<?php echo $user->id ?>" ><i class="glyphicon glyphicon-th-list"></i></a> 
					</td>				
					
					<td> 
						<a href="<?php echo base_url(); ?>inspector/edit/<?php echo $user->id ?>" ><i class="glyphicon glyphicon-pencil"></i></a>
						<a href="<?php echo base_url(); ?>inspector/view/<?php echo $user->id ?>" ><i class="glyphicon glyphicon-eye-open"></i></a>
						<a href="<?php echo base_url(); ?>inspector/remove/<?php echo $user->id ?>" onclick="return confirm('Are you sure you want to delete this Inspector?')" ><i class="glyphicon glyphicon-remove"></i></a>

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
		var url = base_url + "inspector/edit/"
		
		var val = [];
		$(':checkbox:checked').each(function(i){
          val[i] = $(this).val();
        });
        if(typeof(val[0]) != "undefined" && val[0] !== null){
			window.location = url+val[0];	
		} else {
			alert("Please Select an inspector  to edit");
		}
	});

	$("#button-remove-selected").on('click',function(){
	

		
					
		var val = [];
		$(':checkbox:checked').each(function(i){
			val[i] = $(this).val();
		});
		if(typeof(val[0]) != "undefined" && val[0] !== null){

			if(confirm("Are You sure you want to remove inspector?")){
			var url = base_url + "inspector/remove/"

			

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
			alert("Please Select an inspector to Delete")
		}
			

			
	});
});
</script>