					<tr>
						<td><?php echo form_input('sr_no[]',set_value('sr_no',""),'class="eform-control2"'); ?></td>
						<td><?php echo form_input('serial_no[]',set_value('serial_no',""),'class="eform-control2"'); ?></td>
						<td><?php echo form_input('connection_size_pin[]',set_value('connection_size_pin',""),'class="eform-control2"'); ?></td>
						<td><?php echo form_input('id_pin[]',set_value('id_pin',""),'class="eform-control2"'); ?></td>
						<td><?php echo form_input('connection_size_box[]',set_value('connection_size_box',""),'class="eform-control2"'); ?></td>
						<td><?php echo form_input('od_box[]',set_value('od_box',""),'class="eform-control2"'); ?></td>
						<td><?php echo form_input('description[]',set_value('description',""),'class="eform-control2"'); ?></td>
						<td><?php echo form_input('pin[]',set_value('pin',""),'class="eform-control2"'); ?></td>
						<td><?php echo form_input('body[]',set_value('body',""),'class="eform-control2"'); ?></td>
						<td><?php echo form_input('box[]',set_value('box',""),'class="eform-control2"'); ?></td>
						<td><?php echo form_input('sh_to_sh_length[]',set_value('sh_to_sh_length',""),'class="eform-control2"'); ?></td>
						
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