<!DOCTYPE html>

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

          
        <?php
include '../prosess/config.php';

// Pastikan user sudah login
if (!isset($_SESSION['user_id'])) {
    echo "Silakan login terlebih dahulu.";
    exit();
}

$user_id = $_SESSION['user_id'];

// Ambil pesanan berdasarkan user_id
$query = "SELECT id, order_id, status FROM orders WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<div class="container contentTitle">
    <h2>Your Meal Progress</h2>
</div>

<div class="container">
    <h4 class="my-3 text-start">Order Table</h4>
</div>

<!-- Table -->
<div class="container">
    <table class="table table-striped table-responsive border" style="margin-bottom:10%;">
        <thead>
            <tr>
                <th>No</th>
                <th>Order No</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($row['order_id']) ?></td>
                    <td>
                        <span id="status-<?= $row['id'] ?>"><?= htmlspecialchars($row['status']) ?></span>
                    </td>
                    <td>
                        <?php if ($row['status'] !== 'Complete'): ?>
                            <button class="btn btn-success btn-sm update-status" 
                                    data-id="<?= $row['id'] ?>" 
                                    data-status="Completed">
                                Mark as Complete
                            </button>
                        <?php else: ?>
                            <button class="btn btn-secondary btn-sm" disabled>Completed</button>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".update-status").forEach(button => {
        button.addEventListener("click", function () {
            let orderId = this.getAttribute("data-id");
            let status = this.getAttribute("data-status");

            fetch("../prosess/Update.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
             body: `id=${encodeURIComponent(orderId)}&status=${encodeURIComponent(status)}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    document.getElementById(`status-${orderId}`).textContent = "Complete";
                    this.textContent = "completed";
                    this.classList.remove("btn-success");
                    this.classList.add("btn-secondary");
                    this.setAttribute("disabled", "disabled");
                } else {
                    alert("Gagal memperbarui status: " + data.message);
                }
            })
            .catch(error => console.error("Error:", error));
        });
    });
});
</script>


        <!-- Tautkan jQuery dan app.js -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="../js/app.js"></script>
        <?php include 'footer.php'; ?>
    </body>
</html>
