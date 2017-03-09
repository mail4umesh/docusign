<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

<?php 
	$client_list_array = array();
	$i=0;
	foreach ($client_list as $c) {
		$client_list_array[$i] = $c->first_name." ".$c->last_name." / ID : ".$c->id."";
		$i++;
	}

	$inspector_list_array = array();
	$i=0;
	foreach ($inspector_list as $inspector) {
		$inspector_list_array[$i] = $inspector->first_name." ".$inspector->last_name." / ID : ".$inspector->id."";
		$i++;
	}

	$form_list = array();
	foreach($forms as $form){
        $form_list[$form->id] = $form->name;
    }
?>
<?php echo form_open('inspection/do_add','class="form-horizontal" data-toggle="validator"'); ?>
<div class="navbar toolbar1 navbar-default">
    <div class="container">
        <div class="navbar-header">
        	<?php
				if(@$edit) echo form_hidden('inspection_id',@$edit[0]->id);
				$submit_value = (@$edit) ? 'Update Inspection' : 'Add Inspection';
				echo form_submit('submit',$submit_value,'class="left-margin-10 btn btn-info pull-right"');
				echo anchor('inspection','Back','class="btn left-margin-10 btn-info pull-right"'); 
			?>
           
		</div>
    </div>          
</div>

<div class="container">
<div class="panel panel-default">
	<div class="panel-heading">
		<b><?php  echo (@$edit) ? 'Update Inspection - Id = '.$edit[0]->id.'' : 'Create Inspection'; ?></b>
	</div>
	<div class="panel-body" style="padding-left: 10%; ">

		
			

			<div class="form-group">
				<div class="col-md-2">
					<label class = "control-label">Select Client</label>
				</div>
				<div class="col-md-4">
					<?php
                        $client_assignee_list = array();
                        $client_assignee_list[0] = "---- Select Client ----";
                        foreach($client_list as $client){
                            $client_assignee_list[$client->id] = $client->first_name." ".$client->last_name;
                        }
                        $selected = @$edit[0]->client_id;

                        echo form_dropdown('client', $client_assignee_list,$selected,'class="form-control"');
                    ?>

					<?php  //(@$edit) ? $client = make_detail($edit[0]->client_id) : $client = ""; ?>
					<?php //echo form_input('client',set_value('client', $client),'class="form-control" id="client"'); ?>
				</div>
			</div>


			<div class="form-group">
				<div class="col-md-2">
					<label class = "control-label">Select Inspector</label>
				</div>
				<div class="col-md-4">
					<?php
                        $inspector_assignee_list = array();
                        $inspector_assignee_list[0] = "---- Select Inspector ----";
                        foreach($inspector_list as $client){
                            $inspector_assignee_list[$client->id] = $client->first_name." ".$client->last_name;
                        }
                        $selected = @$edit[0]->inspector_id;

                        echo form_dropdown('inspector', $inspector_assignee_list,$selected,'class="form-control"');
                    ?>
					<?php  //(@$edit) ? $inspector = make_detail($edit[0]->inspector_id) : $inspector = ""; ?>
					<?php //echo form_input('inspector',set_value('inspector',$inspector),'class="form-control" id="inspector"'); ?>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-2">
					<label class = "control-label">Scheduled Date</label>
				</div>
				<div class="col-md-4">
					<?php echo form_input('schedule_date',set_value('schedule_date',convert_date_mysql_to_usa(@$edit[0]->schedule_date)),'class="form-control datepicker" placeholder = "Select Date" data-error="Please select a schedule date" required'); ?>
				</div>
			</div>
			
			<hr>

			<div class="form-group">
				<div class="col-md-2">
					<label class = "control-label">Location Name</label>
				</div>
				<div class="col-md-4">
					<?php echo form_input('location',set_value('location',@$edit[0]->location),'class="form-control" data-error="Please enter a schedule date" required'); ?>
					<span class="help-block with-errors"></span>
				</div>
			</div>


			<div class="form-group">
				<div class="col-md-2">
					<label class = "control-label">Address Line 1</label>
				</div>
				<div class="col-md-4">
					<?php echo form_input('address1',set_value('address1',@$edit[0]->address1),'class="form-control" data-error="Please enter address line 1" required'); ?>
					<span class="help-block with-errors"></span>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-2">
					<label class = "control-label">Address Line 2</label>
				</div>
				<div class="col-md-4">
					<?php echo form_input('address2',set_value('address2',@$edit[0]->address2),'class="form-control" data-error="Please enter address line 2"'); ?>
					<span class="help-block with-errors"></span>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-2">
					<label class = "control-label">Country</label>
				</div>
				<div class="col-md-4">
					<?php echo form_input('country',set_value('country',@$edit[0]->country),'class="form-control" data-error="Please enter country" required'); ?>
					<span class="help-block with-errors"></span>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-2">
					<label class = "control-label">State</label>
				</div>
				<div class="col-md-4">
					<?php echo form_input('state',set_value('state',@$edit[0]->state),'class="form-control" data-error="Please enter state" required'); ?>
					<span class="help-block with-errors"></span>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-md-2">
					<label class = "control-label">City</label>
				</div>
				<div class="col-md-4">
					<?php echo form_input('city',set_value('city',@$edit[0]->city),'class="form-control" data-error="Please enter city" required'); ?>
					<span class="help-block with-errors"></span>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-md-2">
					<label class = "control-label">Notes</label>
				</div>
				<div class="col-md-8">
					<textarea name="note" rows="10" class="form-control" placeholder = "Notes Description" ><?php echo set_value('note',@$edit[0]->note); ?></textarea>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-md-2">
					<label class = "control-label">Add Form</label>
				</div>
				<div class="col-md-8">
					<div class="formlist">
					<?php if(@$edit) {
						
						$form_ids = $edit[0]->forms;
						$form_array = explode(",", $form_ids);
						
						$form_array_size =  sizeof($form_array);

						for($i = 0; $i<$form_array_size; $i++){
							
				            $selected = $form_array[$i];
		                   	echo form_dropdown('forms[]', $form_list, $selected,'class="form-control forms top-margin-10"');
		                   	if($i>0)echo '<button type="button" class="btn btn-sm btn-danger remove-button">Remove</button>';
				            
						}
					} else { 

			                $selected = "";
	                    	echo form_dropdown('forms[]', $form_list, $selected,'class="form-control"');
			        }
			        ?>
			        </div>
			        <div id="temp"></div>
			        
			        <a class="btn btn-info top-margin-10 add-form-button">Add Another Form</a>
				</div>

				
			</div>


			<p class="submit">
				
			</p>

		
	</div>
</div>

</div>
</div>
<?php echo form_close(); ?>

<script type="text/javascript">
	var client_list = [<?php echo '"'.implode('","', $client_list_array).'"' ?>];

    $( "#client" ).autocomplete({
      source: client_list,
      
      
    });

	var inspector_list = [<?php echo '"'.implode('","', $inspector_list_array).'"' ?>];


	$( "#inspector" ).autocomplete({
      source: inspector_list,
     
    });


    

    $(".add-form-button").on("click",function(){
    	
    	var url = base_url + "inspection/add_inspection";
        $("#temp").load(url);
        $(".formlist").append($("#temp").html());
    });


    $(".remove-button").on("click",function(){
       	$(this).prev(".forms").remove();
    	$(this).remove(); 
    });


     
</script>