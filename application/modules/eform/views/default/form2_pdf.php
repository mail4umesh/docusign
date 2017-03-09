<?php $this->load->view('default/include/header_client.php') ?>	

<!--  ******************************************************************************************* -->
	<div class="panel-heading">
		<b>Rotary Shouldered Inspection Report</b>
	</div>
	<div class="panel-body" style="padding-left: 2%; ">
		<div class="row">
				<label class = "eform-label">Date.: </label>
				<div class="value_box" ><?php echo @$eform_data['inspection_date']; ?></div>
				<label class = "eform-label">Moter Size.: </label>
				<div class="value_box" ><?php echo @$eform_data['moter_size']; ?></div>
				<label class = "eform-label">Moter Sn.:</label>
				<div class="value_box" ><?php echo @$eform_data['moter_sn']; ?></div>
		
        </div>


			<table class="table">
				<thead>
					<tr>
						<td>#</td>
						<td>Conn</td>
						<td>Conn</td>
						<td>Box OD</td>
						<td>Pin ID</td>
						<td>Box Shoulder Width</td>
						<td>Tong Space</td>
						<td>Box CB Depth</td>
						<td>Box CB Diameter</td>
						<td>Bevel Diameter</td>
						<td>Pin Neck Length</td>
						<td>Pin Stress Releif Groove</td>
						<td>Bore Back</td>
						<td>Box Seal Width</td>
						<td>Pin Length</td>
						
					</tr>

				</thead>
				<tbody class="rotary_list">
					

					<?php if(is_array($eform_data['sr_no'])) { for($i=0; $i < sizeof($eform_data['sr_no'])-1 ; $i++ ) { ?>	
		        		<tr>
				        	
				        	<td><?php echo @$eform_data['sr_no'][$i]; ?></td>
				        	<td><?php echo @$eform_data['conn1'][$i]; ?></td>
				        	<td><?php echo @$eform_data['conn2'][$i]; ?></td>
				        	<td><?php echo @$eform_data['box_od'][$i]; ?></td>
				        	<td><?php echo @$eform_data['pin_id'][$i]; ?></td>
				        	<td><?php echo @$eform_data['box_shoulder_width'][$i]; ?></td>
				        	<td><?php echo @$eform_data['tong_space'][$i]; ?></td>
				        	<td><?php echo @$eform_data['box_cb_depth'][$i]; ?></td>
				        	<td><?php echo @$eform_data['box_cb_diameter'][$i]; ?></td>
				        	<td><?php echo @$eform_data['bevel_diameter'][$i]; ?></td>
				        	<td><?php echo @$eform_data['pin_neck_length'][$i]; ?></td>
				        	<td><?php echo @$eform_data['pin_stress_releif_groove'][$i]; ?></td>
				        	<td><?php echo @$eform_data['bore_back'][$i]; ?></td>
				        	<td><?php echo @$eform_data['box_seal_width'][$i]; ?></td>
				        	<td><?php echo @$eform_data['pin_length'][$i]; ?>

				        	

				        </td>
		        	<?php } } 	?>

					
				</tbody>
			</table>

			
			
		
	</div>




<!--  ******************************************************************************************* -->

<?php $this->load->view('default/include/footer_client.php') ?>	