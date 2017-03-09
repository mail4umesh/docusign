<script src="<?php echo base_url(); ?>assets/themes/default/js/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/themes/default/signature/jSignature.min.js"></script>

		<div class="modal-header">
            <h4>Sign It</h4>
		</div>
		
		<div class="model-body top-margin-10 add-signature-content-body" style="padding-left: 10%; ">
			<div class="form-group">
				

				<div id="signature1"></div>
				<button type="button" class="clearSign" value="Clear">Clear</button>
				
				

			</div>
		</div>

		<div class="modal-footer">
                    
            <?php echo '<a class="btn btn-default" data-dismiss = "modal">Close </a>'; ?>    
            
            <?php if($this->ion_auth->in_group('inspector')) { ?>
            	<a id="submit_inspector_signature" class="btn btn-info" data-toggle = "modal">Done</a>
            <?php } else if($this->ion_auth->in_group('client'))  { ?>
            	<a id="submit_client_signature" class="btn btn-info" data-toggle = "modal">Done</a> 
            <?php } ?>
                    
        </div>

<script type="text/javascript">

$(document).ready(function(){

	var $sigdiv = $("#signature1");
	$sigdiv.jSignature({ color: "#00f", lineWidth: 3, showLine: false }); // inits the jSignature widget.
	// after some doodling...
	$(".clearSign").on('click', function (e) {
			
		$sigdiv.jSignature("reset"); // clears the canvas and rerenders the decor on it.
	});


	$("#submit_inspector_signature").on('click', function (e) {
		//alert("Ye ye ye I am Here");

		datapair = $sigdiv.jSignature("getData",'image');
		$('#jsign1').val(datapair)

		$.ajax({
              type : 'POST',
              url : base_url + "eform/inspector_signature_submit",
              data:{
                 eform_id: <?php echo $eform_id; ?>,
                 image_data: datapair,
              },
              dataType : 'html',
              beforeSend:function(){
                  //add a loading gif so the broswer can see that something is happening
                  $('.add-signature-content-body').html('<h3>Generating PDF, Plese Be patience it will take some time</h3><div class="loading"></div>');
                  },
              success : function(data){
                  $('.add-signature-content-body').html(data);
              },
              error : function() {
                  $('.add-signature-content-body').html('<p class="error">Error in submit</p>');
              }
          });
    location.replace(base_url+"my/inspection_detail/"+<?php echo $inspection_id; ?>);
		//window.history.back(2);
	});


	$("#submit_client_signature").on('click', function (e) {
		//alert("Ye ye ye I am Here");

		datapair = $sigdiv.jSignature("getData",'image');
		$('#jsign1').val(datapair)

		$.ajax({
              type : 'POST',
              url : base_url + "eform/client_signature_submit",
              data:{
                 eform_id: <?php echo $eform_id; ?>,
                 image_data: datapair,
              },
              dataType : 'html',
              beforeSend:function(){
                  //add a loading gif so the broswer can see that something is happening
                  $('.add-signature-content-body').html('<div class="loading"></div>');
                  },
              success : function(data){
                  $('.add-signature-content-body').html(data);
              },
              error : function() {
                  $('.add-signature-content-body').html('<p class="error">Error in submit</p>');
              }
          });
		location.reload();
	});




});



</script>

