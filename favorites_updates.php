<?php
session_start();
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

$count = isset($_SESSION['favorites']) ? count($_SESSION['favorites']) : 0;

echo "data: " . json_encode(['count' => $count]) . "\n\n";
flush();
?>