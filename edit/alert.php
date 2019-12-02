<?php

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
  if($query = $mysqli->query($sql)){
    echo "<span style='color: green'>Cadastrado com sucesso!</span>";
  }
  else{
    echo "Erro -> ". $mysqli->error;
  }
  //var_dump($query);
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
                        <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Título do Alerta">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <small>Data Início:</small>
                        <input type="date" class="form-control form-control-user" placeholder="Data">
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
  </div>
  <div class="tab-pane fade" id="nav-espacado" role="tabpanel" aria-labelledby="nav-espacado-tab">
        <div class="card col mb-12" style="margin-left: 1%">
        <div class="card-body">
            <form class="user" method="POST">
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <small>Título:</small>
                        <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Título do Alerta">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <small>Quantidade:</small>
                        <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Quantidade de vezes a serem checadas.">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <small>Data Início:</small>
                        <input type="date" class="form-control form-control-user" placeholder="Data Início">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <small>Data Fim:</small>
                        <input type="date" class="form-control form-control-user" placeholder="Data Fim">
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
  </div>
</div>
    
  
</div>