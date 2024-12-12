<?php
session_start();

// Controleer of we de sessie moeten resetten
if (isset($_GET['reset']) && $_GET['reset'] == 'true') {
    session_unset(); // Leeg de sessiegegevens
    session_destroy(); // Vernietig de sessie
    session_start(); // Start een nieuwe lege sessie
}

// Stel de gekozen afbeeldingen in, of laat de placeholders leeg als er nog geen afbeeldingen zijn gekozen
$selectedImages = [
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
    <title>Opdracht 2 - Nieuwsgierig</title>
    <link rel="stylesheet" type="text/css" href="css/opdracht2.css">
    <link href="https://emoji-css.afeld.me/emoji.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="header">
        <span class="dot">2</span>
        <div class="titel-balk">Nieuwsgierig <i class="em em-eyes" aria-role="presentation" aria-label="EYES"></i> </div>
    </div>
    <p>Dit wil ik leren/ontdekken:</p>


    <div class="input-box">

        <!-- Eerste input-item -->
        <div class="input-item">
            <form method="post" action="popup.php">
                <input type="hidden" name="imageIndex" value="3">
                <input type="hidden" name="caller" value="opdracht2.php">
                <button type="submit" class="image-placeholder">
                    <?php if ($selectedImages[0] != ''): ?>
                        <img src="<?php echo htmlspecialchars($selectedImages[0], ENT_QUOTES, 'UTF-8'); ?>" alt="Gekozen afbeelding" class="image-placeholder">
                    <?php else: ?>
                        <div class="image-placeholder">+</div>
                    <?php endif; ?>
                </button>
            </form>
            <textarea id="message4" rows="10" cols="40" placeholder="Wat vind ik hier leuk aan?" oninput="saveText('message4')"></textarea>
        </div>

        <!-- Tweede input-item -->
        <div class="input-item">
            <form method="post" action="popup.php">
                <input type="hidden" name="imageIndex" value="4">
                <input type="hidden" name="caller" value="opdracht2.php">
                <button type="submit" class="image-placeholder">
                    <?php if ($selectedImages[1] != ''): ?>
                        <img src="<?php echo htmlspecialchars($selectedImages[1], ENT_QUOTES, 'UTF-8'); ?>" alt="Gekozen afbeelding" class="image-placeholder">
                    <?php else: ?>
                        <div class="image-placeholder">+</div>
                    <?php endif; ?>
                </button>
            </form>
            <textarea id="message5" rows="10" cols="40" placeholder="Wat vind ik hier leuk aan?" oninput="saveText('message5')"></textarea>
        </div>

        <!-- Derde input-item -->
        <div class="input-item">
            <form method="post" action="popup.php">
                <input type="hidden" name="imageIndex" value="5">
                <input type="hidden" name="caller" value="opdracht2.php">
                <button type="submit" class="image-placeholder">
                    <?php if ($selectedImages[2] != ''): ?>
                        <img src="<?php echo htmlspecialchars($selectedImages[2], ENT_QUOTES, 'UTF-8'); ?>" alt="Gekozen afbeelding" class="image-placeholder">
                    <?php else: ?>
                        <div class="image-placeholder">+</div>
                    <?php endif; ?>
                </button>
            </form>
            <textarea id="message6" rows="10" cols="40" placeholder="Wat vind ik hier leuk aan?" oninput="saveText('message6')"></textarea>
        </div>

    </div>
    <div class="button-group">
        <button class="arrow-btn" onclick="goToPreviousPage()">&#8249;</button>
        <button class="arrow-btn" onclick="goToNextPage()">&#8250;</button>
    </div>
</div>

<script>
    // Laad opgeslagen waarden bij het laden van de pagina
    window.onload = function () {
        document.getElementById('message4').value = localStorage.getItem('message4') || '';
        document.getElementById('message5').value = localStorage.getItem('message5') || '';
        document.getElementById('message6').value = localStorage.getItem('message6') || '';
    }

    // Functie om de tekst op te slaan in localStorage wanneer er iets verandert
    function saveText(id) {
        const value = document.getElementById(id).value;
        localStorage.setItem(id, value);
    }

    function goToPreviousPage() {
        window.location.href = 'opdracht1.php';
    }

    function goToNextPage() {
        window.location.href = 'opdracht3.php';
    }
</script>
</body>
</html>
