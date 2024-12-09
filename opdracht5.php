<?php
session_start();

// Opslaan van de geselecteerde waarden in de sessie
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['sector'])) {
        $_SESSION['selectedSectors'] = $_POST['sector'];
    } else {
        // Wanneer geen sectoren geselecteerd zijn, reset de opgeslagen waarden
        $_SESSION['selectedSectors'] = [];
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
    <link rel="stylesheet" type="text/css" href="css/opdracht5.1.css">
</head>
<body>

<div class="container">
    <!-- Header Section -->
    <div class="header">
        <div class="dot">5</div>
        <div class="titel-balk">Sectoren</div>
    </div>

    <!-- Content Section (form and checkboxes) -->
    <div class="section">
        <p>Hier zie ik mezelf later werken (sectoren):</p>
        <div class="checkbox-group">
            <form method="post" action="opdracht5.php" id="sectorForm">

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

                $infoTexts = [
                    'bouw' => 'In deze sector werk je aan het ontwerpen en bouwen van huizen, bruggen of andere gebouwen. Denk aan architecten en mensen die het bouwen van deze dingen regelen.',
                    'communicatie' => 'Communicatie en media gaat over het maken van reclame, video\'s en berichten. Hier leer je hoe je mensen kunt bereiken via social media, tv of kranten.',
                    'economie' => 'Economie en financiën gaat over geld, bedrijven en hoe je slim kunt omgaan met inkomsten en uitgaven. Denk aan werken bij een bank of het starten van een eigen bedrijf.',
                    'facilitaire' => 'Hier werk je bijvoorbeeld in een hotel, restaurant of bij evenementen. Je zorgt ervoor dat gasten blij zijn en alles goed verloopt.',
                    'fashion' => 'In deze sector werk je aan mode en ontwerpen. Denk aan kleding maken, ontwerpen van schoenen of accessoires zoals tassen.',
                    'gezondheidszorg' => 'In de gezondheidszorg help je mensen gezonder te worden. Je kunt bijvoorbeeld in een ziekenhuis werken, medicijnen ontwikkelen of patiënten verzorgen.',
                    'ict' => 'ICT gaat over computers en technologie. Hier leer je bijvoorbeeld hoe je apps maakt, websites bouwt of computers veilig houdt.',
                    'juridisch' => 'De juridische sector gaat over wetten en regels. Je helpt mensen of bedrijven met vragen over wat wel en niet mag.',
                    'kunst' => 'In deze sector werk je met dingen zoals muziek, theater, schilderijen of films. Het gaat om creatief bezig zijn en mensen vermaken.',
                    'management' => 'Hier leer je hoe je een bedrijf kunt starten of leiden. Je zorgt ervoor dat alles goed geregeld is en bedenkt plannen om succesvol te zijn.',
                    'natuur' => 'De natuursector gaat over werken met planten, dieren en het beschermen van de aarde. Denk aan dierverzorging, boerderijwerk of het opruimen van afval in de natuur.',
                    'onderwijs' => 'In het onderwijs help je kinderen of jongeren iets te leren. Je kunt bijvoorbeeld leraar worden of mensen trainen in iets waar je goed in bent.',
                    'sociaal' => 'In deze sector help je mensen die het moeilijk hebben, zoals ouderen of jongeren. Het gaat om zorgen dat mensen zich beter voelen.',
                    'sport' => 'Hier werk je met sporten, gezondheid en bewegen. Je kunt bijvoorbeeld trainer worden, sportlessen geven of advies geven over gezond eten.',
                    'techniek' => 'Techniek gaat over dingen maken of verbeteren, zoals machines, auto\'s of robots. Je leert hoe dingen werken en hoe je ze kunt repareren.',
                    'toerisme' => 'In toerisme werk je met reizen en vrije tijd. Je kunt bijvoorbeeld vakanties organiseren, gids zijn of mensen helpen genieten van hun vrije tijd.',
                    'transport' => 'Deze sector gaat over het vervoeren van spullen of mensen. Denk aan vrachtwagens, vliegtuigen of het regelen van pakketbezorging.',
                    'veiligheid' => 'Veiligheid gaat over mensen beschermen. Je kunt bijvoorbeeld bij de politie, brandweer of beveiliging werken om anderen te helpen.'
                ];

                foreach ($options as $key => $label) {
                    $isChecked = in_array($key, $selectedSectors) ? 'checked' : '';
                    echo '<label>';
                    echo '<span><input type="checkbox" name="sector[]" value="' . htmlspecialchars($key, ENT_QUOTES, 'UTF-8') . '" class="sector-checkbox" onchange="handleCheckboxChange()" ' . $isChecked . '> ';
                    echo htmlspecialchars($label, ENT_QUOTES, 'UTF-8') . '</span>';
                    echo '<button class="info-button" title="' . htmlspecialchars($infoTexts[$key], ENT_QUOTES, 'UTF-8') . '">i</button>';
                    echo '</label>';
                }
                ?>

            </form>
        </div>

        <div id="infoPopup" class="popup">
            <div class="popup-content">
                <span class="close-button" onclick="closePopup()">&times;</span>
                <p id="popupText">Informatie over de sector wordt hier weergegeven.</p>
            </div>
        </div>
    </div>

    <!-- Navigatieknoppen -->
    <div class="button-group">
        <button class="arrow-btn" onclick="goToPreviousPage()">&#8249;</button>
        <button class="arrow-btn" onclick="goToNextPage()">&#8250;</button>
    </div>

    <script>
        // Open het popup-venster met informatie
        function showPopup(infoText) {
            const popup = document.getElementById('infoPopup');
            const popupText = document.getElementById('popupText');

            // Stel de inhoud van de popup in
            popupText.textContent = infoText;

            // Toon de popup
            popup.style.display = 'flex';
        }

        // Sluit het popup-venster
        function closePopup() {
            const popup = document.getElementById('infoPopup');
            popup.style.display = 'none';
        }

        // Voeg functionaliteit toe aan alle "i"-knoppen
        document.querySelectorAll('.info-button').forEach((button) => {
            button.addEventListener('click', (event) => {
                event.preventDefault(); // Voorkom standaardgedrag van de knop

                // Verkrijg de sector-informatie uit de button's title attribuut
                const infoText = button.getAttribute('title');
                showPopup(infoText);
            });
        });


        // Zorg ervoor dat de beperking wordt toegepast wanneer de pagina wordt geladen
        window.onload = function () {
            handleCheckboxChange();
        }

        // Navigatie functies
        function goToPreviousPage() {
            window.location.href = 'opdracht4.php';
        }

        function goToNextPage() {
            window.location.href = 'opdracht5b.php';
        }
    </script>
</body>
</html>
