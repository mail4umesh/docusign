			<div class="row">
	        	<div class="col-md-2"><?php echo form_input('item[]',set_value('item',@$eform_data['item']),'class="eform-control2"'); ?></div>
	        	<div class="col-md-1"><?php echo form_input('qty[]',set_value('qty',@$eform_data['qty']),'class="eform-control2"'); ?></div>
	        	<div class="col-md-3"><?php echo form_input('description[]',set_value('description',@$eform_data['description']),'class="eform-control2"'); ?></div>
	        	<div class="col-md-2"><?php echo form_input('ends[]',set_value('ends',@$eform_data['ends']),'class="eform-control2"'); ?></div>
	        	<div class="col-md-1"><?php echo form_input('unit_price[]',set_value('unit_price',@$eform_data['unit_price']),'class="eform-control2"'); ?></div>
	        	<div class="col-md-2"><?php echo form_input('amount[]',set_value('amount',@$eform_data['amount']),'class="eform-control2"'); ?></div>
	        	<div class="col-md-1"><a href="#remove-item" class="red"><i class="glyphicon glyphicon-remove-circle" style="font-size:24px"></i></a></div>
	        </div>