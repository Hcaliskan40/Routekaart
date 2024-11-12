<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Like Section</title>
    <link rel="stylesheet" type="text/css" href="css/opdracht4.css">

</head>
<body>
<div class="container">
    <div class="header">
        <span class="dot">4</span>
        <div class="titel-balk">Belangrijk</div> <!-- Tekst die aangeeft dat dit sectie 1 is, met het onderwerp 'Like'. -->
    </div>
    <p>Dit is belangrijk in mijn leven:</p>
    <div class="input-box">
        <div class="input-item">
            <div class="image-placeholder">+</div> <!-- Terug naar de '+' om aan te geven dat hier iets toegevoegd kan worden. -->
            <textarea name="message1" rows="10" cols="40" placeholder="Omdat..."></textarea>
        </div>
        <div class="input-item">
            <div class="image-placeholder">+</div>
            <textarea name="message2" rows="3" cols="40" placeholder="Omdat..."></textarea>
        </div>
        <div class="input-item">
            <div class="image-placeholder">+</div>
            <textarea name="message3" rows="3" cols="40" placeholder="Omdat..."></textarea>

        </div>
        <div class="button-group">
            <button class="arrow-btn" onclick="goToPreviousPage()">&#8249;</button>
            <button class="arrow-btn" onclick="goToNextPage()">&#8250;</button>
        </div>

        <script>
            function goToPreviousPage() {
                window.location.href = 'opdracht3.php';
            }

            function goToNextPage() {
                window.location.href = 'opdracht5.php';
            }
        </script>



</body>
</html>