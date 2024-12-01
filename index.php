
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Startpagina</title>

    <style>
        body {
            text-align: center;

        }
        .FotoAlmere {
            height: 500px;
            background-image: url('img/AlmereMaps.png');
            background-size: cover;
            background-position: center;
        }
        h1 {
            font-size: 2rem; /* Responsieve tekstgrootte */
            margin: 20px 0;
        }

        h5 {
            font-size: 1rem; /* Responsieve tekstgrootte */
            padding: 0 10%; /* Ruimte aan beide kanten voor kleinere schermen */
            line-height: 1.5;
        }
        .BeginButton {
            background-color: darkcyan;
            border: none;
            color: white;
            padding: 15px 32px;
            font-size: 1.5rem;
            border-radius: 40px;
            outline: none;
            margin: 20px auto;
            cursor: pointer;
        }

        .BeginButton:hover {
            background-color: #055959;
            color: white;
        }

        .WindesheimLogo {
            position: absolute;
            top: 15%;
            left: 0;
            right: 0;
        }

    </style>
</head>
</html>
<body>

<div class="FotoAlmere"></div>
<div class="WindesheimLogo" > <img src="img/WindesheimLogo.png" alt="WindesheimLogo" width="300" height="auto"> </div>
<h1>Welkom bij de Studiekeuze Routekaart</h1>
<h5>Deze test helpt je om na te denken over jouw toekomst door je interesses beter te verkennen. In 8 korte vragen ontdek je meer over wat jou inspireert en waar jouw talenten liggen. Aan het einde kun je jouw persoonlijke resultaten downloaden – en dat alles zonder dat je jouw e-mailadres hoeft in te vullen!

</h5>

<button id="ga-naar-homepagina" class="BeginButton">Begin</button>

<script>
    document.getElementById("ga-naar-homepagina").addEventListener("click", function() {
        window.location.href = "opdracht1.php";
    });
</script>

</body>
