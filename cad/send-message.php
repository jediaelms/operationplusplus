<?php
require('../conexao.php');
if(isset($_POST['msg']) && isset($_POST['usuario_remetente']) && isset($_POST['usuario_destinatario'])){
    $reme = $_POST['usuario_remetente'];
    $desti = $_POST['usuario_destinatario'];
    $msg = $_POST['msg'];
    $sql = "INSERT INTO `bate_papo` (`usuario_remetente`, `usuario_destinatario`, `msg`, `data_hora`, `visualizado`) VALUES ('{$reme}','{$desti}','{$msg}', NOW(), 0)";
    if($query = $mysqli->query($sql)){
        echo json_encode(['result'=> 'Mensagem Enviada', 'status' => 200]);
    }
    else{
        echo json_encode(['result'=> 'Mensagem não Enviada. Erro -> '. $conn->error, 'status' => 500]);
    }
}
?>