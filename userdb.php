<?php
$dbuser = "root";
$dbhost = "localhost";
$dbpass = "";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass);

if (!$conn) {
    die("MySQL connection failed: " . mysqli_connect_error());
}
$createdb = "CREATE DATABASE IF NOT EXISTS user_db";
if (!mysqli_query($conn, $createdb)) {
    die("Error creating database: " . mysqli_error($conn));
}
mysqli_select_db($conn, "user_db");

$createtable = "CREATE TABLE IF NOT EXISTS patient (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(255) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    Blood_grp VARCHAR(5) NOT NULL,
    Image_link VARCHAR(255)
)";
if (!mysqli_query($conn, $createtable)) {
    die("Error creating table: " . mysqli_error($conn));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['name'], $_POST['phonenumber'], $_POST['bloodgrp'])) {
        $user = $_POST['name'];
        $phone = $_POST['phonenumber'];
        $blood = $_POST['bloodgrp'];
        $image = ""; 

        
        if (isset($_FILES['image_upload'])) {
            $file_name = $_FILES['image_upload']['name'];
            $file_tmp = $_FILES['image_upload']['tmp_name'];
            $file_type = $_FILES['image_upload']['type'];
            move_uploaded_file($file_tmp, "uploads/" . $file_name);
            $image = "uploads/" . $file_name;
        }

        $sql3 = "INSERT INTO patient(user_name, phone, Blood_grp, Image_link) VALUES ('$user', '$phone', '$blood', '$image')";
        $retval3 = mysqli_query($conn, $sql3);
        if (!$retval3) {
            die("Error: " . mysqli_error($conn));
        }
        header("Location: home.php");
        exit();
    }
}
mysqli_close($conn);
?>
