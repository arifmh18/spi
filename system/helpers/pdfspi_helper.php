<?php
defined('BASEPATH') OR exit('No direct script access allowed');

functIon pdf_generate($object, $filename='', $direct_download=TRUE){
	require_once("dompdf/autoload.inc.php");

	$dompdf = new DOMPDF();
	$dompdf ->load_html($object);
	$dompdf ->render();

	if ($direct_download == TRUE) {
		$dompdf->stream($filename);
	}
	else{
		return $dompdf->output();
	}
}
/* End of file pdfspi_helper.php */
/* Location: .//D/xampp-win32-1.8.3-5-VC11/xampp/htdocs/spi/system/helpers/pdfspi_helper.php */