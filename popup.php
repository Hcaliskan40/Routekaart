<?php
session_start();
$connection = mysqli_connect('127.0.0.1', 'root', '', 'routekaart', '3306');
if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}

$imageIndex = isset($_POST['imageIndex']) ? (int)$_POST['imageIndex'] : 0;
$selectedImages = [
    isset($_SESSION['selectedImage0']) ? $_SESSION['selectedImage0'] : '',
    isset($_SESSION['selectedImage1']) ? $_SESSION['selectedImage1'] : '',
    isset($_SESSION['selectedImage2']) ? $_SESSION['selectedImage2'] : '',
];

function generateRoster($connection, $imageIndex, $selectedImages) {
    $query = "SELECT * FROM afbeelding WHERE kleur = 'groen'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo '<div class="roster-content">';
        while ($row = mysqli_fetch_assoc($result)) {
            $afbeeldingNaam = htmlspecialchars($row['naam'], ENT_QUOTES, 'UTF-8');
            $imagePath = "img/{$afbeeldingNaam}.jpg";
            $isDisabled = in_array($imagePath, $selectedImages) ? 'disabled' : '';
            echo "<div class='roster-item'>
                    <form method='post' action='index.php'>
                        <input type='hidden' name='selectedImage' value='{$imagePath}'>
                        <input type='hidden' name='imageIndex' value='{$imageIndex}'>
                        <button type='submit' class='image-button' {$isDisabled}>
                            <img src='{$imagePath}' alt='{$afbeeldingNaam}'>
                        </button>
                    </form>
                  </div>";
        }
        echo '</div>';
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Image</title>
    <link rel="stylesheet" href="css/popup.css">
</head>
<body>
<h2>Select an Image</h2>
<a href="index.php">Close</a>
<div class="popup-body">
    <?php generateRoster($connection, $imageIndex, $selectedImages); ?>
</div>
</body>
</html>