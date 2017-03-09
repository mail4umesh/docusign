				<tr> 
		        	<td><?php echo form_input('sr_no[]',set_value('sr_no',""),'class="eform-control2"'); ?></td>
		        	<td><?php echo form_input('conn1[]',set_value('conn1',"0"),'class="eform-control2 qty"'); ?></td>
		        	<td><?php echo form_input('conn2[]',set_value('conn2',""),'class="eform-control2"'); ?></td>
		        	<td><?php echo form_input('box_od[]',set_value('box_od',""),'class="eform-control2"'); ?></td>
		        	<td><?php echo form_input('pin_id[]',set_value('pin_id',""),'class="eform-control2"'); ?></td>
		        	<td><?php echo form_input('box_shoulder_width[]',set_value('box_shoulder_width',"0"),'class="eform-control2 unit_price"'); ?></td>
		        	<td><?php echo form_input('tong_space[]',set_value('tong_space',"0"),'class="eform-control2 amount"'); ?></td>
		        	<td><?php echo form_input('box_cb_depth[]',set_value('box_cb_depth',""),'class="eform-control2"'); ?></td>
		        	<td><?php echo form_input('box_cb_diameter[]',set_value('box_cb_diameter',"0"),'class="eform-control2 qty"'); ?></td>
		        	<td><?php echo form_input('bevel_diameter[]',set_value('bevel_diameter',""),'class="eform-control2"'); ?></td>
		        	<td><?php echo form_input('pin_neck_length[]',set_value('pin_neck_length',""),'class="eform-control2"'); ?></td>
		        	<td><?php echo form_input('pin_stress_releif_groove[]',set_value('pin_stress_releif_groove',"0"),'class="eform-control2 unit_price"'); ?></td>
		        	<td><?php echo form_input('bore_back[]',set_value('bore_back',"0"),'class="eform-control2 amount"'); ?></td>
		        	<td><?php echo form_input('box_seal_width[]',set_value('box_seal_width',"0"),'class="eform-control2 unit_price"'); ?></td>
		        	<td><?php echo form_input('pin_length[]',set_value('pin_length',"0"),'class="eform-control2 amount"'); ?>

		        	<td><a href="#remove-item" class="red remove-button"><i class="glyphicon glyphicon-remove-circle" style="font-size:24px"></i></a></td>
	        	</tr>

<script type="text/javascript">

$(document).ready(function(){	        	

	$(".remove-button").on("click",function(){
			//alert("Clicked");
			$(this).closest('tr').remove();
		});

});

</script>