<?php
session_start();
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'], $_POST['csrf_token'])) {
    if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        echo json_encode(['status' => 'error', 'message' => 'CSRF token không hợp lệ']);
        exit;
    }

    $product_id = (int)$_POST['product_id'];
    
    if (!isset($_SESSION['favorites'])) {
        $_SESSION['favorites'] = [];
    }

    $index = array_search($product_id, $_SESSION['favorites']);
    if ($index === false) {
        $_SESSION['favorites'][] = $product_id;
        $action = 'added';
    } else {
        unset($_SESSION['favorites'][$index]);
        $_SESSION['favorites'] = array_values($_SESSION['favorites']);
        $action = 'removed';
    }

    $favorite_count = count($_SESSION['favorites']);
    echo json_encode([
        'status' => 'success',
        'action' => $action,
        'favorite_count' => $favorite_count
    ]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Yêu cầu không hợp lệ']);
}
?>