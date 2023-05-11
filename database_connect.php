<?php
// Database variables required to connect to the MAMP MySQL database
$user = 'root';
$password = 'root';
$db = 'testing';
$host = 'localhost';
$port = 8889;

// Create a database object
$mysqli = new mysqli($host, $user, $password, $db, $port);
?>