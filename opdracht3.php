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

// Haal de berichten op uit de sessie of stel standaardwaarden in
$messages = [
    $_SESSION['message7'] ?? '',
    $_SESSION['message8'] ?? '',
    $_SESSION['message9'] ?? '',
];
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opdracht 3 - Trots</title>
    <link rel="stylesheet" type="text/css" href="css/opdracht3.css">
    <link href="https://emoji-css.afeld.me/emoji.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="header">
        <span class="dot">3</span>
        <div class="titel-balk">Trots <i class="em em-muscle" aria-role="presentation" aria-label="FLEXED BICEPS"></i> </div>
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
            <textarea id="message7" rows="10" cols="40" placeholder="Wanneer gebruik ik mijn talenten?" oninput="saveText('message7')"><?php echo isset($_SESSION['message7']) ? htmlspecialchars($_SESSION['message7'], ENT_QUOTES, 'UTF-8') : ''; ?></textarea>
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
            <textarea id="message8" rows="10" cols="40" placeholder="Wanneer gebruik ik mijn talenten?" oninput="saveText('message8')"><?php echo isset($_SESSION['message8']) ? htmlspecialchars($_SESSION['message8'], ENT_QUOTES, 'UTF-8') : ''; ?></textarea>
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
            <textarea id="message9" rows="10" cols="40" placeholder="Wanneer gebruik ik mijn talenten?" oninput="saveText('message9')"><?php echo isset($_SESSION['message9']) ? htmlspecialchars($_SESSION['message9'], ENT_QUOTES, 'UTF-8') : ''; ?></textarea>
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

        // Stuur de tekst naar de server
        fetch('opdracht3.php', {
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

    function goToPreviousPage() {
        window.location.href = 'opdracht2.php';
    }

    function goToNextPage() {
        window.location.href = 'opdracht4.php';
    }

    window.onload = function () {
        fetch('opdracht3.php?action=json')
            .then(response => response.json())
            .then(sessionData => {
                for (let i = 0; i < 3; i++) {
                    const key = `message${7 + i}`;
                    if (sessionData[key]) {
                        document.getElementById(key).value = sessionData[key];
                    }
                }
            })
            .catch(error => console.error('Fout bij ophalen van sessiegegevens:', error));
    };
</script>
</body>
</html>
