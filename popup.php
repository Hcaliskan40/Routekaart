<?php
session_start();
$connection = new mysqli('127.0.0.1', 'root', '', 'routekaart', '3306');

if ($connection->connect_errno) {
    die("Connection failed: " . $connection->connect_error);
}

$imageIndex = isset($_POST['imageIndex']) ? (int)$_POST['imageIndex'] : 0;
$caller = isset($_POST['caller']) ? $_POST['caller'] : 'opdracht1.php'; // Default naar opdracht1.php als caller niet is ingesteld

// Verzamel alle gekozen afbeeldingen uit zowel opdracht 1 als opdracht 2
$selectedImages = [
    $_SESSION['selectedImage0'] ?? '',
    $_SESSION['selectedImage1'] ?? '',
    $_SESSION['selectedImage2'] ?? '',
    $_SESSION['selectedImage3'] ?? '',
    $_SESSION['selectedImage4'] ?? '',
    $_SESSION['selectedImage5'] ?? '',
];

// Check of een afbeelding is geselecteerd en sla deze op in de sessie
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['selectedImage'])) {
    $selectedImage = $_POST['selectedImage'];
    $_SESSION["selectedImage{$imageIndex}"] = $selectedImage;

    // Redirect terug naar de juiste opdrachtpagina
    header("Location: $caller");
    exit();
}

function generateRoster($connection, $imageIndex, $selectedImages) {
    $query = "SELECT * FROM afbeelding WHERE kleur = 'groen'";
    if ($result = $connection->query($query)) {
        echo '<div class="roster-content">';
        while ($row = $result->fetch_assoc()) {
            $afbeeldingNaam = htmlspecialchars($row['naam'], ENT_QUOTES, 'UTF-8');
            $imagePath = "http://localhost:80/Routekaart/img/{$afbeeldingNaam}.jpg";

            // Controleer of de afbeelding al is geselecteerd in een andere opdracht
            $isDisabled = in_array($imagePath, $selectedImages) ? 'disabled' : '';

            echo "<div class='roster-item'>
                    <form method='post' action=''>
                        <input type='hidden' name='selectedImage' value='{$imagePath}'>
                        <input type='hidden' name='imageIndex' value='{$imageIndex}'>
                        <input type='hidden' name='caller' value='{$_POST['caller']}'> <!-- Caller wordt opnieuw meegegeven -->
                        <button type='submit' class='image-button' {$isDisabled}>
                            <img src='{$imagePath}' alt='{$afbeeldingNaam}'>
                        </button>
                    </form>
                  </div>";
        }
        echo '</div>';
        $result->free();
    } else {
        echo "Error: " . $connection->error;
    }
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afbeelding kiezen</title>
    <link rel="stylesheet" href="css/popup.css">
</head>
<body>
<h2>Kies een afbeelding</h2>
<a href="<?php echo htmlspecialchars($caller, ENT_QUOTES, 'UTF-8'); ?>">Close</a>
<div class="popup-body">
    <?php generateRoster($connection, $imageIndex, $selectedImages); ?>
</div>
</body>
</html>