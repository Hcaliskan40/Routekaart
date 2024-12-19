<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['message6a'])) {
        $_SESSION['message6a'] = $_POST['message6a'];
    }
    if (isset($_POST['message6b'])) {
        $_SESSION['message6b'] = $_POST['message6b'];
    }
    if (isset($_POST['message6c'])) {
        $_SESSION['message6c'] = $_POST['message6c'];
    }
}
?>