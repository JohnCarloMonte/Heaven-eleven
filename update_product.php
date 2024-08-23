<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
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
            margin: 50px auto; /* Center horizontally */
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
            width: 70%;
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
    <?php
    include("connection.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $productId = $_POST['productId'];
        $productTitle = $_POST['productTitle'];
        $productCat = $_POST['productCat'];
        $productBrand = $_POST['productBrand'];
        $productPrice = $_POST['productPrice'];

        $sql = "UPDATE inventory SET Product_title='$productTitle', Product_cat='$productCat', Product_brand='$productBrand', Product_price='$productPrice' WHERE Product_id='$productId'";

        if ($conn->query($sql) === TRUE) {
            echo "Product updated successfully";
        } else {
            echo "Error updating product: " . $conn->error;
        }
    }

    // Fetch product details
    if (isset($_GET['productId'])) {
        $productId = $_GET['productId'];
        $query = "SELECT * FROM inventory WHERE Product_id='$productId'";
        $result = mysqli_query($conn, $query);
        $product = mysqli_fetch_assoc($result);

        if (!$product) {
            die("Product not found.");
        }
    } else {
        die("Product ID not provided.");
    }

    $conn->close();
    ?>
    <div id="form">
        <h2>Edit Product</h2>
        <form method="post" action="">
            <div class="input-container">
                <label for="productTitle">Product Title:</label>
                <input type="text" id="productTitle" name="productTitle" value="<?php echo $product['Product_title']; ?>" required>
            </div>
            <div class="input-container">
                <label for="productCat">Product Category:</label>
                <input type="text" id="productCat" name="productCat" value="<?php echo $product['Product_cat']; ?>" required>
            </div>
            <div class="input-container">
                <label for="productBrand">Product Brand:</label>
                <input type="text" id="productBrand" name="productBrand" value="<?php echo $product['Product_brand']; ?>" required>
            </div>
            <div class="input-container">
                <label for="productPrice">Product Price:</label>
                <input type="number" id="productPrice" name="productPrice" value="<?php echo $product['Product_price']; ?>" required>
            </div>
            <input type="hidden" name="productId" value="<?php echo $product['Product_id']; ?>">
            <input type="submit" id="btn" value="Update">
        </form>
    </div>
</body>
</html>
