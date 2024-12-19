<?php
session_start();

/**
 * Retrieve selected sectors and options from session or set default values.
 */
$selectedSectors = $_SESSION['selectedSectors'] ?? [];
$options = [
    'sector1' => $_SESSION['sector1'] ?? "",
    'sector2' => $_SESSION['sector2'] ?? "",
    'sector3' => $_SESSION['sector3'] ?? ""
];

$message5a = $_SESSION['message5a'] ?? '';
$message5b = $_SESSION['message5b'] ?? '';
$message5c = $_SESSION['message5c'] ?? '';

/**
 * Handle AJAX request to update session variables.
 *
 * This block of code checks if the request method is POST and if the request
 * is an AJAX request. It then decodes the JSON input and updates the session
 * variables based on the provided data.
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST' && strtolower($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '') == 'xmlhttprequest') {
    $data = json_decode(file_get_contents('php://input'), true);

    // Update session variables for selected sectors
    foreach (['message51' => 'sector1', 'message52' => 'sector2', 'message53' => 'sector3'] as $key => $sector) {
        if (isset($data[$key])) {
            $_SESSION[$sector] = $selectedSectors[$data[$key]] ?? "";
            $options[$sector] = $_SESSION[$sector];
        }
    }
    // Update session variables for messages
    foreach (['message5a', 'message5b', 'message5c'] as $message) {
        if (isset($data[$message])) {
            $_SESSION[$message] = $data[$message];
        }
    }
    // Return success response
    echo json_encode(['status' => 'success']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opleidingen</title>
    <link rel="stylesheet" type="text/css" href="css/opdracht5b.css">
</head>
<body>
<div class="container">
    <div class="header">
        <span class="dot">5</span>
        <div class="titel-balk">Beroepen</div>
    </div>
    <b>Dit is mijn TOP 3 sectoren:</b>
    <p>Deze beroepen passen bij deze sectoren</p>
    <div class="input-box">
        <?php for ($i = 1; $i <= 3; $i++): ?>
            <div class="input-item">
                <div class="input-number"><?php echo $i; ?></div>
                <select id="message5<?php echo $i; ?>" class="dotted-input" onchange="saveText('message5<?php echo $i; ?>')">
                    <option value="">Selecteer een sector</option>
                    <?php foreach ($selectedSectors as $key => $label): ?>
                        <option value="<?php echo htmlspecialchars($key, ENT_QUOTES, 'UTF-8'); ?>" <?php echo ($options['sector' . $i] == $label) ? 'selected' : ''; ?>><?php echo htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?></option>
                    <?php endforeach; ?>
                </select>
                <input id='message5<?php echo chr(96 + $i); ?>' type="text" class="rounded-input" placeholder="Welk beroep in deze sector?" oninput="saveText('message5<?php echo chr(96 + $i); ?>')">
            </div>
        <?php endfor; ?>
    </div>
    <script>
        /**
         * Set initial values for dropdowns and inputs on page load.
         */
        window.onload = function () {
            document.getElementById('message51').value = "<?php echo array_search($options['sector1'], $selectedSectors); ?>";
            document.getElementById('message52').value = "<?php echo array_search($options['sector2'], $selectedSectors); ?>";
            document.getElementById('message53').value = "<?php echo array_search($options['sector3'], $selectedSectors); ?>";
            document.getElementById('message5a').value = "<?php echo htmlspecialchars($message5a, ENT_QUOTES, 'UTF-8'); ?>";
            document.getElementById('message5b').value = "<?php echo htmlspecialchars($message5b, ENT_QUOTES, 'UTF-8'); ?>";
            document.getElementById('message5c').value = "<?php echo htmlspecialchars($message5c, ENT_QUOTES, 'UTF-8'); ?>";
            updateDropdowns();
        }

        /**
         * Save text input values via AJAX.
         * @param {string} id - The ID of the input element.
         */
        function saveText(id) {
            const value = document.getElementById(id).value;
            const data = {};
            data[id] = value;

            fetch('opdracht5b.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify(data),
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        console.log(`Tekst voor ${id} succesvol opgeslagen.`);
                        updateDropdowns();
                    } else {
                        alert(`Fout bij opslaan: ${data.message}`);
                    }
                })
                .catch(error => {
                    console.error('Fout bij opslaan:', error);
                    alert('Er is een fout opgetreden bij het opslaan van de tekst.');
                });
        }

        /**
         * Update dropdown options to disable already selected values.
         */
        function updateDropdowns() {
            const selectedValues = [
                document.getElementById('message51').value,
                document.getElementById('message52').value,
                document.getElementById('message53').value
            ];

            const dropdowns = ['message51', 'message52', 'message53'];
            dropdowns.forEach(id => {
                const dropdown = document.getElementById(id);
                const options = dropdown.options;
                for (let i = 0; i < options.length; i++) {
                    if (selectedValues.includes(options[i].value) && options[i].value !== dropdown.value) {
                        options[i].disabled = true;
                    } else {
                        options[i].disabled = false;
                    }
                }
            });
        }

        /**
         * Navigate to the previous page.
         */
        function goToPreviousPage() {
            window.location.href = 'opdracht5.php';
        }

        /**
         * Navigate to the next page if all dropdowns have selected values.
         */
        function goToNextPage() {
            const dropdowns = ['message51', 'message52', 'message53'];
            for (let i = 0; i < dropdowns.length; i++) {
                const dropdown = document.getElementById(dropdowns[i]);
                if (dropdown.value === "") {
                    alert('Selecteer alstublieft een sector voor alle dropdowns om door te gaan.');
                    return;
                }
            }
            window.location.href = 'opdracht6.php';
        }
    </script>

    <footer class="button-group">
        <button class="arrow-btn" onclick="goToPreviousPage()">&#8249;</button>
        <button class="arrow-btn" onclick="goToNextPage()">&#8250;</button>
    </footer>
</div>
</body>
</html>