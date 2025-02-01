<?php
include 'config.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM orders WHERE id = $id");
$order = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_name = $_POST['user_name'];
    $order_no = $_POST['order_no'];

    $query = "UPDATE orders SET user_name='$user_name', order_no='$order_no' WHERE id=$id";
    if ($conn->query($query)) {
        header("Location: adminDashboard.php");
    }
}
?>

<form method="post">
    <input type="text" name="user_name" value="<?= $order['user_name'] ?>" required>
    <input type="text" name="order_no" value="<?= $order['order_no'] ?>" required>
    <button type="submit">Update</button>
</form>