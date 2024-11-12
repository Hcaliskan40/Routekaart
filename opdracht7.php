<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verlanglijst - Ronde Checkboxes</title>
    <link rel="stylesheet" type="text/css" href="css/opdracht7_ronde_checkbox.css">
</head>
<body>
<div class="container">
    <div class="header">
        <span class="dot">7</span>
        <div class="titel-balk">Verlanglijst</div>
    </div>
    <b>Geef van de onderstaande eisen aan welke belangrijk zijn voor jou voor de studie die je wilt gaan doen:</b>

    <div class="options">
        <label class="option-item">
            <input type="checkbox" class="option-checkbox"> Engelstalig
        </label>
        <label class="option-item">
            <input type="checkbox" class="option-checkbox"> Nederlandstalig
        </label>
        <label class="option-item">
            <input type="checkbox" class="option-checkbox"> Kleine hogeschool
        </label>
        <label class="option-item">
            <input type="checkbox" class="option-checkbox"> Grote hogeschool
        </label>
        <label class="option-item">
            <input type="checkbox" class="option-checkbox"> Op kamers
        </label>
        <!-- Add more items as necessary -->
    </div>

    <div class="button-group">
        <button class="arrow-btn" onclick="goToPreviousPage()">&#8249;</button>
        <button class="button-1" role="button">Bevestigen</button>
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
