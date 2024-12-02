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

// Debugging: Print the image paths
//echo '<pre>';
//print_r($selectedImagesOpdracht1);
//print_r($selectedImageOpdracht2);
//print_r($selectedImagesOpdracht3);
//print_r($selectedImagesOpdracht4);
//echo '</pre>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chosen Images</title>
<!--    <link rel="stylesheet" href="css/styles.css">-->
<!--    <link rel="stylesheet" href="css/pdf.css">-->
    <style>
        /* Contents of styles.css */
        .image-container {
            display: flex;
            justify-content: space-around;
            margin-top: 50px;
        }

        .image-button {
            background: none;
            border: none;
            padding: 0;
            cursor: pointer;
        }

        .image-button img {
            width: 150px;
            height: 150px;
            border: 1px solid #000;
        }

        /* Contents of pdf.css */
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

        #logo {
            display: block;
            margin: 0 auto;
            width: 200px;
            height: auto;
        }

        .intro {
            text-align: center;
            margin: 20px 0;
        }

        .header1 {
            display: flex;
            align-items: center;
            font-size: 2em;
            font-weight: bold;
            color: #b1d249;
            padding-bottom: 15px;
        }

        .titel-balk1 {
            background-color: #b1d249;
            color: white;
            font-size: 30px;
            flex-grow: 0.8;
            padding: 10px 20px;
        }

        .dot1 {
            height: 75px;
            width: 75px;
            background-color: #b1d249;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 30px;
            color: white;
            font-family: "Roboto Thin";
        }

        h2 {
            font-size: 1.2em;
            color: #333;
            margin-top: 20px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 5px;
        }

        .chosen-images {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
        }

        .image-item {
            flex: 1 1 calc(33.333% - 10px);
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

        /*@media print {*/
        /*    body {*/
        /*        background-color: #fff;*/
        /*    }*/

        /*    .container {*/
        /*        width: 100%;*/
        /*        box-shadow: none;*/
        /*    }*/

        /*    h2 {*/
        /*        page-break-before: always;*/
        /*    }*/
        /*}*/
    </style>
</head>
<body>
<img id="logo" src="img/WindesheimLogo.png" alt="Windesheim Logo">
<div class="intro">
    <h1>Studiekeuze Routekaart</h1>
    <p>Bedankt voor het invullen van jouw studiekeuzevragen. Hier vind je een overzicht van jouw antwoorden en keuzes.
        Dit verslag kan je helpen bij het maken van een weloverwogen studiekeuze.</p>
    <a href="generate-pdf.php" class="button">Download PDF</a>
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
    </div>
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