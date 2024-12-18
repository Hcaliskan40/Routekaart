<?php
//session_start();
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
require 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

function ImageToDataUrl($filename) {
    if(!file_exists($filename))
        return "";

    $mime = mime_content_type($filename);
    if($mime === false)
        return "";

    $raw_data = file_get_contents($filename);
    if(empty($raw_data))
        return "";

    return "data:{$mime};base64," . base64_encode($raw_data);
}

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

$doc = new DOMDocument();
libxml_use_internal_errors(true);
$doc->loadHTML($html);

$tags = $doc->getElementsByTagName('img');
foreach ($tags as $tag) {
    $imgurl = $tag->getAttribute('src');
    $newImageBase64 = ImageToDataUrl($imgurl);
    $tag->setAttribute('src', $newImageBase64);
}
$atags = $doc->getElementsByTagName('a');
foreach($atags as $atag) {
    if($atag->textContent == "Download PDF") {
        $atag->parentNode->removeChild($atag);
    }
}
$html = $doc->saveHTML();

// De html is goed hier


// Zorg ervoor dat de afbeelding-paden absolute URL's zijn
//$html = preg_replace('/src="img\//', 'src="http://localhost/routekaart/img/', $html);

// Laad de HTML in Dompdf
$dompdf->loadHtml($html);

// Stel het papierformaat in
$dompdf->setPaper('A4', 'portrait');

// Genereer de PDF
$dompdf->render();

// Stream de PDF als download
$dompdf->stream("routekaart.pdf", ["Attachment" => true]);