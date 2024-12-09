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
        <div class="titel-balk">Beroepen</div>
    </div>
    <b>Dit is mijn TOP 3 sectoren:</b>
    <p>Deze beroepen passen hierbij voor mij:</p>
    <div class="input-box">
        <div class="input-item">
            <div class="input-number">1</div>
            <input id= 'message51' type="text" class="dotted-input" placeholder="Beroepen" oninput="saveText('message51')">
            <input id='message5a' type="text" class="rounded-input" placeholder="Waarom dit beroep?" oninput="saveText('message5a')">
        </div>
        <div class="input-item">
            <div class="input-number">2</div>
            <input id= 'message52' type="text" class="dotted-input" placeholder="Beroepen" oninput="saveText('message52')">
            <input id='message5b' type="text" class="rounded-input" placeholder="Waarom dit beroep?"oninput="saveText('message5b')">
        </div>
        <div class="input-item">
            <div class="input-number">3</div>
            <input id= 'message53' type="text" class="dotted-input" placeholder="Beroepen" oninput="saveText('message53')">
            <input id ='message5c' type="text" class="rounded-input" placeholder="Waarom dit beroep?" oninput="saveText('message5c')">
        </div>

        <div class="button-group">
            <button class="arrow-btn" onclick="goToPreviousPage()">&#8249;</button>
            <button class="arrow-btn" onclick="goToNextPage()">&#8250;</button>
        </div>

    </div>
    <script>
        window.onload = function () {
            document.getElementById('message51').value = localStorage.getItem('message51') || '';
            document.getElementById('message52').value = localStorage.getItem('message52') || '';
            document.getElementById('message53').value = localStorage.getItem('message53') || '';
            document.getElementById('message5a').value = localStorage.getItem('message5a') || '';
            document.getElementById('message5b').value = localStorage.getItem('message5b') || '';
            document.getElementById('message5c').value = localStorage.getItem('message5c') || '';
        }

        // Functie om de tekst op te slaan in localStorage wanneer er iets verandert
        function saveText(id) {
            const value = document.getElementById(id).value;
            localStorage.setItem(id, value);
        }
        function goToPreviousPage() {
            window.location.href = 'opdracht5.php';
        }

        function goToNextPage() {
            window.location.href = 'opdracht6.php';
        }
    </script>

</body>
</html>