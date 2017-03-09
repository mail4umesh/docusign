<?php $this->load->view('default/include/header_inspector.php') ?>

<!-- ************************************************************************************ -->


	<div class="panel-heading">
		<b>Form Name Here</b>
	</div>
	<div class="panel-body" style="padding-left: 10%; ">
		<div class="row">
		
        </div>

		
		

			<div class="form-group">
				<div class="col-md-2">
					<label class = "control-label">Field 1</label>
				</div>
				<div class="col-md-4">
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

			
		
	</div>
<!-- ************************************************************************************* -->

<?php $this->load->view('default/include/footer_inspector.php') ?>	