<?php

$sql2 = "SELECT p.`cod_paciente`, u.`nome` FROM `usuario` u, `paciente` p WHERE u.`cod_usuario` = p.`usuario_cod_usuario`";
$result2 = $mysqli->query($sql2);
$select = '';
if ($result2->num_rows > 0) {
    while($row = $result2->fetch_assoc()) {
        $select .= "<option value=".$row['cod_paciente'].">".$row["nome"]."</option>";
    }
}

$login_erro = false;
if (!empty($_POST)){
    if(isset($_POST['tituloPont'])){
        $titulo = $_POST['tituloPont'];
        $data = $_POST['dataPont'];
        $paciente = $_POST['paciente'];
        
        $sql = "INSERT INTO `alerta` (`descricao`, `tipo_alerta`, `paciente_cod_paciente`) VALUES ('{$titulo}','0','{$paciente}')";
        if($query = $mysqli->query($sql)){
            $id = $mysqli->insert_id;
            $sql = "INSERT INTO `alerta_pontual` (`data`, `alerta_cod_alerta`) VALUES ('{$data}', '{$id}')";
            if($query = $mysqli->query($sql)){
                echo "<span style='color: green'>Cadastrado com sucesso!</span>";
            }
            else{
                //var_dump($sql);
                echo "Erro -> ". $mysqli->error;
            }
        }
        else{
            //var_dump($sql);
            echo "Erro -> ". $mysqli->error;
        }
    }
    else{
        $titulo = $_POST['tituloEspac'];
        $qtd = $_POST['qtdEspac'];
        $dataIni = $_POST['dataIni'];
        $dataFim = $_POST['dataFim'];
        $paciente = $_POST['paciente'];

        $erro = false;

        $sql = "INSERT INTO `alerta` (`descricao`, `tipo_alerta`, `paciente_cod_paciente`) VALUES ('{$titulo}','0','{$paciente}')";
        if($query = $mysqli->query($sql)){
            $id = $mysqli->insert_id;
            $sql = "INSERT INTO `alerta_espacado` (`data_ini`, `data_fim`, `num_registros`, `alerta_cod_alerta`) VALUES ('{$dataIni}', '{$dataFim}','{$qtd}', '{$id}')";
            if($query = $mysqli->query($sql)){
                $id = $mysqli->insert_id;
                for ($i = 0; $i < $qtd; $i++){
                    $sql = "INSERT INTO `registros` (`alerta_espacado_cod_espacado`) VALUES ('{$id}')";
                    if(!($query = $mysqli->query($sql))){
                        //var_dump($sql);
                        echo "Erro -> ". $mysqli->error;
                        $erro = true;
                        break;
                    }
                }
                if(!$erro) {
                    echo "<span style='color: green'>Cadastrado com sucesso!</span>";
                }
            }
            else{
                var_dump($sql);
                echo "Erro -> ". $mysqli->error;
            }
        }
        else{
            var_dump($sql);
            echo "Erro -> ". $mysqli->error;
        }
    }

}
mysqli_close($mysqli);
?>
<!-- Basic Card Example -->

<nav>
    <div class="nav nav-tabs center" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-pontual-tab" data-toggle="tab" href="#nav-pontual" role="tab" aria-controls="nav-pontual" aria-selected="true">Pontual</a>
        <a class="nav-item nav-link" id="nav-espacado-tab" data-toggle="tab" href="#nav-espacado" role="tab" aria-controls="nav-espacado" aria-selected="false">Espaçado</a>
    </div>
</nav>
<div class="row">
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-pontual" role="tabpanel" aria-labelledby="nav-pontual-tab">
      <div class="card col mb-12">
        <div class="card-body">
            <form class="user" method="POST">
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <small>Título:</small>
                        <input type="text" name="tituloPont" class="form-control form-control-user" id="exampleFirstName" placeholder="Título do Alerta">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <small>Data:</small>
                        <input type="date" name="dataPont" class="form-control form-control-user" placeholder="Data">
                    </div>
                </div>
                <div class="form-group">
                    </small>Paciente:</small>
                    <select name="paciente" class="form-control form-control-user">
                    <?= $select ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Salvar
                </button>
                <button type="reset" class="btn btn-primary btn-user btn-block">
                    Limpar
                </button>
                <hr>
            </form>
        </div>
    </div>
  </div>
  <div class="tab-pane fade" id="nav-espacado" role="tabpanel" aria-labelledby="nav-espacado-tab">
        <div class="card col mb-12" style="margin-left: 1%">
        <div class="card-body">
            <form class="user" method="POST">
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <small>Título:</small>
                        <input type="text" name="tituloEspac" class="form-control form-control-user" id="exampleFirstName" placeholder="Título do Alerta">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <small>Quantidade:</small>
                        <input type="text" name="qtdEspac" class="form-control form-control-user" id="exampleFirstName" placeholder="Quantidade de vezes a serem checadas.">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <small>Data Início:</small>
                        <input type="date" name="dataIni" class="form-control form-control-user" placeholder="Data Início">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <small>Data Fim:</small>
                        <input type="date" name="dataFim" class="form-control form-control-user" placeholder="Data Fim">
                    </div>
                </div>
                <div class="form-group">
                    </small>Paciente:</small>
                    <select name="paciente" class="form-control form-control-user">
                    <?= $select ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Salvar
                </button>
                <button type="reset" class="btn btn-primary btn-user btn-block">
                    Limpar
                </button>
                <hr>
            </form>
        </div>
    </div>
  </div>
</div>
    
  
</div>