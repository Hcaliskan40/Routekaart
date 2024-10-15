<?php
define('ROSTER_ITEMS', [
    "Item 1", "Item 2", "Item 3",
    "Item 4", "Item 5", "Item 6"
]);

$showPopup = isset($_POST['openPopup']);

function generateRoster() {
    echo '<div class="roster">';
    foreach (ROSTER_ITEMS as $item) {
        echo '<div class="roster-item">' . htmlspecialchars($item) . '</div>';
    }
    echo '</div>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <?php generateRoster(); ?>
        </div>
    </div>
<?php endif; ?>

<form method="post">
    <button type="submit" name="openPopup" id="openPopup">Open Roster</button>
</form>
</body>
</html>