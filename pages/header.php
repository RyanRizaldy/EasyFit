
<?php
// Cek apakah session belum dimulai sebelum memanggil session_start()
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<nav class="navbar navbar-expand-lg navbar-light navbar">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand" href="home.php">
            <img src="../image/easyfitHorizontal.png" alt="Logo" height="40px">
        </a>

        <!-- Menu -->
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto navMenu">
                <li class="nav-item">
                    <a class="nav-link" href="menu.php">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact Us</a>
                </li>
                
                <?php
                // Cek apakah user sudah login
                if (isset($_SESSION['role'])) {
                    // Sesuaikan halaman berdasarkan role
                    $dashboardPage = ($_SESSION['role'] == "admin") ? "adminDashboard.php" : "memberDashboard.php";
                    echo '<li class="nav-item"><a class="nav-link" href="' . $dashboardPage . '">My Meals</a></li>';
                }
                ?>
            </ul>
        </div>

        <!-- Login and Get Started Button -->
        <div class="navLogin d-flex align-items-center">
    <?php if (isset($_SESSION['username'])): ?>
        <!-- Jika user sudah login -->
        <a href="../prosess/logout.php" class="btn btn-dark navButton">Logout</a>
    <?php else: ?>
        <!-- Jika user belum login -->
        <a href="login.php" style="text-decoration:none; color:black">
            <p class="mb-0">Login</p>
        </a>
        <a href="register.php">
            <button class="btn btn-dark navButton ms-3">Get Started</button>
        </a>
    <?php endif; ?>
</div>

</nav>
