<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HEAVEN ELEVEN STORE - Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e3efd8;
            margin: 0;
            padding: 0;
        }
        #header {
            background-color: #b1e299;
            padding: 20px;
            text-align: center;
        }
        #header h1 {
            margin: 0;
            font-size: 32px;
            color: #fff;
        }
        #back-button {
            position: absolute;
            top: 20px;
            left: 20px;
        }
        #back-button button {
            background-color: #237c3c;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        #back-button button:hover {
            background-color: #07409D;
        }
        #product-list {
            margin: 20px auto;
            width: 80%;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #9AC8CD;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        #print-button {
            text-align: center;
            margin-top: 20px;
        }
        #print-button button {
            background-color: #237c3c;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        #print-button button:hover {
            background-color: #07409D;
        }

    </style>
</head>
<body>
    <div id="header">
        <h1>HEAVEN ELEVEN STORE</h1>
    </div>
    <div id="back-button">
        <button onclick="window.history.back()">Back</button>
    </div>
    <h2 style="text-align: center;">PRODUCT LIST</h2>
    <div id="product-list">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Price (₱)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Include database connection
                include("connection.php");

                // Query to fetch product details
                $query = "SELECT Product_title, Product_cat, Product_brand, Product_price FROM inventory";

                // Execute the query
                $result = $conn->query($query);

                // Check if query executed successfully
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['Product_title'] . "</td>";
                        echo "<td>" . $row['Product_cat'] . "</td>";
                        echo "<td>" . $row['Product_brand'] . "</td>";
                        echo "<td>₱" . $row['Product_price'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No products found</td></tr>";
                }

                // Close database connection
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    <div id="print-button">
        <button onclick="window.print()">Print Report</button>
    </div>
</body>
</html>
