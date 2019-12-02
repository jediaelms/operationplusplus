<?php
require('../conexao.php');
// var_dump($_POST);
if(isset($_POST['usuario'])){
    $usuario = $_POST['usuario'];
    $sql="SELECT cod_alerta, descricao, tipo_alerta FROM `alerta` a, `paciente` p WHERE a.concluido = 0 AND a.paciente_cod_paciente = p.cod_paciente AND  p.usuario_cod_usuario = '{$usuario}';";
    // var_dump($sql);
    // exit();
    if($result = $mysqli->query($sql)){
            while ($row = $result->fetch_assoc())
            {
                $messages[] = $row;
            }
            echo json_encode($messages, JSON_PRETTY_PRINT);
        }
        else{
            echo json_encode(['result'=> $sql. $mysqli->error, 'status' => 500]);
        }
}
?>