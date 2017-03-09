<div class="container">
<div class="panel panel-default">
	<div class="panel-heading">
		<b>Form Name Here</b>
	</div>
	<div class="panel-body" style="padding-left: 10%; ">
		<div class="row">
		
        </div>

		<?php echo form_open('eform/do_add_sign','class="form-horizontal add_eform"'); ?>
		

			<div class="form-group">
				<div class="col-md-2">
					<label class = "control-label">Field 1</label>
				</div>
				<div class="col-md-4">
					<?php echo form_input('field1',set_value('field1',@$eform_data['field1']),'class="form-control"'); ?>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-2">
					<label class = "control-label">Field 2</label>
				</div>
				<div class="col-md-4">
					<?php echo form_input('field2',set_value('field2',@$eform_data['field2']),'class="form-control"'); ?>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-2">
					<label class = "control-label">Field 3</label>
				</div>
				<div class="col-md-4">
					<?php echo form_input('field3',set_value('field3',@$eform_data['field3']),'class="form-control"'); ?>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-2">
					<label class = "control-label">Field 4</label>
				</div>
				<div class="col-md-4">
					<?php echo form_input('field4',set_value('field4',@$eform_data['field4']),'class="form-control"'); ?>
				</div>
			</div>

			<?php if(!$this->ion_auth->in_group('admin')) { ?>
			<p class="submit">
				<button  type="button" class="btn btn-info save-progress">Save Progress</button>
				
				<?php
					echo form_hidden('eform_id',$eform_id);

					//echo anchor('#save','Save Progress','class="btn left-margin-10 btn-info pull-righ save-progress"');
					echo form_submit('submit',"Save & Sign",'class="left-margin-10 btn btn-info"');
					 
				?>
				<div class="alert alert-success success-message"></div>
				<?php } ?>
			</p>
		<?php echo form_close(); ?>
	</div>
</div>

</div>

<script type="text/javascript">

$(document).ready(function(){

	$(".success-message").hide();

	$('.save-progress').on('click', function (e) {
		
			
		  
		    $.ajax({
            type : 'POST',
            url : base_url + "eform/do_add",
            data: $('.add_eform').serialize(), //ID of your form
            dataType : 'html',
            async: true,
            beforeSend:function(){
	                //add a loading gif so the broswer can see that something is happening
	                //$('#add-task-content').html('<div class="loading"></div>');
	            },
	            success : function(data){
	            	
	            	$(".success-message").html('<i class="glyphicon glyphicon-ok"></i> Saved').fadeIn(500);
	                //$(".success-message").show(100);

	                setTimeout(function() {
	                	
				        $(".success-message").hide(500);
				    }, 2000);

	            },
	            error : function() {
	                //$('#add-task-content').html('<p class="error">Error in submit</p>');
	            }
        	});
		
	});

});
</script>