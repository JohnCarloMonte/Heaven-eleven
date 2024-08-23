<?php
include("connection.php");

if (isset($_POST['productId']) && !empty($_POST['productId'])) {
    $productId = mysqli_real_escape_string($conn, $_POST['productId']);
    $sql = "DELETE FROM inventory WHERE Product_id = '$productId'";

    if (mysqli_query($conn, $sql)) {
        echo "Product deleted successfully";
    } else {
        echo "Error deleting product: " . mysqli_error($conn);
    }
} else {
    echo "Invalid productId";
}

$conn->close();
?>
