<?php
session_start();

/**
 * Initialize selected sectors in session if not already set.
 */
if (!isset($_SESSION['selectedSectors'])) {
    $_SESSION['selectedSectors'] = [];
}

/**
 * Array of available sectors with their labels.
 */
$options = [
    'bouw' => 'Bouw / Architectuur',
    'communicatie' => 'Communicatie / Media',
    'economie' => 'Economie / Financiën',
    'facilitaire' => 'Facilitaire dienstverlening / Horeca',
    'fashion' => 'Fashion / Design',
    'gezondheidszorg' => 'Gezondheidszorg / Life science',
    'ict' => 'ICT / IT',
    'juridisch' => 'Juridisch / Recht',
    'kunst' => 'Kunst / Cultuur / Entertainment',
    'management' => 'Management / Ondernemen',
    'natuur' => 'Natuur (planten, dieren en milieu)',
    'onderwijs' => 'Onderwijs',
    'sociaal' => 'Sociaal welzijn',
    'sport' => 'Sport / Voeding / Beweging',
    'techniek' => 'Techniek',
    'toerisme' => 'Toerisme / Recreatie',
    'transport' => 'Transport / Logistiek',
    'veiligheid' => 'Veiligheid'
];

/**
 * Handle POST request to update selected sectors in session.
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['sector']) && isset($_POST['checked'])) {
    $sector = $_POST['sector'];
    $checked = $_POST['checked'] === 'true';

    if ($checked) {
        $_SESSION['selectedSectors'][$sector] = $options[$sector];
    } else {
        unset($_SESSION['selectedSectors'][$sector]);
    }
}

/**
 * Retrieve selected sectors from session.
 */
$selectedSectors = $_SESSION['selectedSectors'] ?? [];
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professions - Vraag 5</title>
    <link rel="stylesheet" type="text/css" href="css/opdracht5.1.css">
    <script>
        /**
         * Update selected sectors in session via AJAX.
         * @param {string} sector - The sector key.
         * @param {boolean} isChecked - Whether the sector is selected.
         */
        function updateSelectedSectors(sector, isChecked) {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'opdracht5.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send('sector=' + sector + '&checked=' + isChecked);
        }

        /**
         * Add event listeners to sector checkboxes on page load.
         */
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.sector-checkbox').forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    updateSelectedSectors(this.value, this.checked);
                });
            });
        });

        /**
         * Navigate to the previous page.
         */
        function goToPreviousPage() {
            window.location.href = 'opdracht4.php';
        }

        /**
         * Navigate to the next page if at least three sectors are selected.
         */
        function goToNextPage() {
            if (document.querySelectorAll('.sector-checkbox:checked').length < 3) {
                alert('Selecteer alstublieft minimaal drie sectoren om door te gaan.');
                return;
            }
            window.location.href = 'opdracht5b.php';
        }
    </script>
</head>
<body>
<div class="container">
    <div class="header">
        <div class="dot">5</div>
        <div class="titel-balk">Sectoren</div>
    </div>
    <p>Hier zie ik mezelf later werken (sectoren):</p>
    <div class="options">
        <?php foreach ($options as $key => $label): ?>
            <label class="option-item">
                <input type="checkbox" name="sector[]" value="<?php echo htmlspecialchars($key, ENT_QUOTES, 'UTF-8'); ?>" class="sector-checkbox" <?php echo array_key_exists($key, $selectedSectors) ? 'checked' : ''; ?>>
                <?php echo htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?>
            </label>
        <?php endforeach; ?>
    </div>
    <footer class="button-group">
        <button class="arrow-btn" onclick="goToPreviousPage()">&#8249;</button>
        <button class="arrow-btn" onclick="goToNextPage()">&#8250;</button>
    </footer>
</div>
</body>
</html>