<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sectoren - Vraag 5</title>
    <link rel="stylesheet" type="text/css" href="css/opdracht5.1.css">
</head>
<body>
<div class="container">
    <div class="header">
        <span class="dot">5</span>
        <div class="titel-balk">Sectoren</div>
    </div>
    <b>Geef van de onderstaande eisen aan welke belangrijk zijn voor jou voor de studie die je wilt gaan doen:</b>

    <div class="options">
        <label class="option-item">
            <input type="checkbox" class="option-checkbox"> Bouw / Architectuur
        </label>
        <label class="option-item">
            <input type="checkbox" class="option-checkbox"> Communicatie / Media
        </label>
        <label class="option-item">
            <input type="checkbox" class="option-checkbox"> Economie / Financiën
        </label>
        <label class="option-item">
            <input type="checkbox" class="option-checkbox"> Facilitaire dienstverlening / Horeca
        </label>
        <label class="option-item">
            <input type="checkbox" class="option-checkbox"> Fashion / Design
        </label>
        <label class="option-item">
            <input type="checkbox" class="option-checkbox"> Gezondheidszorg / Life science
        </label>
        <label class="option-item">
            <input type="checkbox" class="option-checkbox"> ICT / IT
        </label>
        <label class="option-item">
            <input type="checkbox" class="option-checkbox"> Juridisch / Recht
        </label>
        <label class="option-item">
            <input type="checkbox" class="option-checkbox"> Kunst / Cultuur / Entertainment
        </label>
        <label class="option-item">
            <input type="checkbox" class="option-checkbox"> Management / Ondernemen
        </label>
        <label class="option-item">
            <input type="checkbox" class="option-checkbox"> Natuur (planten, dieren en milieu)
        </label>
        <label class="option-item">
            <input type="checkbox" class="option-checkbox"> Onderwijs
        </label>
        <label class="option-item">
            <input type="checkbox" class="option-checkbox"> Sport / Voeding / Beweging
        </label>
        <label class="option-item">
            <input type="checkbox" class="option-checkbox"> Techniek
        </label>
        <label class="option-item">
            <input type="checkbox" class="option-checkbox"> Toerisme / Recreatie
        </label>
        <label class="option-item">
            <input type="checkbox" class="option-checkbox"> Transport / Logistiek
        </label>
        <label class="option-item">
            <input type="checkbox" class="option-checkbox"> Veiligheid
        </label>
    </div>

    <div class="button-group">
        <button class="arrow-btn" onclick="goToPreviousPage()">&#8249;</button>
        <button class="arrow-btn" onclick="goToNextPage()">&#8250;</button>
    </div>

    <script>
        function goToPreviousPage() {
            window.location.href = 'opdracht4.php';
        }

        function goToNextPage() {
            window.location.href = 'opdracht5b.php';
        }
    </script>

</body>
</html>