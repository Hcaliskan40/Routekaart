<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Startpagina - Windesheim Quiz</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/start.css">
</head>
<body>
<div class="container">
    <!-- Bovenste achtergrond met logo -->
    <div class="background-top">
        <img src="img/Almere2.png" alt="Achtergrond Almere" class="background-image">
        <div class="logo-overlay">
            <img src="img/WindesheimLogo.png" alt="Windesheim Logo" class="logo">
        </div>
    </div>

    <!-- Zwarte lijn -->
    <div class="separator"></div>

    <!-- Onderste achtergrond -->
    <div class="background-bottom">
        <img src="img/Lijnen.png" alt="Achtergrond Lijnen" class="lines">
    </div>

    <!-- Inhoud (tekst en knop) -->
    <div class="content">
        <b>Welkom bij onze studiekeuzetest! Hier hoef je geen e-mailadres in te vullen of een account aan te maken om je resultaten te bekijken. We geloven in een eenvoudige en toegankelijke manier om jou te helpen jouw toekomst te ontdekken. Vul de vragen in en ontvang direct jouw persoonlijke resultaten. Start nu en zet de eerste stap richting jouw ideale studiekeuze!
        </b>
        <br>
        <button class="start-button" onclick="startQuiz()">Begin</button>
    </div>
</div>

<script>
    // Functie om naar de eerste quizpagina te navigeren
    function startQuiz() {
        window.location.href = 'opdracht1.php';
    }
</script>
</body>
</html>
