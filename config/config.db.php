<?php

    // Information for database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gbi";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {

        die("Connection failed: " . $conn->connect_error);

    }
    echo '<script>console.log("connected successfully to database" );</script>';

?>