<?php
session_start();
require_once '../prosess/config.php';
?>
<html>
<header>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/App.css" />
</header>
<script>
  function handleOrder(foodId) {
    let userLoggedIn = <?php echo isset($_SESSION['user_id']) ? 'true' : 'false'; ?>;
    
    if (!userLoggedIn) {
      alert("Anda harus login terlebih dahulu untuk melakukan pemesanan.");
      window.location.href = "login.php";
      return;
    }

    fetch('../prosess/add_order.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: 'food_id=' + encodeURIComponent(foodId)
    })
    .then(response => response.json())
    .then(data => {
      if (data.status === "success") {
        alert("Pesanan berhasil ditambahkan!\nOrder ID: " + data.order_id);
      } else {
        alert("Gagal menambahkan pesanan: " + data.message);
      }
    })
    .catch(error => console.error('Error:', error));
  }
</script>

<body>
  <?php include 'header.php'; ?>
  <div class="m-5">
    <h3 class="fw-normal">
      No Prep, No Cooking.<span class="fw-bolder"> Just Enjoy.</span>
    </h3>
    <p class="fw-bolder ourMenu mt-3">Our menu</p>
  </div>
  <div class="container-fluid" style="background:#D9D9D9; margin-bottom: 10%;">
    <div class="container">
      <div class="row">
      <?php
$result = $conn->query("SELECT * FROM menu");
while ($row = $result->fetch_assoc()):
    // Cek apakah gambar berbentuk base64 atau path
    if (preg_match('/^data:image\/(png|jpeg|jpg);base64,/', $row['picture'])) {
        $imageSrc = $row['picture']; // Base64 langsung digunakan
    } else {
        // Path relatif, tambahkan '../' jika perlu
        $imagePath = '../' . $row['picture'];
        if (!file_exists($imagePath)) {
            $imageSrc = '../image/default.jpg'; // Gambar default jika file tidak ditemukan
        } else {
            $imageSrc = $imagePath;
        }
    }
?>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card" style="margin-bottom:100px;">
            <img src="<?= htmlspecialchars($imageSrc); ?>" class="card-img-top" alt="<?= htmlspecialchars($row['food_name']); ?>">
            <div class="card-body">
                <h6 class="card-title">
                    <?= htmlspecialchars($row['food_name']); ?>
                </h6>
                <p class="fw-bold">Rp
                    <?= number_format($row['price'], 0, ',', '.'); ?>
                </p>
                <div class="mt-4 text-center">
                    <button class="btn btn-dark rounded-4 mt-3 px-3 border-0"
                        onclick="handleOrder('<?= htmlspecialchars($row['food_id']); ?>')">+ Add</button>
                </div>
            </div>
        </div>
    </div>
<?php endwhile; ?>

      </div>
    </div>
  </div>
  <?php include 'footer.php'; ?>
</body>
</html>
