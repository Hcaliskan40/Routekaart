<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opleidingen</title>
    <link rel="stylesheet" type="text/css" href="css/opdracht5b.css">
</head>
<body>
<div class="container">
    <div class="header">
        <span class="dot">5</span>
        <div class="titel-balk">Opleidingen</div>
    </div>
    <b>Dit is mijn TOP 3 sectoren:</b>
    <p>Deze beroepen passen hierbij voor mij:</p>
    <div class="input-box">

        <!-- Eerste input-item -->
        <div class="input-item">
            <div class="input-number">1</div>
            <input type="text" id="beroep1" class="dotted-input" placeholder="Beroepen" oninput="saveText('beroep1')">
            <input type="text" id="waarom1" class="rounded-input" placeholder="Waarom dit beroep?" oninput="saveText('waarom1')">
        </div>

        <!-- Tweede input-item -->
        <div class="input-item">
            <div class="input-number">2</div>
            <input type="text" id="beroep2" class="dotted-input" placeholder="Beroepen" oninput="saveText('beroep2')">
            <input type="text" id="waarom2" class="rounded-input" placeholder="Waarom dit beroep?" oninput="saveText('waarom2')">
        </div>

        <!-- Derde input-item -->
        <div class="input-item">
            <div class="input-number">3</div>
            <input type="text" id="beroep3" class="dotted-input" placeholder="Beroepen" oninput="saveText('beroep3')">
            <input type="text" id="waarom3" class="rounded-input" placeholder="Waarom dit beroep?" oninput="saveText('waarom3')">
        </div>
    </div>

    <div class="button-group">
        <button class="arrow-btn" onclick="goToPreviousPage()">&#8249;</button>
        <button class="arrow-btn" onclick="goToNextPage()">&#8250;</button>
    </div>
</div>

<script>
    // Functie om tekst op te slaan in localStorage
    function saveText(id) {
        const value = document.getElementById(id).value;
        localStorage.setItem(id, value);
    }

    // Laad opgeslagen waarden bij het laden van de pagina
    window.onload = function () {
        document.getElementById('beroep1').value = localStorage.getItem('beroep1') || '';
        document.getElementById('waarom1').value = localStorage.getItem('waarom1') || '';
        document.getElementById('beroep2').value = localStorage.getItem('beroep2') || '';
        document.getElementById('waarom2').value = localStorage.getItem('waarom2') || '';
        document.getElementById('beroep3').value = localStorage.getItem('beroep3') || '';
        document.getElementById('waarom3').value = localStorage.getItem('waarom3') || '';
    };

    // Navigatiefuncties
    function goToPreviousPage() {
        window.location.href = 'opdracht4.php';
    }

    function goToNextPage() {
        window.location.href = 'opdracht6.php';
    }
</script>
</body>
</html>
