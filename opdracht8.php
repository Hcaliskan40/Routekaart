<?php
session_start(); // Start of hervat de bestaande sessie
//print current session
//echo "<pre>";
//print_r($_SESSION['selectedOptions8']);
//print_r($_SESSION['feedback']);
//echo "</pre>";
// Opslaan van geselecteerde checkboxen in sessie
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['option'])) {
        foreach ($_POST['option'] as $key => $value) {
            $_SESSION['selectedOptions8'][$key] = $value === 'on'; // Gebruik een aparte sessie voor vraag 8
        }
    }

    // Zorg ervoor dat niet-geselecteerde opties worden verwijderd uit de sessie
    foreach (array_keys($_SESSION['selectedOptions8']) as $key) {
        if (!isset($_POST['option'][$key])) {
            unset($_SESSION['selectedOptions8'][$key]);
        }
    }

    // Opslaan van feedback in sessie
    if (isset($_POST['feedback'])) {
        $_SESSION['feedback'] = $_POST['feedback'];
    }
}

// Ophalen van opgeslagen checkboxen en feedback
$selectedOptions8 = $_SESSION['selectedOptions8'] ?? [];
$feedback = $_SESSION['feedback'] ?? '';
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
                <label for="feedback">En wat vind jij hiervan?</label>
                <textarea id="feedback" name="feedback" placeholder="Schrijf hier je feedback..."><?php echo htmlspecialchars($feedback, ENT_QUOTES, 'UTF-8'); ?></textarea>
            </div>
        </form>
    </div>

    <footer class="button-group">
        <button class="arrow-btn" onclick="goToPreviousPage()">&#8249;</button>
        <button class="arrow-btn" onclick="goToNextPage()">&#8250;</button>
    </footer>

</div>

<script>
    function goToPreviousPage() {
        window.location.href = 'opdracht7.php';
    }

    function goToNextPage() {
        window.location.href = 'mail.php';
    }

    // Debounce functionaliteit voor het tekstvak
    let typingTimer;
    const feedbackTextarea = document.getElementById('feedback');

    feedbackTextarea.addEventListener('input', function () {
        clearTimeout(typingTimer); // Reset de timer
        typingTimer = setTimeout(() => {
            // Verzenden van het formulier
            feedbackTextarea.form.submit();
        }, debounceTime);
    });
</script>

</body>
</html>
