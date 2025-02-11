<?php
$host = "sql208.infinityfree.com";
$user = "if0_38219568";
$password = "G7ovypftQ1Cn";
$database = "if0_38219568_easyfit";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>