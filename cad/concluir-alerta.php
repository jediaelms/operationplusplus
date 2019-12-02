<?php
require('../conexao.php');
if(isset($_GET['alert']) && isset($_GET['tipo'])){
    $alert = $_GET['alert'];
    $tipo = $_GET['tipo'];
    $concluido = false;
    if($tipo == 1){
        $sql = "UPDATE alerta_pontual SET concluido = NOW() WHERE alerta_cod_alerta = {$alert}";
        if($query = $mysqli->query($sql)){
            $concluido = true;
        }
    }
    else{
        if($tipo == 0){
            $sql = "UPDATE alerta_espacado SET num_registrados=(num_registrados+1) WHERE alerta_cod_alerta = {$alert}";
            if($query = $mysqli->query($sql)){
                $sql = "SELECT num_registros, num_registrados FROM alerta_espacado WHERE alerta_cod_alerta = {$alert} LIMIT 1";
                if($result = $mysqli->query($sql)){
                    $row = $result->fetch_assoc();
                    if($row['num_registros'] == $row['num_registrados']){
                        $concluido = true;
                    }
                    else{
                        echo json_encode(['result'=> "Checado {$row['num_registrados']}/{$row['num_registros']}", 'status' => 200]);
                    }
                }
            }
        }
    }
    if($concluido){
        $sql = "UPDATE alerta SET concluido = 1 WHERE cod_alerta = {$alert}";
        if($query = $mysqli->query($sql)){
            echo json_encode(['result'=> 'Concluído com sucesso', 'status' => 200]);
        }
        else{
            echo json_encode(['result'=> 'Não pôde ser concluído, tem novamente', 'status' => 500]);
        }
    }
}
?>