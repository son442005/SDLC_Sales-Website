<?php
session_start();
require '../connect.php';

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save_product'])) {
    $product_id = $_POST['product_id'] ?? ''; 
    $category_id = $_POST['category_id'];
    $product_name = trim($_POST['product_name']);
    $description = trim($_POST['description']);
    $price = floatval($_POST['price']);
    $stock_quantity = intval($_POST['stock_quantity']);

    $check_stmt = $conn->prepare("SELECT product_id, stock_quantity FROM products WHERE product_name = ? AND category_id = ?");
    $check_stmt->bind_param("si", $product_name, $category_id);
    $check_stmt->execute();
    $result = $check_stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $product_id = $row['product_id'];

        $update_stmt = $conn->prepare("UPDATE products SET description = ?, price = ?, stock_quantity = ? WHERE product_id = ?");
        $update_stmt->bind_param("sdii", $description, $price, $stock_quantity, $product_id);

        if ($update_stmt->execute()) {
            echo "<script>alert('Product updated successfully!'); window.location='productManagement.php';</script>";
        } else {
            echo "Update error: " . $update_stmt->error;
        }
        $update_stmt->close();
    } else {
        $insert_stmt = $conn->prepare("INSERT INTO products (category_id, product_name, description, price, stock_quantity) VALUES (?, ?, ?, ?, ?)");
        $insert_stmt->bind_param("issdi", $category_id, $product_name, $description, $price, $stock_quantity);

        if ($insert_stmt->execute()) {
            echo "<script>alert('New product added successfully!'); window.location='productManagement.php';</script>";
        } else {
            echo "Error adding product: " . $insert_stmt->error;
        }
        $insert_stmt->close();
    }

    $check_stmt->close();
}

if (isset($_GET['delete'])) {
    $product_id = intval($_GET['delete']);

    $stmt = $conn->prepare("DELETE FROM products WHERE product_id=?");
    $stmt->bind_param("i", $product_id);

    if ($stmt->execute()) {
        echo "<script>alert('Product deleted successfully!'); window.location='productManagement.php';</script>";
    } else {
        echo "Error while deleting: " . $stmt->error;
    }
    $stmt->close();
}

$result = $conn->query("SELECT product_id, category_id, product_name, description, price, stock_quantity FROM products");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Management</title>
    <link rel="stylesheet" href="productManagement.css">
</head>

<body>
<div class="content">
    <h1>Product Management</h1>

    <div class="input-form">
        <form method="POST">
            <input type="hidden" name="product_id" id="product_id">
            <input type="text" name="product_name" id="product_name" placeholder="Product Name" required>
            <input type="text" name="category_id" id="category_id" placeholder="Category ID" required>
            <input type="text" name="description" id="description" placeholder="Product Description" required>
            <input type="number" name="price" id="price" placeholder="Price" step="0.01" required>
            <input type="number" name="stock_quantity" id="stock_quantity" placeholder="Stock Quantity" required>
            <button type="submit" name="save_product" class="btn">Add</button>
        </form>
    </div>

    <div class="display-form">
        <table>
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['product_id'] ?></td>
                    <td><?= $row['category_id'] ?></td>
                    <td><?= $row['product_name'] ?></td>
                    <td><?= $row['description'] ?></td>
                    <td><?= $row['price'] ?></td>
                    <td><?= $row['stock_quantity'] ?></td>
                    <td>
                        <button class="btn edit-btn" onclick="editProduct('<?= $row['product_id'] ?>', '<?= $row['category_id'] ?>', '<?= $row['product_name'] ?>', '<?= $row['description'] ?>', '<?= $row['price'] ?>', '<?= $row['stock_quantity'] ?>')">✏ Edit</button>
                        <a href="?delete=<?= $row['product_id'] ?>" class="btn delete-btn" onclick="return confirm('Confirm delete?');">🗑 Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>

    <a href="../Main/main.php">Return</a>
</div>

<script>
    function editProduct(id, category_id, name, desc, price, stock) {
        document.getElementById("product_id").value = id;
        document.getElementById("category_id").value = category_id;
        document.getElementById("product_name").value = name;
        document.getElementById("description").value = desc;
        document.getElementById("price").value = price;
        document.getElementById("stock_quantity").value = stock;
    }
</script>
</body>
</html>

<?php $conn->close(); ?>
