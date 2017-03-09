<div class="panel-footer">
		<table class="table">
		<tr>
			<td width="25%">
				<label class = "eform-label">Inspector_Sign.: </label>
			</td>	
			<td width="25%">
				<img style="width:500px" src="<?php echo base_url(); ?>public/signature/<?php echo $inspector_sign.".png"; ?>">
			</td>
			<td width="50%">	
				<?php 
					$sign_detail =  explode("_", $inspector_sign);
					$inspector_id = $sign_detail[1];
				?>	
				<label class = "eform-label"><?php echo get_username($inspector_id); ?></label>
			</td>

			
		</tr>
		</table>

		<table class="table">
		<tr>

			<?php if($this->ion_auth->in_group('client')) { ?>

			<td width="25%">
				<label class = "eform-label">Customer_Sign.: </label>
			</td>

			<td width="25%">

				
					<?php if($client_status == '0' ) { ?>
						<a href="#add-signature"  class="btn btn-warning save-and-sign" data-toggle = "modal">Save and Sign</a>
					<?php } else { ?>

						<img style="width:500px" src="<?php echo base_url(); ?>public/signature/<?php echo $client_sign.".png"; ?>">
					<?php } ?>
				
			</td>

			<td width="50%">
				<?php if($client_status == '1' ) { ?>	
					<?php 
						$sign_detail =  explode("_", $client_sign);
						$client_id = $sign_detail[1];
					?>	
					<label class = "eform-label"><?php echo get_username($client_id); ?></label>
				<?php } ?>
			</td>

			<?php } else { ?>




			<td width="25%">
				<label class = "eform-label">Customer_Sign.: </label>
			</td>

			<td width="25%" >

					<label class = "eform-label">Client Signature Required</label>
				
			</td>

			<td width="50%">
					<label class = "eform-label">Client Name</label>
			</td>

			<?php } ?>


		</tr>
		</table>

		
		<div class="row" style="margin-top:30px">
			
			<center><h4><strong>Re "Lion Us"</strong></h4></center>	


		</div>
	</div>

</div>

</div>
<?php echo form_close(); ?>
</div>

<div class="modal" id="add-signature" role="dialog" style="margin-top:50px;">
    <div class="modal-dialog modal-lg">
    	<form class="form-horizontal" id="signature-form" data-toggle="validator" method="post" >
    		<div class="modal-content" id="add-signature-content">
                <div class="loading"></div>
    			<!-- Dynamic Content will load here -->
        	</div>
        </form>
	</div>
</div>



</body>
</html>

<script type="text/javascript">
	$(".save-and-sign").on('click', function (e) {

		

		var url = base_url + "eform/get_signature/" + <?php echo $eform_id; ?>;
		//alert("Save and Sign Button CLickdsnfkjsdnkled, Show Signature form")
		$("#add-signature-content").load(url);

	});
</script>
