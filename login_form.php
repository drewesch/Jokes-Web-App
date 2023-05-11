<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
        * {
            font-family:Arial, Helvetica, sans-serif;
        }
</style>

</head>

<body>
<h1>Login for Jokes App - by Andrew Esch</h1>
<a href="logout.php">Click here to log out</a>
<a href="login_form.php">Click here to login</a>
<a href="register_new_user.php">Click here to register</a><br>

<?php

include "database_connect.php";
// include "search_all_results.php";
?>

<form class="form-horizontal" action="process_login_unsecure.php">
<fieldset>

<!-- Form Name -->
<legend>Please login</legend>

<!-- Search input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="keyword">Username</label>
  <div class="col-md-5">
    <input id="username" name="username" type="text" placeholder="Your name" class="form-control input-md">
    <p class="help-block">Enter your username</p>
  </div>
</div>

<!-- Email Entry -->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">Email</label>
  <div class="col-md-5">
    <input id="email" name="email" type="text" placeholder="Your email" class="form-control input-md">
    <p class="help-block">Enter your email address</p>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="keyword">Password</label>
  <div class="col-md-5">
    <input id="password" name="password" type="password" placeholder="Your password" class="form-control input-md">
    <p class="help-block">Enter your password</p>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Login</button>
  </div>
</div>

</fieldset>
</form>

<?php
// include "search_by_keyword.php";

// Close the connection
$mysqli->close();

?>

</body>
</html>