<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


function pdf_create($html, $filename='', $stream=TRUE) 
{
    
	
	
	require_once("dompdf/dompdf_config.inc.php");



    $dompdf = new DOMPDF();


    
        $dompdf->set_paper("DEFAULT_PDF_PAPER_SIZE", 'portrait');

    $dompdf->load_html($html);
    $dompdf->render();
    if ($stream) {
        $dompdf->stream($filename.".pdf");
    } else {
        return $dompdf->output();
    }
}


function pdf_create_wide($html, $filename='', $stream=TRUE) 
{
    
    
    
    require_once("dompdf/dompdf_config.inc.php");



    $dompdf = new DOMPDF();


    
        $dompdf->set_paper(array(0,0,841.89,1190.55));

    $dompdf->load_html($html);
    $dompdf->render();
    if ($stream) {
        $dompdf->stream($filename.".pdf");
    } else {
        return $dompdf->output();
    }
}



?>