<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bedankt voor het invullen!</title>
    <link rel="stylesheet" type="text/css" href="css/mail.css">
    <!-- Confetti-bibliotheek -->
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
</head>
<body>

<div class="grid-wrapper">

<div class="container">
    <!-- Afbeelding van het logo -->
    <img src="img/WindesheimLogo.png" alt="Windesheim Logo" class="logo">

    <h2>Bedankt voor het invullen van de quiz!</h2>
    <p>
        Je hebt zojuist een belangrijke stap gezet in jouw ontdekkingstocht. Op basis van jouw antwoorden hebben we een
        passend resultaat voor je samengesteld.
        Klik op de knop hieronder om jouw persoonlijke resultaten te bekijken. Veel succes met jouw volgende stappen!
    </p>
    <br><br>
    <!-- Knop met klasse voor styling -->
    <button class="resultaat-btn" onclick="goToNextPage()">Resultaat</button>

</div>


<div class="opnieuw-container">

    <p>Met deze knop ga je de routekaart opnieuw maken</p>


    <button class="redo-btn" id="redo-btn">Opnieuw</button>

</div>

</div>

<script>
    function redoTest() {
        // Clear PHP session
        fetch('clear-session.php')
            .then(response => {
                if (response.ok) {
                    // Clear local storage
                    localStorage.clear();
                    // Redirect to first page
                    window.location.href = 'opdracht1.php';
                }
            });
    }

    // Functie om confetti te laten zien
    function launchConfetti() {
        const duration = 2000; // Duur in milliseconden
        const end = Date.now() + duration;

        const colors = ['#ff0000', '#00ff00', '#0000ff', '#ff00ff', '#00ffff', '#ffff00'];

        (function frame() {
            confetti({
                particleCount: 5,
                angle: 60,
                spread: 55,
                origin: {x: Math.random()},
                colors: colors,
            });

            confetti({
                particleCount: 5,
                angle: 120,
                spread: 55,
                origin: {x: Math.random()},
                colors: colors,
            });

            if (Date.now() < end) {
                requestAnimationFrame(frame);
            }
        })();
    }

    // Functie om naar de volgende pagina te gaan
    function goToNextPage() {
        window.location.href = 'gekozenfotos.php';
    }

    // Start confetti wanneer de pagina geladen wordt
    window.onload = launchConfetti;

    // Add event listener to the redo button
    document.getElementById('redo-btn').addEventListener('click', redoTest);
</script>
</body>
</html>