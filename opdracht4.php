<?php
session_start();

// Controleer of we de sessie moeten resetten
if (isset($_GET['reset']) && $_GET['reset'] == 'true') {
    session_unset(); // Leegt de sessiegegevens
    session_destroy(); // Vernietigt de sessie
    session_start(); // Start een nieuwe lege sessie
}

// Stel de gekozen afbeeldingen in, of laat de placeholders leeg als er nog geen afbeeldingen zijn gekozen
$selectedImages = [
    $_SESSION['selectedImage_opdracht4_0'] ?? '',
    $_SESSION['selectedImage_opdracht4_1'] ?? '',
    $_SESSION['selectedImage_opdracht4_2'] ?? '',
];
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opdracht 4 - Belangrijk</title>
    <link rel="stylesheet" type="text/css" href="css/opdracht4.css">
    <link href="https://emoji-css.afeld.me/emoji.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="header">
        <span class="dot">4</span>
        <div class="titel-balk">Belangrijk <i class="em em-bangbang" aria-role="presentation" aria-label="DOUBLE EXCLAMATION MARK"></i></div> <!-- Tekst die aangeeft dat dit sectie 4 is, met het onderwerp 'Belangrijk'. -->
    </div>
    <p>Dit is belangrijk in mijn leven:</p>

    <div class="input-box">

        <!-- Eerste input-item -->
        <div class="input-item">
            <form method="post" action="popup4.php">
                <input type="hidden" name="imageIndex" value="0">
                <input type="hidden" name="caller" value="opdracht4.php">
                <button type="submit" class="image-placeholder">
                    <?php if ($selectedImages[0] != ''): ?>
                        <img src="<?php echo htmlspecialchars($selectedImages[0], ENT_QUOTES, 'UTF-8'); ?>" alt="Gekozen afbeelding" class="image-placeholder">
                    <?php else: ?>
                        <div class="image-placeholder">+</div>
                    <?php endif; ?>
                </button>
            </form>
            <textarea id="message10" rows="10" cols="40" placeholder="Waarom is dit belangrijk?" oninput="saveText('message10')"></textarea>
        </div>

        <!-- Tweede input-item -->
        <div class="input-item">
            <form method="post" action="popup4.php">
                <input type="hidden" name="imageIndex" value="1">
                <input type="hidden" name="caller" value="opdracht4.php">
                <button type="submit" class="image-placeholder">
                    <?php if ($selectedImages[1] != ''): ?>
                        <img src="<?php echo htmlspecialchars($selectedImages[1], ENT_QUOTES, 'UTF-8'); ?>" alt="Gekozen afbeelding" class="image-placeholder">
                    <?php else: ?>
                        <div class="image-placeholder">+</div>
                    <?php endif; ?>
                </button>
            </form>
            <textarea id="message11" rows="10" cols="40" placeholder="Waarom is dit belangrijk?" oninput="saveText('message11')"></textarea>
        </div>

        <!-- Derde input-item -->
        <div class="input-item">
            <form method="post" action="popup4.php">
                <input type="hidden" name="imageIndex" value="2">
                <input type="hidden" name="caller" value="opdracht4.php">
                <button type="submit" class="image-placeholder">
                    <?php if ($selectedImages[2] != ''): ?>
                        <img src="<?php echo htmlspecialchars($selectedImages[2], ENT_QUOTES, 'UTF-8'); ?>" alt="Gekozen afbeelding" class="image-placeholder">
                    <?php else: ?>
                        <div class="image-placeholder">+</div>
                    <?php endif; ?>
                </button>
            </form>
            <textarea id="message12" rows="10" cols="40" placeholder="Waarom is dit belangrijk?" oninput="saveText('message12')"></textarea>
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
        document.getElementById('message10').value = localStorage.getItem('message10') || '';
        document.getElementById('message11').value = localStorage.getItem('message11') || '';
        document.getElementById('message12').value = localStorage.getItem('message12') || '';
    }

    // Functie om de tekst op te slaan in localStorage wanneer er iets verandert
    function saveText(id) {
        const value = document.getElementById(id).value;
        localStorage.setItem(id, value);
    }

    function goToPreviousPage() {
        window.location.href = 'opdracht3.php';
    }

    function goToNextPage() {
        window.location.href = 'opdracht5.php';
    }
</script>
</body>
</html>
