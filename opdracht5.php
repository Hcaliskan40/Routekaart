<?php
session_start();

if (!isset($_SESSION['selectedSectors'])) {
    $_SESSION['selectedSectors'] = [];
}

// Define options
$options = [
    $_SESSION['bouw'] = 'Bouw / Architectuur',
    $_SESSION['communicatie'] = 'Communicatie / Media',
    $_SESSION['economie'] = 'Economie / Financiën',
    $_SESSION['facilitaire'] = 'Facilitaire dienstverlening / Horeca',
    $_SESSION['fashion'] = 'Fashion / Design',
    $_SESSION['gezondheidszorg'] = 'Gezondheidszorg / Life science',
    $_SESSION['ict'] = 'ICT / IT',
    $_SESSION['juridisch'] = 'Juridisch / Recht',
    $_SESSION['kunst'] = 'Kunst / Cultuur / Entertainment',
    $_SESSION['management'] = 'Management / Ondernemen',
    $_SESSION['natuur'] = 'Natuur (planten, dieren en milieu)',
    $_SESSION['onderwijs'] = 'Onderwijs',
    $_SESSION['sociaal'] = 'Sociaal welzijn',
    $_SESSION['sport'] = 'Sport / Voeding / Beweging',
    $_SESSION['techniek'] = 'Techniek',
    $_SESSION['toerisme'] = 'Toerisme / Recreatie',
    $_SESSION['transport'] = 'Transport / Logistiek',
    $_SESSION['veiligheid'] = 'Veiligheid'
];

// Save selected values in the session
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['sector']) && isset($_POST['checked'])) {
    $sector = $_POST['sector'];
    $checked = $_POST['checked'] === 'true';

    if ($checked) {
        $_SESSION['selectedSectors'][$sector] = $options[$sector];
    } else {
        unset($_SESSION['selectedSectors'][$sector]);
    }
}

// Set selected options
$selectedSectors = $_SESSION['selectedSectors'] ?? [];

//echo '<pre>';
//print_r($selectedSectors);
//echo '</pre>';
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professions - Vraag 5</title>
    <link rel="stylesheet" type="text/css" href="css/opdracht5.1.css">
    <script>
        function updateSelectedSectors(sector, isChecked) {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'opdracht5.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send('sector=' + sector + '&checked=' + isChecked);
        }

        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('.sector-checkbox');
            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    updateSelectedSectors(this.value, this.checked);
                });
            });
        });

        function goToPreviousPage() {
            window.location.href = 'opdracht4.php';
        }

        function goToNextPage() {
            const selectedCheckboxes = document.querySelectorAll('.sector-checkbox:checked');
            if (selectedCheckboxes.length < 3) {
                alert('Selecteer alstublieft minimaal drie sectoren om door te gaan.');
                return;
            }
            window.location.href = 'opdracht5b.php';
        }
    </script>
</head>
<body>

<div class="container">
    <!-- Header Section -->
    <div class="header">
        <div class="dot">5</div>
        <div class="titel-balk">Sectoren</div>
    </div>

    <p>Hier zie ik mezelf later werken (sectoren):</p>

    <!-- Content Section (form and checkboxes) -->
    <div class="options">
        <?php
        foreach ($options as $key => $label) {
            $isChecked = array_key_exists($key, $selectedSectors) ? 'checked' : '';
            echo '<label class="option-item">';
            echo '<input type="checkbox" name="sector[]" value="' . htmlspecialchars($key, ENT_QUOTES, 'UTF-8') . '" class="sector-checkbox" ' . $isChecked . '> ';
            echo htmlspecialchars($label, ENT_QUOTES, 'UTF-8');
            echo '</label>';
        }
        ?>
    </div>

    <!-- Navigation buttons -->
    <footer class="button-group">
        <button class="arrow-btn" onclick="goToPreviousPage()">&#8249;</button>
        <button class="arrow-btn" onclick="goToNextPage()">&#8250;</button>
    </footer>

</div>
</body>
</html>