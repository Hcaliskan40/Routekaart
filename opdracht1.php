<?php
session_start();

// Controleer of we de sessie moeten resetten
if (isset($_GET['reset']) && $_GET['reset'] == 'true') {
    session_unset(); // Leegt de sessiegegevens
    session_destroy(); // Vernietigt de sessie
    session_start(); // Start een nieuwe lege sessie
}

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
    <link href="https://emoji-css.afeld.me/emoji.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="header">
        <span class="dot">1</span>
        <div class="titel-balk"> Like <i class="em em---1" aria-role="presentation" aria-label="THUMBS UP SIGN"></i></div>
    </div>
    <p>Hier krijg ik energie van en doe ik graag:</p>

    <div class="bubble medium bottom">Je kan mij klikken om activiteiten uit te kiezen</div>

    <div class="input-box">
        <!-- Eerste input-item -->
        <div class="input-item">
            <form method="post" action="popup.php">
                <input type="hidden" name="imageIndex" value="0">
                <input type="hidden" name="caller" value="opdracht1.php">
                <button type="submit" class="image-placeholder">
                    <?php if ($selectedImages[0] != ''): ?>
                        <img src="<?php echo htmlspecialchars($selectedImages[0], ENT_QUOTES, 'UTF-8'); ?>" alt="Gekozen afbeelding" class="image-placeholder">
                    <?php else: ?>
                        <div class="image-placeholder">+</div>
                    <?php endif; ?>
                </button>
            </form>
            <textarea id="message1" rows="10" cols="40" placeholder="Wat vind ik hier leuk aan?" oninput="saveText('message1')"><?php echo isset($_SESSION['message1']) ? htmlspecialchars($_SESSION['message1'], ENT_QUOTES, 'UTF-8') : ''; ?></textarea>
        </div>

        <!-- Tweede input-item -->
        <div class="input-item">
            <form method="post" action="popup.php">
                <input type="hidden" name="imageIndex" value="1">
                <input type="hidden" name="caller" value="opdracht1.php">
                <button type="submit" class="image-placeholder">
                    <?php if ($selectedImages[1] != ''): ?>
                        <img src="<?php echo htmlspecialchars($selectedImages[1], ENT_QUOTES, 'UTF-8'); ?>" alt="Gekozen afbeelding" class="image-placeholder">
                    <?php else: ?>
                        <div class="image-placeholder">+</div>
                    <?php endif; ?>
                </button>
            </form>
            <textarea id="message2" rows="10" cols="40" placeholder="Wat vind ik hier leuk aan?" oninput="saveText('message2')"><?php echo isset($_SESSION['message2']) ? htmlspecialchars($_SESSION['message2'], ENT_QUOTES, 'UTF-8') : ''; ?></textarea>
        </div>

        <!-- Derde input-item -->
        <div class="input-item">
            <form method="post" action="popup.php">
                <input type="hidden" name="imageIndex" value="2">
                <input type="hidden" name="caller" value="opdracht1.php">
                <button type="submit" class="image-placeholder">
                    <?php if ($selectedImages[2] != ''): ?>
                        <img src="<?php echo htmlspecialchars($selectedImages[2], ENT_QUOTES, 'UTF-8'); ?>" alt="Gekozen afbeelding" class="image-placeholder">
                    <?php else: ?>
                        <div class="image-placeholder">+</div>
                    <?php endif; ?>
                </button>
            </form>
            <textarea id="message3" rows="10" cols="40" placeholder="Wat vind ik hier leuk aan?" oninput="saveText('message3')"><?php echo isset($_SESSION['message3']) ? htmlspecialchars($_SESSION['message3'], ENT_QUOTES, 'UTF-8') : ''; ?></textarea>
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
        fetch('opdracht1.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ key: id, value: value }),
        })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    console.log(`Tekst voor ${id} succesvol opgeslagen.`);
                } else {
                    alert(`Fout bij opslaan: ${data.message}`);
                }
            })
            .catch(error => {
                console.error('Fout bij opslaan:', error);
                alert('Er is een fout opgetreden bij het opslaan van de tekst.');
            });
    }

    function goToPreviousPage() {
        window.location.href = 'index.php';
    }

    function goToNextPage() {
        window.location.href = 'opdracht2.php';

    }

    // Laad tekst bij het openen van de pagina
    window.onload = function () {
        fetch('opdracht1.php?action=json')
            .then(response => response.json())
            .then(sessionData => {
                if (sessionData.message1) {
                    document.getElementById('message1').value = sessionData.message1;
                }
                if (sessionData.message2) {
                    document.getElementById('message2').value = sessionData.message2;
                }
                if (sessionData.message3) {
                    document.getElementById('message3').value = sessionData.message3;
                }
            })
            .catch(error => console.error('Fout bij ophalen van sessiegegevens:', error));
    };
</script>
</body>
</html>
