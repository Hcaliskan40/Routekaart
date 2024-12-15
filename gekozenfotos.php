<?php
session_start();
// Debugging: Print session variables
echo '<pre>';
print_r($_SESSION);
echo '</pre>';

// Verzamel alle gekozen afbeeldingen voor opdracht 1, 2 en 3 uit de sessie
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
            background-color: #f16682;
        }

        .titel-balk.opdracht3 {
            background-color: #3498db;
        }

        .chosen-images {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 20px;
            margin-top: 10px;
        }

        .image-item {
            box-sizing: border-box;
            padding: 5px;
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
    <p>Bedankt voor het invullen van jouw studiekeuzevragen. Hier vind je een overzicht van jouw antwoorden en keuzes.
        Dit verslag kan je helpen bij het maken van een weloverwogen studiekeuze.</p>
    <a href="generate-pdf.php">Download PDF</a>
</div>

<!-- Opdracht 1 -->
<div class="container">
    <div class="titel-balk">1 Like</div>
    <h3>Hier krijg ik energie van en doe ik graag:</h3>
    <div class="chosen-images">
        <?php foreach ($selectedImagesOpdracht1 as $index => $image): ?>
            <div class="image-item">
                <img src="<?php echo htmlspecialchars($image, ENT_QUOTES, 'UTF-8'); ?>" alt="Gekozen Afbeelding">
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
    <h3>Dit wil ik leren/ontdekken:</h3>
    <div class="chosen-images">
        <?php foreach ($selectedImagesOpdracht2 as $index => $image): ?>
            <div class="image-item">
                <img src="<?php echo htmlspecialchars($image, ENT_QUOTES, 'UTF-8'); ?>" alt="Gekozen Afbeelding">
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
    <h3>Wanneer gebruik ik mijn talenten?</h3>
    <div class="chosen-images">
        <?php foreach ($selectedImagesOpdracht3 as $index => $image): ?>
            <div class="image-item">
                <img src="<?php echo htmlspecialchars($image, ENT_QUOTES, 'UTF-8'); ?>" alt="Gekozen Afbeelding">
                <div class="message-item">
                    <strong>Antwoord <?php echo $index + 1; ?>:</strong>
                    <?php echo htmlspecialchars($messages3[$index], ENT_QUOTES, 'UTF-8'); ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>
