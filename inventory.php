<?php
include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Inventory</title>
    <style>
        body {
            background-color: #e3efd8;
            margin: 0;
            padding: 0;
            height: 100vh;
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
            color: black;
            text-decoration: none;
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
        #menu .inventory {
            padding: 5px 10px;
            background-color: #237c3c;
            color: white;
        }
        #menu .Home {
            color: black;
        }
        #product-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 20px;
        }
        .product {
            border: 1px solid #9AC8CD;
            border-radius: 5px;
            padding: 10px;
            margin: 10px;
            width: 200px;
            text-align: center;
        }
        .product img {
            max-width: 150px;
            max-height: 150px;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            outline: 2px solid #9AC8CD;
        }
        th, td {
            padding: 15px;
            text-align: left;
            border: 1px solid #9AC8CD;
        }
        th {
            background-color: #9AC8CD;
        }
        .editable-row td {
            background-color: #f0f0f0; 
        }
        h2 {
          text-align: center;
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

    <h2>Product Inventory</h2>

    <div id="product-container">
        <?php
        $sql = "SELECT * FROM inventory";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>NAME</th>";
            echo "<th>CATEGORY</th>";
            echo "<th>BRAND</th>";
            echo "<th>PRICE</th>";
            echo "<th>Edit</th>";
            echo "<th>Delete</th>";
            echo "</tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr data-product-id='" . $row['Product_id'] . "'>";
                echo "<td>" . $row['Product_id'] . "</td>";
                echo "<td>" . $row['Product_title'] . "</td>";
                echo "<td>" . $row['Product_cat'] . "</td>";
                echo "<td>" . $row['Product_brand'] . "</td>";
                echo "<td>₱ " . $row['Product_price'] . "</td>";
                echo "<td><button class='edit-btn'>Edit</button></td>";
                echo "<td><button class='delete-btn' onclick='deleteProduct(" . $row['Product_id'] . ")'>Delete</button></td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No products found";
        }
        ?>
    </div>

    <div id="editModal" style="display:none; text-align: center; margin-top: 10px;">
    <form id="editForm" style="width: 50%; margin: 0 auto;">
        <input type="hidden" id="editProductId" name="productId">
        <label for="editProductTitle">Name:</label>
        <input type="text" id="editProductTitle" name="productTitle">
        <br><br>
        <label for="editProductCat">Product Category:</label>
        <select id="editProductCat" name="productCat">
            <option value="" selected hidden>Select a Category</option>
            <option value="Beverages">Beverages</option>
            <option value="Food">Food</option>
            <option value="Personal Care">Personal Care</option>
            <option value="Household Goods">Household Goods</option>
            <option value="Medicines">Medicines</option>
        </select>
        <br><br>
        <label for="editProductBrand">Brand:</label>
        <input type="text" id="editProductBrand" name="productBrand">
        <br><br>
        <label for="editProductPrice">Price:</label>
        <input type="text" id="editProductPrice" name="productPrice">
        <br><br>
        <button type="submit">Save</button>
    </form>
</div>



    <script>
        function deleteProduct(productId) {
            if (confirm("Are you sure you want to delete this product?")) {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var row = document.querySelector('tr[data-product-id="' + productId + '"]');
                        row.parentNode.removeChild(row);
                    }
                };
                xhttp.open("POST", "delete_product.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("productId=" + productId);
            }
        }

        document.querySelectorAll('.edit-btn').forEach(function(button) {
            button.addEventListener('click', function() {
                var row = this.closest('tr');
                var productId = row.getAttribute('data-product-id');
                var productTitle = row.cells[1].innerText;
                var productCat = row.cells[2].innerText;
                var productBrand = row.cells[3].innerText;
                var productPrice = row.cells[4].innerText;

                document.getElementById('editProductId').value = productId;
                document.getElementById('editProductTitle').value = productTitle;
                document.getElementById('editProductCat').value = productCat;
                document.getElementById('editProductBrand').value = productBrand;
                document.getElementById('editProductPrice').value = productPrice;

                document.getElementById('editModal').style.display = 'block';
            });
        });

        document.getElementById('editForm').addEventListener('submit', function(event) {
            event.preventDefault();

            var productId = document.getElementById('editProductId').value;
            var productTitle = document.getElementById('editProductTitle').value;
            var productCat = document.getElementById('editProductCat').value;
            var productBrand = document.getElementById('editProductBrand').value;
            var productPrice = document.getElementById('editProductPrice').value;

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var row = document.querySelector('tr[data-product-id="' + productId + '"]');
                    row.cells[1].innerText = productTitle;
                    row.cells[2].innerText = productCat;
                    row.cells[3].innerText = productBrand;
                    row.cells[4].innerText = productPrice;

                    document.getElementById('editModal').style.display = 'none';
                }
            };
            xhttp.open("POST", "update_product.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("productId=" + productId +
                "&productTitle=" + encodeURIComponent(productTitle) +
                "&productCat=" + encodeURIComponent(productCat) +
                "&productBrand=" + encodeURIComponent(productBrand) +
                "&productPrice=" + encodeURIComponent(productPrice));
        });
    </script>
</body>
</html>
