<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professions</title>
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
            <label>
                <span><input type="checkbox" class="sector-checkbox"> Bouw / Architectuur</span>
                <button class="info-button" title="More information about Bouw / Architectuur">i</button>
            </label>
            <label>
                <span><input type="checkbox" class="sector-checkbox"> Communicatie / Media</span>
                <button class="info-button" title="More information about Communicatie / Media">i</button>
            </label>
            <label>
                <span><input type="checkbox" class="sector-checkbox"> Economie / Financiën</span>
                <button class="info-button" title="More information about Economie / Financiën">i</button>
            </label>
            <label>
                <span><input type="checkbox" class="sector-checkbox"> Facilitaire dienstverlening / Horeca</span>
                <button class="info-button" title="More information about Facilitaire dienstverlening / Horeca">i</button>
            </label>
            <label>
                <span><input type="checkbox" class="sector-checkbox"> Fashion / Design</span>
                <button class="info-button" title="More information about Fashion / Design">i</button>
            </label>
            <label>
                <span><input type="checkbox" class="sector-checkbox"> Gezondheidszorg / Life science</span>
                <button class="info-button" title="More information about Gezondheidszorg / Life science">i</button>
            </label>
            <label>
                <span><input type="checkbox" class="sector-checkbox"> ICT / IT</span>
                <button class="info-button" title="More information about ICT / IT">i</button>
            </label>
            <label>
                <span><input type="checkbox" class="sector-checkbox"> Juridisch / Recht</span>
                <button class="info-button" title="More information about Juridisch / Recht">i</button>
                </label>
            <label>
                <span><input type="checkbox" class="sector-checkbox"> Kunst / Cultuur / Entertainment</span>
                <button class="info-button" title="More information about Kunst / Cultuur / Entertainment">i</button>
            </label>
            <label>
                <span><input type="checkbox" class="sector-checkbox"> Management / Ondernemen</span>
                <button class="info-button" title="More information about Management / Ondernemen">i</button>
            </label>
            <label>
                <span><input type="checkbox" class="sector-checkbox"> Natuur (planten, dieren en milieu)</span>
                <button class="info-button" title="More information about Natuur (planten, dieren en milieu)">i</button>
            </label>
            <label>
               <span><input type="checkbox" class="sector-checkbox"> Onderwijs</span>
                <button class="info-button" title="More information about Onderwijs">i</button>
            </label>
            <label>
                <span><input type="checkbox" class="sector-checkbox"> Sociaal welzijn</span>
                <button class="info-button" title="More information about Sociaal welzijn">i</button>
            </label>
            <label>
                <span><input type="checkbox" class="sector-checkbox"> Sport / Voeding / Beweging</span>
                <button class="info-button" title="More information about Sport / Voeding / Beweging">i</button>
            </label>
            <label>
                <span><input type="checkbox" class="sector-checkbox"> Techniek</span>
                <button class="info-button" title="More information about Techniek">i</button>
            </label>
            <label>
                <span><input type="checkbox" class="sector-checkbox"> Toerisme / Recreatie</span>
                <button class="info-button" title="More information about Toerisme / Recreatie">i</button>
            </label>
            <label>
                <span><input type="checkbox" class="sector-checkbox"> Transport / Logistiek</span>
                <button class="info-button" title="More information about Transport / Logistiek">i</button>
            </label>
            <label>
                <span><input type="checkbox" class="sector-checkbox"> Veiligheid</span>
                <button class="info-button" title="More information about Veiligheid">i</button>
            </label>
        </div>
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
    </script>
    <div class="button-group">
        <button class="arrow-btn" onclick="goToPreviousPage()">&#8249;</button>
        <button class="button-1" role="button">Akkoord</button>
        <button class="arrow-btn" onclick="goToNextPage()">&#8250;</button>
    </div>

    <script>
        function goToPreviousPage() {
            window.location.href = 'opdracht4.php';
        }

        function goToNextPage() {
            window.location.href = 'opdracht6.php';
        }
    </script>

</body>
</html>