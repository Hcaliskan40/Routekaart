<?php
session_start();
$connection = new mysqli('127.0.0.1', 'root', '', 'routekaart', '3306');

if ($connection->connect_errno) {
    die("Connection failed: " . $connection->connect_error);
}

$imageIndex = isset($_POST['imageIndex']) ? (int)$_POST['imageIndex'] : 0;
$caller = isset($_POST['caller']) ? $_POST['caller'] : 'opdracht4.php';

// Verzamel alle gekozen afbeeldingen uit alle opdrachten om dubbele selecties te voorkomen
$selectedImages = [
    // Afbeeldingen van opdracht 1
    $_SESSION['selectedImage0'] ?? '',
    $_SESSION['selectedImage1'] ?? '',
    $_SESSION['selectedImage2'] ?? '',
    // Afbeeldingen van opdracht 2
    $_SESSION['selectedImage3'] ?? '',
    $_SESSION['selectedImage4'] ?? '',
    $_SESSION['selectedImage5'] ?? '',
    // Afbeeldingen van opdracht 3
    $_SESSION['selectedImage_opdracht3_0'] ?? '',
    $_SESSION['selectedImage_opdracht3_1'] ?? '',
    $_SESSION['selectedImage_opdracht3_2'] ?? '',
    // Afbeeldingen van opdracht 4
    $_SESSION['selectedImage_opdracht4_0'] ?? '',
    $_SESSION['selectedImage_opdracht4_1'] ?? '',
    $_SESSION['selectedImage_opdracht4_2'] ?? '',
];

// Controleer of een afbeelding is geselecteerd en sla deze op in de sessie
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['selectedImage'])) {
    $selectedImage = $_POST['selectedImage'];
    $_SESSION["selectedImage_opdracht4_{$imageIndex}"] = $selectedImage;

    // Redirect terug naar de juiste opdrachtpagina
    header("Location: $caller");
    exit();
}

function generateRoster($connection, $imageIndex, $selectedImages, $caller)
{
    // Selecteer afbeeldingen met kleur 'oranje'
    $query = "SELECT * FROM afbeelding WHERE kleur = 'oranje'";
    if ($result = $connection->query($query)) {
        echo '<div class="roster-content">';
        while ($row = $result->fetch_assoc()) {
            $afbeeldingNaam = htmlspecialchars($row['naam'], ENT_QUOTES, 'UTF-8');
            $imagePath = "img/{$afbeeldingNaam}.jpg";

            // Controleer of de afbeelding al is geselecteerd
            $isDisabled = in_array($imagePath, $selectedImages) ? 'disabled' : '';
            $isGrey = in_array($imagePath, $selectedImages) ? 'style="filter: grayscale(100%);"' : '';

            echo "<div class='roster-item'>
                    <form method='post' action=''>
                        <input type='hidden' name='selectedImage' value='{$imagePath}'>
                        <input type='hidden' name='imageIndex' value='{$imageIndex}'>
                        <input type='hidden' name='caller' value='{$caller}'>
                        <button type='submit' class='image-button' {$isDisabled}>
                            <img src='{$imagePath}' alt='{$afbeeldingNaam}' {$isGrey}>
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
<html lang='nl'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Afbeelding kiezen - Opdracht 4</title>
    <link rel='stylesheet' href='css/popup.css'>
</head>
<body>
<h2>Kies een afbeelding</h2>
<a href="<?php echo htmlspecialchars($caller, ENT_QUOTES, 'UTF-8'); ?>">Sluiten</a>
<div class="popup-body">
    <?php generateRoster($connection, $imageIndex, $selectedImages, $caller); ?>
</div>
</body>
</html>