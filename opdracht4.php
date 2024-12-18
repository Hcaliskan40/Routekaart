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
    $_SESSION['selectedImage_opdracht4_0'] ?? '',
    $_SESSION['selectedImage_opdracht4_1'] ?? '',
    $_SESSION['selectedImage_opdracht4_2'] ?? '',
];

// Controleer of er een POST-verzoek is
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Haal de JSON-data op die is verzonden vanuit JavaScript
    $data = json_decode(file_get_contents('php://input'), true);

    // Controleer of de data geldig is
    if (isset($data['key']) && isset($data['value'])) {
        $_SESSION[$data['key']] = $data['value'];
        echo json_encode(['status' => 'success']);
        exit;
    }

    // Als de data niet klopt, stuur een foutmelding terug
    echo json_encode(['status' => 'error', 'message' => 'Invalid data']);
    exit;
}

// Controleer of we alleen JSON-gegevens moeten retourneren
if (isset($_GET['action']) && $_GET['action'] === 'json') {
    header('Content-Type: application/json');
    echo json_encode($_SESSION);
    exit;
}
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
        <div class="titel-balk">Belangrijk <i class="em em-bangbang" aria-role="presentation" aria-label="DOUBLE EXCLAMATION MARK"></i></div>
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
            <textarea id="message10" rows="10" cols="40" placeholder="Waarom is dit belangrijk?" oninput="saveText('message10')"><?php echo isset($_SESSION['message10']) ? htmlspecialchars($_SESSION['message10'], ENT_QUOTES, 'UTF-8') : ''; ?></textarea>
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
            <textarea id="message11" rows="10" cols="40" placeholder="Waarom is dit belangrijk?" oninput="saveText('message11')"><?php echo isset($_SESSION['message11']) ? htmlspecialchars($_SESSION['message11'], ENT_QUOTES, 'UTF-8') : ''; ?></textarea>
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
            <textarea id="message12" rows="10" cols="40" placeholder="Waarom is dit belangrijk?" oninput="saveText('message12')"><?php echo isset($_SESSION['message12']) ? htmlspecialchars($_SESSION['message12'], ENT_QUOTES, 'UTF-8') : ''; ?></textarea>
        </div>
    </div>

    <div class="button-group">
        <button class="arrow-btn" onclick="goToPreviousPage()">&#8249;</button>
        <button class="arrow-btn" onclick="goToNextPage()">&#8250;</button>
    </div>
</div>

<script>
    // Functie om de tekst in de sessie op te slaan
    function saveText(id) {
        const value = document.getElementById(id).value;

        fetch('opdracht4.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ key: id, value: value }),
        })
            .then(response => response.json())
            .then(data => {
                if (data.status !== 'success') {
                    console.error(`Fout bij opslaan: ${data.message}`);
                }
            })
            .catch(error => console.error('Fout bij opslaan:', error));
    }

    // Laad tekst bij het openen van de pagina
    window.onload = function () {
        fetch('opdracht4.php?action=json')
            .then(response => response.json())
            .then(sessionData => {
                if (sessionData.message10) {
                    document.getElementById('message10').value = sessionData.message10;
                }
                if (sessionData.message11) {
                    document.getElementById('message11').value = sessionData.message11;
                }
                if (sessionData.message12) {
                    document.getElementById('message12').value = sessionData.message12;
                }
            })
            .catch(error => console.error('Fout bij ophalen van sessiegegevens:', error));
    };

    function goToPreviousPage() {
        window.location.href = 'opdracht3.php';
    }

    function goToNextPage() {
        window.location.href = 'opdracht5.php';
    }
</script>
</body>
</html>
