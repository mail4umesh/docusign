<?php $this->load->view('default/include/header_inspector.php') ?>

<!-- ************************************************************************************ -->
	<style type="text/css">
		.wide{
			width: 2200px;
		}
	
		.eform-control2 {
	    border-radius: 0px;
	    border: 0px solid #ddd;
		}
		.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
		    padding: 0px;
		    line-height: 1.42857143;
		    vertical-align: top;
		    border-top: 1px solid #ddd;
	   	}
	</style>

	<div class="panel-heading wide">
		<b>Dimensional Inspection Report</b>
	</div>
	<div class="panel-body wide" style="padding-left: 2%;">
		<div class="row">
			<div class="col-md-2">
				<img src="/assets/themes/default/img/logo.jpg">
			</div>

			<div class="col-md-3" style="margin-top:15px">
				<center>
					<h2>Dimensional Inspection Report</h2>
					<p>16770 HEDGECROFT DR, SUITE 710</p>
					<p>HOUSTON, TX 77060</p>
					<p>281-741-1347</p>
				</center>
				
			</div>

			<div class="col-md-7">
				<table class="table">
					<tr>
						<td width="30%">
							<label class = "eform-label">INVOICE #.: </label>
							<?php echo form_input('invoice',set_value('invoice',@$eform_data['invoice']),'class="eform-control"'); ?>

							<label class = "eform-label">CUSTOMER.: </label>
							<?php echo form_input('customer',set_value('customer',@$eform_data['customer']),'class="eform-control"'); ?>

							<label class = "eform-label">RIG.: </label>
							<?php echo form_input('rig',set_value('rig',@$eform_data['rig']),'class="eform-control"'); ?>

							<label class = "eform-label">OCSG.: </label>
							<?php echo form_input('ocsg',set_value('ocsg',@$eform_data['ocsg']),'class="eform-control"'); ?>

							<label class = "eform-label">AEF#.: </label>
							<?php echo form_input('aef',set_value('aef',@$eform_data['aef']),'class="eform-control"'); ?>
						</td>

						<td width="40%">
							<label class = "eform-label">INSPECTION REPORT.: </label>
							<?php echo form_input('inspection_report',set_value('inspection_report',@$eform_data['inspection_report']),'class="eform-control"'); ?>

							<label class = "eform-label">WELL#.: </label>
							<?php echo form_input('well_no',set_value('well_no',@$eform_data['well_no']),'class="eform-control"'); ?>

							<label class = "eform-label">BLOCK#.: </label>
							<?php echo form_input('block',set_value('block',@$eform_data['block']),'class="eform-control"'); ?>

							<label class = "eform-label">LEASE#.: </label>
							<?php echo form_input('lease',set_value('lease',@$eform_data['lease']),'class="eform-control"'); ?>

							<label class = "eform-label">PO#.: </label>
							<?php echo form_input('po_no',set_value('po_no',@$eform_data['po_no']),'class="eform-control"'); ?>


						</td>

						<td width="30%">
							<label class = "eform-label">DIM. REPORT#.: </label>
							<?php echo form_input('dim_report_no',set_value('dim_report_no',@$eform_data['dim_report_no']),'class="eform-control"'); ?>

							<label class = "eform-label">CATEGORY#.: </label>
							<?php 
								$options = array(
								                  '1'  	=> '1',
								                  '2'   => '2',
								                  '3'   => '3',
								                  '4' 	=> '4',
								                  '5' 	=> '5',
								                );

								$selected = @$eform_data['category'];

								echo form_dropdown('category', $options, $selected, 'class="eform-control"' );
							?>
							<?php //echo form_input('category',set_value('category',@$eform_data['category']),'class="eform-control"'); ?>

							<label class = "eform-label">METHOD#.: </label>
							<?php 
								$options = array(
								                  'MT'  => 'MT',
								                  'PT'  => 'PT',
								                  'UT'  => 'UT',
								                  'VT' 	=> 'VT',
								                );

								$selected = @$eform_data['method'];

								echo form_dropdown('method', $options, $selected, 'class="eform-control"' );
							?>

							<?php //echo form_input('method',set_value('method',@$eform_data['method']),'class="eform-control"'); ?>

							<label class = "eform-label">JOB SITE#.: </label>
							<?php echo form_input('job_site',set_value('job_site',@$eform_data['job_site']),'class="eform-control"'); ?>

							<label class = "eform-label">JOB #.: </label>
							<?php echo form_input('job_no',set_value('job_no',@$eform_data['job_no']),'class="eform-control"'); ?>


						</td>


					</tr>	
				</table>
			</div>
        </div>

		
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
				<td rowspan="2"></td>
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
			<?php if(!is_array($eform_data['sr_no'])) { ?>
			<tr>
					<td rowspan="2"><?php echo form_input('sr_no[]',set_value('sr_no', ""),'class="eform-control2" style="height: 62px"'); ?></td>
					<td rowspan="2"><?php echo form_input('serial_no[]',set_value('serial_no', ""),'class="eform-control2" style="height: 62px" '); ?></td>

				<td><?php echo form_input('description1[]',set_value('description1', ""),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('connection_type1[]',set_value('connection_type1', ""),'class="eform-control2"'); ?></td>
				<th style="padding:8px">PIN</td>
				<td><?php echo form_input('i_d_o_d1[]',set_value('i_d_o_d1', ""),'class="eform-control2"'); ?></td>
				<td>
					<?php 
								$options = array(
								                  'OK'  => 'OK',
								                  'Reject'  => 'Reject',
								                );

								$selected = "";

								echo form_dropdown('profile1[]', $options, $selected, 'style="margin-top:8px"' );
						?>
					<?php //echo form_input('profile1[]',set_value('profile1', ""),'class="eform-control2"'); ?>
				</td>
				<td><?php echo form_input('f_neck_and_tong1[]',set_value('f_neck_and_tong1', ""),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('bevel_dia1[]',set_value('bevel_dia1', ""),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('seal_width1[]',set_value('seal_width1', ""),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('pin_length1[]',set_value('pin_length1', ""),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('pin_cyl_dia1[]',set_value('pin_cyl_dia1', ""),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('rel_grc_pin_lgth1[]',set_value('rel_grc_pin_lgth1', ""),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('rel_grc_pin_dia1[]',set_value('rel_grc_pin_dia1', ""),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('c_bore_box_lgth1[]',set_value('c_bore_box_lgth1', ""),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('c_bore_box_dia1[]',set_value('c_bore_box_dia1', ""),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('last_scratch_box1[]',set_value('last_scratch_box1', ""),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('boreback_length1[]',set_value('boreback_length1', ""),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('boreback_dia1[]',set_value('boreback_dia1', ""),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('overall_length1[]',set_value('overall_length1', ""),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('comments1[]',set_value('comments1', ""),'class="eform-control2"'); ?></td>
					<td rowspan="2">
						<?php 
								$options = array(
								                  'OK'  => 'OK',
								                  'Reject'  => 'Reject',
								                );

								$selected = "";

								echo form_dropdown('full_body_length1[]', $options, $selected, 'style="margin-top:25px"' );
						?>
						<?php //echo form_input('full_body_length1[]',set_value('full_body_length1', ""),'class="eform-control2" style="height: 62px"'); ?>
					</td>
				<td>
						<?php 
								$options = array(
								                  'OK'  => 'OK',
								                  'Reject'  => 'Reject',
								                );

								$selected = "";

								echo form_dropdown('conn_nde_result1[]', $options, $selected, 'style="margin-top:8px"' );
						?>
					<?php //echo form_input('conn_nde_result1[]',set_value('conn_nde_result1', ""),'class="eform-control2"'); ?>
				</td>
					<td rowspan="2"><a href="#remove-item" class="red remove-button"><i class="glyphicon glyphicon-remove-circle" style="font-size:24px"></i></a></td>
				
			</tr>

			<tr>

				<td><?php echo form_input('description2[]',set_value('description2', ""),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('connection_type2[]',set_value('connection_type2', ""),'class="eform-control2"'); ?></td>
				<th style="padding:8px">BOX</td>
				<td><?php echo form_input('i_d_o_d2[]',set_value('i_d_o_d2', ""),'class="eform-control2"'); ?></td>
				<td>
					<?php 
								$options = array(
								                  'OK'  => 'OK',
								                  'Reject'  => 'Reject',
								                );

								$selected = "";

								echo form_dropdown('profile2[]', $options, $selected, 'style="margin-top:8px"' );
						?>
					<?php //echo form_input('profile2[]',set_value('profile2', ""),'class="eform-control2"'); ?>
				</td>
				<td><?php echo form_input('f_neck_and_tong2[]',set_value('f_neck_and_tong2', ""),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('bevel_dia2[]',set_value('bevel_dia2', ""),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('seal_width2[]',set_value('seal_width2', ""),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('pin_length2[]',set_value('pin_length2', ""),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('pin_cyl_dia2[]',set_value('pin_cyl_dia2', ""),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('rel_grc_pin_lgth2[]',set_value('rel_grc_pin_lgth2', ""),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('rel_grc_pin_dia2[]',set_value('rel_grc_pin_dia2', ""),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('c_bore_box_lgth2[]',set_value('c_bore_box_lgth2', ""),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('c_bore_box_dia2[]',set_value('c_bore_box_dia2', ""),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('last_scratch_box2[]',set_value('last_scratch_box2', ""),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('boreback_length2[]',set_value('boreback_length2', ""),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('boreback_dia2[]',set_value('boreback_dia2', ""),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('overall_length2[]',set_value('overall_length2', ""),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('comments2[]',set_value('comments2', ""),'class="eform-control2"'); ?></td>
				<td>
						<?php 
								$options = array(
								                  'OK'  => 'OK',
								                  'Reject'  => 'Reject',
								                );

								$selected = "";

								echo form_dropdown('conn_nde_result2[]', $options, $selected, 'style="margin-top:8px"' );
						?>
					<?php //echo form_input('conn_nde_result2[]',set_value('conn_nde_result2', ""),'class="eform-control2"'); ?>
				</td>


			</tr>
			<?php } ?>

<!-- ******************************************************************************************* -->
			


<!-- ******************************************************************************************* -->
			<?php if(is_array($eform_data['sr_no'])) { for($i=0; $i < sizeof($eform_data['sr_no'])-1 ; $i++ ) { ?>
			<tr>
					<td rowspan="2"><?php echo form_input('sr_no[]',set_value('sr_no', @$eform_data['sr_no'][$i]),'class="eform-control2" style="height: 62px"'); ?></td>
					<td rowspan="2"><?php echo form_input('serial_no[]',set_value('serial_no', @$eform_data['serial_no'][$i]),'class="eform-control2" style="height: 62px" '); ?></td>

				<td><?php echo form_input('description1[]',set_value('description1', @$eform_data['description1'][$i]),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('connection_type1[]',set_value('connection_type1', @$eform_data['connection_type1'][$i]),'class="eform-control2"'); ?></td>
				<th style="padding:8px">PIN</th>
				<td><?php echo form_input('i_d_o_d1[]',set_value('i_d_o_d1', @$eform_data['i_d_o_d1'][$i]),'class="eform-control2"'); ?></td>
				<td>
					<?php 
								$options = array(
								                  'OK'  => 'OK',
								                  'Reject'  => 'Reject',
								                );

								$selected = @$eform_data['profile1'][$i];

								echo form_dropdown('profile1[]', $options, $selected, 'style="margin-top:8px"' );
						?>
					<?php //echo form_input('profile1[]',set_value('profile1', @$eform_data['profile1'][$i]),'class="eform-control2"'); ?>
				</td>
				<td><?php echo form_input('f_neck_and_tong1[]',set_value('f_neck_and_tong1', @$eform_data['f_neck_and_tong1'][$i]),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('bevel_dia1[]',set_value('bevel_dia1', @$eform_data['bevel_dia1'][$i]),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('seal_width1[]',set_value('seal_width1', @$eform_data['seal_width1'][$i]),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('pin_length1[]',set_value('pin_length1', @$eform_data['pin_length1'][$i]),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('pin_cyl_dia1[]',set_value('pin_cyl_dia1', @$eform_data['pin_cyl_dia1'][$i]),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('rel_grc_pin_lgth1[]',set_value('rel_grc_pin_lgth1', @$eform_data['rel_grc_pin_lgth1'][$i]),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('rel_grc_pin_dia1[]',set_value('rel_grc_pin_dia1', @$eform_data['rel_grc_pin_dia1'][$i]),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('c_bore_box_lgth1[]',set_value('c_bore_box_lgth1', @$eform_data['c_bore_box_lgth1'][$i]),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('c_bore_box_dia1[]',set_value('c_bore_box_dia1', @$eform_data['c_bore_box_dia1'][$i]),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('last_scratch_box1[]',set_value('last_scratch_box1', @$eform_data['last_scratch_box1'][$i]),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('boreback_length1[]',set_value('boreback_length1', @$eform_data['boreback_length1'][$i]),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('boreback_dia1[]',set_value('boreback_dia1', @$eform_data['boreback_dia1'][$i]),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('overall_length1[]',set_value('overall_length1', @$eform_data['overall_length1'][$i]),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('comments1[]',set_value('comments1', @$eform_data['comments1'][$i]),'class="eform-control2"'); ?></td>
					<td rowspan="2">
						<?php 
								$options = array(
								                  'OK'  => 'OK',
								                  'Reject'  => 'Reject',
								                );

								$selected = @$eform_data['full_body_length1'][$i];

								echo form_dropdown('full_body_length1[]', $options, $selected, 'style="margin-top:25px"' );
							?>
						<?php //echo form_input('full_body_length1[]',set_value('full_body_length1', @$eform_data['full_body_length1'][$i]),'class="eform-control2" style="height: 62px"'); ?>
					</td>
				<td>
						<?php 
								$options = array(
								                  'OK'  => 'OK',
								                  'Reject'  => 'Reject',
								                );

								$selected = @$eform_data['conn_nde_result1'][$i];

								echo form_dropdown('conn_nde_result1[]', $options, $selected, 'style="margin-top:8px"' );
						?>
					<?php //echo form_input('conn_nde_result1[]',set_value('conn_nde_result1', @$eform_data['conn_nde_result1'][$i]),'class="eform-control2"'); ?>
				</td>
					<td rowspan="2"><a href="#remove-item" class="red remove-button"><i class="glyphicon glyphicon-remove-circle" style="font-size:24px"></i></a></td>
				
				
			</tr>

			<tr>

				<td><?php echo form_input('description2[]',set_value('description2', @$eform_data['description2'][$i]),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('connection_type2[]',set_value('connection_type2', @$eform_data['connection_type2'][$i]),'class="eform-control2"'); ?></td>
				<th style="padding:8px">BOX</th>
				<td><?php echo form_input('i_d_o_d2[]',set_value('i_d_o_d2', @$eform_data['i_d_o_d2'][$i]),'class="eform-control2"'); ?></td>
				<td>
					<?php 
								$options = array(
								                  'OK'  => 'OK',
								                  'Reject'  => 'Reject',
								                );

								$selected = @$eform_data['profile2'][$i];

								echo form_dropdown('profile2[]', $options, $selected, 'style="margin-top:8px"' );
						?>
					<?php //echo form_input('profile2[]',set_value('profile2', @$eform_data['profile2'][$i]),'class="eform-control2"'); ?>
				</td>
				<td><?php echo form_input('f_neck_and_tong2[]',set_value('f_neck_and_tong2', @$eform_data['f_neck_and_tong2'][$i]),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('bevel_dia2[]',set_value('bevel_dia2', @$eform_data['bevel_dia2'][$i]),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('seal_width2[]',set_value('seal_width2', @$eform_data['seal_width2'][$i]),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('pin_length2[]',set_value('pin_length2', @$eform_data['pin_length2'][$i]),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('pin_cyl_dia2[]',set_value('pin_cyl_dia2', @$eform_data['pin_cyl_dia2'][$i]),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('rel_grc_pin_lgth2[]',set_value('rel_grc_pin_lgth2', @$eform_data['rel_grc_pin_lgth2'][$i]),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('rel_grc_pin_dia2[]',set_value('rel_grc_pin_dia2', @$eform_data['rel_grc_pin_dia2'][$i]),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('c_bore_box_lgth2[]',set_value('c_bore_box_lgth2', @$eform_data['c_bore_box_lgth2'][$i]),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('c_bore_box_dia2[]',set_value('c_bore_box_dia2', @$eform_data['c_bore_box_dia2'][$i]),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('last_scratch_box2[]',set_value('last_scratch_box2', @$eform_data['last_scratch_box2'][$i]),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('boreback_length2[]',set_value('boreback_length2', @$eform_data['boreback_length2'][$i]),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('boreback_dia2[]',set_value('boreback_dia2', @$eform_data['boreback_dia2'][$i]),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('overall_length2[]',set_value('overall_length2', @$eform_data['overall_length2'][$i]),'class="eform-control2"'); ?></td>
				<td><?php echo form_input('comments2[]',set_value('comments2', @$eform_data['comments2'][$i]),'class="eform-control2"'); ?></td>
				<td>
						<?php 
								$options = array(
								                  'OK'  => 'OK',
								                  'Reject'  => 'Reject',
								                );

								$selected = @$eform_data['conn_nde_result2'][$i];

								echo form_dropdown('conn_nde_result2[]', $options, $selected, 'style="margin-top:8px"' );
						?>
					<?php //echo form_input('conn_nde_result2[]',set_value('conn_nde_result2', @$eform_data['conn_nde_result2'][$i]),'class="eform-control2"'); ?>
				</td>


			</tr>
			<?php } } ?>
		</tbody>
<!-- ******************************************************************************************* -->

		</table>

			<div class="row">
		    	<div class="col-md-6">
		    		<a class="btn btn-primary add-item top-margin-10" href="#add-item" >Add More Item</a>
		    	</div>
		    </div>
			<div id="temp">
					
			</div>



		<table class="table" style="margin-top:20px">
			<tr>
				<td width="30%">
					<label class = "eform-label">COIL S/N:. </label>
					<?php echo form_input('coil_sn',set_value('coil_sn',@$eform_data['coil_sn']), 'class="eform-control"'); ?>

					<label class = "eform-label">Size:. </label>
					<?php echo form_input('size',set_value('size',@$eform_data['size']), 'class="eform-control"'); ?>

					<label class = "eform-label">CALIBRATION DATE:. </label>
					<?php echo form_input('calibration_date1',set_value('calibration_date1',@$eform_data['calibration_date1']), 'class="eform-control"'); ?>

					<label class = "eform-label">BLACKLIGHT METER S/N::. </label>
					<?php echo form_input('calibration_date',set_value('calibration_date',@$eform_data['calibration_date']), 'class="eform-control"'); ?>

					<label class = "eform-label">CALIBRATION DATE:. </label>
					<?php echo form_input('calibration_date2',set_value('calibration_date2',@$eform_data['calibration_date2']), 'class="eform-control"'); ?>


					<label class = "eform-label">BLACKLIGHT INTENSITY:. </label>
					<?php echo form_input('blacklight_intensity',set_value('blacklight_intensity',@$eform_data['blacklight_intensity']), 'class="eform-control"'); ?>

					<label class = "eform-label">GAUSS METER S/N:. </label>
					<?php echo form_input('gauss_meter_sn',set_value('gauss_meter_sn',@$eform_data['gauss_meter_sn']), 'class="eform-control"'); ?>

					<label class = "eform-label">CALIBRATION DATE:. </label>
					<?php echo form_input('calibration_date3',set_value('calibration_date3',@$eform_data['calibration_date3']), 'class="eform-control"'); ?>



				</td>

				<td width="2%">
				</td>

				<td width="33%">

					<label class = "eform-label">FLUORESCENT PARTICLES BRAND:. </label>
					<?php echo form_input('flourescent_prtical_brand',set_value('flourescent_prtical_brand',@$eform_data['flourescent_prtical_brand']), 'class="eform-control"'); ?>

					<label class = "eform-label">BATH STRENGTH:. </label>
					<?php echo form_input('bath_strength',set_value('bath_strength',@$eform_data['bath_strength']), 'class="eform-control"'); ?>
					
					<label class = "eform-label">AC YOKE S/N::. </label>
					<?php echo form_input('ac_yoke_sn',set_value('ac_yoke_sn',@$eform_data['ac_yoke_sn']), 'class="eform-control"'); ?>

					<label class = "eform-label">PENETRANT BRAND:. </label>
					<?php echo form_input('penetrant_brand',set_value('penetrant_brand',@$eform_data['penetrant_brand']), 'class="eform-control"'); ?>

					<label class = "eform-label">DEVELOPER BRAND::. </label>
					<?php echo form_input('developer_brand',set_value('developer_brand',@$eform_data['developer_brand']), 'class="eform-control"'); ?>
									
				</td>

				<td width="2%">
				</td>

				<td width="33%">

					<label class = "eform-label">BATCH:. </label>
					<?php echo form_input('batch11',set_value('batch11',@$eform_data['batch11']), 'class="eform-control"'); ?>

					<label class = "eform-label">ML/100ML:. </label>
					<?php echo form_input('ml_per_100',set_value('ml_per_100',@$eform_data['ml_per_100']), 'class="eform-control"'); ?>

					<label class = "eform-label">10 LB BLOCK S/N:. </label>
					<?php echo form_input('lb_block_sn',set_value('lb_block_sn',@$eform_data['lb_block_sn']), 'class="eform-control"'); ?>

					<label class = "eform-label">BATCH:. </label>
					<?php echo form_input('batch12',set_value('batch12',@$eform_data['batch12']), 'class="eform-control"'); ?>

					<label class = "eform-label">Batch:. </label>
					<?php echo form_input('batch13',set_value('batch13',@$eform_data['batch13']), 'class="eform-control"'); ?>


				</td>

			</tr>
		</table>


			
		
	</div>
<!-- ************************************************************************************* -->
<script type="text/javascript">
	$(document).ready(function(){

		$('#temp').hide();
		var url = base_url + "eform/form5_item/";
		$("#temp").load(url);



		
		$('.add-item').on('click', function (e) {
			//alert($("#temp").html());
			$(".dimensional_inspection_list").append($("#temp").html());
		});


		$(".remove-button").on("click",function(){
			//alert("Clicked");
			$(this).closest('tr').next('tr').remove();
			$(this).closest('tr').remove();

			
		});

	});


</script>

<?php $this->load->view('default/include/footer_inspector.php') ?>	