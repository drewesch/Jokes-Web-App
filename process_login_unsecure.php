<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "database_connect.php";

use PragmaRX\Google2FA\Google2FA;

$username = $_GET['username'];
$email = $_GET['email'];
$password = $_GET['password'];

$secret_sql = "SELECT secret_key FROM users WHERE username = '$username' AND password = '$password'";
$secret_key = $mysqli->query($secret_sql);

echo "You attempted to login with " . $username .  " and " . $email . " and " . $password . "<br>";

$sql = "SELECT id, username, password FROM users WHERE username = '$username' AND password = '$password'";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // 2FA through Google Authenticator
    $google2fa = new Google2FA();
    $qrCodeUrl = $google2fa->getQRCodeUrl(
        $username,
        $email,
        $secret_key
    );

    /// and in your view:
    $image_url = 'https://chart.googleapis.com/chart?cht=qr&chs=300x300&chl='.$qrCodeUrl;
    echo '<img src="'.$image_url.'" />';

    $secret_input = $request->input('secret');
    $valid = $google2fa->verifyKey($secret_key, $secret_input);

    // Check if 2FA worked
    if ($valid) {
        // Code is valid, proceed with login
        
        // Output each data row
        $row = $result->fetch_assoc();
        $userid = $row['id'];
        echo "Login successful!<br>";
        $_SESSION['username'] = $username;
        $_SESSION['userid'] = $userid;

        echo "</div>";
        echo "<br><a href='index.php'>Return to the main page</a>";

    } else {
        // Code is NOT valid
        echo "<br>" . "Failed 2FA Authentication";
    }
} else {
    echo "There are no results. Nobody has that username, email, and password.";
    $_SESSION = [];
    session_destroy();
    echo "<br><a href='index.php'>Return to the main page</a>";
}

echo "SESSION Variable = <br>";
echo "<pre>";
print_r($_SESSION);
echo "</pre>";

?>