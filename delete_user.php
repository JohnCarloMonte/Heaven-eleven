<?php
include("connection.php");

if (isset($_GET['username'])) {
    $username = $_GET['username'];

    // Delete user
    $deleteQuery = "DELETE FROM login WHERE username='$username'";
    if (mysqli_query($conn, $deleteQuery)) {
        header("Location: user.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>
