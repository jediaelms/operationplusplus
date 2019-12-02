<?php

$login_erro = false;
if (!empty($_POST)){
  $nome = $_POST['nome'];
  $descricao = $_POST['descricao'];
  $sql = "INSERT INTO `tipo_operacao` (`nome`, `descricao`) VALUES ('{$nome}', '{$descricao}')";
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
    <div class="card col mb-6 col-offset-2">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Informações</h6>
        </div>
        <div class="card-body">
            <form class="user" method="POST">
                <div class="form-group">
                    <small>Tipo de Operação:</small>
                    <input type="text" name="nome" class="form-control form-control-user" id="exampleFirstName" placeholder="...">
                </div>
                <div class="form-group">
                <textarea name="descricao" class="form-control form-control-user" style="border-radius: 18px;" placeholder="Descrição">
                </textarea>
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