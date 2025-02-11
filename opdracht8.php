<?php
session_start(); // Start of hervat de bestaande sessie

// Opslaan van geselecteerde checkboxen in sessie
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Opslaan van checkboxen
    if (isset($_POST['option'])) {
        foreach ($_POST['option'] as $key => $value) {
            $_SESSION['selectedOptions8'][$key] = $value === 'on'; // Gebruik een aparte sessie voor vraag 8
        }
    }

    // Zorg ervoor dat niet-geselecteerde opties worden verwijderd uit de sessie
    foreach (array_keys($_SESSION['selectedOptions8'] ?? []) as $key) {
        if (!isset($_POST['option'][$key])) {
            unset($_SESSION['selectedOptions8'][$key]);
        }
    }

    // Opslaan van feedback in sessie (indien via AJAX verstuurd)
    if ($_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
        $data = json_decode(file_get_contents('php://input'), true);
        if (isset($data['feedback8'])) {
            $_SESSION['feedback8'] = $data['feedback8'];
            echo json_encode(['status' => 'success']);
            exit;
        }
    }
}

// Ophalen van opgeslagen checkboxen en feedback
$selectedOptions8 = $_SESSION['selectedOptions8'] ?? [];
$feedback = $_SESSION['feedback8'] ?? '';
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jouw keuze</title>
    <link rel="stylesheet" type="text/css" href="css/opdracht8.css">
</head>
<body>
<div class="container">
    <div class="header">
        <span class="dot">8</span>
        <div class="titel-balk">Jouw keuze</div>
    </div>
    <b>8 Jouw keuze:</b>
    <p>Wat past het beste bij jou op basis van je ontdekkingstocht?</p>

    <div class="options">
        <form method="post" action="opdracht8.php">
            <?php
            $options = [
                'verder_studeren' => 'Verder studeren',
                'werken' => 'Werken',
                'tussenjaar' => 'Tussenjaar',
                'iets_anders' => 'Iets anders',
            ];

            foreach ($options as $key => $label) {
                $isChecked = isset($selectedOptions8[$key]) && $selectedOptions8[$key] ? 'checked' : '';
                echo '<div class="option-item">';
                echo '<button type="button" class="option-button">' . htmlspecialchars($label, ENT_QUOTES, 'UTF-8') . '</button>';
                echo '<input type="checkbox" name="option[' . htmlspecialchars($key, ENT_QUOTES, 'UTF-8') . ']" class="option-checkbox" onchange="this.form.submit()" ' . $isChecked . '>';
                echo '</div>';
            }
            ?>

            <div class="feedback-section">
                <label for="feedback8">En wat vind jij hiervan?</label>
                <textarea id="feedback8" name="feedback8" rows="10" cols="40" placeholder="Schrijf hier je feedback..."><?php echo htmlspecialchars($feedback, ENT_QUOTES, 'UTF-8'); ?></textarea>
            </div>
        </form>
    </div>

    <footer class="button-group">
        <button class="arrow-btn" onclick="goToPreviousPage()">&#8249;</button>
        <button class="arrow-btn" onclick="goToNextPage()">&#8250;</button>
    </footer>
</div>

<script>
    const feedbackTextarea = document.getElementById('feedback8');

    // Functie om feedback automatisch op te slaan
    feedbackTextarea.addEventListener('input', function () {
        const feedback = feedbackTextarea.value;

        // Verzenden via fetch
        fetch('opdracht8.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
            },
            body: JSON.stringify({ feedback8: feedback }),
        })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    console.log('Feedback automatisch opgeslagen.');
                } else {
                    console.error('Fout bij opslaan van feedback:', data.message);
                }
            })
            .catch(error => console.error('Fout bij opslaan van feedback:', error));
    });

    function goToPreviousPage() {
        window.location.href = 'opdracht7.php';
    }

    function goToNextPage() {
        window.location.href = 'mail.php';
    }
</script>

</body>
</html>
