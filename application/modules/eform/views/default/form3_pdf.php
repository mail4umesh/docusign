<?php $this->load->view('default/include/header_client.php') ?>	

<!--  ******************************************************************************************* -->


<div class="panel-heading">
		<b>FIELD INSPECTION REPORT</b>
	</div>
	<div class="panel-body" style="padding-left: 2%; ">
		<table class="table">
		<tr>
			<td width="35%">
				<img src="<?php echo base_url(); ?>assets/themes/default/img/logo.jpg">
			</td>

			<td width="35%">>
				<center>
					<p>FIELD INSPECTION REPORT</p>
					<p>16770 HEDGECROFT DR, SUITE 710</p>
					<p>HOUSTON, TX 77060</p>
					<p>281-741-1347</p>
				</center>
				
			</td>

			<td width="30%">
			</td>
        </tr>	
        </table>

		
		<table class="table">
		<tr>
        	<td width="34%">

        		<label class = "eform-label">Customer Name.: </label>
				<div class="value_box" ><?php echo @$eform_data['customer']; ?></div>
        		
        		<label class = "eform-label">Customer No.: </label>
				<div class="value_box" ><?php echo @$eform_data['customer_no']; ?></div>
        	
        		<label class = "eform-label">Address.: </label>
				<div class="value_box" ><?php echo @$eform_data['address']; ?></div>
        		
        		<label class = "eform-label">City.: </label>
				<div class="value_box" ><?php echo @$eform_data['city']; ?></div>

				<label class = "eform-label">State.: </label>
				<div class="value_box" ><?php echo @$eform_data['state']; ?></div>

				<label class = "eform-label">Zip.: </label>
				<div class="value_box" ><?php echo @$eform_data['zip']; ?></div>

		
        	</td>

        	<td width="33%">

        		<label class = "eform-label">Job Site.: </label>
				<div class="value_box" ><?php echo @$eform_data['job_site']; ?></div>
        		
        		<label class = "eform-label">Job #.: </label>
				<div class="value_box" ><?php echo @$eform_data['job_no']; ?></div>
        	
        		        		
        		<label class = "eform-label">PO No.: </label>
				<div class="value_box" ><?php echo @$eform_data['po_no']; ?></div>
        	
        		<label class = "eform-label">Inspection Method:</label>
				<div class="value_box" ><?php echo @$eform_data['inspection_method']; ?></div>
        	
        		<label class = "eform-label">Charge To.: </label>
				<div class="value_box" ><?php echo @$eform_data['charge_to']; ?></div>


        	</td>

        	<td width="33%">

        		<label class = "eform-label">Reports Included: </label>
				<div class="value_box" ><?php echo @$eform_data['report_include']; ?></div>
        		
        		<label class = "eform-label">Inspection Date.: </label>
				<div class="value_box" ><?php echo @$eform_data['inspection_date']; ?></div>
        	
        		<label class = "eform-label"> Ordered By.: </label>
				<div class="value_box" ><?php echo @$eform_data['order_by']; ?></div>
        		
        		<label class = "eform-label">Rig.: </label>
				<div class="value_box" ><?php echo @$eform_data['rig']; ?></div>
        	
        		<label class = "eform-label">Lease.: </label>
				<div class="value_box" ><?php echo @$eform_data['lease']; ?></div>

				<label class = "eform-label">Well Name.: </label>
				<div class="value_box" ><?php echo @$eform_data['well_name']; ?></div>


        	</td>

        </tr>	
        </table>

		
			<table class="table table-bordered top-margin-10">
				<thead>
					<tr>
						<th rowspan="2" width="30px">#</th>
						<th rowspan="2">Serial No</th>
						<th rowspan="2">Connection Size Pin</th>
						<th rowspan="2">ID Pin</th>
						<th rowspan="2">Connection Size Box</th>
						<th rowspan="2">OD Box</th>
						<th rowspan="2">Description</th>
						<th colspan="3"> <center>INSPECTION RESULTS</center></th>
						<th rowspan="2">SH TO SH LENGTH</th>
						
						
					</tr>

					<tr>
						<th>Pin</th>
						<th>Body</th>
						<th>Box</th>
					</tr>


				</thead>

				<tbody class="field_inspection_list">

					<?php if(is_array($eform_data['sr_no'])) { for($i=0; $i < sizeof($eform_data['sr_no'])-1 ; $i++ ) { ?>	
		        		<tr>
				        	
				        	<td><?php echo @$eform_data['sr_no'][$i]; ?></td>
							<td><?php echo @$eform_data['serial_no'][$i]; ?></td>
							<td><?php echo @$eform_data['connection_size_pin'][$i]; ?></td>
							<td><?php echo @$eform_data['id_pin'][$i]; ?></td>
							<td><?php echo @$eform_data['connection_size_box'][$i]; ?></td>
							<td><?php echo @$eform_data['od_box'][$i]; ?></td>
							<td><?php echo @$eform_data['description'][$i]; ?></td>
							<td><?php echo @$eform_data['pin'][$i]; ?></td>
							<td><?php echo @$eform_data['body'][$i]; ?></td>
							<td><?php echo @$eform_data['box'][$i]; ?></td>
							<td><?php echo @$eform_data['sh_to_sh_length'][$i]; ?></td>

				        </td>
		        	<?php } } 	?>
					

					
				</tbody>


			</table>

			


		<table class="table">
		<tr>
        	<td width="50%">
        		<label class = "eform-label">White Light.: </label>
				<div class="value_box" ><?php echo @$eform_data['white_light']; ?></div>
        		
        		<label class = "eform-label">Calibration Date.: </label>
				<div class="value_box" ><?php echo @$eform_data['calibration_date1']; ?></div>
        	
        		<label class = "eform-label">White Light Intensity.: </label>
				<div class="value_box" ><?php echo @$eform_data['white_light_intensity']; ?></div>
        		
        		<label class = "eform-label">Profile gauge.: </label>
				<div class="value_box" ><?php echo @$eform_data['profile_gauge']; ?></div>

				<label class = "eform-label">Calibration Date.: </label>
				<div class="value_box" ><?php echo @$eform_data['calibration_date2']; ?></div>


        	</td>
        	<td width="30%">

        		<label class = "eform-label">Penetrant Brand.: </label>
				<div class="value_box" ><?php echo @$eform_data['penetrant_brand']; ?></div>
        		
        		<label class = "eform-label">Developer Brand.: </label>
				<div class="value_box" ><?php echo @$eform_data['developer_brand']; ?></div>
        	
        		        		
        		<label class = "eform-label">Dwell Time.: </label>
				<div class="value_box" ><?php echo @$eform_data['dwell_time']; ?></div>
        	
        		<label class = "eform-label">Drying Time:</label>
				<div class="value_box" ><?php echo @$eform_data['drying_time']; ?></div>
        	
        		<label class = "eform-label">Drying Method.: </label>
				<div class="value_box" ><?php echo @$eform_data['drying_method']; ?></div>


        	</td>
        	<td width="20%">

        		<label class = "eform-label">Batch: </label>
				<div class="value_box" ><?php echo @$eform_data['batch1']; ?></div>
        		
        		<label class = "eform-label">Batch.: </label>
				<div class="value_box" ><?php echo @$eform_data['batch2']; ?></div>
        	
        	</td>

        </tr>	
        </table>
        <div class="row col-md-12"></div>

        <table class="table">
        <tr>

        	<td width="2%">
        		<?php @$eform_data['magnetic_particle_inspection'] == "y" ? $checked = 'check' : $checked="empty"  ?>
        		<p style="margin-top:10px"><img style="float:left" src="<?php echo base_url(); ?>assets/themes/default/img/<?php echo $checked; ?>.png"></p>
        	</td>
        	<td width="23%">
        		<label class = "eform-label"> Magnetic Particle Inspection: </label>
			</td>



        	<td width="2%">
        		<?php @$eform_data['liquid_penetrant_inspection'] == "y" ? $checked = 'check' : $checked="empty"  ?>
        		<p style="margin-top:10px"><img style="float:left" src="<?php echo base_url(); ?>assets/themes/default/img/<?php echo $checked; ?>.png"></p>
        	</td>
        	<td width="23%">
        		<label class = "eform-label"> Liquid Penetrant Inspection: </label>
			</td>	

        	

        	<td width="2%">
        		<?php @$eform_data['visual_inspection'] == "y" ? $checked = 'check' : $checked="empty"  ?>
        		<p style="margin-top:10px"><img style="float:left" src="<?php echo base_url(); ?>assets/themes/default/img/<?php echo $checked; ?>.png"></p> 
        	</td>
        	<td width="23%">	
        		<label class = "eform-label"> Visual Inspection: </label>
			</td>

        	

        	<td width="2%">
        		<?php @$eform_data['utlrasonic_inspection'] == "y" ? $checked = 'check' : $checked="empty"  ?>
        		<p style="margin-top:10px"><img style="float:left" src="<?php echo base_url(); ?>assets/themes/default/img/<?php echo $checked; ?>.png"></p>
        	</td>
        	<td width="23%">
        		<label class = "eform-label"> Utlrasonic Inspection: </label>
				
        	</td>


        </tr>	
        </table>

        <div class="row top-margin-10">
        	<div class="col-md-1 top-margin-10"><b>summary</b></div>
        	<div class="col-md-8">
		    	<p><?php echo @$eform_data['summary']; ?></p>
		    </div>
		</div>

		<div class="row col-md-12"></div>
	</div>



</script>	

<!--  ******************************************************************************************* -->

<?php $this->load->view('default/include/footer_client.php') ?>	