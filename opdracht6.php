<?php
session_start();

/**
 * Retrieve messages from session or set to an empty string if not set.
 */
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
        <?php
        $messages5 = [$message5a, $message5b, $message5c];
        $messages6 = [$message6a, $message6b, $message6c];
        for ($i = 0; $i < 3; $i++): ?>
            <div class="input-item">
                <div class="input-number"><?php echo $i + 1; ?></div>
                <input type="text" class="dotted-input" placeholder="Beroepen" value="<?php echo htmlspecialchars($messages5[$i], ENT_QUOTES, 'UTF-8'); ?>" readonly>
                <input id="message6<?php echo chr(97 + $i); ?>" type="text" class="rounded-input" placeholder="Welke opleiding heb je nodig?" value="<?php echo htmlspecialchars($messages6[$i], ENT_QUOTES, 'UTF-8'); ?>" oninput="saveText('message6<?php echo chr(97 + $i); ?>')">
            </div>
        <?php endfor; ?>
    </div>

    <script>
        /**
         * Save the text input value to the session via an AJAX POST request.
         *
         * @param {string} id - The ID of the input element whose value is to be saved.
         */
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