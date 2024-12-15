<?php ?>
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
    <!-- Knoppen -->
    <button class="resultaat-btn" onclick="goToNextPage()">Resultaat</button>
    <button class="redo-btn" onclick="redoTest()">Opnieuw</button>
</div>

<script>
    // Functie om de test te resetten
    function redoTest() {
        // Verzoek om de PHP-sessie te vernietigen
        fetch('reset_session.php', {
            method: 'GET',
        }).then(() => {
            // Wis de lokale opslag
            localStorage.clear();

            // Redirect naar de eerste opdracht
            window.location.href = 'opdracht1.php';
        }).catch(error => {
            console.error('Fout bij het resetten:', error);
        });
    }

    // Functie om naar de resultatenpagina te gaan
    function goToNextPage() {
        window.location.href = 'gekozenfotos.php';
    }

    // Functie om confetti te laten zien (optioneel)
    function launchConfetti() {
        const duration = 2000;
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

    // Start confetti wanneer de pagina geladen wordt
    window.onload = launchConfetti;
</script>
</body>
</html>
