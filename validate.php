<?php
require('conexao.php');
session_start();
// var_dump($_SESSION);
// exit();
if (!(isset($_SESSION['email']) && $_SESSION['email'] != '')){
  header("Location: ./index.php");
}

?>