<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "htdb";

$conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve the region parameter from the URL
    $region = $_GET["region"];

    // Query the cemeteries table for rows matching the region
    $sql = "SELECT * FROM cemeteries WHERE Region = '$region'";
    $result = $conn->query($sql);

    // Fetch the data into an array
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // Encode the data as JSON and echo it
    echo json_encode($data);

    // Close the database connection
    $conn->close();
?>
