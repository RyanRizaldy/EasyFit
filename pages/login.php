<?php
session_start();
include '../prosess/config.php'; // Pastikan file config ada dan benar

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Cek apakah user ada di database
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Debugging: Lihat hasil query
    var_dump($user);

    if ($user && password_verify($password, $user['password'])) {
        // Login berhasil, simpan sesi
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        echo "Login Berhasil!";

        // Redirect ke halaman admin/user
        if ($user['role'] == "admin") {
            header("Location: adminDashboard.php");
        } else {
            header("Location: memberDashboard.php");
        }
        exit();
    } else {
        echo "Email atau password salah!";
    }
}
?>



<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/App.css"/>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container loginContainer">
        <div class="row">
            <!-- Bagian Login Form -->
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="loginForm">
                    <h2>Login</h2>

                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger"><?= $error; ?></div>
                    <?php endif; ?>

                    <form method="POST">
                        <div class="mb-3 formInput">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" required/>
                        </div>
                        <div class="mb-3 formInput">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required/>
                        </div>
                        <div class="loginButtonWrapper">
                            <button type="submit" class="btn btn-dark loginButton">Login</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Bagian Account Choice -->
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="accountChoice">
                    <h2>No Account ?</h2>
                    <div class="loginButtonWrapper">
                        <button class="btn btn-dark accountButton">Register</button>
                    </div>
                    <h2 style="margin-top: 20px;">or</h2>
                    <div class="loginButtonWrapper">
                        <button class="btn btn-primary accountButton">Login with Facebook</button>
                    </div>
                    <div class="loginButtonWrapper">
                        <button class="btn btn-light accountButton googleButton">Login with Google</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
