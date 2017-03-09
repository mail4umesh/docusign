<div class="navbar toolbar navbar-default">
    <div class="container">
        <div class="navbar-header">
        	
        </div>
    </div>          
</div>

<div class="container">
	
	<div class="panel panel-default">
        <div class="panel-heading">
          <b>Documents</b>
        </div>
    	<div class="panel-body">
    		
    		<row>
			<table id="example" class="table table-bordered table-striped table-hover top-margin-10">
			<thead>
				<tr>
					
					
					<th colspan="2">Document ID</th>
					<th rowspan="2">Inspection ID </th>
					<th rowspan="2">Performed</th>
					<th colspan="2">Inspector </th>
					<th colspan="2">Client </th>
					<th rowspan="2">Inspector Date Sign </th>
					<th rowspan="2">Client Date Sign </th>

					
				</tr>
				<tr>
					<td width="40px">ID</td>
					<td>Name</td>
					<td width="40px">Id</td>
					<td>Name</td>
					<td width="40px">Id</td>
					<td>Name</td>
				</tr>

			</thead>
			<tbody>
			<?php foreach ($document_list as $document):?>
			
				<tr>
					
										
					<td> <a target="_blank" href="<?php echo base_url(); ?>public/documents/eform_<?php echo $document->id; ?>.pdf"> <?php echo $document->id; ?> </td>
					<td> <a target="_blank" href="<?php echo base_url(); ?>public/documents/eform_<?php echo $document->id; ?>.pdf"> <?php echo $document->name; ?> </td>
					<td> <?php echo $document->inspection_id; ?> </td>
					<td> <?php echo uk_datetime($document->updated_at); ?> </td>
					<td> <?php echo $document->inspector_id; ?> </td>
					<td> <?php echo get_username($document->inspector_id); ?> </td>
					<td> <?php echo $document->client_id; ?> </td>
					<td> <?php echo get_username($document->client_id); ?> </td>
					<td> <?php echo uk_datetime($document->inspector_date_signed); ?> </td>
					<td> 
						<?php 
						if($document->client_status == '0'){
							echo "Not Signed Yet";
						} elseif ($document->client_status == '1') {
							echo uk_datetime($document->client_date_signed); 
						} else {
							echo "Rejected";
						}
						
						?> 
					</td>
					
				</tr>


			<?php endforeach;?>
			</tbody>
			</table>
			</row>
		</div>
	</div>


</div>