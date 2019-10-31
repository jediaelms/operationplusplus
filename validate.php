<?php
session_start();
// var_dump($_SESSION);
// exit();
if (!(isset($_SESSION['email']) && $_SESSION['email'] != '')){
  header("Location: ./index.php");
}

$conn = mysqli_connect("localhost", "root", "", "operation_tb");

if (!$conn) {
  echo "Error: Unable to connect to MySQL." . PHP_EOL;
  echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
  echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
  exit;
}
?>