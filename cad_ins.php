<?php
require('validate.php');
if(isset($_GET) && isset($_GET['id']) && !empty($_GET['id'])){
    $title = "Operation++ - Alteração de Instrução";
    $H1_Title = " Alteração de Instrução";
    $edit = "edit/ins.php";
    $content = $edit;
}
else{
    $title = "Operation++ - Cadastro de Instrução";
    $H1_Title = " Cadastro de Instrução";
    $cad = "cad/ins.php";
    $content = $cad;
}
require("blank.php");
?>