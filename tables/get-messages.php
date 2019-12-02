<?php
require('../conexao.php');
if(isset($_POST['usuario_remetente']) && isset($_POST['usuario_destinatario'])){
    $reme = $_POST['usuario_remetente'];
    $desti = $_POST['usuario_destinatario'];
    if(!isset($_POST['new'])){
        $sql = "SELECT nome FROM usuario WHERE cod_usuario = '{$desti}';";
        if($result = $mysqli->query($sql)){
            while ($row = $result->fetch_assoc())
            {
                $messages[] = $row;
            }
        }
        $sql = "SELECT * FROM bate_papo WHERE (usuario_remetente = '{$reme}' AND usuario_destinatario = '{$desti}') OR (usuario_remetente = '{$desti}' AND usuario_destinatario = '{$reme}') ORDER BY data_hora";
    }
    else{
        $sql = "SELECT * FROM bate_papo WHERE usuario_remetente = '{$reme}' AND usuario_destinatario = '{$desti}' AND visualizado = 0 ORDER BY data_hora";
    }
    // var_dump($sql);
    // exit();
    // echo $sql;
    if($result = $mysqli->query($sql)){
        while ($row = $result->fetch_assoc())
        {
            $messages[] = $row;
        }
        echo json_encode($messages, JSON_PRETTY_PRINT);
        $sql = "UPDATE bate_papo SET visualizado = 1 WHERE `usuario_remetente` = '{$reme}' AND `usuario_destinatario` = '{$desti}' AND `visualizado` = 0;";
        $mysqli->query($sql);
    }
    else{
        echo json_encode(['result'=> $sql. $mysqli->error, 'status' => 500]);
    }
}
?>