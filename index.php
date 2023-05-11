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
<h1>Jokes App - by Andrew Esch</h1>
<a href="logout.php">Click here to log out</a>
<a href="login_form.php">Click here to login</a>
<a href="register_new_user.php">Click here to register</a><br>

<?php

include "database_connect.php";
// include "search_all_results.php";
?>

<form class="form-horizontal" action="search_by_keyword.php">
<fieldset>

<!-- Form Name -->
<legend>Search for available jokes</legend>

<!-- Search input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="keyword">Search Input</label>
  <div class="col-md-5">
    <input id="keyword" name="keyword" type="search" placeholder="e.g. laugh" class="form-control input-md">
    <p class="help-block">Enter a keyword to search for in the Jokes table</p>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Search</button>
  </div>
</div>

</fieldset>
</form>

<hr>

<form class="form-horizontal" action="add_joke.php">
<fieldset>

<!-- Form Name -->
<legend>Add a Joke Entry</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="newjoke">Please enter your new joke here:</label>  
  <div class="col-md-6">
  <input id="newjoke" name="newjoke" type="text" placeholder="" class="form-control input-md">
  <span class="help-block">Enter the first half of your new joke.</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="newanswer">Please enter the answer to the joke here:</label>  
  <div class="col-md-5">
  <input id="newanswer" name="newanswer" type="text" placeholder="" class="form-control input-md">
  <span class="help-block">Enter the answer or punchline to your new joke.</span>  
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-primary">Add a new joke</button>
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