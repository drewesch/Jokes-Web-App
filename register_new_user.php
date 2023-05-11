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
<h1>Please Register</h1>

<?php

include "database_connect.php";

?>

<form class="form-horizontal" action="process_new_user.php">
<fieldset>

<!-- Form Name -->

<!-- User Entry -->
<div class="form-group">
  <label class="col-md-4 control-label" for="username">Username</label>
  <div class="col-md-5">
    <input id="username" name="username" type="text" placeholder="your name" class="form-control input-md">
    <p class="help-block">Please enter a username</p>
  </div>
</div>

<!-- Email Entry -->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">Email</label>
  <div class="col-md-5">
    <input id="email" name="email" type="text" placeholder="your email" class="form-control input-md">
    <p class="help-block">Please enter an email address</p>
  </div>
</div>

<!-- Password Entry -->
<div class="form-group">
  <label class="col-md-4 control-label" for="password1">Password</label>
  <div class="col-md-5">
    <input id="password1" name="password1" type="password" placeholder="password" class="form-control input-md">
    <p class="help-block">Please enter a password</p>
  </div>
</div>

<!-- Confirm Password Entry -->
<div class="form-group">
  <label class="col-md-4 control-label" for="password2">Password</label>
  <div class="col-md-5">
    <input id="password2" name="password2" type="password" placeholder="password" class="form-control input-md">
    <p class="help-block">Please confirm the password</p>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Create New User</button>
  </div>
</div>

</fieldset>
</form>


<?php

// Close the connection
$mysqli->close();

?>

</body>
</html>