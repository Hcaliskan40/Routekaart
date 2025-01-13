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

$infoTexts = [
    'bouw' => 'In deze sector werk je aan het ontwerpen en bouwen van huizen, bruggen of andere gebouwen. Denk aan architecten en mensen die het bouwen van deze dingen regelen. ~studiekeuze123~ ',
    'communicatie' => 'Communicatie en media gaat over het maken van reclame, video\'s en berichten. Hier leer je hoe je mensen kunt bereiken via social media, tv of kranten.   ~studiekeuze123~',
    'economie' => 'Economie en financiën gaat over geld, bedrijven en hoe je slim kunt omgaan met inkomsten en uitgaven. Denk aan werken bij een bank of het starten van een eigen bedrijf. ~studiekeuze123~',
    'facilitaire' => 'Hier werk je bijvoorbeeld in een hotel, restaurant of bij evenementen. Je zorgt ervoor dat gasten blij zijn en alles goed verloopt. ~studiekeuze123~',
    'fashion' => 'In deze sector werk je aan mode en ontwerpen. Denk aan kleding maken, ontwerpen van schoenen of accessoires zoals tassen. ~studiekeuze123~',
    'gezondheidszorg' => 'In de gezondheidszorg help je mensen gezonder te worden. Je kunt bijvoorbeeld in een ziekenhuis werken, medicijnen ontwikkelen of patiënten verzorgen. ~studiekeuze123~',
    'ict' => 'ICT gaat over computers en technologie. Hier leer je bijvoorbeeld hoe je apps maakt, websites bouwt of computers veilig houdt. ~studiekeuze123~',
    'juridisch' => 'De juridische sector gaat over wetten en regels. Je helpt mensen of bedrijven met vragen over wat wel en niet mag. ~studiekeuze123~',
    'kunst' => 'In deze sector werk je met dingen zoals muziek, theater, schilderijen of films. Het gaat om creatief bezig zijn en mensen vermaken. ~studiekeuze123~',
    'management' => 'Hier leer je hoe je een bedrijf kunt starten of leiden. Je zorgt ervoor dat alles goed geregeld is en bedenkt plannen om succesvol te zijn. ~studiekeuze123~',
    'natuur' => 'De natuursector gaat over werken met planten, dieren en het beschermen van de aarde. Denk aan dierverzorging, boerderijwerk of het opruimen van afval in de natuur. ~studiekeuze123~',
    'onderwijs' => 'In het onderwijs help je kinderen of jongeren iets te leren. Je kunt bijvoorbeeld leraar worden of mensen trainen in iets waar je goed in bent. ~studiekeuze123~',
    'sociaal' => 'In deze sector help je mensen die het moeilijk hebben, zoals ouderen of jongeren. Het gaat om zorgen dat mensen zich beter voelen. ~studiekeuze123~',
    'sport' => 'Hier werk je met sporten, gezondheid en bewegen. Je kunt bijvoorbeeld trainer worden, sportlessen geven of advies geven over gezond eten. ~studiekeuze123~',
    'techniek' => 'Techniek gaat over dingen maken of verbeteren, zoals machines, auto\'s of robots. Je leert hoe dingen werken en hoe je ze kunt repareren. ~studiekeuze123~',
    'toerisme' => 'In toerisme werk je met reizen en vrije tijd. Je kunt bijvoorbeeld vakanties organiseren, gids zijn of mensen helpen genieten van hun vrije tijd. ~studiekeuze123~',
    'transport' => 'Deze sector gaat over het vervoeren van spullen of mensen. Denk aan vrachtwagens, vliegtuigen of het regelen van pakketbezorging. ~studiekeuze123~',
    'veiligheid' => 'Veiligheid gaat over mensen beschermen. Je kunt bijvoorbeeld bij de politie, brandweer of beveiliging werken om anderen te helpen. ~studiekeuze123~'
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
         * Open het popup-venster met informatie.
         * @param {string} infoText - De tekst die in de popup wordt weergegeven.
         */
        function showPopup(infoText) {
            const popup = document.getElementById('infoPopup');
            const popupText = document.getElementById('popupText');

            // Stel de inhoud van de popup in
            popupText.textContent = infoText;

            // Toon de popup
            popup.style.display = 'flex';
        }

        /**
         * Sluit het popup-venster.
         */
        function closePopup() {
            const popup = document.getElementById('infoPopup');
            popup.style.display = 'none';
        }


        document.addEventListener('DOMContentLoaded', function() {
            // Voeg eventlisteners toe aan checkboxes
            document.querySelectorAll('.sector-checkbox').forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    updateSelectedSectors(this.value, this.checked);
                });
            });

            // Voeg functionaliteit toe aan alle "i"-knoppen
            document.querySelectorAll('.info-button').forEach((button) => {
                button.addEventListener('click', (event) => {
                    event.preventDefault();


                    const infoText = button.getAttribute('title');
                    showPopup(infoText);
                });
            });

            // Voeg sluit-functionaliteit toe aan de popup
            document.querySelector('.close-button').addEventListener('click', closePopup);
        });
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

                <?php echo htmlspecialchars($label, ENT_QUOTES, 'UTF-8');
                echo '<button class="info-button" title="' . htmlspecialchars($infoTexts[$key], ENT_QUOTES, 'UTF-8') . '">i</button>';?>
            </label>
        <?php endforeach; ?>

    </div>

    <div id="infoPopup" class="popup">
        <div class="popup-content">
            <span class="close-button" onclick="closePopup()">&times;</span>
            <p id="popupText">Informatie over de sector wordt hier weergegeven.</p>
        </div>

    </div>

    <footer class="button-group">
        <button class="arrow-btn" onclick="goToPreviousPage()">&#8249;</button>
        <button class="arrow-btn" onclick="goToNextPage()">&#8250;</button>
    </footer>

</div>
</body>
</html>