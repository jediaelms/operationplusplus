<?php

if(isset($_GET) && isset($_GET['id']) && !empty($_GET['id'])){
    $sqlEdit = "SELECT o.`nome`, tp.`cod_tip_op`, tp.`nome`, p.`cod_paciente`, u.`nome`, o.`descricao`, o.`data_inicio`, o.`data_fim` FROM `operacao` o, `paciente` p, `usuario` u, `tipo_operacao` tp WHERE o.`cod_operacao` = '{$_GET['id']' AND o.`cod_paciente` = p.`cod_paciente` AND p.`usuario_cod_usuario` = u.`cod_usuario` AND o.`tipo_operacao_cod_tip_op` = tp.`cod_tip_op`";
    $resultEdit = $conn->query($sqlEdit);
}

$sql="SELECT `cod_tip_op`,`nome` FROM `tipo_operacao`;";
$result = $conn->query($sql);

$sql2="SELECT p.`cod_paciente`, u.`nome` FROM `usuario` u, `paciente` p WHERE u.`cod_usuario` = p.`usuario_cod_usuario`";
$result2 = $conn->query($sql2);



$login_erro = false;
if (!empty($_POST)){
  $nome = $_POST['nome'];
  $tipo_operacao = $_POST['tipo_operacao'];
  $paciente = $_POST['paciente'];
  $observacoes = $_POST['observacoes'];
  $data_ini = $_POST['data_ini'];
  $data_fim = $_POST['data_fim'];
  //var_dump($data_ini);

  $sql = "INSERT INTO `operacao` (`nome`, `descricao`, `cod_paciente`, `horario_inicio`, `horario_fim`, `tipo_operacao_cod_tip_op`) VALUES ('{$nome}','{$observacoes}','{$paciente}','{$data_ini}','{$data_fim}','{$tipo_operacao}')";
  //var_dump($sql);
  if($query = $conn->query($sql)){
    echo "<span style='color: green'>Cadastrado com sucesso!</span>";
  }
  else{
    echo "Erro -> ". $conn->error;
  }
  //var_dump($query);
}
mysqli_close($conn);
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
                    
                    <input type="text" name="nome" class="form-control form-control-user" id="exampleFirstName" placeholder="Nome">

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
                            echo "<option value=".$row['cod_tip_op'].">".$row["nome"]."</option>";
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
                        // output data of each row
                        while($row = $result2->fetch_assoc()) {
                            echo "<option value=".$row['cod_paciente'].">".$row["nome"]."</option>";
                        }
                        }
                    ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <small>Observações:</small>
                <textarea name="observacoes" class="form-control form-control-user" style="border-radius: 18px;" placeholder="Entre com as observações">
                </textarea>
            </div>
            <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <small>Início:</small>
                        <input type="datetime-local" name="data_ini" class="form-control form-control-user" id="cpf" placeholder="Data Início">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <small>Fim:</small>
                        <input type="datetime-local" name="data_fim" class="form-control form-control-user" id="cpf" placeholder="Data Fim">
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