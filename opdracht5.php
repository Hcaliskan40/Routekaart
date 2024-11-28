<?php
session_start();

// Opslaan van de geselecteerde waarden in de sessie
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['sector'])) {
        foreach ($_POST['sector'] as $key => $value) {
            $_SESSION['selectedSectors'][$key] = $value === 'on' ? true : false;
        }
    }
}

// Stel de gekozen opties in
$selectedSectors = $_SESSION['selectedSectors'] ?? [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professions - Vraag 5</title>
    <link rel="stylesheet" type="text/css" href="css/opdracht5.css">
</head>
<body>

<div class="container">
    <!-- Header Section -->
    <div class="header">
        <div class="dot">5</div>
        <div class="titel-balk">Beroepen</div>
    </div>

    <!-- Content Section (form and checkboxes) -->
    <div class="section">
        <p>Hier zie ik mezelf later werken (sectoren):</p>
        <div class="checkbox-group">
            <form method="post" action="opdracht5.php">

                <!-- Keuzemogelijkheden met sessie opslag -->
                <?php
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

                foreach ($options as $key => $label) {
                    $isChecked = isset($selectedSectors[$key]) && $selectedSectors[$key] ? 'checked' : '';
                    echo '<label>';
                    echo '<span><input type="checkbox" name="sector[' . htmlspecialchars($key, ENT_QUOTES, 'UTF-8') . ']" class="sector-checkbox" onchange="this.form.submit()" ' . $isChecked . '> ';
                    echo htmlspecialchars($label, ENT_QUOTES, 'UTF-8') . '</span>';
                    echo '<button class="info-button" title="More information about ' . htmlspecialchars($label, ENT_QUOTES, 'UTF-8') . '">i</button>';
                    echo '</label>';
                }
                ?>

            </form>
        </div>
    </div>

    <!-- Navigatieknoppen -->
    <div class="button-group">
        <button class="arrow-btn" onclick="goToPreviousPage()">&#8249;</button>
        <button class="arrow-btn" onclick="goToNextPage()">&#8250;</button>
    </div>

    <script>
        // JavaScript to limit checkbox selection to 3
        const checkboxes = document.querySelectorAll('.sector-checkbox');
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', () => {
                const checkedCount = document.querySelectorAll('.sector-checkbox:checked').length;
                if (checkedCount >= 3) {
                    checkboxes.forEach(box => {
                        if (!box.checked) box.disabled = true;
                    });
                } else {
                    checkboxes.forEach(box => box.disabled = false);
                }
            });
        });

        function goToPreviousPage() {
            window.location.href = 'opdracht4.php';
        }

        function goToNextPage() {
            window.location.href = 'opdracht5b.php';
        }
    </script>
</body>
</html>
