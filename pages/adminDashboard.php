<!DOCTYPE html>

<?php
include '../prosess/config.php';

$result = $conn->query("SELECT * FROM orders");
?>

<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/App.css"/>
    </head>
    <body>
    <?php include 'header.php'; ?>
        <div class="userInfoContainer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-end">
                        <button
                            id="toggleButton"
                            class="btn btn-dark"
                            style="margin: 15px; border-radius: 20px; padding: 10px 20px;"
                        >
                            <span id="toggleButtonText">Edit Profile</span>
                        </button>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 userPic text-center">
                        <img
                            src="../image/fili.jpg"
                            alt="Logo"
                            height="150"
                            class="rounded-circle"
                        />
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div id="editModeContent" style="display: none;">
                            <form id="editForm">
                                <div class="userInfo">
                                    <h5>Name</h5>
                                    <input
                                        type="text"
                                        name="name"
                                        id="nameInput"
                                        class="form-control"
                                        value=""
                                        style="outline: none; background: rgba(0,0,0,0);"
                                    />
                                </div>
                                <div class="userInfo">
                                    <h5>Email</h5>
                                    <input
                                        type="email"
                                        name="email"
                                        id="emailInput"
                                        class="form-control"
                                        value=""
                                        style="outline: none; background: rgba(0,0,0,0);"
                                    />
                                </div>
                                <div class="userInfo">
                                    <h5>Address</h5>
                                    <input
                                        type="text"
                                        name="address"
                                        id="addressInput"
                                        class="form-control"
                                        value=""
                                        style="outline: none; background: rgba(0,0,0,0);"
                                    />
                                </div>
                                <div class="userInfo">
                                    <h5>Phone</h5>
                                    <input
                                        type="text"
                                        name="phone"
                                        id="phoneInput"
                                        class="form-control"
                                        value=""
                                        style="outline: none; background: rgba(0,0,0,0);"
                                    />
                                </div>
                                <button
                                    type="submit"
                                    class="btn btn-dark mt-3"
                                    style="margin-top: 20px;"
                                >
                                    Update
                                </button>
                            </form>
                        </div>
                        <div id="viewModeContent">
                            <div class="userInfo">
                                <h5>Name</h5>
                                <p id="nameText">John Doe</p>
                            </div>
                            <div class="userInfo">
                                <h5>Email</h5>
                                <p id="emailText">johndoe@example.com</p>
                            </div>
                            <div class="userInfo">
                                <h5>Address</h5>
                                <p id="addressText">123 Main Street</p>
                            </div>
                            <div class="userInfo">
                                <h5>Phone</h5>
                                <p id="phoneText">123-456-7890</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

          
        <div class="container contentTitle">
    <h2>Your Meal Progress</h2>
</div>
<div class="container">
    <h4 class="my-3 text-start">Order Table with Actions</h4>
</div>

<!-- Container for the table -->
<div class="container">
<table class="table table-striped table-responsive border" style="margin-bottom:10%;">
    <thead>
        <tr>
            <th>No</th>
            <th>User Id</th>
            <th>Order No</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['user_id'] ?></td>
                <td><?= $row['order_id'] ?></td>
                <td>
                    <select class="status-select form-select" data-id="<?= $row['id'] ?>">
                        <option value="Pending" <?= $row['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                        <option value="Processed" <?= $row['status'] == 'Processed' ? 'selected' : '' ?>>Processed</option>
                        <option value="Delivered" <?= $row['status'] == 'Delivered' ? 'selected' : '' ?>>Delivered</option>
                        <option value="Completed" <?= $row['status'] == 'Completed' ? 'selected' : '' ?>>Completed</option>

                    </select>
                </td>
                <td>
                    <a href="../prosess/delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus pesanan ini?');">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

</div>

<!-- AJAX untuk Update Status -->
<script>
document.querySelectorAll('.status-select').forEach(select => {
    select.addEventListener('change', function() {
        let orderId = this.getAttribute('data-id');
        let newStatus = this.value;

        if (confirm("Apakah Anda yakin ingin mengubah status pesanan ini menjadi '" + newStatus + "'?")) {
            fetch('../prosess/Update.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'id=' + encodeURIComponent(orderId) + '&status=' + encodeURIComponent(newStatus)
            })
            .then(response => response.json())
            .then(data => {
                console.log("Response dari server:", data); // Debugging
                if (data.status === "success") {
                    alert("Status berhasil diperbarui!");
                } else {
                    alert("Gagal mengupdate status: " + data.message);
                }
            })
            .catch(error => console.error('Error:', error));
        }
    });
});
</script>


        <!-- Tautkan jQuery dan app.js -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="../js/app.js"></script>
        <?php include 'footer.php'; ?>
    </body>
</html>