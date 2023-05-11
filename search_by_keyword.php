<head>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
    $( function() {
        $( "#accordion" ).accordion();
    } );
    </script>

    <style>
        * {
            font-family:Arial, Helvetica, sans-serif;
        }
    </style>
</head>

<?php
include "database_connect.php";

$form_keyword = $_GET["keyword"];

// Search the database by a specified keyword
echo "<h1>All jokes with the question keyword: <em>$form_keyword</em></h1>";
$sql = "SELECT JokeID, Joke_question, Joke_answer, users_id, username FROM jokes_table JOIN users ON users.id = jokes_table.users_id WHERE Joke_question LIKE '%" . $form_keyword . "%'";
$result = $mysqli->query($sql);

?>

<div id="accordion">

<?php

// If there are entries in the jokes database, output each result
if ($result->num_rows > 0) {
    // Output each data row
    while ($row = $result->fetch_assoc()) {
        // echo "Joke ID: " . $row["JokeID"]. " - Joke Question: " . $row["Joke_question"]. " Joke Answer: " . $row["Joke_answer"]. "<br>";
        echo "<h3>$row[Joke_question]</h3>";
        echo "<div><p>" . $row['Joke_answer'] . "-- Submitted by user " . $row['username'] . "</p></div>";
    }
} else { // Else, the con
    echo "There are no results from the jokes_table database.";
}
?>

</div>