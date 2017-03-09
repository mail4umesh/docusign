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
	.wide{
			width: 2200px;
		}
	
		.eform-control2 {
	    border-radius: 0px;
	    border: 0px solid #ddd;
		}

		.eform-control3 {
	    border-radius: 3px;
	    border: 2px solid #EEE;
	    width: 100%;
		}
		.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
		    padding: 0px;
		    line-height: 1.42857143;
		    vertical-align: top;
		    border-top: 1px solid #ddd;
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




	<div class="panel-heading wide">
		<b>SDI INCOMING INSPECTION REPORT</b>
	</div>
	<div class="panel-body wide" style="padding-left: 2%; ">
		
		

		
		<table class="table table-bordered ">
			<thead>
				<tr>
					<th rowspan="2">Description</th>
					<th rowspan="2">Area</th>
					<th rowspan="2">MPI</th>
					<th rowspan="2">Visual</th>
					<th rowspan="2">Inspector Profile</th>
					<th rowspan="2">Inspector Comments</th>
					<th rowspan="2" width="370px"><span>UPPER</span><span style="margin-left:250px">LOWER</span></th>
					<th rowspan="2">Area</th>
					<th rowspan="2">SDI QC PROFILE</th>
					<th colspan="2">SDI QC Check one</th>
					<th>SDI QC</th>
				</tr>
				<tr>
					<th>* QC PASS</th>
					<th>QC Fail</th>
					<th>INITIALS</th>
				</tr>

			</thead>
			<tbody>



				
				<?php create_row(1,1,"Lift Sub, SN",$eform_data); ?>
				<?php create_row(2,2,"Top Sub, SN",$eform_data); ?>
				<?php create_row(3,2,"Extension Housing, SN",$eform_data); ?>
				<?php create_row(4,1,"Catch Rod",$eform_data); ?>
				<?php create_row(5,2,"Rotor, SN",$eform_data); ?>
				<?php create_row(6,2,"Stator, SN",$eform_data); ?>
				<?php create_row(7,3,"Bent Housing, SN",$eform_data); ?>
				<?php create_row(8,2,"SDI ABH Upper Housing, SN",$eform_data); ?>
				<?php create_row(9,2,"SDI ABH Lower Housing, SN",$eform_data); ?>
				<?php create_row(10,3,"SDI ABH Adjustment Coupling",$eform_data); ?>
				<?php create_row(11,1,"SDI ABH or Talon II Alignment Ring",$eform_data); ?>
				<?php create_row(12,1,"Talon II ABH Torque Sleeve",$eform_data); ?>
				<?php create_row(13,3,"Talon II ABH Upper Housing, SN",$eform_data); ?>
				<?php create_row(14,2,"Talon II ABH Lower Housing, SN",$eform_data); ?>
				<?php create_row(15,2,"Upper Coupling, SN",$eform_data); ?>

				<?php create_row(16,2,"Driven Rod",$eform_data); ?>
				<?php create_row(17,2,"Lower Coupling",$eform_data); ?>
				<?php create_row(18,2,"Flow Diverter",$eform_data); ?>
				<?php create_row(19,2,"Bearing Housing, SN",$eform_data); ?>
				<?php create_row(20,3,"Bearing Housing Ext. Thread, SN",$eform_data); ?>
				<?php create_row(21,2,"Stabilizer/Protector Sleeve, SN",$eform_data); ?>
				<?php create_row(22,1,"End Nut",$eform_data); ?>
				<?php create_row(23,3,"Bearing Mandrel, SN",$eform_data); ?>
				<?php create_row(24,2,"Bearing Mandrel, SN",$eform_data); ?>
				<?php create_row(25,2,"Flow Diverter Bearing Smart Motor Lower, SN",$eform_data); ?>
				<?php create_row(26,3,"Smart Motor Housing, SN",$eform_data); ?>
				<?php create_row(27,4,"Torsion Rod Smart Motor, SN",$eform_data); ?>
				<?php create_row(28,2,"Extension Housing Upper Smart Motor, SN",$eform_data); ?>
				<?php create_row(29,2,"Flow Diverter Bearing Smart Motor - Upper, SN",$eform_data); ?>
				<?php create_row(30,4,"Flex Shaft Smart Motor, SN",$eform_data); ?>

				<?php create_row(31,2,"Extension Housing Upper Smart Motor, SN",$eform_data); ?>
				<?php create_row(32,2,"Extension Housing-Flex Rod, SN",$eform_data); ?>
				<?php create_row(33,4,"Flex Rod Assembly, SN",$eform_data); ?>


				


				


			
			</tbody>	
		</table>


		
	</div>
<!-- ************************************************************************************* -->

<?php $this->load->view('default/include/footer_inspector.php') ?>	