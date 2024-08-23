<?php
    // Include the database connection file
    include("connection.php");

    // Fetch total number of products
    $sqlTotalProducts = "SELECT COUNT(*) AS total FROM inventory";
    $resultTotalProducts = $conn->query($sqlTotalProducts);
    $rowTotalProducts = $resultTotalProducts->fetch_assoc();
    $totalProducts = $rowTotalProducts['total'];

    // Fetch total products in each category
    $sqlTotalProductsByCategory = "SELECT Product_cat, COUNT(*) AS total FROM inventory GROUP BY Product_cat";
    $resultTotalProductsByCategory = $conn->query($sqlTotalProductsByCategory);
    $totalProductsByCategory = array();
    while ($row = $resultTotalProductsByCategory->fetch_assoc()) {
        $totalProductsByCategory[$row['Product_cat']] = $row['total'];
    }

    // Fetch brands
    $sqlBrands = "SELECT DISTINCT Product_brand FROM inventory";
    $resultBrands = $conn->query($sqlBrands);
    $brands = array();
    while ($row = $resultBrands->fetch_assoc()) {
        $brands[] = $row['Product_brand'];
    }

    // Close database connection
    $conn->close();
?>
