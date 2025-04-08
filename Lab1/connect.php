<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "moai_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if(!$conn){
    die("Connected failed: " . mysqli_connect_error());
}