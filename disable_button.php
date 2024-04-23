<?php
// Start session
session_start();

// Check if buttonId is set
if (isset($_POST['buttonId'])) {
    // Store the disabled button id in session
    $_SESSION['disabled_buttons'][$_POST['buttonId']] = true;
}
