<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SIAKAD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="test.css">
</head>

<body>
<header class="text-center py-4 mx-auto" style="background-color: #aeded5; color: #456443;">
    <h1 class="display-4">Register</h1>
    <p class="lead">Make an account for SIAKAD</p>
</header>

<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 400px;">
        <div class="card-body">
            <form action="./register_sv.php" method="post">

                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>

                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" name="nim" class="form-control" id="nim" placeholder="Your NIM" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" class="form-control" id="email" placeholder="Your Email" required>
                </div>

                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" id="username" placeholder="Your Username" required >
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Your Password" required>
                </div>

                <?php
                if (isset($_SESSION['error']))
                    echo '<div class="alert alert-danger text-center mt-2" role="alert">'.$_SESSION['error'].'</div>';
                unset($_SESSION['error']);

                ?>

                <button type="submit" class="btn btn-block w-100 mt-2 mb-3"
                        style="background-color: #aeded5; color: #456443;">Register
                </button>

                <div style="text-align: center;"><a href="login.php">Already have an account?</a></div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>