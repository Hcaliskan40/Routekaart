<?php
session_start();

$message5a = $_SESSION['message5a'] ?? '';
$message5b = $_SESSION['message5b'] ?? '';
$message5c = $_SESSION['message5c'] ?? '';
$message6a = $_SESSION['message6a'] ?? '';
$message6b = $_SESSION['message6b'] ?? '';
$message6c = $_SESSION['message6c'] ?? '';
?>

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
        <div class="titel-balk">Opleidingen</div>
    </div>
    <b>Dit is mijn TOP 3 beroepen:</b>
    <p>Deze opleidingen passen hierbij:</p>
    <div class="input-box">
        <div class="input-item">
            <div class="input-number">1</div>
            <input type="text" class="dotted-input" placeholder="Beroepen" value="<?php echo htmlspecialchars($message5a, ENT_QUOTES, 'UTF-8'); ?>">
            <input id="message6a" type="text" class="rounded-input" placeholder="Welke opleiding heb je nodig?" value="<?php echo htmlspecialchars($message6a, ENT_QUOTES, 'UTF-8'); ?>" oninput="saveText('message6a')">
        </div>
        <div class="input-item">
            <div class="input-number">2</div>
            <input type="text" class="dotted-input" placeholder="Beroepen" value="<?php echo htmlspecialchars($message5b, ENT_QUOTES, 'UTF-8'); ?>">
            <input id="message6b" type="text" class="rounded-input" placeholder="Welke opleiding heb je nodig?" value="<?php echo htmlspecialchars($message6b, ENT_QUOTES, 'UTF-8'); ?>" oninput="saveText('message6b')">
        </div>
        <div class="input-item">
            <div class="input-number">3</div>
            <input type="text" class="dotted-input" placeholder="Beroepen" value="<?php echo htmlspecialchars($message5c, ENT_QUOTES, 'UTF-8'); ?>">
            <input id="message6c" type="text" class="rounded-input" placeholder="Welke opleiding heb je nodig?" value="<?php echo htmlspecialchars($message6c, ENT_QUOTES, 'UTF-8'); ?>" oninput="saveText('message6c')">
        </div>
    </div>

    <script>
        function saveText(id) {
            const value = document.getElementById(id).value;
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "saveToSession.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send(id + "=" + encodeURIComponent(value));
        }

        function goToPreviousPage() {
            window.location.href = 'opdracht5b.php';
        }

        function goToNextPage() {
            window.location.href = 'opdracht7.php';
        }
    </script>

    <footer class="button-group">
        <button class="arrow-btn" onclick="goToPreviousPage()">&#8249;</button>
        <button class="arrow-btn" onclick="goToNextPage()">&#8250;</button>
    </footer>
</div>
</body>
</html>