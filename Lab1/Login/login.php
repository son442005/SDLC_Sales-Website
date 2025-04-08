<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
// Include database connection
require '../connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_name = trim($_POST["user_name"]);
    $password = trim($_POST["password"]);
    $sql = "SELECT password FROM users WHERE user_name = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $user_name);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) > 0) {
            mysqli_stmt_bind_result($stmt, $hashed_password);
            mysqli_stmt_fetch($stmt);

            if (password_verify($password, $hashed_password)) {
                $_SESSION['user_name'] = $user_name;
            
                if ($user_name === 'Admin') {
                    $_SESSION['role'] = 'admin';
                } else {
                    $_SESSION['role'] = 'user';
                }
                header("Location: ../Main/main.php");
                exit();
            } else{
                echo "<script>alert('Wrong username or password!!!'); window.location='login.php';</script>";
            }

        } else {
            echo "<script>alert('Error!!!'); window.location='login.php';</script>";
        }   
        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form method="post">
            <div class="input-group">
                <label for="">Username:</label>
                <input type="text" name="user_name" require>
            </div>
            <div class="input-group">
                <label for="">Password:</label>
                <input type="password" name="password" require>
            </div>          
            <button type="submit" class="btn">Log in</button>
            <p>No account registered yet ? 
                <a href="../Register/register.php">Register</a>
            </p>
        </form>
    </div>
</body>
</html>
