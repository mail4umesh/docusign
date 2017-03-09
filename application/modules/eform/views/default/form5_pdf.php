<?php $this->load->view('default/include/header_client.php') ?>	

<!--  ******************************************************************************************* -->
	<style type="text/css">
		.wide{
			width: 2000px;
		}
	
		
	</style>

	<div class="panel-heading wide">
		<b>Dimensional Inspection Report</b>
	</div>
	<div class="panel-body wide" style="padding-left: 2%;">
		<table>
		<tr>
			<td width="15%">
				<img src="<?php echo base_url(); ?>assets/themes/default/img/logo.jpg">
			</td>

			<td width="25%">
				<center>
					<h2>Dimensional Inspection Report</h2>
					<p>16770 HEDGECROFT DR, SUITE 710</p>
					<p>HOUSTON, TX 77060</p>
					<p>281-741-1347</p>
				</center>
				
			</td>

			<td width="60%">
				<table class="table">
					<tr>
						<td width="30%">
							<label class = "eform-label">INVOICE #.: </label>
							<div class="value_box" ><?php echo @$eform_data['invoice']; ?></div>

							<label class = "eform-label">CUSTOMER.: </label>
							<div class="value_box" ><?php echo @$eform_data['customer']; ?></div>

							<label class = "eform-label">RIG.: </label>
							<div class="value_box" ><?php echo @$eform_data['rig']; ?></div>

							<label class = "eform-label">OCSG.: </label>
							<div class="value_box" ><?php echo @$eform_data['ocsg']; ?></div>

							<label class = "eform-label">AEF#.: </label>
							<div class="value_box" ><?php echo @$eform_data['aef']; ?></div>
						</td>

						<td width="40%">
							<label class = "eform-label">INSPECTION REPORT.: </label>
							<div class="value_box" ><?php echo @$eform_data['inspection_report']; ?></div>

							<label class = "eform-label">WELL#.: </label>
							<div class="value_box" ><?php echo @$eform_data['well_no']; ?></div>

							<label class = "eform-label">BLOCK#.: </label>
							<div class="value_box" ><?php echo @$eform_data['block']; ?></div>

							<label class = "eform-label">LEASE#.: </label>
							<div class="value_box" ><?php echo @$eform_data['lease']; ?></div>

							<label class = "eform-label">PO#.: </label>
							<div class="value_box" ><?php echo @$eform_data['po_no']; ?></div>


						</td>

						<td width="30%">
							<label class = "eform-label">DIM. REPORT#.: </label>
							<div class="value_box" ><?php echo @$eform_data['dim_report_no']; ?></div>

							<label class = "eform-label">CATEGORY#.: </label>
							<div class="value_box" ><?php echo @$eform_data['category']; ?></div>

							<label class = "eform-label">METHOD#.: </label>
							<div class="value_box" ><?php echo @$eform_data['method']; ?></div>

							<label class = "eform-label">JOB SITE#.: </label>
							<div class="value_box" ><?php echo @$eform_data['job_site']; ?></div>

							<label class = "eform-label">JOB #.: </label>
							<div class="value_box" ><?php echo @$eform_data['job_no']; ?></div>


						</td>


					</tr>	
				</table>
			</td>
		</tr>
        </table>

		
		<table class="table table-bordered">
		<thead>
			<tr>
				<td rowspan="2" width="50px">#</td>
				<td rowspan="2" width="50px">Serial Number</td>
				<td rowspan="2" width="150px">Description</td>
				<td rowspan="2" colspan="2" width="50px">Connection Type</td>
				<td rowspan="2">I.D. O.D</td>
				<td rowspan="2">Profile</td>
				<td rowspan="2">F. Neck & Tong Length</td>
				<td rowspan="2">Bevel Dia</td>
				<td rowspan="2">Seal Width</td>
				<td rowspan="2">Pin Length</td>
				<td rowspan="2">Pin Cyl. Dia.</td>
				<td colspan="2">REL. GRC. PIN</td>
				<td colspan="2">C' BORE BOX</td>
				<td rowspan="2">Last Scratch Box</td>
				<td rowspan="2">Boreback Length</td>
				<td rowspan="2">Boreback Dia.</td>
				<td rowspan="2">Overall Length</td>
				<td rowspan="2" width="200px">Comments</td>
				<td rowspan="2">FULL BODY RESULT</td>
				<td rowspan="2">CONN NDE RESULT</td>
				
			</tr>
			<tr>
				<td >Lgth</td>
				<td >Dia</td>
				<td >Lgth</td>
				<td >Dia</td>
			</tr>
		</thead>
			
<!-- ******************************************************************************************* -->
		<tbody class="dimensional_inspection_list">
			

<!-- ******************************************************************************************* -->
			


<!-- ******************************************************************************************* -->
			<?php if(is_array($eform_data['sr_no'])) { for($i=0; $i < sizeof($eform_data['sr_no'])-1 ; $i++ ) { ?>
			<tr>
					<td rowspan="2"><?php echo @$eform_data['sr_no'][$i]; ?></td>
					<td rowspan="2"><?php echo @$eform_data['serial_no'][$i]; ?></td>

				<td><?php echo @$eform_data['description1'][$i]; ?></td>
				<td><?php echo @$eform_data['connection_type1'][$i]; ?></td>
				<th style="padding:8px">PIN</th>
				<td><?php echo @$eform_data['i_d_o_d1'][$i]; ?></td>
				<td><?php echo @$eform_data['profile1'][$i]; ?></td>

				<td><?php echo @$eform_data['f_neck_and_tong1'][$i]; ?></td>
				
				<td><?php echo @$eform_data['bevel_dia1'][$i]; ?></td>
				<td><?php echo @$eform_data['seal_width1'][$i]; ?></td>
				<td><?php echo @$eform_data['pin_length1'][$i]; ?></td>
				<td><?php echo @$eform_data['pin_cyl_dia1'][$i]; ?></td>
				<td><?php echo @$eform_data['rel_grc_pin_lgth1'][$i]; ?></td>
				<td><?php echo @$eform_data['rel_grc_pin_dia1'][$i]; ?></td>
				<td><?php echo @$eform_data['c_bore_box_lgth1'][$i]; ?></td>
				<td><?php echo @$eform_data['c_bore_box_dia1'][$i]; ?></td>
				<td><?php echo @$eform_data['last_scratch_box1'][$i]; ?></td>
				<td><?php echo @$eform_data['boreback_length1'][$i]; ?></td>
				<td><?php echo @$eform_data['boreback_dia1'][$i]; ?></td>
				<td><?php echo @$eform_data['overall_length1'][$i]; ?></td>
				<td><?php echo @$eform_data['comments1'][$i]; ?></td>
					<td rowspan="2">
						<?php echo @$eform_data['full_body_length1'][$i]; ?>
					</td>
				<td>
						
					<?php echo @$eform_data['conn_nde_result1'][$i]; ?>
				</td>
					
				
			</tr>

			<tr>

				<td><?php echo @$eform_data['description2'][$i]; ?></td>
				<td><?php echo @$eform_data['connection_type2'][$i]; ?></td>
				<th style="padding:8px">BOX</th>
				<td><?php echo @$eform_data['i_d_o_d2'][$i]; ?></td>
				<td>
					<?php echo @$eform_data['profile2'][$i]; ?>
				</td>
				<td><?php echo @$eform_data['f_neck_and_tong2'][$i]; ?></td>
				<td><?php echo @$eform_data['bevel_dia2'][$i]; ?></td>
				<td><?php echo @$eform_data['seal_width2'][$i]; ?></td>
				<td><?php echo @$eform_data['pin_length2'][$i]; ?></td>
				<td><?php echo @$eform_data['pin_cyl_dia2'][$i]; ?></td>
				<td><?php echo @$eform_data['rel_grc_pin_lgth2'][$i]; ?></td>
				<td><?php echo @$eform_data['rel_grc_pin_dia2'][$i]; ?></td>
				<td><?php echo @$eform_data['c_bore_box_lgth2'][$i]; ?></td>
				<td><?php echo @$eform_data['c_bore_box_dia2'][$i]; ?></td>
				<td><?php echo @$eform_data['last_scratch_box2'][$i]; ?></td>
				<td><?php echo @$eform_data['boreback_length2'][$i]; ?></td>
				<td><?php echo @$eform_data['boreback_dia2'][$i]; ?></td>
				<td><?php echo @$eform_data['overall_length2'][$i]; ?></td>
				<td><?php echo @$eform_data['comments2'][$i]; ?></td>
				<td><?php echo @$eform_data['conn_nde_result2'][$i]; ?>
				</td>


			</tr>
			<?php } } ?>
		</tbody>
<!-- ******************************************************************************************* -->

		</table>

			


		<table class="table" style="margin-top:20px">
			<tr>
				<td width="30%">
					<label class = "eform-label">COIL S/N:. </label>
					<div class="value_box" ><?php echo @$eform_data['coil_sn']; ?></div>

					<label class = "eform-label">Size:. </label>
					<div class="value_box" ><?php echo @$eform_data['size']; ?></div>

					<label class = "eform-label">CALIBRATION DATE:. </label>
					<div class="value_box" ><?php echo @$eform_data['calibration_date1']; ?></div>

					<label class = "eform-label">BLACKLIGHT METER S/N::. </label>
					<div class="value_box" ><?php echo @$eform_data['calibration_date']; ?></div>

					<label class = "eform-label">CALIBRATION DATE:. </label>
					<div class="value_box" ><?php echo @$eform_data['calibration_date2']; ?></div>


					<label class = "eform-label">BLACKLIGHT INTENSITY:. </label>
					<div class="value_box" ><?php echo @$eform_data['blacklight_intensity']; ?></div>

					<label class = "eform-label">GAUSS METER S/N:. </label>
					<div class="value_box" ><?php echo @$eform_data['gauss_meter_sn']; ?></div>

					<label class = "eform-label">CALIBRATION DATE:. </label>
					<div class="value_box" ><?php echo @$eform_data['calibration_date3']; ?></div>



				</td>

				<td width="2%">
				</td>

				<td width="33%">

					<label class = "eform-label">FLUORESCENT PARTICLES BRAND:. </label>
					<div class="value_box" ><?php echo @$eform_data['flourescent_prtical_brand']; ?></div>

					<label class = "eform-label">BATH STRENGTH:. </label>
					<div class="value_box" ><?php echo @$eform_data['bath_strength']; ?></div>
					
					<label class = "eform-label">AC YOKE S/N::. </label>
					<div class="value_box" ><?php echo @$eform_data['ac_yoke_sn']; ?></div>

					<label class = "eform-label">PENETRANT BRAND:. </label>
					<div class="value_box" ><?php echo @$eform_data['penetrant_brand']; ?></div>

					<label class = "eform-label">DEVELOPER BRAND::. </label>
					<div class="value_box" ><?php echo @$eform_data['developer_brand']; ?></div>
									
				</td>

				<td width="2%">
				</td>

				<td width="33%">

					<label class = "eform-label">BATCH:. </label>
					<div class="value_box" ><?php echo @$eform_data['batch11']; ?></div>

					<label class = "eform-label">ML/100ML:. </label>
					<div class="value_box" ><?php echo @$eform_data['ml_per_100']; ?></div>

					<label class = "eform-label">10 LB BLOCK S/N:. </label>
					<div class="value_box" ><?php echo @$eform_data['lb_block_sn']; ?></div>

					<label class = "eform-label">BATCH:. </label>
					<div class="value_box" ><?php echo @$eform_data['batch12']; ?></div>

					<label class = "eform-label">Batch:. </label>
					<div class="value_box" ><?php echo @$eform_data['batch13']; ?></div>


				</td>

			</tr>
		</table>


			
		
	</div>
<!-- ************************************************************************************* -->

<!--  ******************************************************************************************* -->

<?php $this->load->view('default/include/footer_client.php') ?>	