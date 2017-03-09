<?php $this->load->view('default/include/header_inspector.php') ?>

<!-- ************************************************************************************ -->
<style type="text/css">
	.eform-control2 {
    border-radius: 0px;
	}
	.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
	    padding: 0px;
	    line-height: 1.42857143;
	    vertical-align: top;
	    border-top: 0px solid #ddd;
   	}
</style>


	<div class="panel-heading">
		<b>Rotary Shouldered Inspection Report</b>
	</div>
	<div class="panel-body" style="padding-left: 2%; ">
		<div class="row">
			
			<label class = "eform-label">Date.: </label>
			<?php echo form_input('inspection_date',set_value('inspection_date',date("d M, Y")),'class="eform-control"'); ?>
			<label class = "eform-label">Moter Size.: </label>
			<?php echo form_input('moter_size',set_value('moter_size',@$eform_data['moter_size']),'class="eform-control"'); ?>
			<label class = "eform-label">Moter Sn.:</label>
			<?php echo form_input('moter_sn',set_value('moter_sn',@$eform_data['moter_sn']),'class="eform-control"'); ?>

		
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
						<td></td>
					</tr>

				</thead>
				<tbody class="rotary_list">
					<?php if(!is_array($eform_data['sr_no'])) { ?>
					
					<tr> 
			        	<td><?php echo form_input('sr_no[]',set_value('sr_no',""),'class="eform-control2"'); ?></td>
			        	<td><?php echo form_input('conn1[]',set_value('conn1',"0"),'class="eform-control2 qty"'); ?></td>
			        	<td><?php echo form_input('conn2[]',set_value('conn2',""),'class="eform-control2"'); ?></td>
			        	<td><?php echo form_input('box_od[]',set_value('box_od',""),'class="eform-control2"'); ?></td>
			        	<td><?php echo form_input('pin_id[]',set_value('pin_id',""),'class="eform-control2"'); ?></td>
			        	<td><?php echo form_input('box_shoulder_width[]',set_value('box_shoulder_width',"0"),'class="eform-control2 unit_price"'); ?></td>
			        	<td><?php echo form_input('tong_space[]',set_value('tong_space',"0"),'class="eform-control2 amount"'); ?></td>
			        	<td><?php echo form_input('box_cb_depth[]',set_value('box_cb_depth',""),'class="eform-control2"'); ?></td>
			        	<td><?php echo form_input('box_cb_diameter',set_value('box_cb_diameter',"0"),'class="eform-control2 qty"'); ?></td>
			        	<td><?php echo form_input('bevel_diameter',set_value('bevel_diameter',""),'class="eform-control2"'); ?></td>
			        	<td><?php echo form_input('pin_neck_length[]',set_value('pin_neck_length',""),'class="eform-control2"'); ?></td>
			        	<td><?php echo form_input('pin_stress_releif_groove[]',set_value('pin_stress_releif_groove',"0"),'class="eform-control2 unit_price"'); ?></td>
			        	<td><?php echo form_input('bore_back[]',set_value('bore_back',"0"),'class="eform-control2 amount"'); ?></td>
			        	<td><?php echo form_input('box_seal_width[]',set_value('box_seal_width',"0"),'class="eform-control2 unit_price"'); ?></td>
			        	<td><?php echo form_input('pin_length[]',set_value('pin_length',"0"),'class="eform-control2 amount"'); ?>

			        	<td><a href="#remove-item" class="red remove-button"><i class="glyphicon glyphicon-remove-circle" style="font-size:24px"></i></a></td>
		        	</tr>
    				
    				<?php } ?>

					<?php if(is_array($eform_data['sr_no'])) { for($i=0; $i < sizeof($eform_data['sr_no'])-1 ; $i++ ) { ?>	
		        		<tr>
				        	
				        	<td><?php echo form_input('sr_no[]',set_value('sr_no',@$eform_data['sr_no'][$i]),'class="eform-control2"'); ?></td>
				        	<td><?php echo form_input('conn1[]',set_value('conn1',@$eform_data['conn1'][$i]),'class="eform-control2 qty"'); ?></td>
				        	<td><?php echo form_input('conn2[]',set_value('conn2',@$eform_data['conn2'][$i]),'class="eform-control2"'); ?></td>
				        	<td><?php echo form_input('box_od[]',set_value('box_od',@$eform_data['box_od'][$i]),'class="eform-control2"'); ?></td>
				        	<td><?php echo form_input('pin_id[]',set_value('pin_id',@$eform_data['pin_id'][$i]),'class="eform-control2"'); ?></td>
				        	<td><?php echo form_input('box_shoulder_width[]',set_value('box_shoulder_width',@$eform_data['box_shoulder_width'][$i]),'class="eform-control2 unit_price"'); ?></td>
				        	<td><?php echo form_input('tong_space[]',set_value('tong_space',@$eform_data['tong_space'][$i]),'class="eform-control2 amount"'); ?></td>
				        	<td><?php echo form_input('box_cb_depth[]',set_value('box_cb_depth',@$eform_data['box_cb_depth'][$i]),'class="eform-control2"'); ?></td>
				        	<td><?php echo form_input('box_cb_diameter[]',set_value('box_cb_diameter',@$eform_data['box_cb_diameter'][$i]),'class="eform-control2 qty"'); ?></td>
				        	<td><?php echo form_input('bevel_diameter[]',set_value('bevel_diameter',@$eform_data['bevel_diameter'][$i]),'class="eform-control2"'); ?></td>
				        	<td><?php echo form_input('pin_neck_length[]',set_value('pin_neck_length',@$eform_data['pin_neck_length'][$i]),'class="eform-control2"'); ?></td>
				        	<td><?php echo form_input('pin_stress_releif_groove[]',set_value('pin_stress_releif_groove',@$eform_data['pin_stress_releif_groove'][$i]),'class="eform-control2 unit_price"'); ?></td>
				        	<td><?php echo form_input('bore_back[]',set_value('bore_back',@$eform_data['bore_back'][$i]),'class="eform-control2 amount"'); ?></td>
				        	<td><?php echo form_input('box_seal_width[]',set_value('box_seal_width',@$eform_data['box_seal_width'][$i]),'class="eform-control2 unit_price"'); ?></td>
				        	<td><?php echo form_input('pin_length[]',set_value('pin_length',@$eform_data['pin_length'][$i]),'class="eform-control2 amount"'); ?>

				        	<td><a href="#remove-item" class="red remove-button"><i class="glyphicon glyphicon-remove-circle" style="font-size:24px"></i></a></td>

				        </td>
		        	<?php } } 	?>

					
				</tbody>
			</table>

			<div class="row">
		    	<div class="col-md-6">
		    		<a class="btn btn-primary add-item top-margin-10" href="#add-item" >Add More Item</a>
		    	</div>
		    </div>	
			<div id="temp">
        		
	        </div>
		
	</div>

<script type="text/javascript">
	$(document).ready(function(){

		$('#temp').hide();
		var url = base_url + "eform/form2_item/";
		$("#temp").load(url);



		
		$('.add-item').on('click', function (e) {
			//alert($("#temp1").html());
			$(".rotary_list").append($("#temp").html());
		});


		$(".remove-button").on("click",function(){
			//alert("Clicked");
			$(this).closest('tr').remove();
			
		});

	});


</script>
<!-- ************************************************************************************* -->

<?php $this->load->view('default/include/footer_inspector.php') ?>	