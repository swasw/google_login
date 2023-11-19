<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid py-5 bg-dark text-white align-content-center">
        <div class="container text-center">
            <div class="col-lg-3 d-sm-inline-flex">
            <img src="googlelogo.png" class="img-fluid w-1">
            </div>
            <h2 class="text-center mb-4">Selamat Datang!</h2>
        </div>
        <div class="offset-lg-2 col-lg-8">
    
            <div class="mb-4">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" id="email" autocomplete="false" class="form-control">
            </div>
            <div class="mb-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" autocomplete="false" class="form-control">
            </div>
            <div>
                <button class="btn btn-primary w-100">Submit</button>
                <p class="text-center">Or</p>
                <a href="index.php">
                <button class="btn btn-secondary align-content-between w-50">
                    Sign in with Google Account
                    <img src="icongoogle.png" class="img-thumbnail col-lg-2"></button>
                </a>
            </div>
        
    </div>
    </div>


    <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.js"></script>
</body>
</html>