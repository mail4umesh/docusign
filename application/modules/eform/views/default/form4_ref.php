<?php $this->load->view('default/include/header_inspector.php') ?>

<!-- ************************************************************************************ -->


<style type="text/css">
	.markable_image { 
	    width: 368px; 
	    height: 150px; 
	    position: relative;
	    background-repeat: no-repeat;
	}
	.markable_image img {
	    position: absolute;   
	}
</style>

<script type="text/javascript">
	$(document).ready(function() {
    $(".markable_image").click(function(e) {
        e.preventDefault();
        var offset = $(this).offset();

        var x = (e.pageX - offset.left) - 12;
  		var y = (e.pageY - offset.top) - 12;

  		//$(this).parent().find('.x').val(x);
  		//$(this).parent().find('.y').val(y);
        var sr = $(this).attr("sr")

        var data_x = $('<input type="hidden" class="name_x" name="x['+ sr +'][]" >');
        data_x.val(x);

        var data_y = $('<input type="hidden" class="name_y" name="y['+ sr +'][]" >');
        data_y.val(y);

        data_x.appendTo($(this));
        data_y.appendTo($(this));


        var img = $('<img class="marker">');
        img.css('top', y);
        img.css('left', x);
        img.attr('src', '<?php echo base_url(); ?>assets/themes/default/img/marker.png');
        img.appendTo($(this));
    });

    $(".remover_marker").on("click",function(){
			//alert("Clicked");
			$(this).parent().find('.marker').remove();
			$(this).parent().find('.name_x').remove();
			$(this).parent().find('.name_y').remove();

			
		});



});

</script>




	<div class="panel-heading">
		<b>SDI INCOMING INSPECTION REPORT</b>
	</div>
	<div class="panel-body" style="padding-left: 10%; ">
		
		<div class="row">
			

			<?php echo markable_image("1", $eform_data) ?>
			<?php echo markable_image("2", $eform_data) ?>
			<?php echo markable_image("3", $eform_data) ?>
			<?php echo markable_image("4", $eform_data) ?>

		</div>

		<div class="row">
		
        </div>

		
		

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

			
		
	</div>
<!-- ************************************************************************************* -->

<?php $this->load->view('default/include/footer_inspector.php') ?>	