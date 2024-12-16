<?php
session_start();
$connection = new mysqli('127.0.0.1', 'root', '', 'routekaart', '3306');

if ($connection->connect_errno) {
    die("Connection failed: " . $connection->connect_error);
}

$imageIndex = isset($_POST['imageIndex']) ? (int)$_POST['imageIndex'] : 0;
$caller = isset($_POST['caller']) ? $_POST['caller'] : 'opdracht1.php'; // Default to opdracht1.php if caller is not set

// Collect all chosen images from both opdracht 1 and opdracht 2
$selectedImages = [
    $_SESSION['selectedImage0'] ?? '',
    $_SESSION['selectedImage1'] ?? '',
    $_SESSION['selectedImage2'] ?? '',
    $_SESSION['selectedImage3'] ?? '',
    $_SESSION['selectedImage4'] ?? '',
    $_SESSION['selectedImage5'] ?? '',
];

// Check if an image is selected and save it in the session
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['selectedImage'])) {
    $selectedImage = $_POST['selectedImage'];
    $_SESSION["selectedImage{$imageIndex}"] = $selectedImage;

    // Debugging: Print session variables
    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';

    // Redirect back to the correct assignment page
    header("Location: $caller");
    exit();
}

function generateRoster($connection, $imageIndex, $selectedImages) {
    $query = "SELECT * FROM afbeelding WHERE kleur = 'groen'";
    if ($result = $connection->query($query)) {
        echo '<div class="roster-content">';
        while ($row = $result->fetch_assoc()) {
            $afbeeldingNaam = htmlspecialchars($row['naam'], ENT_QUOTES, 'UTF-8');
            $imagePath = "img/{$afbeeldingNaam}.jpg";

            // Check if the image is already selected in another assignment
            $isDisabled = in_array($imagePath, $selectedImages) ? 'disabled' : '';
            $isGrey = in_array($imagePath, $selectedImages) ? 'style="filter: grayscale(100%);"' : '';

            echo "<div class='roster-item'>
                    <form method='post' action=''>
                        <input type='hidden' name='selectedImage' value='{$imagePath}'>
                        <input type='hidden' name='imageIndex' value='{$imageIndex}'>
                        <input type='hidden' name='caller' value='{$_POST['caller']}'> <!-- Caller is passed again -->
                        <button type='submit' class='image-button' {$isDisabled} {$isGrey}>
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
    <title>Kies een afbeelding</title>
    <link rel="stylesheet" href="css/popup.css">
</head>
<body>
<h2>Hier krijg ik energie van</h2>
<a href="<?php echo htmlspecialchars($caller, ENT_QUOTES, 'UTF-8'); ?>" class="button">
    <span>X</span>
</a>
<div class="popup-body">
    <?php generateRoster($connection, $imageIndex, $selectedImages); ?>
</div>
</body>
</html>