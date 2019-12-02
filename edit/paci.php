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
$sql = "UPDATE `usuario` SET `email`= '{$email}', `senha`= '{$senha}', `nome`= '{$nome}', `cpf`= '{$cpf}', `telefone`= '{$telefone}', `rua`= '{$rua}', `numero`= '{$numero}', `bairro`= '{$bairro}', `cidade_cod_cidade`= '{$cidade}' WHERE cod_usuario = {$_GET['id']}";  
     
  if($query = $conn->query($sql)){
    $id = $conn->insert_id;
  $sql = "UPDATE `paciente` SET `usuario_cod_usuario` = {$id}, `data_nasc` = {$data_nasc}, `sexo` = {$sexo} WHERE `cod_paciente` = '{$id}'"; 
     
     
    //var_dump($sql);
    if($query = $conn->query($sql)){
        echo "<span style='color: green'>Alterado com sucesso!</span>";
    }
    else{
        echo "Erro -> ". $conn->error;
    }
    
  }
  else{
    echo "Erro -> ". $conn->error;
  }
}

$sqlEdit = "SELECT u.email, u.senha, u.nome, u.cpf, u.telefone, u.rua, u.numero, u.bairro, u.cidade_cod_cidade, p.usuario_cod_usuario, p.data_nasc, p.sexo FROM `paciente` p, `usuario` u WHERE p.`cod_paciente` = '{$_GET['id']}' AND p.`usuario_cod_usuario` = u.`cod_usuario`";
$resultEdit = $conn->query($sqlEdit);

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
        <form method="POST" class="user">
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="nome" value="<?= $rowEdit['nome'] ?>" class="form-control form-control-user" id="exampleFirstName" placeholder="Nome">
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="cpf" value="<?= $rowEdit['cpf'] ?>" class="form-control form-control-user" id="cpf" placeholder="CPF">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="date" name="data_nasc"  value="<?= $rowEdit['data_nasc'] ?>" class="form-control form-control-user" id="exampleFirstName" placeholder="Data de nacimento">
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                <select name="sexo" class="form-control form-control-user" style="border-radius: 22px">
                    <option value="1" <?php if($rowEdit['sexo'] == 1) echo " selected "; ?> >Maculino</option>
                    <option value="0" <?php if($rowEdit['sexo'] == 0) echo " selected "; ?> >Feminino</option>
                </select>
                </div>
            </div>
            <div class="form-group">
                <input type="text" name="telefone"  value="<?= $rowEdit['telefone'] ?>" class="form-control form-control-user" id="exampleFirstName" placeholder="Telefone">
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="rua" value="<?= $rowEdit['rua'] ?>" class="form-control form-control-user" id="exampleFirstName" placeholder="Rua">
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="number" name="numero" value="<?= $rowEdit['numero'] ?>" class="form-control form-control-user" id="exampleFirstName" placeholder="Número">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="bairro" value="<?= $rowEdit['bairro'] ?>" class="form-control form-control-user" id="exampleFirstName" placeholder="Bairro">
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                <select name="cidade" class="form-control form-control-user" style="border-radius: 22px">
                <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<option value=".$row['cod_cidade'];
                            if($row['cod_cidade'] == $rowEdit['cidade_cod_cidade']) echo " selected "; 
                            echo ">".$row["cidade"]."</option>";
                        }
                    }
                ?>
                </select>
                </div>
            </div>
            <div class="form-group">
                <input type="email" name="email" value="<?= $rowEdit['email'] ?>"  class="form-control form-control-user" id="exampleInputEmail" placeholder="Email">
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" name="senha" value="<?= $rowEdit['senha'] ?>"  class="form-control form-control-user" id="exampleInputPassword" placeholder="Senha">
                </div>
                <div class="col-sm-6">
                    <input type="password" value="<?= $rowEdit['senha'] ?>"  class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repita senha">
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

mysqli_close($conn);
?>