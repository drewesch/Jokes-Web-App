<?php

include "database_connect.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

use PragmaRX\Google2FA\Google2FA;

$new_username = $_GET['username'];
$new_email = $_GET['email'];
$new_password1 = $_GET['password1'];
$new_password2 = $_GET['password2'];

// Check for non-matching passwords
if ($new_password1 != $new_password2) {
    echo "The passwords do not match. Please try again!";
    exit;
}

// Check to see if user is already register
$sql = "SELECT * FROM users where username = '$new_username'";

$result = $mysqli->query($sql) or die (mysqli_error($mysqli));

if ($result->num_rows > 0) {
    // Already exists
    echo "The username " . $new_username . " is already registered. Please try again!";
    exit;
}

// Generate new secret key
$google2fa = new Google2FA();
$secret_key = $google2fa->generateSecretKey();

if ($secret_key) {
    echo $secret_key . "<br>";
} else {
    echo "Something went wrong during 2FA";
    exit;
}

// // Load QR Code
// $qrCodeUrl = $google2fa->getQRCodeUrl(
//     $new_username,
//     $new_email,
//     $secret_key
// );
       
// $image_url = 'https://chart.googleapis.com/chart?cht=qr&chs=300x300&chl='.$qrCodeUrl;
// echo '<img src="'.$image_url.'" />';

// // Validate 2FA code
// // $secret_input = $request->input('secret');
// $valid = $google2fa->verifyKey($secret_key, $secret_input);

// Insert a new user
$sql = "INSERT INTO users (id, username, email, password, secret_key) VALUES (null, '$new_username', '$email', '$new_password1', '$secret_key')";
$result = $mysqli->query($sql) or die (mysqli_error($mysqli));

if ($result) {
    echo "Registration Success!";
} else {
    echo "Something went wrong.";
}

echo "<a href='index.php'>Return to main page</a>";

?>