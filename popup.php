<?php

$connection = mysqli_connect('127.0.0.1', 'root', '', 'routekaart', '3306');
// Check connection
if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}

$showPopup = isset($_POST['openPopup']);

function generateRoster($connection) {
    $query = "SELECT * FROM afbeelding WHERE kleur = 'groen'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo '<div class="roster">';
        while ($row = mysqli_fetch_assoc($result)) {
            $afbeeldingNaam = $row['naam'];
            echo '<div class="roster-item"><img src="img/' . htmlspecialchars($afbeeldingNaam) . '.jpg" alt="' . htmlspecialchars($afbeeldingNaam) . '"></div>';
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
    <link rel="stylesheet" type="text/css" href="../CSS/image.css" media="screen, projection">
    <link rel="stylesheet" type="text/css" href="../CSS/popup.css" media="screen, projection">
    <title>Popup Roster</title>
</head>
<body>
<?php if ($showPopup): ?>
    <div id="popup" class="popup" style="display: block;">
        <div class="popup-content">
            <form method="post">
                <button type="submit" name="closePopup" class="close">&times;</button>
            </form>
            <h2>Roster</h2>
            <?php generateRoster($connection); ?>
        </div>
    </div>
<?php endif; ?>

<form method="post">
    <button type="submit" name="openPopup" id="openPopup">Open Roster</button>
</form>
</body>
</html>