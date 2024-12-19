<?php
session_start();

$selectedSectors = $_SESSION['selectedSectors'] ?? [];
$options = [
    'sector1' => $_SESSION['sector1'] ?? "",
    'sector2' => $_SESSION['sector2'] ?? "",
    'sector3' => $_SESSION['sector3'] ?? ""
];

// Handle AJAX request
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $data = json_decode(file_get_contents('php://input'), true);
    if (isset($data['message51'])) {
        $_SESSION['sector1'] = $selectedSectors[$data['message51']] ?? "";
        $options['sector1'] = $_SESSION['sector1'];
    }
    if (isset($data['message52'])) {
        $_SESSION['sector2'] = $selectedSectors[$data['message52']] ?? "";
        $options['sector2'] = $_SESSION['sector2'];
    }
    if (isset($data['message53'])) {
        $_SESSION['sector3'] = $selectedSectors[$data['message53']] ?? "";
        $options['sector3'] = $_SESSION['sector3'];
    }
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
        <div class="input-item">
            <div class="input-number">1</div>
            <select id="message51" class="dotted-input" onchange="saveText('message51')">
                <option value="">Selecteer een sector</option>
                <?php foreach ($selectedSectors as $key => $label): ?>
                    <option value="<?php echo htmlspecialchars($key, ENT_QUOTES, 'UTF-8'); ?>" <?php echo ($options['sector1'] == $label) ? 'selected' : ''; ?>><?php echo htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?></option>
                <?php endforeach; ?>
            </select>
            <input id='message5a' type="text" class="rounded-input" placeholder="Welk beroep in deze sector?" oninput="saveText('message5a')">
        </div>
        <div class="input-item">
            <div class="input-number">2</div>
            <select id="message52" class="dotted-input" onchange="saveText('message52')">
                <option value="">Selecteer een sector</option>
                <?php foreach ($selectedSectors as $key => $label): ?>
                    <option value="<?php echo htmlspecialchars($key, ENT_QUOTES, 'UTF-8'); ?>" <?php echo ($options['sector2'] == $label) ? 'selected' : ''; ?>><?php echo htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?></option>
                <?php endforeach; ?>
            </select>
            <input id='message5b' type="text" class="rounded-input" placeholder="Welk beroep in deze sector?" oninput="saveText('message5b')">
        </div>
        <div class="input-item">
            <div class="input-number">3</div>
            <select id="message53" class="dotted-input" onchange="saveText('message53')">
                <option value="">Selecteer een sector</option>
                <?php foreach ($selectedSectors as $key => $label): ?>
                    <option value="<?php echo htmlspecialchars($key, ENT_QUOTES, 'UTF-8'); ?>" <?php echo ($options['sector3'] == $label) ? 'selected' : ''; ?>><?php echo htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?></option>
                <?php endforeach; ?>
            </select>
            <input id='message5c' type="text" class="rounded-input" placeholder="Welk beroep in deze sector?" oninput="saveText('message5c')">
        </div>
    </div>
    <script>
        window.onload = function () {
            document.getElementById('message51').value = "<?php echo array_search($options['sector1'], $selectedSectors); ?>";
            document.getElementById('message52').value = "<?php echo array_search($options['sector2'], $selectedSectors); ?>";
            document.getElementById('message53').value = "<?php echo array_search($options['sector3'], $selectedSectors); ?>";
            document.getElementById('message5a').value = localStorage.getItem('message5a') || '';
            document.getElementById('message5b').value = localStorage.getItem('message5b') || '';
            document.getElementById('message5c').value = localStorage.getItem('message5c') || '';
            updateDropdowns();
        }

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

        function goToPreviousPage() {
            window.location.href = 'opdracht5.php';
        }

        function goToNextPage() {
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