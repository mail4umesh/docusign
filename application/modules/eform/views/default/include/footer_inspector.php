<div class="panel-footer">
		<div class="row" style="margin-top:50px; margin-left:20px;">
			<div class="col-md-1 top-margin-10"><b>Inspector Signature</b></div>
		    <div class="col-md-5">
		    	
		    	<a href="#add-signature"  class="btn btn-warning save-and-sign" data-toggle = "modal">Save and Sign</a>
		    	
		    </div>

		    <div class="col-md-2 top-margin-10"><b>Inspector Name</b></div>
		    <div class="col-md-4">
		   		
		    </div>


		</div>

		<div class="row" style="margin-top:50px; margin-left:20px;">
			<div class="col-md-1 top-margin-10"><b>Client Signature</b></div>
		    <div class="col-md-5">
		    	
		    	
		    	
		    </div>

		    <div class="col-md-2 top-margin-10"><b>Client Name</b></div>
		    <div class="col-md-4">
		   		
		    </div>


		</div>

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


<script type="text/javascript">

	$(document).ready(function(){
	$(".save-and-sign").on('click', function (e) {

		$.ajax({
            type : 'POST',
            url : base_url + "eform/do_add",
            data: $('.add_eform').serialize(), //ID of your form
            dataType : 'html',
            async: true,
        });

		var url = base_url + "eform/get_signature/" + <?php echo $eform_id; ?>;
		//alert("Save and Sign Button CLickdsnfkjsdnkled, Show Signature form")
		$("#add-signature-content").load(url);

		 

	});

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
	                $(".save-progress").text("Saving...");
	            },
	            success : function(data){
	                
	                
	                setTimeout(function() {
	                	
				        $(".save-progress").text("Saved");
				    }, 500);

	               

	            },
	            error : function() {
	                //$('#add-task-content').html('<p class="error">Error in submit</p>');
	            }
        	});
		
		});
	});
</script>