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
        <p>Welkom bij de Windesheim Quiz! Klik op de knop om te beginnen.</p>
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
