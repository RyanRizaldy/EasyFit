<!DOCTYPE html>
<header>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/App.css"/>
</header>
<body>
<?php include 'header.php'; ?>
    <div class="container loginContainer">
        <div class="row">
            <!-- Register Form -->
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="registerForm">
                    <h1>Register, and Start Your Healty Jurney</h1>
                    <form>
                        <div class="mb-3 formInput">
                            <label for="fullName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="fullName">
                        </div>
                        <div class="mb-3 formInput">
                            <label for="emailAddress" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="emailAddress">
                        </div>
                        <div class="mb-3 formInput">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password">
                        </div>
                    </form>
                    <div class="loginButtonWrapper">
                        <button class="btn btn-dark loginButton">Register</button>
                    </div>
                </div>
            </div>
    
            <!-- Image Section -->
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div>
                    <img src="../image/registerImg.jpg" alt="Logo" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>