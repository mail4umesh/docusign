<?php $this->load->view('default/include/header_client.php') ?>	

<!--  ******************************************************************************************* -->
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
					<?php echo @$eform_data['field1']; ?>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-2">
					<label class = "control-label">Field 2</label>
				</div>
				<div class="col-md-4">
					<?php echo @$eform_data['field2']; ?>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-2">
					<label class = "control-label">Field 3</label>
				</div>
				<div class="col-md-4">
					<?php echo @$eform_data['field3']; ?>
				</div>
			</div>
		
	</div>

<!--  ******************************************************************************************* -->

<?php $this->load->view('default/include/footer_client.php') ?>	