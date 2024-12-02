<?php
require 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;


// Increase memory limit
ini_set('memory_limit', '16');

// Initialize Dompdf with options
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isRemoteEnabled', true);
$options->set('defaultFont', 'DejaVu Sans'); // Use a default font to speed up rendering

$dompdf = new Dompdf($options);

// Load HTML content
ob_start();
require 'gekozenfotos.php';
$html = ob_get_clean();

// Ensure CSS paths are absolute URLs
$html = preg_replace('/href="css\//', 'href="http://localhost:80/Routekaart/css/', $html);

// Remove the download button
$html = preg_replace('<a href="generate-pdf.php" class="button">Download PDF</a>', '', $html);

// Ensure image paths are absolute URLs
//$html = preg_replace('/src="img\//', 'src="http://localhost:80/Routekaart/img/', $html);

$dompdf->loadHtml($html);

// (Optional) Set up the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Clean (erase) the output buffer and turn off output buffering
ob_end_clean();
// Output the generated PDF to Browser
$dompdf->stream("chosen_images.pdf", ["Attachment" => 1]);