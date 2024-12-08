<?php
session_start();

// Opslaan van geselecteerde checkboxen in sessie
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['option'])) {
        foreach ($_POST['option'] as $key => $value) {
            $_SESSION['selectedOptions'][$key] = $value === 'on' ? true : false;
        }
    }

    // Zorg ervoor dat niet-geselecteerde opties worden verwijderd uit de sessie
    foreach ($_SESSION['selectedOptions'] as $key => $value) {
        if (!isset($_POST['option'][$key])) {
            unset($_SESSION['selectedOptions'][$key]);
        }
    }

    // Opslaan van feedback in sessie
    if (isset($_POST['feedback'])) {
        $_SESSION['feedback'] = $_POST['feedback'];
    }
}

// Ophalen van opgeslagen checkboxen en feedback
$selectedOptions = $_SESSION['selectedOptions'] ?? [];
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
            <!-- Keuzemogelijkheden -->
            <?php
            $options = [
                'verder_studeren' => 'Verder studeren',
                'werken' => 'Werken',
                'tussenjaar' => 'Tussenjaar',
                'iets_anders' => 'Iets anders',
            ];

            foreach ($options as $key => $label) {
                $isChecked = isset($selectedOptions[$key]) && $selectedOptions[$key] ? 'checked' : '';
                echo '<div class="option-item">';
                echo '<button type="button" class="option-button">' . htmlspecialchars($label, ENT_QUOTES, 'UTF-8') . '</button>';
                echo '<input type="checkbox" name="option[' . htmlspecialchars($key, ENT_QUOTES, 'UTF-8') . ']" class="option-checkbox" onchange="this.form.submit()" ' . $isChecked . '>';
                echo '</div>';
            }
            ?>

            <!-- Feedback tekstvak -->
            <div class="feedback-section">
                <label for="feedback">En wat vind jij hiervan?</label>
                <textarea id="feedback" name="feedback" placeholder="Schrijf hier je feedback..." oninput="this.form.submit()"><?php echo htmlspecialchars($feedback, ENT_QUOTES, 'UTF-8'); ?></textarea>
            </div>
        </form>
    </div>

    <div class="button-group">
        <button class="arrow-btn" onclick="goToPreviousPage()">&#8249;</button>
        <button class="arrow-btn" onclick="goToNextPage()">&#8250;</button>
    </div>
</div>
<script>
    function goToPreviousPage() {
        window.location.href = 'opdracht7.php';
    }

    function goToNextPage() {
        window.location.href = 'mail.php';
    }
</script>
</body>
</html>
