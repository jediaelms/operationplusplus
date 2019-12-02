<?php

$sql="SELECT `cod_tip_op`,`nome` FROM `tipo_operacao`;";
$result = $mysqli->query($sql);

$sql2="SELECT p.`cod_paciente`, u.`nome` FROM `usuario` u, `paciente` p WHERE u.`cod_usuario` = p.`usuario_cod_usuario`";
$result2 = $mysqli->query($sql2);

$login_erro = false;
if (!empty($_POST)){
  $nome = $_POST['nome'];
  $tipo_operacao = $_POST['tipo_operacao'];
  $paciente = $_POST['paciente'];
  $observacoes = $_POST['observacoes'];
  $data_ini = $_POST['data_ini'];
  $data_fim = $_POST['data_fim'];
  //var_dump($data_ini);

  $sql = "UPDATE `operacao` SET `nome`= '{$nome}', `descricao`= '{$observacoes}', `cod_paciente`= '{$paciente}', `horario`= '{$data_ini}', `horario_fim`= '{$data_fim}', `tipo_operacao_cod_tip_op`= '{$tipo_operacao}' WHERE `cod_operacao` = '{$_GET['id']}'";
    
  //var_dump($sql);
  if($query = $mysqli->query($sql)){
    echo "<span style='color: green'>Alterado com sucesso!</span>";
  }
  else{
    echo "Erro -> ". $mysqli->error;
  }
  //var_dump($query);
}

$sqlEdit = "SELECT o.`nome` AS `operacao`, tp.`cod_tip_op`, tp.`nome`, p.`cod_paciente`, u.`nome`, o.`descricao`, o.`horario`, o.`horario_fim` FROM `operacao` o, `paciente` p, `usuario` u, `tipo_operacao` tp WHERE o.`cod_operacao` = '{$_GET['id']}' AND o.`cod_paciente` = p.`cod_paciente` AND p.`usuario_cod_usuario` = u.`cod_usuario` AND o.`tipo_operacao_cod_tip_op` = tp.`cod_tip_op`";
$resultEdit = $mysqli->query($sqlEdit);

if ($resultEdit->num_rows > 0) {
    // output data of each row
    while($rowEdit = $resultEdit->fetch_assoc()) {
?>
<!-- Basic Card Example -->
<div class="card shadow mb-4 col-offset-6">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Infomações</h6>
    </div>
    <div class="card-body">
        <form class="user" method="POST">
            <div class="form-group row">
                <div class="col-sm-12 mb-3 mb-sm-0">
                    <small>Operação:</small>
                    <input type="text" name="nome" value="<?= $rowEdit['operacao'] ?>" class="form-control form-control-user" id="exampleFirstName" placeholder="Nome">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6">
                    </small>Tipo de Operação:</small>
                    <select name="tipo_operacao" class="form-control form-control-user">
                    <?php
                        if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<option value=".$row['cod_tip_op'];
                            if($row['cod_tip_op'] == $rowEdit['cod_tip_op']) echo " selected "; 
                            echo ">".$row["nome"]."</option>";
                        }
                        }
                    ?>
                    </select>
                </div>
                <div class="col-sm-6">
                    </small>Paciente:</small>
                    <select name="paciente" class="form-control form-control-user">
                    <?php
                        if ($result2->num_rows > 0) {
                            while($row = $result2->fetch_assoc()) {
                                echo "<option value=".$row['cod_paciente'];
                                if($row['cod_paciente'] == $rowEdit['cod_paciente']) echo " selected "; 
                                echo ">".$row["nome"]."</option>";
                            }
                        }
                    ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <small>Observações:</small>
                <textarea name="observacoes" class="form-control form-control-user" style="border-radius: 18px;" placeholder="Entre com as observações">
                    <?= $rowEdit['descricao'] ?>
                </textarea>
            </div>
            <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <small>Início:</small>
                        <input type="datetime-local" name="data_ini" value="<?= str_replace(' ','T', $rowEdit['horario']) ?>" class="form-control form-control-user" id="cpf" placeholder="Data Início">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <small>Fim:</small>
                        <input type="datetime-local" name="data_fim" value="<?= str_replace(' ','T', $rowEdit['horario_fim']) ?>" class="form-control form-control-user" id="cpf" placeholder="Data Fim">
                    </div>
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

<?php
    }
}

mysqli_close($mysqli);
?>