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
    <p>Deze opleidingen passen hierbij en wil ik verder verkennen:</p>
    <div class="input-box">
        <div class="input-item">
            <div class="input-number">1</div>
            <input type="text" class="dotted-input" placeholder="Beroepen">
            <input type="text" class="rounded-input" placeholder="Opleiding(en)">
        </div>
        <div class="input-item">
            <div class="input-number">2</div>
            <input type="text" class="dotted-input" placeholder="Beroepen">
            <input type="text" class="rounded-input" placeholder="Opleiding(en)">
        </div>
        <div class="input-item">
            <div class="input-number">3</div>
            <input type="text" class="dotted-input" placeholder="Beroepen">
            <input type="text" class="rounded-input" placeholder="Opleiding(en)">
        </div>
        <div class="button-group">
            <button class="arrow-btn" onclick="goToPreviousPage()">&#8249;</button>
            <button class="button-1" role="button">Akkoord</button>
            <button class="arrow-btn" onclick="goToNextPage()">&#8250;</button>
        </div>
    </div>

    <script>
        function goToPreviousPage() {
            window.location.href = 'opdracht5b.php';
        }

        function goToNextPage() {
            window.location.href = 'opdracht7.php';
        }
    </script>

</body>
</html>