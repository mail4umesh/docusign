<?php $this->load->view('default/include/header_client.php') ?>	

<!--  ******************************************************************************************* -->


	<div class="panel-heading">
		<b>Invoice</b>
	</div>
	<div class="panel-body" style="padding-left: 5%; ">
		

		
		<table class="table">

		<tr>
			<td width="25%">
				<img style="float:left" src="<?php echo base_url(); ?>assets/themes/default/img/logo.jpg">
			</td>

			<td width="25%">
				<center>
					16770 Hedgecroft, Ste. 710<br />
					Houston, TX 77060<br />
					PH. 281-741-1347<br />
					Email: msierra@lionoil.net
				</center>
				
			</td>

			<td width="50%">
				<label class = "eform-label">Invoice No.: </label>
				<div class="value_box" ><?php echo @$eform_data['invoice_number']; ?></div>
				<label class = "eform-label">Invoice Date.: </label>
				<div class="value_box" ><?php echo @$eform_data['invoice_date']; ?></div>
				<label class = "eform-label">Job No.:</label>
				<div class="value_box" ><?php echo @$eform_data['job_no']; ?></div>
			</td>
        
        </tr>
		</table>

        <table class="table">
        <tr>
        	
        	<td width="30%" valign="top">
        		<label class = "eform-label">Customer.: </label>
				<div class="value_box" ><?php echo @$eform_data['customer']; ?></div>
        		
        		<label class = "eform-label">Contact.: </label>
				<div class="value_box" ><?php echo @$eform_data['contact']; ?></div>
        	
        		<label class = "eform-label">Address.: </label>
				<div class="value_box" ><?php echo @$eform_data['address']; ?></div>
        		
        		<label class = "eform-label">City/ST/Zip.: </label>
				<div class="value_box" ><?php echo @$eform_data['city_st_zip']; ?></div>
        	
        		<label class = "eform-label">Phone.: </label>
				<div class="value_box" ><?php echo @$eform_data['phone']; ?></div>
        	
        	</td>
        	<td width="35%" valign="top">

        		<label class = "eform-label">Rig.: </label>
				<div class="value_box" ><?php echo @$eform_data['rig']; ?></div>
        		
        		<label class = "eform-label">Lease.: </label>
				<div class="value_box" ><?php echo @$eform_data['lease']; ?></div>
        	
        		<label class = "eform-label">Order By.: </label>
				<div class="value_box" ><?php echo @$eform_data['order_by']; ?></div>
        		
        		<label class = "eform-label">PO No.: </label>
				<div class="value_box" ><?php echo @$eform_data['po_no']; ?></div>
        	
        		<label class = "eform-label">Inspector.: </label>
				<div class="value_box" ><?php echo @$eform_data['inspector']; ?></div>

        	</td>

        	<td width="35%" valign="top">

        		<label class = "eform-label">Well Name.: </label>
				<div class="value_box" ><?php echo @$eform_data['well_name']; ?></div>
        		
        		<label class = "eform-label">Location.: </label>
				<div class="value_box" ><?php echo @$eform_data['location']; ?></div>
        	
        		<label class = "eform-label">Date Orderd.: </label>
				<div class="value_box" ><?php echo @$eform_data['order_date']; ?></div>
        		
        		<label class = "eform-label">AEF No.: </label>
				<div class="value_box" ><?php echo @$eform_data['aef_no']; ?></div>
        	
        		<label class = "eform-label">Insp. Rpt. No.: </label>
				<div class="value_box" ><?php echo @$eform_data['insp_rpt_no']; ?></div>

				<label class = "eform-label">Invoice Terms.: </label>
				<div class="value_box" ><?php echo @$eform_data['invoice_term']; ?></div>


        	</td>
        </tr>	
        </table>


        <table class="table top-margin-10">
        	<tr>
	        	<td width="15%"><b>Item</b></td>
	        	<td width="10%"><b>Qty</b></td>
	        	<td width="25%"><b>Description</b></td>
	        	<td width="15%"><b>Ends</b></td>
	        	<td width="10%"><b>Unit Price</b></td>
	        	<td width="25%"><b>Amount</b></td>
	        	


	        	
	        
        	</tr>
        </table>
        
        
        
        

        <table class="table">
        <tbody>	
        	<?php if(is_array($eform_data['item'])) { for($i=1; $i < sizeof($eform_data['item']) ; $i++ ) { ?>	
        		<tr>
		        	<td width="15%"><?php echo @$eform_data['item'][$i]; ?></td>
		        	<td width="10%"><?php echo @$eform_data['qty'][$i]; ?></td>
		        	<td width="25%"><?php echo @$eform_data['description'][$i]; ?></td>
		        	<td width="15%"><?php echo @$eform_data['ends'][$i]; ?></td>
		        	<td width="10%"><?php echo @$eform_data['unit_price'][$i]; ?></td>
		        	<td width="25%"><?php echo @$eform_data['amount'][$i]; ?></td>	        	
		        </tr>
        	<?php } } 	?>
	    </tbody>   
	    </table>
	    

	    <table class="table">
		    <tr>
		    	<td width="75%"><b class="pull-right">Total</b></td>
		    	<td width="25%"><?php echo $eform_data['total']; ?></td>
		    </tr>

		    <tr>
		    	<td width="75%"><b class="pull-right">VAT 20%</b></td>
		    	<td width="25%"><?php echo $eform_data['vat']; ?></td>
		    </tr>

		    <tr>
		    	<td width="75%"><b class="pull-right">Grand total</b></td>
		    	<td width="25%">
		    		<?php echo $eform_data['grand_total']; ?>
		    	</td>
		    </tr>
	    </table>
			
		
	
		<div class="row">
			<div class="col-md-1 top-margin-10"><b>Comments</b></div>
		    <div class="col-md-8">
		    	<?php echo @$eform_data['comments']; ?>
		    </div>
		</div>

		<br>
		
		

	</div>

<!--  ******************************************************************************************* -->

<?php $this->load->view('default/include/footer_client.php') ?>	
	