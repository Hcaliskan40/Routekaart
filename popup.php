<?php
session_start();
$connection = new mysqli('127.0.0.1', 'root', '', 'routekaart', '3306');

if ($connection->connect_errno) {
    die("Connection failed: " . $connection->connect_error);
}

// Zorg dat we een eventuele meegegeven index via POST oppakken
$imageIndex = isset($_POST['imageIndex']) ? (int)$_POST['imageIndex'] : 0;

// Standaard terugkeren naar opdracht1.php als 'caller' niet is meegestuurd
$caller = isset($_POST['caller']) ? $_POST['caller'] : 'opdracht1.php';

// Verzamel alle tot nu toe gekozen afbeeldingen (opdracht 1 en 2, in dit voorbeeld max 6)
$selectedImages = [
    $_SESSION['selectedImage0'] ?? '',
    $_SESSION['selectedImage1'] ?? '',
    $_SESSION['selectedImage2'] ?? '',
    $_SESSION['selectedImage3'] ?? '',
    $_SESSION['selectedImage4'] ?? '',
    $_SESSION['selectedImage5'] ?? '',
];

// Als er via POST een afbeelding is ingestuurd, sla deze dan in de sessie
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['selectedImage'])) {
    $selectedImage = $_POST['selectedImage'];

    // We gebruiken nog steeds $imageIndex uit de POST, zodat deze bepaalt in welke
    // sessie-key we opslaan, b.v. $_SESSION['selectedImage0'] t/m ...'selectedImage5'
    $_SESSION["selectedImage{$imageIndex}"] = $selectedImage;

    // Debug: Toon alle sessievariabelen
    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';

    // Redirect terug naar de pagina waar we vandaan kwamen
    header("Location: $caller");
    exit();
}

/**
 * Toont alle groene afbeeldingen uit de database.
 * We geven per afbeelding een oplopende index ($i), die in een hidden input komt,
 * zodat bij het submitten in POST ook de juiste $imageIndex meekomt.
 */
function generateRoster($connection, $selectedImages) {
    $query = "SELECT * FROM afbeelding WHERE kleur = 'groen'";
    if ($result = $connection->query($query)) {
        echo '<div class="roster-content">';

        // Teller voor elke afbeelding
        $i = 0;

        while ($row = $result->fetch_assoc()) {
            $afbeeldingNaam = htmlspecialchars($row['naam'], ENT_QUOTES, 'UTF-8');
            // Maak het pad naar het plaatje
            $imagePath = "img/{$afbeeldingNaam}.jpg";

            // Check of deze afbeelding al geselecteerd is
            $isDisabled = in_array($imagePath, $selectedImages) ? 'disabled' : '';
            $isGrey = in_array($imagePath, $selectedImages) ? 'style="filter: grayscale(100%);"' : '';

            echo "<div class='roster-item'>
                    <form method='post' action=''>
                        <!-- Deze input bepaalt de afbeelding die we selecteren -->
                        <input type='hidden' name='selectedImage' value='{$imagePath}'>
                        
                        <!-- Hier geven we de oplopende index mee aan het form -->
                        <input type='hidden' name='imageIndex' value='{$i}'>
                        
                        <!-- Caller opnieuw meesturen, zodat we terugkeren naar de juiste opdracht -->
                        <input type='hidden' name='caller' value='",
            isset($_POST['caller']) ? htmlspecialchars($_POST['caller'], ENT_QUOTES, 'UTF-8') : 'opdracht1.php',
            "'>
                        
                        <button type='submit' class='image-button' {$isDisabled} {$isGrey}>
                            <img src='{$imagePath}' alt='{$afbeeldingNaam}'>
                        </button>
                    </form>
                  </div>";

            $i++;
            // Let op: als $i doorloopt boven de 5, wordt $_SESSION['selectedImage6'] etc. gebruikt,
            // maar in $selectedImages[0..5] vang je dat niet meer op.
            // Wil je dat wel, breid $selectedImages uit of maak het dynamisch.
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
<!-- Sluitknop die teruggaat naar de pagina van herkomst -->
<a href="<?php echo htmlspecialchars($caller, ENT_QUOTES, 'UTF-8'); ?>" class="button">
    <span>X</span>
</a>

<div class="popup-body">
    <?php
    // Roep de functie aan zonder expliciete $imageIndex (we bouwen die in de loop zelf op via $i)
    generateRoster($connection, $selectedImages);
    ?>
</div>
</body>
</html>
