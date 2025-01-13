<?php
session_start();

// Verzamel alle gekozen afbeeldingen voor opdracht 1, 2, 3 en 4 uit de sessie
$selectedImagesOpdracht1 = [
    $_SESSION['selectedImage0'] ?? 'img/placeholder0.jpg',
    $_SESSION['selectedImage1'] ?? 'img/placeholder1.jpg',
    $_SESSION['selectedImage2'] ?? 'img/placeholder2.jpg',
];
$selectedImagesOpdracht2 = [
    $_SESSION['selectedImage3'] ?? 'img/placeholder3.jpg',
    $_SESSION['selectedImage4'] ?? 'img/placeholder4.jpg',
    $_SESSION['selectedImage5'] ?? 'img/placeholder5.jpg',
];
$selectedImagesOpdracht3 = [
    $_SESSION['selectedImage_opdracht3_0'] ?? 'img/placeholder0.jpg',
    $_SESSION['selectedImage_opdracht3_1'] ?? 'img/placeholder1.jpg',
    $_SESSION['selectedImage_opdracht3_2'] ?? 'img/placeholder2.jpg',
];
$selectedImagesOpdracht4 = [
    $_SESSION['selectedImage_opdracht4_0'] ?? 'img/placeholder0.jpg',
    $_SESSION['selectedImage_opdracht4_1'] ?? 'img/placeholder1.jpg',
    $_SESSION['selectedImage_opdracht4_2'] ?? 'img/placeholder2.jpg',
];

// Haal de geselecteerde sectoren en beroepen op voor opdracht 5
$selectedSectors = [
    $_SESSION['sector1'] ?? 'Geen sector geselecteerd',
    $_SESSION['sector2'] ?? 'Geen sector geselecteerd',
    $_SESSION['sector3'] ?? 'Geen sector geselecteerd',
];

$selectedProfessions = [
    $_SESSION['message5a'] ?? 'Geen beroep ingevoerd',
    $_SESSION['message5b'] ?? 'Geen beroep ingevoerd',
    $_SESSION['message5c'] ?? 'Geen beroep ingevoerd',
];

// Haal de ingevoerde berichten op uit de sessie
$messages1 = [
    $_SESSION['message1'] ?? 'Geen tekst ingevoerd.',
    $_SESSION['message2'] ?? 'Geen tekst ingevoerd.',
    $_SESSION['message3'] ?? 'Geen tekst ingevoerd.',
];
$messages2 = [
    $_SESSION['message4'] ?? 'Geen tekst ingevoerd.',
    $_SESSION['message5'] ?? 'Geen tekst ingevoerd.',
    $_SESSION['message6'] ?? 'Geen tekst ingevoerd.',
];
$messages3 = [
    $_SESSION['message7'] ?? 'Geen tekst ingevoerd.',
    $_SESSION['message8'] ?? 'Geen tekst ingevoerd.',
    $_SESSION['message9'] ?? 'Geen tekst ingevoerd.',
];
$messages4 = [
    $_SESSION['message10'] ?? 'Geen tekst ingevoerd.',
    $_SESSION['message11'] ?? 'Geen tekst ingevoerd.',
    $_SESSION['message12'] ?? 'Geen tekst ingevoerd.',
];
$Beroep = [
    $_SESSION['message5a'] ?? 'Geen beroep ingevoerd.',
    $_SESSION['message5b'] ?? 'Geen beroep ingevoerd.',
    $_SESSION['message5c'] ?? 'Geen beroep ingevoerd.',
];
$Opleiding = [
    $_SESSION['message6a'] ?? 'Geen opleiding ingevoerd.',
    $_SESSION['message6b'] ?? 'Geen opleiding ingevoerd.',
    $_SESSION['message6c'] ?? 'Geen opleiding ingevoerd.',
];

// Haal de antwoorden op voor vraag 7 en 8
$vraag7_choices = array_keys($_SESSION['selectedOptions7'] ?? []);
$vraag8_keuze = array_keys($_SESSION['selectedOptions8'] ?? []);
$vraag8_feedback = $_SESSION['feedback'] ?? 'Geen feedback gegeven';
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gekozen Afbeeldingen</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        .intro {
            text-align: center;
            margin: 20px 0;
        }

        .titel-balk {
            background-color: #b1d249;
            color: white;
            font-size: 30px;
            padding: 10px 20px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

        .titel-balk.opdracht2 {
            background-color: #b1d249;
        }

        .titel-balk.opdracht3 {
            background-color: #3498db;
        }

        .titel-balk.opdracht4 {
            background-color: #fac710;
        }

        .titel-balk.opdracht5 {
            background-color: #d63384;
        }
        .titel-balk.opdracht6 {
            background-color: #fadb10;
        }
        .titel-balk.opdracht7 {
            background-color: #6a0dac;
        }
        .titel-balk.opdracht8 {
            background-color: #ee3135;
        }


        .chosen-images, .chosen-sectors {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 20px;
            margin-top: 10px;
        }

        .image-item, .sector-item {
            box-sizing: border-box;
            padding: 10px;
            border: 1px solid #ccc;
            background-color: #fafafa;
            text-align: center;
        }

        .image-item img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        .resized-image {
            width: 200px;
            height: auto;
        }

        .message-item {
            margin-top: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            background-color: #fff;
        }
    </style>
</head>
<body>
<div class="intro">
    <h1>Studiekeuze Routekaart</h1>
    <p>Bedankt voor het invullen van jouw studiekeuzevragen. Hier vind je een overzicht van jouw antwoorden en keuzes.</p>
    <a href="generate-pdf.php">Download PDF</a>
</div>

<!-- Opdracht 1 -->
<div class="container">
    <div class="titel-balk">1 Like</div>
    <div class="chosen-images">
        <?php foreach ($selectedImagesOpdracht1 as $index => $image): ?>
            <div class="image-item">
                <img src="<?php echo htmlspecialchars($image, ENT_QUOTES, 'UTF-8'); ?>" alt="Gekozen Afbeelding" class="resized-image">
                <div class="message-item">
                    <strong>Antwoord <?php echo $index + 1; ?>:</strong>
                    <?php echo htmlspecialchars($messages1[$index], ENT_QUOTES, 'UTF-8'); ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Opdracht 2 -->
<div class="container">
    <div class="titel-balk opdracht2">2 Nieuwsgierig</div>
    <div class="chosen-images">
        <?php foreach ($selectedImagesOpdracht2 as $index => $image): ?>
            <div class="image-item">
                <img src="<?php echo htmlspecialchars($image, ENT_QUOTES, 'UTF-8'); ?>" alt="Gekozen Afbeelding" class="resized-image">
                <div class="message-item">
                    <strong>Antwoord <?php echo $index + 1; ?>:</strong>
                    <?php echo htmlspecialchars($messages2[$index], ENT_QUOTES, 'UTF-8'); ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Opdracht 3 -->
<div class="container">
    <div class="titel-balk opdracht3">3 Trots</div>
    <div class="chosen-images">
        <?php foreach ($selectedImagesOpdracht3 as $index => $image): ?>
            <div class="image-item">
                <img src="<?php echo htmlspecialchars($image, ENT_QUOTES, 'UTF-8'); ?>" alt="Gekozen Afbeelding" class="resized-image">
                <div class="message-item">
                    <strong>Antwoord <?php echo $index + 1; ?>:</strong>
                    <?php echo htmlspecialchars($messages3[$index], ENT_QUOTES, 'UTF-8'); ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Opdracht 4 -->
<div class="container">
    <div class="titel-balk opdracht4">4 Belangrijk</div>
    <div class="chosen-images">
        <?php foreach ($selectedImagesOpdracht4 as $index => $image): ?>
            <div class="image-item">
                <img src="<?php echo htmlspecialchars($image, ENT_QUOTES, 'UTF-8'); ?>" alt="Gekozen Afbeelding" class="resized-image">
                <div class="message-item">
                    <strong>Antwoord <?php echo $index + 1; ?>:</strong>
                    <?php echo htmlspecialchars($messages4[$index], ENT_QUOTES, 'UTF-8'); ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Opdracht 5 -->
<div class="container">
    <div class="titel-balk opdracht5">5 Beroepen</div>
    <div class="chosen-sectors">
        <?php foreach ($selectedSectors as $index => $sector): ?>
            <div class="sector-item">
                <strong>Sector <?php echo $index + 1; ?>:</strong> <?php echo htmlspecialchars($sector, ENT_QUOTES, 'UTF-8'); ?>
                <br>
                <strong>Beroep:</strong> <?php echo htmlspecialchars($selectedProfessions[$index], ENT_QUOTES, 'UTF-8'); ?>
            </div>
        <?php endforeach; ?>
    </div>

</div>
</div>
<!-- Opdracht 6 -->
<div class="container">
    <div class="titel-balk opdracht6">6 Opleidingen</div>
    <div class="chosen-sectors">
        <?php foreach ($Beroep as $index => $profession): ?>
            <div class="sector-item">
                <strong>Beroep <?php echo $index + 1; ?>:</strong> <?php echo htmlspecialchars($profession, ENT_QUOTES, 'UTF-8'); ?>
                <br>
                <strong>Opleiding:</strong> <?php echo htmlspecialchars($Opleiding[$index], ENT_QUOTES, 'UTF-8'); ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Vraag 7 -->
<div class="container">
    <div class="titel-balk opdracht7">7 Verlanglijst</div>
    <div class="message-item">
        <strong>Jouw keuzes:</strong>
        <ul>
            <?php foreach ($vraag7_choices as $choice): ?>
                <li><?php echo htmlspecialchars($choice, ENT_QUOTES, 'UTF-8'); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<!-- Vraag 8 -->
<div class="container">
    <div class="titel-balk opdracht8">8 Jouw keuze</div>
    <div class="message-item">
        <strong>Keuze:</strong> <?php echo htmlspecialchars(implode(', ', $vraag8_keuze), ENT_QUOTES, 'UTF-8'); ?>
    </div>
    <div class="message-item">
        <strong>Feedback:</strong> <?php echo nl2br(htmlspecialchars($vraag8_feedback, ENT_QUOTES, 'UTF-8')); ?>
    </div>
</div>
</body>
</html>
