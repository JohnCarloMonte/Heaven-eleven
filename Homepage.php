<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Homepagestyle.css">
    <title>Heaven Eleven</title>
    <style>
        body {
            background-color: #e3efd8;
            margin: 0;
            padding: 0;
        }
        #header {
            background-color: #b1e299;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        #header h1 {
            margin: 0;
            color: linear-gradient(120deg, var(--primary), var(--accent));
        }
        #menu {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        #menu li {
            display: inline;
            margin-right: 10px;
            border-radius: 10px;
        }
        #menu li:last-child {
            margin-right: 0;
        }
        #menu a {
            border-radius: 10px;
            text-decoration: none;
            color: black;
            padding: 5px 10px;
            transition: background-color 0.3s ease-out, color 0.3s ease-out;
        }
        #menu .separator {
            margin-right: 5px;
            margin-left: 5px;
        }
        #menu a:hover {
            background-color: #237c3c;
            color: white;
            border-radius: 10px;
        }
        #menu .logout a:hover {
            background-color: red;
            color: white; 
        }
        #menu .Home{
            padding: 5px 10px;
            background-color: #237c3c;
            color: white;
        }
        #products {
            margin: auto auto; 
            width: 50%; 
            background-color: #8db779;
            border-radius: 20px;
            font-size: 20px;
        }
        .input-container {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            padding-top: 5px;
        }
        .input-container label {
            width: 25%;
            padding-left: 5px;
        }
        .input-container input,
        .input-container select { 
            width: 70%;
            height: 30px;
            font-size: 20px;
        }

        h2, h3 {
            margin-top: 30px;
            text-align: center;
            color: #0e1c08;
        }
        h3{
            font-size: 30px;
        }
        #submit-container {
            text-align: center;
        }
        .category-circle {
            width: 140px;
            height: 120px;
            border-radius: 20px;
            display: inline-block;
            text-align: center;
            line-height: 100px;
            margin-left: 90px;
            font-size: 24px;
        }
        .category-label {
            font-size: 14px;
            margin-top: 0px;
            text-align: center;
        }
        .beverages {
            background-color: #237c3c;
        }
        .food {
            background-color: #237c3c;
        }
        .personal-care {
            background-color: #237c3c;
        }
        .household-goods {
            background-color: #237c3c;
        }
        .medicines {
            background-color: #237c3c;
        }
        #submit-container {
            text-align: center;
        }
        #submit {
            background-color: #237c3c;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease-out;
            margin-bottom: 10px;
        }
        #submit:hover {
            background-color: #5ad09a;
        }
        #product-statistics {
        background-color: #5ad09a; /* Add this line */
        padding: 20px; /* Add padding if needed */
        width: 95%;
        margin-left: 10px;
        border-radius: 20px;
    }

    </style>
</head>
<body>
    <div id="header">
        <div>
            <h1>HEAVEN ELEVEN</h1>
        </div>
        <div>
            <ul id="menu">
                <li class="Home"><a href="Homepage.php">Home</a></li>
                <li class="separator">|</li>
                <li class="inventory"><a href="inventory.php">Product Inventory</a></li>
                <li class="separator">|</li>
                <li class="Manage"><a href="user.php">Manage User</a></li>
                <li class="separator">|</li>
                <li class="Report"><a href="report.php">Report</a></li>
                <li class="separator">|</li>
                <li class="logout"><a href="index.php">LOG OUT</a></li>
            </ul>
        </div>
    </div>
    <I><h3>Sinful Snacks & Saintly Supplies: Welcome to Heaven Eleven!</h3></I>
    
<br><br>

    <div id="product-statistics">
    <h3>NUMBER OF PRODUCTS</h3>
<br>
    <?php
    include("connection.php");

    $query = "SELECT Product_cat, COUNT(*) as count FROM inventory GROUP BY Product_cat";


    $result = $conn->query($query);


    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {

            echo "<div class='category-circle " . strtolower(str_replace(' ', '-', $row['Product_cat'])) . "'>" . $row['count'] . "<br><span class='category-label'>" . $row['Product_cat'] . "</span></div>";
        }
    } else {
        echo "0 results";
    }


    $conn->close();
    ?>
    </div>
    <br><br><br>
    <h2>Add a product</h2>

    <form action="inventorydata.php" method="post">
    <div id="products">
    <div class="input-container">
    <label for="productname">Product name</label>
    <input type="numeric" id="productname" name="Product_title">
</div>
<div class="input-container">
 <label for="category">Category</label>
 <select id="category" name="Product_cat">
                    <option value="" selected hidden>Select a Category</option>
                    <option value="Beverages">Beverages</option>
                    <option value="Food">Food</option>
                    <option value="Personal Care">Personal Care</option>
                    <option value="Household Goods">Household Goods</option>
                    <option value="Medicines">Medicines</option>
                </select>
</div>
<div class="input-container">
    <label for="brand">Brand</label>
    <input type="text" id="brand" name="Product_brand">
</div>
<div class="input-container">
    <label for="description">Description</label>
    <input type="text" id="description" name="Product_desc">
</div>
<div class="input-container">
    <label for="Price">Price</label>
    <input type="text" id="Price" name="Product_price">
</div>
<div class="input-container">
    <label for="Image">Image</label>
    <input type="text" id="Image" name="Product_image">
</div>
<div class="input-container">
    <label for="Keyword">Keyword</label>
    <input type="text" id="Keyword" name="Product_keyword">
</div>
<div id="submit-container">
    <input type="submit" name="submit" id="submit" value="Submit">
</div>
</div>
</form>
</body>
</html>
