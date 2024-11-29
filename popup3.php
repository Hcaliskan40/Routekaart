<?php
session_start();
$connection = new mysqli('127.0.0.1', 'root', '', 'routekaart', '3306');

if ($connection->connect_errno) {
    die("Connection failed: " . $connection->connect_error);
}

$imageIndex = isset($_POST['imageIndex']) ? (int)$_POST['imageIndex'] : 0;
$caller = isset($_POST['caller']) ? htmlspecialchars($_POST['caller'], ENT_QUOTES, 'UTF-8') : 'opdracht3.php';

// Verzamel reeds gekozen afbeeldingen
$selectedImages = [
    $_SESSION['selectedImage_opdracht3_0'] ?? '',
    $_SESSION['selectedImage_opdracht3_1'] ?? '',
    $_SESSION['selectedImage_opdracht3_2'] ?? '',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['selectedImage'])) {
    $selectedImage = htmlspecialchars($_POST['selectedImage'], ENT_QUOTES, 'UTF-8');
    $_SESSION["selectedImage_opdracht3_{$imageIndex}"] = $selectedImage;

    header("Location: $caller");
    exit();
}

function generateRoster($connection, $imageIndex, $selectedImages, $caller) {
    $query = "SELECT * FROM afbeelding WHERE kleur = 'blauw'";
    if ($result = $connection->query($query)) {
        echo '<div class="roster-content">';
        while ($row = $result->fetch_assoc()) {
            $afbeeldingNaam = htmlspecialchars($row['naam'], ENT_QUOTES, 'UTF-8');
            $imagePath = "img/{$afbeeldingNaam}.jpg";

            $isDisabled = in_array($imagePath, $selectedImages) ? 'disabled' : '';

            echo "<div class='roster-item'>
                    <form method='post' action=''>
                        <input type='hidden' name='selectedImage' value='{$imagePath}'>
                        <input type='hidden' name='imageIndex' value='{$imageIndex}'>
                        <input type='hidden' name='caller' value='{$caller}'>
                        <button type='submit' class='image-button' {$isDisabled}>
                            <img src='{$imagePath}' alt='{$afbeeldingNaam}'>
                        </button>
                    </form>
                  </div>";
        }
        echo '</div>';
        $result->free();
    } else {
        echo "Geen afbeeldingen beschikbaar.";
    }
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afbeelding kiezen - Opdracht 3</title>
    <link rel="stylesheet" href="css/popup.css">
</head>
<body>
<h2>Kies een afbeelding</h2>
<a href="<?php echo $caller; ?>">Sluiten</a>
<div class="popup-body">
    <?php generateRoster($connection, $imageIndex, $selectedImages, $caller); ?>
</div>
</body>
</html>
