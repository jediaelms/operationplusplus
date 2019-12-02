<?php
require('validate.php');
if(isset($_GET) && isset($_GET['id']) && !empty($_GET['id'])){
    $title = "Operation++ - Alteração de Paciente";
    $H1_Title = " Alteração de Paciente";
    $cad = "edit/paci.php";
    $content = $cad;
}
else{
    $title = "Operation++ - Cadastro de Paciente";
    $H1_Title = " Cadastro de Paciente";
    $cad = "cad/paci.php";
    $content = $cad;
}
require("blank.php");
?>