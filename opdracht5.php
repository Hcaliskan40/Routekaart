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
            <input type="checkbox" class="option-checkbox"> Grote hogeschool
        </label>
        <label class="option-item">
            <input type="checkbox" class="option-checkbox"> Op kamers
        </label>
        <label class="option-item">
            <input type="checkbox" class="option-checkbox"> In de buurt van mijn woonplaats
        </label>
        <label class="option-item">
            <input type="checkbox" class="option-checkbox"> Veel begeleiding
        </label>
        <label class="option-item">
            <input type="checkbox" class="option-checkbox"> Veel zelfstandig werken
        </label>
        <label class="option-item">
            <input type="checkbox" class="option-checkbox"> 2 jaar
        </label>
        <label class="option-item">
            <input type="checkbox" class="option-checkbox"> 4 jaar
        </label>
        <label class="option-item">
            <input type="checkbox" class="option-checkbox"> Veel groepswerk
        </label>
        <label class="option-item">
            <input type="checkbox" class="option-checkbox"> Goede studenttevredenheid
        </label>
        <label class="option-item">
            <input type="checkbox" class="option-checkbox"> Hoog salaris toekomstig beroep
        </label>
        <label class="option-item">
            <input type="checkbox" class="option-checkbox"> Kleine klassen
        </label>
        <label class="option-item">
            <input type="checkbox" class="option-checkbox"> Grote klassen
        </label>
        <label class="option-item">
            <input type="checkbox" class="option-checkbox"> Veel praktijk
        </label>
        <label class="option-item">
            <input type="checkbox" class="option-checkbox"> Veel theorie
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