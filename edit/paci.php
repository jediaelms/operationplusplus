<?php

if (!empty($_POST)){
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $cpf = $_POST['cpf'];
  $sql = "INSERT INTO `usuario` (`email`, `senha`, `nome`, `cpf`, `telefone`, `rua`, `numero`, `bairro`, `cidade_cod_cidade`, `tipo`) VALUES ('{$email}','{$senha}','{$nome}', '{$cpf}', null, null, null, null, 1, 0)";
  var_dump($sql);
  if($query = $conn->query($sql)){
    $id = $conn->insert_id;
    $sql = "INSERT INTO `paciente`(`usuario_cod_usuario`, `data_nasc`, `sexo`) VALUES ({$id}, null, null)";
    var_dump($sql);
    if($query = $conn->query($sql)){
        echo "<span style='color: green'>Cadastrado com sucesso!</span>";
    }
    else{
        echo "Erro -> ". $conn->error;
    }
    
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
        <form method="POST" class="user">
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Nome">
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="cpf" placeholder="CPF">
                </div>
            </div>
            <div class="form-group">
                <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email">
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                </div>
                <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password">
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block"> 
                Salvar
            </button>
            <a href="index.php" class="btn btn-primary btn-user btn-block">
                Limpar
            </a>
            <hr>
        </form>
    </div>
</div>