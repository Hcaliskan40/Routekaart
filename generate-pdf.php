<?php
//require 'vendor/autoload.php';
//
//use Dompdf\Dompdf;
//use Dompdf\Options;
//
//

//
//// Initialize Dompdf with options
//$options = new Options();
//$options->set('isHtml5ParserEnabled', true);
//$options->set('isRemoteEnabled', true);
//$options->set('defaultFont', 'DejaVu Sans'); // Use a default font to speed up rendering
//
//$dompdf = new Dompdf($options);
//




//
//// Ensure CSS paths are absolute URLs
//$html = preg_replace('/href="css\//', 'href="http://localhost:80/Routekaart/css/', $html);
//
//// Remove the download button
////$html = preg_replace('<a href="generate-pdf.php" class="button">Download PDF</a>', '', $html);
//
//// Ensure image paths are absolute URLs
////$html = preg_replace('/src="img\//', 'src="http://localhost:80/Routekaart/img/', $html);









// !!!!!!!!!!!!!!


//require 'vendor/autoload.php';
//
//use Dompdf\Dompdf;
//
//ob_start(); // Start output buffering
//
//$dompdf = new Dompdf();
//
//// Eenvoudige HTML-inhoud
//$html = '<h1>Hello World</h1>';
//$dompdf->loadHtml($html);
//
//// Stel papierformaat in
//$dompdf->setPaper('A4', 'landscape');
//
//// Render de PDF
//$dompdf->render();
//
//// Verwijder output buffer
//ob_end_clean();
//
//// Verzend headers
//header('Content-Type: application/pdf');
//header('Cache-Control: public, must-revalidate, max-age=0');
//header('Pragma: public');
//header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
//
//// Stream PDF naar browser
//$dompdf->stream('document.pdf', ['Attachment' => false]);


require 'vendor/autoload.php';

use Dompdf\Dompdf;

use Dompdf\Options;


// Increase memory limita
ini_set('memory_limit', '16');

// Initialize Dompdf with options
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isRemoteEnabled', true);

// DIT ZORGT VOOR ERROR ALS JE DEZE FONT NIET HEBT OP JE COMPUTER !!
//$options->set('defaultFont', 'DejaVu Sans'); // Use a default font to speed up rendering

$dompdf = new Dompdf($options);
//$dompdf = new Dompdf();

// Load HTML content
ob_start();
require 'gekozenfotos.php';
$html = ob_get_clean();


// Ensure CSS paths are absolute URLs
$html = preg_replace('/href="css\//', 'href="http://localhost:80/Routekaart/css/', $html);

// Remove the download button
//$html = preg_replace('<a href="generate-pdf.php" class="button">Download PDF</a>', '', $html);

// Ensure image paths are absolute URLs
//$html = preg_replace('/src="img\//', 'src="http://localhost:80/Routekaart/img/', $html);

$dompdf->loadHtml($html);
//$dompdf->loadHtml('hello world');

$customPaper = array(0,0,300,4000); // Pas de laatste twee waarden aan voor breedte en hoogte.
$dompdf->setPaper($customPaper);
//$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();

//// Clean (erase) the output buffer and turn off output buffering
//ob_end_clean();
//// Output the generated PDF to Browser
//$dompdf->stream("chosen_images.pdf", ["Attachment" => 1]);




