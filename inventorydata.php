<?php
include("connection.php");


$notification = '';

if(isset($_POST['submit'])) {
    // Retrieve form data
    $Product_title = isset($_POST['Product_title']) ? $_POST['Product_title'] : '';
    $Product_cat = isset($_POST['Product_cat']) ? $_POST['Product_cat'] : '';
    $Product_brand = isset($_POST['Product_brand']) ? $_POST['Product_brand'] : '';
    $Product_desc = isset($_POST['Product_desc']) ? $_POST['Product_desc'] : '';
    $Product_price = isset($_POST['Product_price']) ? $_POST['Product_price'] : '';
    $Product_image = isset($_POST['Product_image']) ? $_POST['Product_image'] : '';
    $Product_keyword = isset($_POST['Product_keyword']) ? $_POST['Product_keyword'] : '';


    $sql = "INSERT INTO inventory (Product_title, Product_cat, Product_brand, Product_desc, Product_price, Product_image, Product_keyword)
            VALUES ('$Product_title', '$Product_cat', '$Product_brand', '$Product_desc', '$Product_price', '$Product_image', '$Product_keyword')";

    if ($conn->query($sql) === TRUE) {
 
        $notification = "New record created successfully";

        echo "<script>
                setTimeout(function(){
                    window.location.href = 'Homepage.php';
                }, 500);
              </script>";
    } else {
        $notification = "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Data</title>
</head>
<body>
    <div id="notification"><?php echo $notification; ?></div>
<style>
    background-color: #E1F7F5;
</style>
</body>
</html>