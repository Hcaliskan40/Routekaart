<?php
session_start();

// Collect all chosen images from the session
$selectedImagesOpdracht1 = [
    $_SESSION['selectedImage0'] ?? 'img/placeholder0.jpg',
    $_SESSION['selectedImage1'] ?? 'img/placeholder1.jpg',
    $_SESSION['selectedImage2'] ?? 'img/placeholder2.jpg',
];

$selectedImageOpdracht2 = [
    $_SESSION['selectedImage3'] ?? 'img/placeholder3.jpg',
    $_SESSION['selectedImage4'] ?? 'img/placeholder4.jpg',
    $_SESSION['selectedImage5'] ?? 'img/placeholder5.jpg',
];

$selectedImagesOpdracht3 = [
    $_SESSION['selectedImage_opdracht3_0'] ?? 'img/placeholder7.jpg',
    $_SESSION['selectedImage_opdracht3_1'] ?? 'img/placeholder8.jpg',
    $_SESSION['selectedImage_opdracht3_2'] ?? 'img/placeholder9.jpg',
];

$selectedImagesOpdracht4 = [
    $_SESSION['selectedImage_opdracht4_0'] ?? 'img/placeholder10.jpg',
    $_SESSION['selectedImage_opdracht4_1'] ?? 'img/placeholder11.jpg',
    $_SESSION['selectedImage_opdracht4_2'] ?? 'img/placeholder12.jpg',
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chosen Images</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/pdf.css">

</head>
<body>
<img id="logo" src="img/WindesheimLogo.png" alt="Windesheim Logo" style="display: block; margin: 0 auto;">
<div class="intro">
<h1>Studiekeuze Routekaart</h1>
<p>Bedankt voor het invullen van jouw studiekeuzevragen. Hier vind je een overzicht van jouw antwoorden en keuzes.
Dit verslag kan je helpen bij het maken van een weloverwogen studiekeuze.</p>
</div>
<div class="container">

    <div class="header1">
        <span class="dot1">1</span>
        <div class="titel-balk1"> Like</div>
    </div>
    <h3>Hier krijg ik energie van en doe ik graag:</h3>
    <div class="chosen-images">
        <?php foreach ($selectedImagesOpdracht1 as $image): ?>
            <div class="image-item">
                <img src="<?php echo htmlspecialchars($image, ENT_QUOTES, 'UTF-8'); ?>" alt="Chosen Image">
            </div>
        <?php endforeach; ?>
    </div>
    <h2>Chosen Images for Opdracht 2</h2>
    <div class="chosen-images">
        <?php foreach ($selectedImageOpdracht2 as $image): ?>
            <div class="image-item">
                <img src="<?php echo htmlspecialchars($image, ENT_QUOTES, 'UTF-8'); ?>" alt="Chosen Image">
            </div>
        <?php endforeach; ?>
    <h2>Chosen Images for Opdracht 3</h2>
    <div class="chosen-images">
        <?php foreach ($selectedImagesOpdracht3 as $image): ?>
            <div class="image-item">
                <img src="<?php echo htmlspecialchars($image, ENT_QUOTES, 'UTF-8'); ?>" alt="Chosen Image">
            </div>
        <?php endforeach; ?>
    </div>
    <h2>Chosen Images for Opdracht 4</h2>
    <div class="chosen-images">
        <?php foreach ($selectedImagesOpdracht4 as $image): ?>
            <div class="image-item">
                <img src="<?php echo htmlspecialchars($image, ENT_QUOTES, 'UTF-8'); ?>" alt="Chosen Image">
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>