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
    $_SESSION['selectedImage_opdracht3_0'] ?? '',
    $_SESSION['selectedImage_opdracht3_1'] ?? '',
    $_SESSION['selectedImage_opdracht3_2'] ?? '',
];
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opdracht 3 - Trots</title>
    <link rel="stylesheet" type="text/css" href="css/opdracht3.css">
</head>
<body>
<div class="container">
    <div class="header">
        <span class="dot">3</span>
        <div class="titel-balk">Trots</div>
    </div>
    <p>Wanneer gebruik ik mijn talenten?</p>
    <div class="input-box">

        <!-- Eerste input-item -->
        <div class="input-item">
            <form method="post" action="popup3.php">
                <input type="hidden" name="imageIndex" value="0">
                <input type="hidden" name="caller" value="opdracht3.php">
                <button type="submit" class="image-placeholder">
                    <?php if ($selectedImages[0] != ''): ?>
                        <img src="<?php echo htmlspecialchars($selectedImages[0], ENT_QUOTES, 'UTF-8'); ?>" alt="Gekozen afbeelding" class="image-placeholder">
                    <?php else: ?>
                        <div class="image-placeholder">+</div>
                    <?php endif; ?>
                </button>
            </form>
            <textarea id="message7" rows="10" cols="40" placeholder="Wanneer gebruik ik mijn talenten?" oninput="saveText('message7')"></textarea>
        </div>

        <!-- Tweede input-item -->
        <div class="input-item">
            <form method="post" action="popup3.php">
                <input type="hidden" name="imageIndex" value="1">
                <input type="hidden" name="caller" value="opdracht3.php">
                <button type="submit" class="image-placeholder">
                    <?php if ($selectedImages[1] != ''): ?>
                        <img src="<?php echo htmlspecialchars($selectedImages[1], ENT_QUOTES, 'UTF-8'); ?>" alt="Gekozen afbeelding" class="image-placeholder">
                    <?php else: ?>
                        <div class="image-placeholder">+</div>
                    <?php endif; ?>
                </button>
            </form>
            <textarea id="message8" rows="10" cols="40" placeholder="Wanneer gebruik ik mijn talenten?" oninput="saveText('message8')"></textarea>
        </div>

        <!-- Derde input-item -->
        <div class="input-item">
            <form method="post" action="popup3.php">
                <input type="hidden" name="imageIndex" value="2">
                <input type="hidden" name="caller" value="opdracht3.php">
                <button type="submit" class="image-placeholder">
                    <?php if ($selectedImages[2] != ''): ?>
                        <img src="<?php echo htmlspecialchars($selectedImages[2], ENT_QUOTES, 'UTF-8'); ?>" alt="Gekozen afbeelding" class="image-placeholder">
                    <?php else: ?>
                        <div class="image-placeholder">+</div>
                    <?php endif; ?>
                </button>
            </form>
            <textarea id="message9" rows="10" cols="40" placeholder="Wanneer gebruik ik mijn talenten?" oninput="saveText('message9')"></textarea>
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
        document.getElementById('message7').value = localStorage.getItem('message7') || '';
        document.getElementById('message8').value = localStorage.getItem('message8') || '';
        document.getElementById('message9').value = localStorage.getItem('message9') || '';
    }

    // Functie om de tekst op te slaan in localStorage wanneer er iets verandert
    function saveText(id) {
        const value = document.getElementById(id).value;
        localStorage.setItem(id, value);
    }

    function goToPreviousPage() {
        window.location.href = 'opdracht2.php';
    }

    function goToNextPage() {
        window.location.href = 'opdracht4.php';
    }
</script>
</body>
</html>
