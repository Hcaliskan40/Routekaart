<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Invuller - Resultaten Versturen</title>
    <link rel="stylesheet" type="text/css" href="css/mail.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<div class="container">
    <img src="img/WindesheimLogo.png" alt="Windesheim Logo" class="logo">

    <div class="email-section">
        <label for="email" class="email-input-wrapper">
            <span class="email-icon"><i class="fas fa-envelope"></i></span>
            <input type="email" id="email" placeholder="Voer je emailadres in..." required>
            <span class="remove-icon" onclick="clearInput()">✖</span>
        </label>
        <div class="info-icon"><i class="fas fa-info-circle"></i></div>
    </div>

    <div class="checkbox-section">
        <label>
            <input type="checkbox" required> Is alles in de toets ingevuld?
        </label>
        <label>
            <input type="checkbox" required> Is je email ingevuld?
        </label>
        <label>
            <input type="checkbox" required> Ga je akkoord met je gegevens delen?
        </label>
    </div>

    <p class="confirmation-text">Je uitslag wordt verstuurd naar je email</p>
    <button class="confirm-btn">Akkoord</button>
</div>
<script>
    function clearInput() {
        document.getElementById("email").value = "";
    }
</script>
</body>
</html>
