<?php
session_start();

// Controleer of we de sessie moeten resetten
if (isset($_GET['reset']) && $_GET['reset'] == 'true') {
    session_unset(); // Leegt de sessiegegevens
    session_destroy(); // Vernietigt de sessie
    session_start(); // Start een nieuwe lege sessie
}

// Gebruik consistente sessievariabelen voor opdracht 3
$selectedImagesOpdracht3 = [
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
    <title>Opdracht 3 - Like Section</title>
    <link rel="stylesheet" type="text/css" href="css/opdracht3.css">
</head>
<body>
<div class="container">
    <div class="header">
        <span class="dot">3</span>
        <div class="titel-balk">Trots</div> <!-- Tekst die aangeeft dat dit sectie 3 is, met het onderwerp 'Like'. -->

    </div>
    <p>Wanneer gebruik ik mijn talenten?</p>
    <div class="input-box">

        <!-- Gebruik een lus om de input-items te genereren -->
        <?php for ($i = 0; $i < 3; $i++): ?>
            <div class="input-item">
                <form method="post" action="popup3.php">
                    <input type="hidden" name="imageIndex" value="<?php echo $i; ?>">
                    <input type="hidden" name="caller" value="opdracht3.php"> <!-- Nieuw: caller toevoegen -->
                    <button type="submit" class="image-placeholder">
                        <?php if ($selectedImagesOpdracht3[$i] != ''): ?>
                            <img src="<?php echo htmlspecialchars($selectedImagesOpdracht3[$i], ENT_QUOTES, 'UTF-8'); ?>" alt="Gekozen afbeelding" class="image-placeholder">
                        <?php else: ?>
                            <div class="image-placeholder">+</div>
                        <?php endif; ?>
                    </button>
                </form>
                <textarea name="message<?php echo $i + 1; ?>" rows="3" cols="40" placeholder="Wanneer gebruik ik mijn talenten?"></textarea>
            </div>
        <?php endfor; ?>
    </div>
    <div class="button-group">
        <button class="arrow-btn" onclick="goToPreviousPage()">&#8249;</button> <!-- Linker navigatieknop -->
        <button class="arrow-btn" onclick="goToNextPage()">&#8250;</button> <!-- Rechter navigatieknop -->
    </div>
</div>
<script>
    function goToPreviousPage() {
        window.location.href = 'opdracht2.php';
    }

    function goToNextPage() {
        window.location.href = 'opdracht4.php';
    }
</script>
</body>
</html>
