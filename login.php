<?php
require_once 'vendor/autoload.php';

// init configuration
$clientID = '57857913804-vtbf1uedp35ptto2qf4m10v394bm753o.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/google_login/dashboard.php';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
    echo "masuk";
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

    // get profile info
    $google_oauth = new Google\Service\Oauth2($client);


    $google_account_info = $google_oauth->userinfo->get();
    $email =  $google_account_info->email;
    $name =  $google_account_info->name;

    // now you can use this profile info to create account in your website and make user logged in.
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div class="container-fluid py-5 bg-dark text-white align-content-center">
        <div class="container text-center">
            <div class="col-lg-3 d-sm-inline-flex">
                <img src="googlelogo.png" class="img-fluid w-1">
            </div>
            <h2 class="text-center mb-4 ">Selamat Datang!</h2>
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
                <a class="w-100" href="<?= $client->createAuthUrl() ?>">
                    <button class="gsi-material-button w-100">
                        <div class="gsi-material-button-state"></div>
                        <div class="gsi-material-button-content-wrapper">
                            <div class="gsi-material-button-icon">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" xmlns:xlink="http://www.w3.org/1999/xlink" style="display: block;">
                                    <path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"></path>
                                    <path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"></path>
                                    <path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"></path>
                                    <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"></path>
                                    <path fill="none" d="M0 0h48v48H0z"></path>
                                </svg>
                            </div>
                            <span class="gsi-material-button-contents">Sign in</span>
                            <span style="display: none;">Sign in with Google</span>
                        </div>
                    </button>
                    <!-- <button class="btn btn-secondary align-content-between w-50">
                    Sign in with Google Account
                    <img src="icongoogle.png" class="img-thumbnail col-lg-2"></button> -->
                </a>

            </div>

        </div>
    </div>


    <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.js"></script>
</body>

</html>