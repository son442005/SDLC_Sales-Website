<?php
// Include Database
require '../connect.php';

//Check if form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $full_name = trim($_POST["full_name"]);
    $password = trim($_POST["password"]);
    $phone = trim($_POST["phone"]);
    $address = trim($_POST["address"]);

    //Hash password (bật để tránh lỗi)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    //Insert data into users table
    $sql = "INSERT INTO users (user_name, password, phone, address) VALUES (?, ?, ?, ?)";
    //Insert data to database
    $stmt = mysqli_prepare($conn, $sql);

    if($stmt) {
        mysqli_stmt_bind_param($stmt, "ssss", $full_name, $hashed_password, $phone, $address);
        if(mysqli_stmt_execute($stmt)){
            header("refresh:2; url=../Login/login.php");
            exit();
        } else{
            echo "Error: " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    } else{
        echo "Error preparing statement: " . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="register.css">
</head>
<body>
    <div class="signup-container">
        <h2>Sign Up</h2>

        <form method="post">
            <div class="input-group">
                <label for="">Username:</label>
            <input type="text" name="full_name" require>
            </div>
            <div class="input-group">
                <label for="">Password:</label>
            <input type="password" name="password" require>
            </div>
            <div class="input-group">
                <label for="">Phone:</label>
                <input type="text" name="phone" require>
            </div>
            <div class="input-group">
                <label for="">Address:</label>
                <input type="text" name="address" require>
            </div>
            <button type="submit" class="btn">Sign up</button>
            <p>Already have an account ? 
                <a href="../Login/login.php">Login</a>
            </p>
        </form>
    </div>
</body>
</html>
