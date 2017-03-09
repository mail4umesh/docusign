<?php $this->load->view('default/include/header_inspector.php') ?>

<!-- ************************************************************************************ -->
<style type="text/css">
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

	<div class="panel-heading">
		<b>FIELD INSPECTION REPORT</b>
	</div>
	<div class="panel-body" style="padding-left: 2%; ">
		<div class="row">
			<div class="col-md-4">
				<img src="/assets/themes/default/img/logo.jpg">
			</div>

			<div class="col-md-4" style="margin-top:15px">
				<center>
					<p>FIELD INSPECTION REPORT</p>
					<p>16770 HEDGECROFT DR, SUITE 710</p>
					<p>HOUSTON, TX 77060</p>
					<p>281-741-1347</p>
				</center>
				
			</div>

			<div class="col-md-4">
			</div>
        </div>

		
		<div class="row">
        	<div class="col-md-4">
        		<label class = "eform-label">Customer Name.: </label>
				<?php echo form_input('customer',set_value('customer',@$eform_data['customer']),'class="eform-control"'); ?>
        		
        		<label class = "eform-label">Customer No.: </label>
				<?php echo form_input('customer_no',set_value('customer_no',@$eform_data['customer_no']),'class="eform-control"'); ?>
        	
        		<label class = "eform-label">Address.: </label>
				<?php echo form_input('address',set_value('address',@$eform_data['address']),'class="eform-control"'); ?>
        		
        		<label class = "eform-label">City.: </label>
				<?php echo form_input('city',set_value('city',@$eform_data['city']),'class="eform-control"'); ?>

				<label class = "eform-label">State.: </label>
				<?php echo form_input('state',set_value('state',@$eform_data['state']),'class="eform-control"'); ?>

				<label class = "eform-label">Zip.: </label>
				<?php echo form_input('zip',set_value('zip',@$eform_data['zip']),'class="eform-control"'); ?>

		        	
        		

        	</div>
        	<div class="col-md-4">

        		<label class = "eform-label">Job Site.: </label>
				<?php echo form_input('job_site',set_value('job_site',@$eform_data['job_site']),'class="eform-control"'); ?>
        		
        		<label class = "eform-label">Job #.: </label>
				<?php echo form_input('job_no',set_value('job_no',@$eform_data['job_no']),'class="eform-control"'); ?>
        	
        		        		
        		<label class = "eform-label">PO No.: </label>
				<?php echo form_input('po_no',set_value('po_no',@$eform_data['po_no']),'class="eform-control"'); ?>
        	
        		<label class = "eform-label">Inspection Method:</label>
				<?php echo form_input('inspection_method',set_value('inspection_method',@$eform_data['inspection_method']),'class="eform-control"'); ?>
        	
        		<label class = "eform-label">Charge To.: </label>
				<?php echo form_input('charge_to',set_value('charge_to',@$eform_data['charge_to']),'class="eform-control"'); ?>


        	</div>

        	<div class="col-md-4">

        		<label class = "eform-label">Reports Included: </label>
				<?php echo form_input('report_include',set_value('report_include',@$eform_data['report_include']),'class="eform-control"'); ?>
        		
        		<label class = "eform-label">Inspection Date.: </label>
				<?php echo form_input('inspection_date',set_value('inspection_date',@$eform_data['inspection_date']),'class="eform-control"'); ?>
        	
        		<label class = "eform-label"> Ordered By.: </label>
				<?php echo form_input('order_by',set_value('order_by',@$eform_data['order_by']),'class="eform-control"'); ?>
        		
        		<label class = "eform-label">Rig.: </label>
				<?php echo form_input('rig',set_value('rig',@$eform_data['rig']),'class="eform-control"'); ?>
        	
        		<label class = "eform-label">Lease.: </label>
				<?php echo form_input('lease',set_value('lease',@$eform_data['lease']),'class="eform-control"'); ?>

				<label class = "eform-label">Well Name.: </label>
				<?php echo form_input('well_name',set_value('well_name',@$eform_data['well_name']),'class="eform-control"'); ?>


        	</div>
        	
        </div>

		
			<table class="table table-bordered">
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
						<th rowspan="2"></th>
						
					</tr>

					<tr>
						<th>Pin</th>
						<th>Body</th>
						<th>Box</th>
					</tr>


				</thead>

				<tbody class="field_inspection_list">
					<?php if(!is_array($eform_data['sr_no'])) { ?>
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
					<?php } ?>

					<?php if(is_array($eform_data['sr_no'])) { for($i=0; $i < sizeof($eform_data['sr_no'])-1 ; $i++ ) { ?>	
		        		<tr>
				        	
				        	<td><?php echo form_input('sr_no[]',set_value('sr_no', @$eform_data['sr_no'][$i]),'class="eform-control2"'); ?></td>
							<td><?php echo form_input('serial_no[]',set_value('serial_no', @$eform_data['serial_no'][$i]),'class="eform-control2"'); ?></td>
							<td><?php echo form_input('connection_size_pin[]',set_value('connection_size_pin', @$eform_data['connection_size_pin'][$i]),'class="eform-control2"'); ?></td>
							<td><?php echo form_input('id_pin[]',set_value('id_pin',@$eform_data['id_pin'][$i]),'class="eform-control2"'); ?></td>
							<td><?php echo form_input('connection_size_box[]',set_value('connection_size_box',@$eform_data['connection_size_box'][$i]),'class="eform-control2"'); ?></td>
							<td><?php echo form_input('od_box[]',set_value('od_box',@$eform_data['od_box'][$i]),'class="eform-control2"'); ?></td>
							<td><?php echo form_input('description[]',set_value('description',@$eform_data['description'][$i]),'class="eform-control2"'); ?></td>
							<td><?php echo form_input('pin[]',set_value('pin',@$eform_data['pin'][$i]),'class="eform-control2"'); ?></td>
							<td><?php echo form_input('body[]',set_value('body',@$eform_data['body'][$i]),'class="eform-control2"'); ?></td>
							<td><?php echo form_input('box[]',set_value('box',@$eform_data['box'][$i]),'class="eform-control2"'); ?></td>
							<td><?php echo form_input('sh_to_sh_length[]',set_value('sh_to_sh_length',@$eform_data['sh_to_sh_length'][$i]),'class="eform-control2"'); ?></td>

				        	
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


		<div class="row top-margin-10">
        	<div class="col-md-5">
        		<label class = "eform-label">White Light.: </label>
				<?php echo form_input('white_light',set_value('white_light',@$eform_data['white_light']),'class="eform-control"'); ?>
        		
        		<label class = "eform-label">Calibration Date.: </label>
				<?php echo form_input('calibration_date1',set_value('calibration_date1',@$eform_data['calibration_date1']),'class="eform-control"'); ?>
        	
        		<label class = "eform-label">White Light Intensity.: </label>
				<?php echo form_input('white_light_intensity',set_value('white_light_intensity',@$eform_data['white_light_intensity']),'class="eform-control"'); ?>
        		
        		<label class = "eform-label">Profile gauge.: </label>
				<?php echo form_input('profile_gauge',set_value('profile_gauge',@$eform_data['profile_gauge']),'class="eform-control"'); ?>

				<label class = "eform-label">Calibration Date.: </label>
				<?php echo form_input('calibration_date2',set_value('calibration_date2',@$eform_data['calibration_date2']),'class="eform-control"'); ?>

				
		        	
        		

        	</div>
        	<div class="col-md-4">

        		<label class = "eform-label">Penetrant Brand.: </label>
				<?php echo form_input('penetrant_brand',set_value('penetrant_brand',@$eform_data['penetrant_brand']),'class="eform-control"'); ?>
        		
        		<label class = "eform-label">Developer Brand.: </label>
				<?php echo form_input('developer_brand',set_value('developer_brand',@$eform_data['developer_brand']),'class="eform-control"'); ?>
        	
        		        		
        		<label class = "eform-label">Dwell Time.: </label>
				<?php echo form_input('dwell_time',set_value('dwell_time',@$eform_data['dwell_time']),'class="eform-control"'); ?>
        	
        		<label class = "eform-label">Drying Time:</label>
				<?php echo form_input('drying_time',set_value('drying_time',@$eform_data['drying_time']),'class="eform-control"'); ?>
        	
        		<label class = "eform-label">Drying Method.: </label>
				<?php echo form_input('drying_method',set_value('drying_method',@$eform_data['drying_method']),'class="eform-control"'); ?>


        	</div>

        	<div class="col-md-3">

        		<label class = "eform-label">Batch: </label>
				<?php echo form_input('batch1',set_value('batch1',@$eform_data['batch1']),'class="eform-control"'); ?>
        		
        		<label class = "eform-label">Batch.: </label>
				<?php echo form_input('batch2',set_value('batch2',@$eform_data['batch2']),'class="eform-control"'); ?>
        	
        	</div>
        	
        </div>

        <div class="row top-margin-10">

        	<div class="col-md-3">
        		<?php @$eform_data['magnetic_particle_inspection'] == "y" ? $checked = 'checked="checked"' : $checked=""  ?>
        		<label class = "eform-label"><input name="magnetic_particle_inspection" type="checkbox"  value="y" <?php echo $checked; ?> >Magnetic Particle Inspection: </label>
				

        	</div>

        	<div class="col-md-3">
        		<?php @$eform_data['liquid_penetrant_inspection'] == "y" ? $checked = 'checked="checked"' : $checked=""  ?>
        		<label class = "eform-label"><input name="liquid_penetrant_inspection" type="checkbox" value="y" <?php echo $checked; ?> >Liquid Penetrant Inspection: </label>
				

        	</div>

        	<div class="col-md-3">
        		<?php @$eform_data['visual_inspection'] == "y" ? $checked = 'checked="checked"' : $checked=""  ?>
        		<label class = "eform-label"><input name="visual_inspection" type="checkbox" value="y" <?php echo $checked; ?> >Visual Inspection: </label>
				

        	</div>

        	<div class="col-md-3">
        		<?php @$eform_data['utlrasonic_inspection'] == "y" ? $checked = 'checked="checked"' : $checked=""  ?>
        		<label class = "eform-label"><input name="utlrasonic_inspection" type="checkbox" value="y" <?php echo $checked; ?> >Utlrasonic Inspection: </label>
				

        	</div>



        </div>

        <div class="row top-margin-10">
        	<div class="col-md-1 top-margin-10"><b>summary</b></div>
        	<div class="col-md-8">
		    	<textarea name="summary" rows="10" class="form-control comments top-margin-10" ><?php echo set_value('summary',@$eform_data['summary']); ?></textarea>
		    </div>
		</div>
	</div>

<script type="text/javascript">
	$(document).ready(function(){

		$('#temp').hide();
		var url = base_url + "eform/form3_item/";
		$("#temp").load(url);



		
		$('.add-item').on('click', function (e) {
			//alert($("#temp1").html());
			$(".field_inspection_list").append($("#temp").html());
		});


		$(".remove-button").on("click",function(){
			//alert("Clicked");
			$(this).closest('tr').remove();
			
		});

	});


</script>
<!-- ************************************************************************************* -->

<?php $this->load->view('default/include/footer_inspector.php') ?>	