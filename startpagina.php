
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

        .BeginButton{
            display: flow;
            background-color: darkcyan;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 32px;
            border-radius: 40px;
            outline: none;
            bottom: 40px;
            position: absolute;
            right: 100px;
            left: 100px;
        }

        .BeginButton:hover {
            background-color: aqua;
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
<h1>(Beschrijving van de Routekaart)</h1>

<button id="ga-naar-homepagina" class="BeginButton">Begin</button>

<script>
    document.getElementById("ga-naar-homepagina").addEventListener("click", function() {
        window.location.href = "opdracht1.php";
    });
</script>

</body>