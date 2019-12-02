<?php
require('validate.php');

if(isset($_GET) && isset($_GET['id']) && !empty($_GET['id'])){
    $title = "Operation++ - Alteração de Operação";
    $H1_Title = " Alteração de Operação";
    $edit = "edit/op.php";
    $content = $edit;
}
else{
    $title = "Operation++ - Cadastro de Operação";
    $H1_Title = " Cadastro de Operação";
    $cad = "cad/op.php";
    $content = $cad;
}
require("blank.php");
?>