<?php

$tabela = 'instrucao';
$campo = 'cod_instrucao';

if($_SESSION['nivel'] == 1){
$sql="SELECT * FROM `instrucao`;";
}
else{
  $sql="SELECT conteudo FROM `instrucao` i JOIN instrucao_tipo_operacao ito ON ito.instrucao_cod_instrucao = i.cod_instrucao JOIN operacao o ON o.tipo_operacao_cod_tip_op = ito.cod_tip_op WHERE o.cod_paciente = '{$_SESSION['id']}' AND fim_acompanhamento IS NULL;";
}
$result = $mysqli->query($sql);
?>
<!-- Page Heading -->
<p class="mb-4">Listagem de instruções cadastradas.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <!-- <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"></h6>
  </div> -->
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Título</th>
            <?php
            if($_SESSION['nivel'] == 1){
            ?>
              <th>Ações</th>
            <?php
            }
            ?>
          </tr>
        </thead>
        <tbody>
        <?php
                    if ($result->num_rows > 0) {
                      // output data of each row
                      while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row["conteudo"]."</td>";
                        if($_SESSION['nivel'] == 1){
                  ?>
                      <td>
                        <a href="cad_ins.php?id=<?= $row['cod_instrucao'] ?>" class="btn btn-info btn-circle btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn-danger btn-circle btn-sm deletar" data-id="<?= $row['cod_instrucao'] ?>" href="#" data-toggle="modal" data-target="">
                            <i class="fas fa-trash"></i>
                        </a>
                      </td>
                  <?php
                        }
                  echo "</tr>";
                }
              }
            ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
