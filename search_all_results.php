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
// If it fails to connect to the database, state the error message
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL : (", $mysqli->connect_errno , ") " , $mysqli->connect_error; 
}

// Get hosting info message
echo $mysqli->host_info . "<br><br>";

// SQL Statement variables to get jokes from table
echo "<h2>All database entries</h2>";
$sql = "SELECT JokeID, Joke_question, Joke_answer, users_id, username FROM jokes_table JOIN users ON users.id = jokes_table.users_id";
$result = $mysqli->query($sql);

?>

<div id="accordion">

<?php

// If there are entries in the jokes database, output each result
if ($result->num_rows > 0) {
    // Output each data row
    while ($row = $result->fetch_assoc()) {
        echo "<h3>$row[Joke_question]</h3>";
        echo "<div><p>" . $row['Joke_answer'] . "-- Submitted by user " . $row['username'] . "</p></div>";
    }
} else { // Else, the con
    echo "There are no results from the jokes_table database.";
}
?>

</div>