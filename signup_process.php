<?php
include("connection.php");

if(isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];


    if($password !== $confirm_password) {
        echo '<script>alert("Passwords do not match!");</script>';
        exit;
    }


    $insert_query = "INSERT INTO login (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($insert_query);
    $stmt->bind_param("ss", $username, $password); // Store plaintext password

    if($stmt->execute()) {
        echo '<script>alert("Account created successfully!");</script>';
 
        echo '<script>setTimeout(function(){ window.location.href = "index.php"; }, 1000);</script>';
    } else {

        echo '<script>alert("Error creating account: '.$stmt->error.'");</script>';
    }
}

mysqli_close($conn);
?>
