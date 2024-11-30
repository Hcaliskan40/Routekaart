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
    $_SESSION['selectedImage0'] ?? '',
    $_SESSION['selectedImage1'] ?? '',
    $_SESSION['selectedImage2'] ?? '',
];



?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opdracht 1 - Like Section</title>
    <link rel="stylesheet" type="text/css" href="css/opdracht1.css">
</head>
<body>
<div class="container">
    <div class="header">
        <span class="dot">1</span>
        <div class="titel-balk"> Like</div> <!-- Tekst die aangeeft dat dit sectie 1 is, met het onderwerp 'Like'. -->
        <a href="opdracht1.php?reset=true" class="reset-link">Reset keuzes</a> <!-- Link om de sessie te resetten -->
    </div>
    <p>Hier krijg ik energie van en doe ik graag:</p>
    <div class="input-box">

        <!-- Eerste input-item -->
        <div class="input-item">
            <form method="post" action="popup.php">
                <input type="hidden" name="imageIndex" value="0">
                <input type="hidden" name="caller" value="opdracht1.php"> <!-- Nieuw: caller toevoegen -->
                <button type="submit" class="image-placeholder">
                    <?php if ($selectedImages[0] != ''): ?>
                        <img src="<?php echo htmlspecialchars($selectedImages[0], ENT_QUOTES, 'UTF-8'); ?>" alt="Gekozen afbeelding" class="image-placeholder">
                    <?php else: ?>
                        <div class="image-placeholder">+</div>
                    <?php endif; ?>
                </button>
            </form>
            <textarea id="message1" rows="10" cols="40" placeholder="Wat vind ik hier leuk aan?" oninput="saveText('message1')"></textarea>
        </div>

        <!-- Tweede input-item -->
        <div class="input-item">
            <form method="post" action="popup.php">
                <input type="hidden" name="imageIndex" value="1">
                <input type="hidden" name="caller" value="opdracht1.php"> <!-- Nieuw: caller toevoegen -->
                <button type="submit" class="image-placeholder">
                    <?php if ($selectedImages[1] != ''): ?>
                        <img src="<?php echo htmlspecialchars($selectedImages[1], ENT_QUOTES, 'UTF-8'); ?>" alt="Gekozen afbeelding" class="image-placeholder">
                    <?php else: ?>
                        <div class="image-placeholder">+</div>
                    <?php endif; ?>
                </button>
            </form>
            <textarea id="message2" rows="10" cols="40" placeholder="Wat vind ik hier leuk aan?" oninput="saveText('message2')"></textarea>
        </div>

        <!-- Derde input-item -->
        <div class="input-item">
            <form method="post" action="popup.php">
                <input type="hidden" name="imageIndex" value="2">
                <input type="hidden" name="caller" value="opdracht1.php"> <!-- Nieuw: caller toevoegen -->
                <button type="submit" class="image-placeholder">
                    <?php if ($selectedImages[2] != ''): ?>
                        <img src="<?php echo htmlspecialchars($selectedImages[2], ENT_QUOTES, 'UTF-8'); ?>" alt="Gekozen afbeelding" class="image-placeholder">
                    <?php else: ?>
                        <div class="image-placeholder">+</div>
                    <?php endif; ?>
                </button>
            </form>
            <textarea id="message3" rows="3" cols="40" placeholder="Wat vind ik hier leuk aan?" oninput="saveText('message3')"></textarea>
        </div>
    </div>
    <div class="button-group">
        <button class="arrow-btn"onclick="goToPreviousPage()">&#8249;</button> <!-- Linker navigatieknop -->

        <button class="arrow-btn" onclick="goToNextPage()">&#8250;</button> <!-- Rechter navigatieknop -->
    </div>




</div>
<script>
    // Laad opgeslagen waarden bij het laden van de pagina
    window.onload = function() {
        document.getElementById('message1').value = localStorage.getItem('message1') || '';
        document.getElementById('message2').value = localStorage.getItem('message2') || '';
        document.getElementById('message3').value = localStorage.getItem('message3') || '';
    }

    // Functie om de tekst op te slaan in localStorage wanneer er iets verandert
    function saveText(id) {
        const value = document.getElementById(id).value;
        localStorage.setItem(id, value);
    }

    // Voeg event listeners toe voor elke textarea
    document.getElementById('message1').addEventListener('input', function() {
        saveText('message1');
    });

    document.getElementById('message2').addEventListener('input', function() {
        saveText('message2');
    });

    document.getElementById('message3').addEventListener('input', function() {
        saveText('message3');

    });

    function goToPreviousPage() {
        window.location.href = 'index.php';}


    function goToNextPage() {
        window.location.href = 'opdracht2.php';}
</script>
</script>
</body>
</html>