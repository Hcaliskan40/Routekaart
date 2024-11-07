<?php
session_start();
$connection = new mysqli('127.0.0.1', 'root', '', 'routekaart', '3306');

if ($connection->connect_errno) {
    die("Connection failed: " . $connection->connect_error);
}

$imageIndex = isset($_POST['imageIndex']) ? (int)$_POST['imageIndex'] : 0;
$selectedImages = [
    $_SESSION['selectedImage0'] ?? '',
    $_SESSION['selectedImage1'] ?? '',
    $_SESSION['selectedImage2'] ?? '',
];

// Check of een afbeelding is geselecteerd en opslaan in de sessie
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['selectedImage'])) {
    $selectedImage = $_POST['selectedImage'];
    $_SESSION["selectedImage{$imageIndex}"] = $selectedImage;

    // Redirect terug naar opdracht1.php
    header('Location: opdracht1.php');
    exit();
}

function generateRoster($connection, $imageIndex, $selectedImages) {
    $query = "SELECT * FROM afbeelding WHERE kleur = 'oranje'";
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
<a href="opdracht1.php">Close</a>
<div class="popup-body">
    <?php generateRoster($connection, $imageIndex, $selectedImages); ?>
</div>
</body>
</html>
