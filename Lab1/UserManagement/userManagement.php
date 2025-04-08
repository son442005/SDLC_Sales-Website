<?php
session_start();
require '../connect.php';

if (!$conn) {
    die("Error: " . mysqli_connect_error());
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save_user'])) {
    $id = $_POST['user_id'] ?? '';
    $username = trim($_POST['username']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);

    if ($id) {
        $stmt = $conn->prepare("UPDATE users SET user_name=?, phone=?, address=? WHERE user_id=?");
        $stmt->bind_param("sssi", $username, $phone, $address, $id);
    } else {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users (user_name, password, phone, address) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $password, $phone, $address);
    }

    if ($stmt->execute()) {
        echo "<script>alert('Successfully!!'); window.location='userManagement.php';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }
    $stmt->close();
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM users WHERE user_id=?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('Delete Successfully!!!'); window.location='userManagement.php';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }
    $stmt->close();
}

$result = $conn->query("SELECT user_id, user_name, phone, address FROM users");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link rel="stylesheet" href="userManagement.css">
</head>

<body>
    <div class="content">
        <h1>User Management</h1>
        <div class="input-form">
            <form method="POST">
                <input type="hidden" name="user_id" id="user_id">
                <input type="text" name="username" id="username" placeholder="User Name..." required>
                <input type="text" name="phone" id="phone" placeholder="Phone..." required>
                <input type="text" name="address" id="address" placeholder="Address..." required>
                <input type="password" name="password" id="password" placeholder="Password..." required>
                <button type="submit" name="save_user" class="btn">Add</button>
            </form>
        </div>
        <div class="display-form">
            <table>
                <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
                
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['user_id'] ?></td>
                    <td><?= $row['user_name'] ?></td>
                    <td><?= $row['phone'] ?></td>
                    <td><?= $row['address'] ?></td>
                    <td>
                    <button class="btn edit-btn" onclick="editUser('<?= $row['user_id'] ?>', '<?= $row['user_name'] ?>', '<?= $row['phone'] ?>', '<?= $row['address'] ?>')">✏ Edit</button>
                    <a href="?delete=<?= $row['user_id'] ?>" class="btn delete-btn" onclick="return confirm('Do you want to delete?');">🗑 Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </table>
        </div>
        
        <a href="../Main/main.php">Return</a>
    </div>
<script>
    function editUser(id, username, phone, address) {
        document.getElementById("user_id").value = id;
        document.getElementById("username").value = username;
        document.getElementById("phone").value = phone;
        document.getElementById("address").value = address;
        document.getElementById("password").removeAttribute("required");
    }
</script>

</body>
</html>

<?php $conn->close(); ?>