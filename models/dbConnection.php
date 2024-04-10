<?php
function openConnection()
{
    // Defining parameters that is needed to connect database
    $servername = "127.0.0.1";
    $username = "adminRoot";
    $password = "Admin123";

    //Creact Connection
    $conn = new mysqli($servername, $username, $password, 'chapter_one');

    // Check Connection
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }
    // echo "Succcess </br>";
    return $conn;
}

// Close Connection to dabatase
function closeConnection($conn)
{
    $conn->close();
    // echo "Connection is closed </br>";
}
