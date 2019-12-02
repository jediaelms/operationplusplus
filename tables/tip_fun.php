<?php
$tabela = 'tipo_funcionario';
$campo = 'cod_tip_fun';

$sql="SELECT * FROM `tipo_funcionario`;";
$result = $mysqli->query($sql);
?>
<!-- Page Heading -->
          <p class="mb-4">Listagem de tipos de funcionários cadastradas.</p>

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
                      <th>Tipo</th>
                      <th>Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    if ($result->num_rows > 0) {
                      // output data of each row
                      while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row["titulo"]."</td>";
                  ?>
                      <td>
                      <a href="cad_tip_fun.php?id=<?= $row['cod_tip_fun'] ?>" class="btn btn-info btn-circle btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-circle btn-sm deletar" data-id="<?= $row['cod_tip_fun'] ?>" href="#" data-toggle="modal" data-target="">
                            <i class="fas fa-trash"></i>
                        </a>
                      </td>
                  <?php
                  echo "</tr>";
                }
              }
            ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          