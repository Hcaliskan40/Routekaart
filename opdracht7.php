<?php
session_start(); // Start een nieuwe sessie of hervat de bestaande sessie, zodat gegevens voor de gebruiker bewaard blijven tijdens het navigeren.


// Opslaan van de geselecteerde waarden in de sessie
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Controleer of er 'option' waarden zijn verzonden via het formulier
    if (isset($_POST['option'])) {
        foreach ($_POST['option'] as $key => $value) {
            // Sla elke geselecteerde optie op in de sessie, zodat deze later opnieuw gebruikt kan worden.
            // Gebruik een boolean waarde om aan te geven of de optie is geselecteerd.
            $_SESSION['selectedOptions'][$key] = $value === 'on' ? true : false;
        }
    }
}

// Stel de gekozen opties in; gebruik de opgeslagen waarden in de sessie, of een lege array als er nog niets is geselecteerd
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
        <form method="post" action="opdracht7.php"> <!-- Het formulier dat de geselecteerde opties naar dezelfde pagina verzendt voor opslag -->

            <?php
            // Lijst van wat je kan selecteren
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

            // Loop door de opties heen om ze dynamisch weer te geven in het formulier
            foreach ($options as $key => $label) {
                // Controleer of een optie al is geselecteerd in de sessie
                $isChecked = isset($selectedOptions[$key]) && $selectedOptions[$key] ? 'checked' : '';

                // Render elke optie als een checkbox en zorg ervoor dat deze direct wordt opgeslagen wanneer de gebruiker deze selecteert.
                echo '<label class="option-item">';
                echo '<input type="checkbox" name="option[' . htmlspecialchars($key, ENT_QUOTES, 'UTF-8') . ']" class="option-checkbox" onchange="this.form.submit()" ' . $isChecked . '> ';
                echo htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); // Zorg ervoor dat alle tekst veilig is voor weergave
                echo '</label>';
            }
            ?>

        </form>
    </div>

    <div class="button-group">
        <!-- Navigatieknoppen om naar de vorige of volgende vraag te gaan -->
        <button class="arrow-btn" onclick="goToPreviousPage()">&#8249;</button>
        <button class="arrow-btn" onclick="goToNextPage()">&#8250;</button>
    </div>
</div>
<script>
    // Naar de vorige pagina gaan
    function goToPreviousPage() {
        window.location.href = 'opdracht6.php';
    }

    //  Naar de volgende pagina gaan
    function goToNextPage() {
        window.location.href = 'opdracht8.php';
    }
</script>
</body>
</html>
