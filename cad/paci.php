<?php
$sql="SELECT `cod_cidade`,`cidade` FROM `cidade`;";
$result = $conn->query($sql);

if (!empty($_POST)){
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $cpf = $_POST['cpf'];
  $telefone = $_POST['telefone'];
  $rua = $_POST['rua'];
  $numero = $_POST['numero'];
  $bairro = $_POST['bairro'];
  $cidade = $_POST['cidade'];
  $sexo = $_POST['sexo'];
  $data_nasc = $_POST['data_nasc'];
  $sql = "INSERT INTO `usuario` (`email`, `senha`, `nome`, `cpf`, `telefone`, `rua`, `numero`, `bairro`, `cidade_cod_cidade`) VALUES ('{$email}','{$senha}','{$nome}', '{$cpf}', '{$telefone}', '{$rua}', '{$numero}', '{$bairro}', '{$cidade}')";
  //var_dump($sql);
  if($query = $conn->query($sql)){
    $id = $conn->insert_id;
    $sql = "INSERT INTO `paciente`(`usuario_cod_usuario`, `data_nasc`, `sexo`) VALUES ({$id}, {$data_nasc}, {$sexo})";
    //var_dump($sql);
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
                    <input type="text" name="nome" class="form-control form-control-user" id="exampleFirstName" placeholder="Nome">
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="cpf" class="form-control form-control-user" id="cpf" placeholder="CPF">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="date" name="data_nasc" class="form-control form-control-user" id="exampleFirstName" placeholder="Data de nacimento">
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                <select name="sexo" class="form-control form-control-user" style="border-radius: 22px">
                    <option value="1">Maculino</option>
                    <option value="0">Feminino</option>
                </select>
                </div>
            </div>
            <div class="form-group">
                <input type="text" name="telefone" class="form-control form-control-user" id="exampleFirstName" placeholder="Telefone">
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="rua" class="form-control form-control-user" id="exampleFirstName" placeholder="Rua">
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="number" name="numero" class="form-control form-control-user" id="exampleFirstName" placeholder="Número">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="bairro" class="form-control form-control-user" id="exampleFirstName" placeholder="Bairro">
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                <select name="cidade" class="form-control form-control-user" style="border-radius: 22px">
                <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<option value=".$row['cod_cidade'].">".$row["cidade"]."</option>";
                        }
                    }
                ?>
                </select>
                </div>
            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email">
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" name="senha" class="form-control form-control-user" id="exampleInputPassword" placeholder="Senha">
                </div>
                <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repita senha">
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