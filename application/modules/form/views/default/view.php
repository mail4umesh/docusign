<div class="navbar toolbar navbar-default">
    <div class="container">
        <div class="navbar-header">
			
			<?php echo anchor('form','<i class="glyphicon glyphicon-arrow-left"> </i> Back','class="btn left-margin-10 btn-info pull-right"'); ?>
			<?php echo anchor('form/edit/'.$form->id,'<i class="glyphicon glyphicon-edit"> </i>  Modify','class="btn left-margin-10 btn-default pull-right"'); ?>	

		</div>
    </div>          
</div>
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
          <b>Dorm Detail ID : <?php echo $form->name; ?></b>
        </div>
    	<div class="panel-body">

			<dl class="container">

				<dt class="col-md-6">Document Name</dt>
				<dd class="col-md-6">
					<?php
						echo $form->name;
					?>
				</dd>

				<dt class="col-md-6">View Form</dt>
				<dd class="col-md-6">
					
					<a target="_blank" href="<?php echo base_url(); ?>eform/showform/<?php echo $form->selected_form; ?>" ><?php echo $form->selected_form; ?></a>
					
				</dd>

				<dt class="col-md-6">View Example PDF</dt>
				<dd class="col-md-6">
					<a target="_blank" href="<?php echo base_url(); ?>public/example_pdf/<?php echo $form->example_pdf; ?>" ><?php echo $form->example_pdf; ?></a>
				</dd>

				

				<dt class="col-md-6">Created</dt>
				<dd class="col-md-6">
					<?php
						echo convert_date_mysql_to_usa($form->created_at);
					?>
				</dd>




				<dt class="col-md-6">Description</dt>
				<dd class="col-md-6">
					<?php
						echo $form->description;
					?>
				</dd>
				
			</dl>


			<div style="width: 100%">
			</div>

		</div>
	</div>
</div>