<?php
require_once 'vendor/autoload.php';

$clientID = '57857913804-vtbf1uedp35ptto2qf4m10v394bm753o.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/google_login/dashboard.php';

$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");
