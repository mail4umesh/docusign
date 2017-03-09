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
<script type="text/javascript">

$(document).ready(function(){	        	

	$(".remove-button").on("click",function(){
			//alert("Clicked");
			$(this).closest('tr').next('tr').remove();
			$(this).closest('tr').remove();

		});

});

</script>		