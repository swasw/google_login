<?php
// set the expiration date to one hour ago
setcookie("nim", "", time() - 3600);
header('Location: login.php');