<?php
session_start();
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
require 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

// Stel opties in voor Dompdf
$options = new Options();
$options->set('isRemoteEnabled', true); // Voor externe bronnen zoals afbeeldingen
$options->set('isHtml5ParserEnabled', true); // Voor betere HTML5/CSS-ondersteuning

// Initialiseer Dompdf
$dompdf = new Dompdf($options);

// Buffer de HTML-output
ob_start();
require 'gekozenfotos.php'; // Zorg ervoor dat gekozenfotos.php correcte HTML retourneert
$html = ob_get_clean();

// Zorg ervoor dat de afbeelding-paden absolute URL's zijn
$html = preg_replace('/src="img\//', 'src="http://localhost:8080/routekaart/img/', $html);

// Laad de HTML in Dompdf
$dompdf->loadHtml($html);

// Stel het papierformaat in
$dompdf->setPaper('A4', 'portrait');


$options->set('isRemoteEnabled', true);

// Genereer de PDF
$dompdf->render();

// Stream de PDF als download
$dompdf->stream("routekaart.pdf", ["Attachment" => true]);
// Laad de HTML en genereer de PDF
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

// Stream de PDF naar de browser
$dompdf->stream("routekaart.pdf", ["Attachment" => true]);
