<!DOCTYPE html>
<header>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/App.css"/>
</header>
<body>
<?php include 'header.php'; ?>
<div class="container loginContainer">
    <div class="row">
        <!-- Bagian Login Form -->
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="loginForm">
                <h2>Login</h2>
                <form>
                    <div class="mb-3 formInput">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" />
                    </div>
                    <div class="mb-3 formInput">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" />
                    </div>
                </form>
                <div class="loginButtonWrapper">
                    <button type="submit" class="btn btn-dark loginButton">Login</button>
                </div>
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