<?php
$id = '';
$tabela = 'tipo_funcionario';
$campo = 'cod_tip_fun';
$login_erro = false;
if (!empty($_POST)){
  $tipo = $_POST['tipo'];
  $sql = "UPDATE `tipo_funcionario` SET `titulo` = '{$tipo}'";
  //var_dump($sql);
  if($query = $conn->query($sql)){
    echo "<span style='color: green'>Alterado com sucesso!</span>";
  }
  else{
    echo "Erro -> ". $conn->error;
  }
  //var_dump($query);
  
  $sqlEdit = "SELECT cod_tip_fun, titulo FROM `tipo_funcionario` WHERE `cod_tip_fun` = '{$_GET['id']}'";
  $resultEdit = $conn->query($sqlEdit);
  
  if ($resultEdit->num_rows > 0) {
      // output data of each row
      while($rowEdit = $resultEdit->fetch_assoc()) {
          $id = $row['cod_tip_fun'];
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
                        <input type="text" name="tipo" value="<?= $rowEdit['titulo'] ?>"  class="form-control form-control-user" id="exampleFirstName" placeholder="...">
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
    <?php
    }
}

mysqli_close($conn);
?>