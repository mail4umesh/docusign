<div class="container">
<div class="panel panel-default">
	<div class="panel-heading">
		<b>Form Name Here</b>
	</div>
	<div class="panel-body" style="padding-left: 10%; ">

		<?php echo form_open('eform/do_add','class="form-horizontal"'); ?>
		

		<?php if(is_array($eform_data)) {
			echo "Yes I am having Data";

		} else {

			echo "No Data :(";
		}
		?>





			<div class="form-group">
				<div class="col-md-2">
					<label class = "control-label">Field 1</label>
				</div>
				<div class="col-md-4">

					<?php //print_r($eform_data);  

					//echo "hello";
					//echo $eform_data['field1'];





					//if (is_array($eform_data)) { if(array_key_exists("field1",$eform_data)) { $field1 = $eform_data['field1']; } }?>
					<?php echo form_input('field1',set_value('field1',@$eform_data['field1']),'class="form-control"'); ?>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-2">
					<label class = "control-label">Field 2</label>
				</div>
				<div class="col-md-4">
					<?php echo form_input('field2',set_value('field2',@$eform_data['field2']),'class="form-control"'); ?>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-2">
					<label class = "control-label">Field 3</label>
				</div>
				<div class="col-md-4">
					<?php echo form_input('field3',set_value('field3',@$eform_data['field3']),'class="form-control"'); ?>
				</div>
			</div>

			

			

				


			
			
			<p class="submit">
				<?php
					echo form_hidden('eform_id',$eform_id);
					echo anchor('#','save','class="btn left-margin-10 btn-info pull-right"');
					echo form_submit('submit',"Save & Sign",'class="left-margin-10 btn btn-info pull-right"');
					 
				?>
			</p>
		<?php echo form_close(); ?>
	</div>
</div>
</div>