
<div class="container">
<div class="panel panel-warning">
	<div class="panel-heading">
		<b><?php echo (@$edit) ? 'Update Form - "'.$edit[0]->name.'"' : 'Add Form'; ?></b>
	</div>
	<div class="panel-body" style="padding-left: 10%; ">


		<?php echo form_open_multipart('form/do_add','class="form-horizontal" data-toggle="validator"'); ?>
		
			

			<div class="form-group">
				<div class="col-md-2">
					<label class = "control-label">Document Name</label>
				</div>
				<div class="col-md-4">
					<?php echo form_input('name',set_value('name',@$edit[0]->name),'class="form-control" data-error="Document Name is Required" required'); ?>
					<div class="help-block with-errors"></div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-2">
					<label class = "control-label">Example PDF</label> 
				</div>
				<div class="col-md-4">
					<?php //echo form_input('example_pdf',set_value('example_pdf',@$edit[0]->example_pdf),'class="form-control"'); ?>
					
					<span class="btn btn-info fileinput-button">
			        	<i class="glyphicon glyphicon-plus"></i>
			        	<span>Select file...</span>
			        	<input id="fileupload" type="file" name="file" >
		    		</span>
		    		<!-- The global progress bar -->
				    <div id="progress" class="progress top-margin-10">
				        <div class="progress-bar progress-bar-info progress-bar-striped active"></div>
				    </div>
					<div class="red file_upload_error">
						<?php if(@$edit) { ?>
							<a target="_blank" href="<?php echo base_url(); ?>public/example_pdf/<?php echo @$edit[0]->example_pdf; ?>" ><?php echo @$edit[0]->example_pdf; ?></a>

						<?php } ?>
						
					</div>
					
    				
    				<input type="hidden" name="example_pdf" value="<?php echo @$edit[0]->example_pdf; ?>" class="example_pdf">

				</div>
			</div>

			<div class="form-group">
				<div class="col-md-2">
					<label class = "control-label">Select FormS</label>
				</div>
				<div class="col-md-4">
					<?php
		                    $form_list = array();
		                            
		                    $form_list["form1"] = "Form 1";
		                    $form_list["form2"] = "Form 2";
		                    $form_list["form3"] = "Form 3";
		                    $form_list["form4"] = "Form 4";
		                    $form_list["form5"] = "Form 5";
		                    $form_list["form6"] = "Form 6";
		                                
		                        //$selected = @$edit[0]->thickness;
		                    $selected = @$edit[0]->selected_form;
		                    echo form_dropdown('selected_form', $form_list, $selected,'class="form-control" id="selected_form"');
		            ?>
				</div>
			</div>

    
			<div class="form-group">
				<div class="col-md-2">
					<label class = "control-label">Description</label> 
				</div>
				<div class="col-md-4">
					<textarea name="description" rows="10" class="form-control" placeholder = "Description" ><?php echo set_value('description',@$edit[0]->description); ?></textarea>
				</div>
			</div>
			
			<p class="submit">
				<?php
					if(@$edit) echo form_hidden('form_id',@$edit[0]->id);
					$submit_value = (@$edit) ? 'Update Form' : 'Add Form';
					echo form_submit('submit',$submit_value,'class="left-margin-10 btn btn-info pull-right"');
					echo anchor('form','Back','class="btn left-margin-10 btn-info pull-right"'); 
				?>
			</p>
		<?php echo form_close(); ?>
	</div>
</div>
</div>



<script>

$(document).ready(function(){

/*jslint unparam: true */
/*global window, $ */
$(function () {
    'use strict';

    var url = window.location.hostname === base_url ?
                '//jquery-file-upload.appspot.com/' : base_url+'form/upload_pdf/';
    // Change this to the location of your server-side upload handler:
    //var url = base_url+"public/example_pdf/"
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        replaceFileInput: true,
        done: function (e, data) {

        	console.log(data.result);
        	console.log(data.result.file_name);
            
            if (data.result.success == '1') {
            	var link = '<a target="_blank" href="'+ base_url +'public/example_pdf/'+data.result.file_name+'">'+data.result.file_name+'</a>';
            	
            	$('.example_pdf').val(data.result.file_name);
            	$('.file_upload_error').html(link);
            } else {
            	$('.file_upload_error').html(data.result.upload_error);
            }
                
           $('.progress').hide(); 
        },
        progressall: function (e, data) {
        	$('.progress').show();
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'

            );
            console.log(e);
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});

	$('.progress').hide();

});
</script>