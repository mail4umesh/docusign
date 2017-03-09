<?php $this->load->view('default/include/header_inspector.php') ?>

<!-- ************************************************************************************ -->

<script type="text/javascript">
	function calculate_total(obj){

		var qty = obj.parent().parent().find(".qty").val();
    	var unit_price = obj.parent().parent().find(".unit_price").val();
    	var amount = qty * unit_price;
    	obj.parent().parent().find(".amount").val(amount);
    	do_total();
	}
	function do_total(){
		var total = 0;
		$(".amount").each(function(){
	            total = total+ parseFloat(this.value)
	            //alert(sum);
	            $(".total").val(total)

	            var vat;
	            vat = (total * 20)/100;
	            $(".vat").val(vat);

	            var grand_total = total+vat;
                $(".grand_total").val(grand_total);

	        });
	}
</script>



	
	<div class="panel-heading">
		<b>Invoice</b>
	</div>
	<div class="panel-body" style="padding-left: 5%; ">
		

		
		
		<div class="row">
			<div class="col-md-4">
				<img src="/assets/themes/default/img/logo.jpg">
			</div>

			<div class="col-md-3" style="margin-top:15px">
				<center>
					16770 Hedgecroft, Ste. 710<br />
					Houston, TX 77060<br />
					PH. 281-741-1347<br />
					Email: msierra@lionoil.net
				</center>
				
			</div>

			<div class="col-md-5">
				<label class = "eform-label">Invoice No.: </label>
				<?php echo form_input('invoice_number',set_value('invoice_number',@$eform_data['invoice_number']),'class="eform-control"'); ?>
				<label class = "eform-label">Invoice Date.: </label>
				<?php echo form_input('invoice_date',set_value('invoice_date',date("d M, Y")),'class="eform-control"'); ?>
				<label class = "eform-label">Job No.:</label>
				<?php echo form_input('job_no',set_value('job_no',@$eform_data['job_no']),'class="eform-control"'); ?>
			</div>
        </div>

        <div class="row">
        	<div class="col-md-5">
        		<label class = "eform-label">Customer.: </label>
				<?php echo form_input('customer',set_value('customer',@$eform_data['customer']),'class="eform-control"'); ?>
        		
        		<label class = "eform-label">Contact.: </label>
				<?php echo form_input('contact',set_value('contact',@$eform_data['contact']),'class="eform-control"'); ?>
        	
        		<label class = "eform-label">Address.: </label>
				<?php echo form_input('address',set_value('address',@$eform_data['address']),'class="eform-control"'); ?>
        		
        		<label class = "eform-label">City/ST/Zip.: </label>
				<?php echo form_input('city_st_zip',set_value('city_st_zip',@$eform_data['city_st_zip']),'class="eform-control"'); ?>
        	
        		<label class = "eform-label">Phone.: </label>
				<?php echo form_input('phone',set_value('phone',@$eform_data['phone']),'class="eform-control"'); ?>
        	
        	</div>
        	<div class="col-md-3">

        		<label class = "eform-label">Rig.: </label>
				<?php echo form_input('rig',set_value('rig',@$eform_data['rig']),'class="eform-control"'); ?>
        		
        		<label class = "eform-label">Lease.: </label>
				<?php echo form_input('lease',set_value('lease',@$eform_data['lease']),'class="eform-control"'); ?>
        	
        		<label class = "eform-label">Order By.: </label>
				<?php echo form_input('order_by',set_value('order_by',@$eform_data['order_by']),'class="eform-control"'); ?>
        		
        		<label class = "eform-label">PO No.: </label>
				<?php echo form_input('po_no',set_value('po_no',@$eform_data['po_no']),'class="eform-control"'); ?>
        	
        		<label class = "eform-label">Inspector.: </label>
				<?php echo form_input('inspector',set_value('inspector',@$eform_data['inspector']),'class="eform-control"'); ?>

        	</div>

        	<div class="col-md-4">

        		<label class = "eform-label">Well Name.: </label>
				<?php echo form_input('well_name',set_value('well_name',@$eform_data['well_name']),'class="eform-control"'); ?>
        		
        		<label class = "eform-label">Location.: </label>
				<?php echo form_input('location',set_value('location',@$eform_data['location']),'class="eform-control"'); ?>
        	
        		<label class = "eform-label">Date Orderd.: </label>
				<?php echo form_input('order_date',set_value('order_date',@$eform_data['order_date']),'class="eform-control"'); ?>
        		
        		<label class = "eform-label">AEF No.: </label>
				<?php echo form_input('aef_no',set_value('aef_no',@$eform_data['aef_no']),'class="eform-control"'); ?>
        	
        		<label class = "eform-label">Insp. Rpt. No.: </label>
				<?php echo form_input('insp_rpt_no',set_value('insp_rpt_no',@$eform_data['insp_rpt_no']),'class="eform-control"'); ?>

				<label class = "eform-label">Invoice Terms.: </label>
				<?php echo form_input('invoice_term',set_value('invoice_term',@$eform_data['invoice_term']),'class="eform-control"'); ?>


        	</div>
        	
        </div>


        <div class="row">
        	<div class="col-md-2"><b>Item</b></div>
        	<div class="col-md-1"><b>Qty</b></div>
        	<div class="col-md-3"><b>Description</b></div>
        	<div class="col-md-2"><b>Ends</b></div>
        	<div class="col-md-1"><b>Unit Price</b></div>
        	<div class="col-md-2"><b>Amount</b></div>
        </div>
        <div class="row">
	        
        </div>
        

        <div id="temp">
        	<div class="row top-margin-10"> 
	        	<div class="col-md-2"><?php echo form_input('item[]',set_value('item',""),'class="eform-control2"'); ?></div>
	        	<div class="col-md-1"><?php echo form_input('qty[]',set_value('qty',"0"),'class="eform-control2 qty"'); ?></div>
	        	<div class="col-md-3"><?php echo form_input('description[]',set_value('description',""),'class="eform-control2"'); ?></div>
	        	<div class="col-md-2"><?php echo form_input('ends[]',set_value('ends',""),'class="eform-control2"'); ?></div>
	        	<div class="col-md-1"><?php echo form_input('unit_price[]',set_value('unit_price',"0"),'class="eform-control2 unit_price"'); ?></div>
	        	<div class="col-md-2"><?php echo form_input('amount[]',set_value('amount',"0"),'class="eform-control2 amount"'); ?></div>
	        	<div class="col-md-1"><a href="#remove-item" class="red remove-button"><i class="glyphicon glyphicon-remove-circle" style="font-size:24px"></i></a></div>
	        </div>

	        <script type="text/javascript">
	        	$(".remove-button").on("click",function(){
			    	$(this).closest('.row').remove();
			    });
			    $(".qty, .unit_price" ).on("keyup",function(){
			        calculate_total($(this));
			    });
	        </script>
        </div>

        <div class="invoice_list">	
        	<?php if(is_array($eform_data['item'])) { for($i=1; $i < sizeof($eform_data['item']) ; $i++ ) { ?>	
        		<div class="row top-margin-10">
		        	<div class="col-md-2"><?php echo form_input('item[]',set_value('item',@$eform_data['item'][$i]),'class="eform-control2"'); ?></div>
		        	<div class="col-md-1"><?php echo form_input('qty[]',set_value('qty',@$eform_data['qty'][$i]),'class="eform-control2 qty"'); ?></div>
		        	<div class="col-md-3"><?php echo form_input('description[]',set_value('description',@$eform_data['description'][$i]),'class="eform-control2"'); ?></div>
		        	<div class="col-md-2"><?php echo form_input('ends[]',set_value('ends',@$eform_data['ends'][$i]),'class="eform-control2"'); ?></div>
		        	<div class="col-md-1"><?php echo form_input('unit_price[]',set_value('unit_price',@$eform_data['unit_price'][$i]),'class="eform-control2 unit_price"'); ?></div>
		        	<div class="col-md-2"><?php echo form_input('amount[]',set_value('amount',@$eform_data['amount'][$i]),'class="eform-control2 amount"'); ?></div>
		        	<div class="col-md-1"><a href="#remove-item" class="red remove-button"><i class="glyphicon glyphicon-remove-circle" style="font-size:24px"></i></a></div>
	        	</div>
        	<?php } } 	?>
	        
	    </div>
	    <div class="row">
	    	<div class="col-md-6">
	    		<a class="btn btn-primary add-item top-margin-10" href="#add-item" >Add More Item</a>
	    	</div>
	   
	    	<div class="col-md-3 top-margin-10"><b class="pull-right">Total</b></div>
	    	<div class="col-md-2">
	    		<?php echo form_input('total',set_value('total',"0"),'class="eform-control2 total top-margin-10"'); ?>
	    	</div>
	    </div>

	    <div class="row">
	    	<div class="col-md-9 top-margin-10"><b class="pull-right">VAT 20%</b></div>
	    	<div class="col-md-2">
	    		<?php echo form_input('vat',set_value('vat',"0"),'class="eform-control2 vat top-margin-10"'); ?>
	    	</div>
	    </div>

	    <div class="row">
	    	<div class="col-md-9 top-margin-10"><b class="pull-right">Grand total</b></div>
	    	<div class="col-md-2">
	    		<?php echo form_input('grand_total',set_value('grand_total',"0"),'class="eform-control2 grand_total top-margin-10"'); ?>
	    	</div>
	    </div>
	    
			
		
	
		<div class="row">
			<div class="col-md-1 top-margin-10"><b>Comments</b></div>
		    <div class="col-md-8">
		    	<textarea name="comments" rows="10" class="form-control comments top-margin-10" ><?php echo set_value('comments',@$eform_data['comments']); ?></textarea>
				<?php //echo form_input('comments',set_value('comments',@$eform_data['comments']),'class="eform-control2 comments top-margin-10"'); ?>
		    </div>
		</div>
	</div>	




<script type="text/javascript">

$(document).ready(function(){


	$('#temp').hide();
	
	<?php if(!is_array($eform_data['item'])) { ?>
    	$(".invoice_list").append($("#temp").html());
    <?php } ?>
    do_total();

    

	$('.add-item').on('click', function (e) {
		//alert($("#temp1").html());
		$(".invoice_list").append($("#temp").html());
	});



	$(document).on("keyup",function(){
        $(".save-progress").text("Save Progress");
    });

	$(".qty, .unit_price" ).on("keyup",function(){
        calculate_total($(this));
        do_total();
    });

	

	$(".remove-button").on("click",function(){
		//alert("Clicked");
		$(this).closest('.row').remove();
		do_total();
	});

});
</script>



<!-- ************************************************************************************* -->

<?php $this->load->view('default/include/footer_inspector.php') ?>	