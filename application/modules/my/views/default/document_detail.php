

<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h2>eSigned Document Detail</h2>
		</div>
		<div class="panel-body">
		<?php if($document_detail[0]->inspector_status == 0 ) { ?>
			<h4>Inspection In Progress, Please Try Later</h4>
		<?php } else { ?>
			<?php if($document_detail[0]->client_status == 0 ) { ?>
				<div class="alert alert-danger">
				
					<p>Notice</p>
					<a href="<?php echo base_url() ?>eform/load_document/<?php echo $document_detail[0]->id; ?>" target="_blank" class="btn btn-info pull-right" >View And Sign</a>
					<a href="#reject" class="btn btn-info pull-right" data-toggle = "modal" style="margin-right:10px;" >Reject</a><br>
					<p>This Document Require Your Signature</p>
				</div>
			<?php } ?> 

			<h4>Overview</h4>

			<dl class="dl-horizontal">
				<dt>Document Name</dt>
				<dd><?php echo $document_detail[0]->name;  ?></dd>

				<dt>Inspection ID</dt>
				<dd><?php echo $document_detail[0]->inspection_id;  ?></dd>

				

				<dt>Scheduled</dt>
				<dd><?php echo $document_detail[0]->schedule_date;  ?></dd>

				<dt>Client Name</dt>
				<dd><?php echo get_username($document_detail[0]->client_id);  ?></dd>

				<dt>Date Sign By client</dt>
				<dd><?php echo $document_detail[0]->client_date_signed;  ?></dd>


				<dt>Inspector Name</dt>
				<dd><?php echo get_username($document_detail[0]->inspector_id);  ?></dd>

				<dt>Date Sign by Inspector</dt>
				<dd><?php echo $document_detail[0]->inspector_date_signed;  ?></dd>

				<dt>Inspector Status</dt>
				<dd><?php echo show_status($document_detail[0]->inspector_status);  ?></dd>

				<dt>Client Status</dt>
				<dd>
					<?php echo show_status($document_detail[0]->client_status);  ?>
					<?php if($document_detail[0]->client_status == 2){
						echo '<span class="yellow">Rejected</span>';
					} ?>
				</dd>

				<dt>View PDF</dt>
				<dd><a target="_blank" href="<?php echo base_url(); ?>public/documents/eform_<?php echo $document_detail[0]->id; ?>.pdf">View PDF</a></dd>



			</dl>

		<?php } ?>	
		</div>
	</div>
</div>
</div>
			
<div class="modal fade" id="reject" role="dialog" style="margin-top:50px;">
    <div class="modal-dialog modal-lg">
    	<form class="form-horizontal" id="reject_eform" data-toggle="validator" method="post">
    		<div class="modal-content" id="reject_eform_content">
    			<div class="modal-header">
                      <h4>Rejected </h4>
                </div>
                <div class="modal-body">	
    				<div class="form-group">
                        <label for="description" class="col-lg-2 control-label">Reason:</label>
                        <div class="col-lg-10">
                            <textarea name="rejected" rows="10" class="form-control" placeholder = "Reject Reason" required ><?php echo set_value('description',@$edit[0]->rejected); ?></textarea>
                        </div>
                    </div> 
                </div>
                 <div class="modal-footer">
                    
                    <?php
                        
                        echo form_hidden('eform_id',$document_detail[0]->id);
                        echo '<a class="btn btn-default" data-dismiss = "modal">Close </a>';
                        echo form_submit('submit',"Submit",'class="left-margin-10 btn btn-info pull-right"');
                    ?>    
                    
                    
                </div>
        	</div>
        </form>
	</div>
</div>

<script type="text/javascript">
	$('#reject_eform').validator().on('submit', function (e) {
		if (e.isDefaultPrevented()) {
		  // handle the invalid form...
		  //alert("Not Valied");
		} else {
			
		  // everything looks good!
		  //alert("I am here");
		    $.ajax({
            type : 'POST',
            url : base_url + "my/rejected",
            data: $('#reject_eform').serialize(), //ID of your form
            dataType : 'html',
            async: true,
            beforeSend:function(){
	                //add a loading gif so the broswer can see that something is happening
	                $('#reject_eform_content').html('<div class="loading"></div>');
	            },
	            success : function(data){
	                $('#reject_eform_content').html(data);
	            },
	            error : function() {
	                $('#reject_eform_content').html('<p class="error">Error in submit</p>');
	            }
        	});
		location.reload();
		//return false;
		}
	});
</script>

