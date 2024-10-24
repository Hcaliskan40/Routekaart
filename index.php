<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['selectedImage'])) {
        $imageIndex = (int)$_POST['imageIndex'];
        $_SESSION["selectedImage{$imageIndex}"] = $_POST['selectedImage'];
    }
}

$selectedImages = [
    isset($_SESSION['selectedImage0']) ? $_SESSION['selectedImage0'] : 'img/placeholder1.jpg',
    isset($_SESSION['selectedImage1']) ? $_SESSION['selectedImage1'] : 'img/placeholder2.jpg',
    isset($_SESSION['selectedImage2']) ? $_SESSION['selectedImage2'] : 'img/placeholder3.jpg',
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Selector</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div class="image-container">
    <?php for ($i = 0; $i < 3; $i++): ?>
        <form method="post" action="popup.php">
            <input type="hidden" name="imageIndex" value="<?php echo $i; ?>">
            <button type="submit" class="image-button">
                <img src="<?php echo htmlspecialchars($selectedImages[$i], ENT_QUOTES, 'UTF-8'); ?>" alt="Image <?php echo $i + 1; ?>">
            </button>
        </form>
    <?php endfor; ?>
</div>
</body>
</html>