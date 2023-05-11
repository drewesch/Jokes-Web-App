<head>
<style>
        * {
            font-family:Arial, Helvetica, sans-serif;
        }
</style>
</head>

<?php
session_start();

if (! $_SESSION['username']) {
    echo "Only logged-in users may access this page. Click <a href='login_form.php'>here</a> to login<br>";
    exit;
}

include "database_connect.php";

// Joke question and joke answer variables from the form
$new_joke_question = $_GET["newjoke"];
$new_joke_answer = $_GET["newanswer"];

$new_joke_question = addslashes($new_joke_question);
$new_joke_answer = addslashes($new_joke_answer);
$userid = $_SESSION['userid'];

// Insert joke question and joke answer into a new database entry
echo "<h2>The new joke has been added!</h2>";
$sql = "INSERT INTO jokes_table (JokeID, Joke_question, Joke_answer, users_id) VALUES (NULL, '$new_joke_question', '$new_joke_answer', '$userid')";
$result = $mysqli->query($sql) or die(mysqli_error($mysqli));

include "search_all_results.php";
?>

<a href="index.php">Return to the home page</a>