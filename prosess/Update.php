<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_POST['id']) || !isset($_POST['status'])) {
        echo json_encode(["status" => "error", "message" => "Data tidak lengkap"]);
        exit();
    }

    $id = intval($_POST['id']);
    $status = trim($_POST['status']);

    $allowed_statuses = ['Pending', 'Processed', 'Delivered', 'Completed'];
    if (!in_array($status, $allowed_statuses)) {
        echo json_encode(["status" => "error", "message" => "Status tidak valid"]);
        exit();
    }

    if ($conn->query("UPDATE orders SET status='$status' WHERE id=$id")) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => $conn->error]);
    }
}
?>


