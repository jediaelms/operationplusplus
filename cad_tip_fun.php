<?php
require('validate.php');
if(isset($_GET) && isset($_GET['id']) && !empty($_GET['id'])){
    $title = "Operation++ - Alteração de Tipos de Funcionários";
    $H1_Title = " Alteração de Tipos de Funcionários";
    $cad = "edit/tip_fun.php";
    $content = $cad;
else{
    $title = "Operation++ - Cadastro de Tipos de Funcionários";
    $H1_Title = " Cadastro de Tipos de Funcionários";
    $cad = "cad/tip_fun.php";
    $content = $cad;
}
require("blank.php");
?>