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
        <div class="input-item">
            <div class="input-number">1</div>
            <input type="text" class="dotted-input" placeholder="Beroepen">
            <input type="text" class="rounded-input" placeholder="Waarom dit beroep?">
        </div>
        <div class="input-item">
            <div class="input-number">2</div>
            <input type="text" class="dotted-input" placeholder="Beroepen">
            <input type="text" class="rounded-input" placeholder="Waarom dit beroep?">
        </div>
        <div class="input-item">
            <div class="input-number">3</div>
            <input type="text" class="dotted-input" placeholder="Beroepen">
            <input type="text" class="rounded-input" placeholder="Waarom dit beroep?">
        </div>

        <div class="button-group">
            <button class="arrow-btn" onclick="goToPreviousPage()">&#8249;</button>
            <button class="arrow-btn" onclick="goToNextPage()">&#8250;</button>
        </div>

    </div>
    <script>
        function goToPreviousPage() {
            window.location.href = 'opdracht5.php';
        }

        function goToNextPage() {
            window.location.href = 'opdracht6.php';
        }
    </script>

</body>
</html>