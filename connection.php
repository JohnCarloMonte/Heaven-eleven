<?php
$servername = "localhost";
$username = "carlo";
$password = "carlo";
$db_name = "finalprojectdatabase";


$conn = new mysqli($servername, $username, $password, $db_name);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
