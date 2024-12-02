<?php
session_start();

// Opslaan van de geselecteerde waarden in de sessie
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['option'])) {
        foreach ($_POST['option'] as $key => $value) {
            $_SESSION['selectedOptions'][$key] = $value === 'on' ? true : false;
        }
    }
}

// Stel de gekozen opties in
$selectedOptions = $_SESSION['selectedOptions'] ?? [];
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verlanglijst - Vraag 7</title>
    <link rel="stylesheet" type="text/css" href="css/opdracht7.css">
</head>
<body>
<div class="container">
    <div class="header">
        <span class="dot">7</span>
        <div class="titel-balk">Verlanglijst</div>
    </div>
    <b>Geef van de onderstaande eisen aan welke belangrijk zijn voor jou voor de studie die je wilt gaan doen:</b>

    <div class="options">
        <form method="post" action="opdracht7.php">

            <!-- Keuzemogelijkheden -->
            <?php
            $options = [
                'engels' => 'Engelstalig',
                'nederlands' => 'Nederlandstalig',
                'kleine_hogeschool' => 'Kleine hogeschool',
                'grote_hogeschool' => 'Grote hogeschool',
                'op_kamers' => 'Op kamers',
                'in_buurt' => 'In de buurt van mijn woonplaats',
                'veel_begeleiding' => 'Veel begeleiding',
                'zelfstandig_werken' => 'Veel zelfstandig werken',
                'twee_jaar' => '2 jaar',
                'vier_jaar' => '4 jaar',
                'veel_groepswerk' => 'Veel groepswerk',
                'student_tevr' => 'Goede studenttevredenheid',
                'hoog_salaris' => 'Hoog salaris toekomstig beroep',
                'kleine_klassen' => 'Kleine klassen',
                'grote_klassen' => 'Grote klassen',
                'veel_praktijk' => 'Veel praktijk',
                'veel_theorie' => 'Veel theorie',
            ];

            foreach ($options as $key => $label) {
                $isChecked = isset($selectedOptions[$key]) && $selectedOptions[$key] ? 'checked' : '';
                echo '<label class="option-item">';
                echo '<input type="checkbox" name="option[' . htmlspecialchars($key, ENT_QUOTES, 'UTF-8') . ']" class="option-checkbox" onchange="this.form.submit()" ' . $isChecked . '> ';
                echo htmlspecialchars($label, ENT_QUOTES, 'UTF-8');
                echo '</label>';
            }
            ?>

        </form>
    </div>

    <div class="button-group">
        <button class="arrow-btn" onclick="goToPreviousPage()">&#8249;</button>
        <button class="arrow-btn" onclick="goToNextPage()">&#8250;</button>
    </div>
</div>
<script>
    function goToPreviousPage() {
        window.location.href = 'opdracht6.php';
    }

    function goToNextPage() {
        window.location.href = 'opdracht8.php';
    }
</script>
</body>
</html>
