<?php
include("connection.php");

if (isset($_GET['username'])) {
    $username = $_GET['username'];


    $query = "SELECT * FROM login WHERE username='$username'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if (!$user) {
        die("User not found.");
    }
}


if (isset($_POST['update'])) {
    $newUsername = $_POST['new_username'];
    $newPassword = $_POST['new_password'];

    $updateQuery = "UPDATE login SET username='$newUsername', password='$newPassword' WHERE username='$username'";
    if (mysqli_query($conn, $updateQuery)) {
        header("Location: user.php");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="userstyle.css">
    <title>Edit User</title>
    <style>
        body {
            background-color: #E1F7F5;
            font-family: sans-serif;
        }
        h1, h2 {
            margin: 0;
        }
        h1 {
            font-size: 30px;
        }
        #form {
            background-color: #9AC8CD;
            width: 35%;
            margin: 50px auto;
            border-radius: 20px;
            padding: 20px;
            font-size: 20px;
        }
        #form .input-container {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            padding-top: 5px;
        }
        #form .input-container label {
            width: 25%;
        }
        #form .input-container input {
            width: 50%;
            height: 30px;
            font-size: 20px;
        }
        #btn {
            background-color: #9AC8CD;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            font-size: 16px;
            display: block;
            margin: auto;
        }
        #btn:hover {
            background-color: #7CA6B8;
        }
    </style>
</head>
<body>
    <div id="form">
        <h2>Edit User</h2>
        <form method="post" action="">
            <div class="input-container">
                <label for="new_username">New Username:</label>
                <input type="text" id="new_username" name="new_username" value="<?php echo $user['username']; ?>">
            </div>
            <div class="input-container">
                <label for="new_password">New Password:</label>
                <input type="password" id="new_password" name="new_password" value="<?php echo $user['password']; ?>">
            </div>
            <input type="submit" name="update" id="btn" value="Update">
        </form>
        <div class="back-button">
            <a href="user.php">Back</a>
        </div>
    </div>
</body>
</html>

<?php
mysqli_close($conn);
?>
