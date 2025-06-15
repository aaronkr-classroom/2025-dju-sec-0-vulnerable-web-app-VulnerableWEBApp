<?php
session_start();

// Optional: deny access unless logged in
if (!isset($_SESSION['login_user'])) {
    header("Location: /vulnerable/index.html");
    exit();
}

// Define safe directory and whitelist
$allowed_files = [
    'service.html',
    'privacy.html',
    'terms.html'
];

$file = basename($_GET['file'] ?? '');

// Check whitelist
if (!in_array($file, $allowed_files)) {
    die("Access denied.");
}

// Use full path to prevent path traversal
$full_path = __DIR__ . "/tos_pages/" . $file;

// Confirm file exists before including
if (!file_exists($full_path)) {
    die("File not found.");
}

// Safe include
include($full_path);
?>
