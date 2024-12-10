<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opleidingen</title>
    <link rel="stylesheet" type="text/css" href="css/opdracht6.css">
</head>
<body>
<div class="container">
    <div class="header">
        <span class="dot">6</span>
        <div class="titel-balk">Opleidingen</div> <!-- Tekst die aangeeft dat dit sectie 1 is, met het onderwerp 'Like'. -->
    </div>
    <b>Dit is mijn TOP 3 beroepen:</b>
    <p>Deze opleidingen passen hierbij:</p>
    <div class="input-box">
        <div class="input-item">
            <div class="input-number">1</div>
            <input type="text" class="dotted-input" placeholder="Beroepen">
            <input id="message6a"type="text" class="rounded-input" placeholder="Welke opleiding heb je nodig?"oninput="saveText('message6a')">

        </div>
        <div class="input-item">
            <div class="input-number">2</div>
            <input type="text" class="dotted-input" placeholder="Beroepen">
            <input id="message6b"type="text" class="rounded-input" placeholder="Welke opleiding heb je nodig?"oninput="saveText('message6b')">
        </div>
        <div class="input-item">
            <div class="input-number">3</div>
            <input type="text" class="dotted-input" placeholder="Beroepen">
            <input id="message6c" type="text" class="rounded-input" placeholder="Welke opleiding heb je nodig?"oninput="saveText('message6c')">
        </div>
        <div class="button-group">
            <button class="arrow-btn" onclick="goToPreviousPage()">&#8249;</button><!-- Linker navigatieknop om terug te gaan. -->
            <button class="arrow-btn" onclick="goToNextPage()">&#8250;</button> <!-- Rechter navigatieknop om verder te gaan. -->
        </div>


        <script>
            window.onload = function () {
                document.getElementById('message6a').value = localStorage.getItem('message6a') || '';
                document.getElementById('message6b').value = localStorage.getItem('message6b') || '';
                document.getElementById('message6c').value = localStorage.getItem('message6c') || '';
            }

            // Functie om de tekst op te slaan in localStorage wanneer er iets verandert
            function saveText(id) {
                const value = document.getElementById(id).value;
                localStorage.setItem(id, value);
            }
            function goToPreviousPage() {
                window.location.href = 'opdracht5b.php';
            }

            function goToNextPage() {
                window.location.href = 'opdracht7.php';
            }
        </script>
    </div>

</body>
</html>