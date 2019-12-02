<?php
$sql="SELECT `cod_tip_op`,`nome` FROM `tipo_operacao`;";
$result = $mysqli->query($sql);

$login_erro = false;
if (!empty($_POST)){
  $titulo = $_POST['titulo'];
  $tipo_operacao = $_POST['tipo_operacao'];
  $conteudo = $_POST['conteudo'];

  $sql = "INSERT INTO `instrucao` (`titulo`, `conteudo`) VALUES ('{$titulo}','{$conteudo}')";
  if($query = $mysqli->query($sql)){
    $id = $mysqli->insert_id;
    foreach ($_REQUEST['tipo_operacao'] as $selectedOption){
        $sql = "INSERT INTO `instrucao_tipo_operacao`(`cod_tip_op`, `instrucao_cod_instrucao`) VALUES ('{$selectedOption}','{$id}')";
        if(!($query = $mysqli->query($sql))){
            echo "Erro -> ". $mysqli->error;
            break;
        }
    }
    echo "<span style='color: green'>Cadastrado com sucesso!</span>";
  }
  else{
    echo "Erro -> ". $mysqli->error;
  }
}
mysqli_close($mysqli);
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
                    <small>Título Instrução:</small>
                    <input type="text" name="titulo" class="form-control form-control-user" id="exampleFirstName" placeholder="Título">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    </small>Tipo de Operação:</small>
                    <select multiple name="tipo_operacao[]" class="form-control form-control-user" style="border-radius: 22px">
                    <?php
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<option value=".$row['cod_tip_op'].">".$row["nome"]."</option>";
                            }
                        }
                    ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <small>Conteúdo:(Coloque formatado em HTML)</small>
                <textarea name="conteudo" class="form-control form-control-user" style="border-radius: 18px;" placeholder="Entre com as observações">
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