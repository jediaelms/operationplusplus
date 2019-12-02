<?php
require('validate.php');
if(isset($_GET) && isset($_GET['id']) && !empty($_GET['id'])){
    $title = "Operation++ - Alteração de Tipos de Operações";
    $H1_Title = " Alteração de Tipos de Operações";
    $edit = "edit/tip_ops.php";
    $content = $edit;
}
else{
    $title = "Operation++ - Cadastro de Tipos de Operações";
    $H1_Title = " Cadastro de Tipos de Operações";
    $cad = "cad/tip_ops.php";
    $content = $cad;
}
require("blank.php");
?>