<?php
session_start();
require_once 'config.php'; // Pastikan koneksi database benar

// Pastikan hanya request POST yang bisa masuk
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Cek apakah user sudah login
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(["status" => "error", "message" => "Anda harus login terlebih dahulu"]);
        exit();
    }

    // Pastikan food_id dikirim dari menu.php
    if (!isset($_POST['food_id'])) {
        echo json_encode(["status" => "error", "message" => "Data tidak lengkap"]);
        exit();
    }

    $food_id = $_POST['food_id'];
    $user_id = $_SESSION['user_id'];

    // Generate order_id unik
    $datePrefix = date("Ymd");
    $checkLastOrder = $conn->query("SELECT order_id FROM orders WHERE order_id LIKE 'ORD$datePrefix%' ORDER BY order_id DESC LIMIT 1");

    if ($checkLastOrder->num_rows > 0) {
        $lastOrder = $checkLastOrder->fetch_assoc();
        $lastNumber = (int)substr($lastOrder['order_id'], -4);
        $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
    } else {
        $newNumber = '0001';
    }
    $order_id = "ORD" . $datePrefix . $newNumber;

    // Cek apakah pesanan sudah ada
    $queryCheck = $conn->prepare("SELECT id FROM orders WHERE user_id = ? AND food_id = ? AND status = 'Pending'");
    $queryCheck->bind_param("is", $user_id, $food_id);
    $queryCheck->execute();
    $result = $queryCheck->get_result();

    if ($result->num_rows > 0) {
        // Jika pesanan sudah ada, update jumlahnya
        $updateQuery = $conn->prepare("UPDATE orders SET quantity = quantity + 1 WHERE user_id = ? AND food_id = ?");
        $updateQuery->bind_param("is", $user_id, $food_id);
        $updateQuery->execute();
    } else {
        // Jika belum ada, tambahkan pesanan baru
        $insertQuery = $conn->prepare("INSERT INTO orders (order_id, user_id, food_id, quantity, status) VALUES (?, ?, ?, 1, 'Pending')");
        $insertQuery->bind_param("sis", $order_id, $user_id, $food_id);
        $insertQuery->execute();
    }

    echo json_encode(["status" => "success", "message" => "Pesanan berhasil ditambahkan", "order_id" => $order_id]);
} else {
    echo json_encode(["status" => "error", "message" => "Metode tidak diperbolehkan"]);
}
?>
