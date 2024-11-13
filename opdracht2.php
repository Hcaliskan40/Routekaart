<?php
session_start();

// Controleer of we de sessie moeten resetten
if (isset($_GET['reset']) && $_GET['reset'] == 'true') {
    session_unset(); // Leeg de sessiegegevens
    session_destroy(); // Vernietig de sessie
    session_start(); // Start een nieuwe lege sessie
}

// Stel de gekozen afbeeldingen in voor Opdracht 2, of laat de placeholders leeg als er nog geen afbeeldingen zijn gekozen
$selectedImagesOpdracht2 = [
    $_SESSION['selectedImage3'] ?? '',
    $_SESSION['selectedImage4'] ?? '',
    $_SESSION['selectedImage5'] ?? '',
];
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuwsgierig</title>
    <link rel="stylesheet" type="text/css" href="css/opdracht2.css">
</head>
<body>
<div class="container">
    <div class="header">
        <span class="dot">2</span>
        <div class="titel-balk">Nieuwsgierig</div> <!-- Tekst die aangeeft dat dit sectie 2 is. -->

    </div>
    <p>Hier krijg ik energie van en doe ik graag:</p>
    <div class="input-box">

        <!-- Eerste input-item voor Opdracht 2 -->
        <div class="input-item">
            <form method="post" action="popup.php">
                <input type="hidden" name="imageIndex" value="3"> <!-- Unieke index voor Opdracht 2 -->
                <input type="hidden" name="caller" value="opdracht2.php"> <!-- Nieuw: caller toevoegen -->
                <button type="submit" class="image-placeholder">
                    <?php if ($selectedImagesOpdracht2[0] != ''): ?>
                        <img src="<?php echo htmlspecialchars($selectedImagesOpdracht2[0], ENT_QUOTES, 'UTF-8'); ?>" alt="Gekozen afbeelding" class="image-placeholder">
                    <?php else: ?>
                        <div class="image-placeholder">+</div>
                    <?php endif; ?>
                </button>
            </form>
            <textarea name="message4" rows="10" cols="40" placeholder="Wat vind ik hier leuk aan?"></textarea>
        </div>

        <!-- Tweede input-item voor Opdracht 2 -->
        <div class="input-item">
            <form method="post" action="popup.php">
                <input type="hidden" name="imageIndex" value="4"> <!-- Unieke index voor Opdracht 2 -->
                <input type="hidden" name="caller" value="opdracht2.php"> <!-- Nieuw: caller toevoegen -->
                <button type="submit" class="image-placeholder">
                    <?php if ($selectedImagesOpdracht2[1] != ''): ?>
                        <img src="<?php echo htmlspecialchars($selectedImagesOpdracht2[1], ENT_QUOTES, 'UTF-8'); ?>" alt="Gekozen afbeelding" class="image-placeholder">
                    <?php else: ?>
                        <div class="image-placeholder">+</div>
                    <?php endif; ?>
                </button>
            </form>
            <textarea name="message5" rows="3" cols="40" placeholder="Wat vind ik hier leuk aan?"></textarea>
        </div>

        <!-- Derde input-item voor Opdracht 2 -->
        <div class="input-item">
            <form method="post" action="popup.php">
                <input type="hidden" name="imageIndex" value="5"> <!-- Unieke index voor Opdracht 2 -->
                <input type="hidden" name="caller" value="opdracht2.php"> <!-- Nieuw: caller toevoegen -->
                <button type="submit" class="image-placeholder">
                    <?php if ($selectedImagesOpdracht2[2] != ''): ?>
                        <img src="<?php echo htmlspecialchars($selectedImagesOpdracht2[2], ENT_QUOTES, 'UTF-8'); ?>" alt="Gekozen afbeelding" class="image-placeholder">
                    <?php else: ?>
                        <div class="image-placeholder">+</div>
                    <?php endif; ?>
                </button>
            </form>
            <textarea name="message6" rows="3" cols="40" placeholder="Wat vind ik hier leuk aan?"></textarea>
        </div>
    </div>

    <div class="button-group">
        <button class="arrow-btn"onclick="goToPreviousPage()">&#8249;</button> <!-- Linker navigatieknop -->

        <button class="arrow-btn" onclick="goToNextPage()">&#8250;</button> <!-- Rechter navigatieknop -->
    </div>




</div>
<script>
    function goToPreviousPage() {
        window.location.href = 'opdracht1.php';}


    function goToNextPage() {
        window.location.href = 'opdracht3.php';}
</script>
</body>
</html>