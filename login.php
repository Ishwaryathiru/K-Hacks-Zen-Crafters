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

$createtable = "CREATE TABLE IF NOT EXISTS patient_login (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(255) NOT NULL,
    pass_word VARCHAR(15) NOT NULL
)";
if (!mysqli_query($conn, $createtable)) {
    die("Error creating table: " . mysqli_error($conn));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['email'], $_POST['password'])) {
        $user = $_POST['email'];
        $password = $_POST['password'];

        $sql = "INSERT INTO patient_login (user_name, pass_word) VALUES ('$user', '$password')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "Record inserted successfully";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
    header("Location: home.php");
        exit();
}

mysqli_close($conn);
?>
