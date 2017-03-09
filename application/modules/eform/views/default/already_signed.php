<h1>This Document is Already Signed </h1>

<?php if($client_status == 2 ){
	echo "<h2>But Client Rejected this form</h2>";
	echo "<h3>Reson: ";
	echo $reason."</h3>";
}
?>
<button class="btn btn-info" onclick="goBack()">Go Back</button>
  
<a class="btn btn-default" target="_blank" href="<?php echo base_url(); ?>public/documents/eform_<?php echo $eform_id; ?>.pdf"> Click Here to view document.</a>

<script>
function goBack() {
    window.history.back();
}
</script>