<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jouw keuze</title>
    <link rel="stylesheet" type="text/css" href="css/opdracht8.css">
</head>
<body>
<div class="container">
    <div class="header">
        <span class="dot">8</span>
        <div class="titel-balk">Jouw keuze</div>
    </div>
    <b>8 Jouw keuze:</b>
    <p>Wat past het beste bij jou op basis van je ontdekkingstocht?</p>

    <div class="options">
        <div class="option-item">
            <button class="option-button">Verder studeren</button>
            <input type="checkbox" class="option-checkbox">
        </div>
        <div class="option-item">
            <button class="option-button">Werken</button>
            <input type="checkbox" class="option-checkbox">
        </div>
        <div class="option-item">
            <button class="option-button">Tussenjaar</button>
            <input type="checkbox" class="option-checkbox">
        </div>
        <div class="option-item">
            <button class="option-button">Iets anders</button>
            <input type="checkbox" class="option-checkbox">
        </div>
    </div>

    <div class="feedback-section">
        <label for="feedback">En wat vind jij hiervan?</label>
        <textarea id="feedback" placeholder="Schrijf hier je feedback..."></textarea>
    </div>

    <div class="button-group">
        <button class="arrow-btn" onclick="goToPreviousPage()">&#8249;</button>
        <button class="arrow-btn" onclick="goToNextPage()">&#8250;</button>
    </div>
</div>
<script>
    function goToPreviousPage() {
        window.location.href = 'opdracht7.php';
    }

    function goToNextPage() {
        window.location.href = 'mail.php';
    }
</script>
</body>
</html>
