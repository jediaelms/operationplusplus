<?php

$login_erro = false;
if (!empty($_POST)){
  $tipo = $_POST['tipo'];
  $sql = "INSERT INTO `tipo_funcionario` (`titulo`) VALUES ('{$tipo}')";
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
    <div class="card col mb-6 col-offset-2">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Informações</h6>
        </div>
        <div class="card-body">
            <form method="POST" class="user">
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <small>Tipo de Funcionário:</small>
                        <input type="text" name="tipo" class="form-control form-control-user" id="exampleFirstName" placeholder="...">
                    </div>
                    <div class="col-sm-6">
                    <?php
                    // TODO Alterar estilo do select
                    // require("blank.php");
?>
                    <small>Status:</small>
                    <select name="status" class="form-control form-control-user">
                        <option value="1">Ativo</option>
                        <option value="0">Desativado</option>
                    </select>
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