<?php
// ============1===========
// Define variables that will be used to connect to the database
$host = "127.0.0.1";
$username = "root";
$password = "";
$db = "db_tp_modul2";
$port = 3308; // adjust to your MySQL port

// ===========2============
// Define $conn to connect to the database
$conn = mysqli_connect("127.0.0.1", "root", "", "db_tp_modul2", 3306);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
