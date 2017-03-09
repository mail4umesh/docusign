<div class="navbar toolbar navbar-default">
    <div class="container">
        <div class="navbar-header">
           <a href="<?php echo base_url(); ?>inspection/add" class="btn btn-success"> <i class="glyphicon glyphicon-plus"></i> Add New</a>
           <button type="button" id="button-edit-selected" class="btn btn-default"> <i class="glyphicon glyphicon-pencil"></i> Edit</button>
           <button type="button" id="button-remove-selected" class="btn btn-default" > <i class="glyphicon glyphicon-remove"></i> Remove</button>
        </div>
    </div>          
</div>

<div class="container">
	
	<div class="panel panel-default">
        <div class="panel-heading">
          <b>Inspection</b>
        </div>
    	<div class="panel-body">
    		<row>
    			
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
					<td><?php echo $i; ?> <input type="checkbox" class="check_selected" value="<?php echo $inspection->id; ?>"></td>
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

<script type="text/javascript">
$(document).ready(function(){	
	$("#button-edit-selected").on('click',function(){
		var url = base_url + "inspection/edit/"
		
		var val = [];
		$(':checkbox:checked').each(function(i){
          val[i] = $(this).val();
        });
        if(typeof(val[0]) != "undefined" && val[0] !== null){
			window.location = url+val[0];	
		} else {
			alert("Please Select an inspection to edit");
		}
	});

	$("#button-remove-selected").on('click',function(){
	

		
					
		var val = [];
		$(':checkbox:checked').each(function(i){
			val[i] = $(this).val();
		});
		if(typeof(val[0]) != "undefined" && val[0] !== null){

			if(confirm("Are You sure you want to remove inspector?")){
			var url = base_url + "inspection/remove/"

			

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
			alert("Please Select an inspection to Delete")
		}
			

			
	});
});
</script>