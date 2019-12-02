<?php
$sql="SELECT * FROM `alerta`;";
$result = $conn->query($sql);
?>
<!-- Page Heading -->
          <p class="mb-4">Listagem de alertas cadastrados.</p>

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
                      <th>Título do Alerta</th>
                      <th>Tipo</th>
                      <th>Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                      // output data of each row
                      while($row = $result->fetch_assoc()) {
                        $tipo = $row["tipo_alerta"]=="1" ? "Pontual" : "Espaçado";
                        echo "<tr>";
                        echo "<td>".$row["descricao"]."</td>";
                        echo "<td>".$tipo."</td>";
                    ?>
                      <td>
                    <?php
                    if($_SESSION['nivel'] == 1){
                    ?>
                        <a href="#" class="btn btn-info btn-circle btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn-danger btn-circle btn-sm">
                            <i class="fas fa-trash"></i>
                        </a>
                    <?php
                    }
                    ?>
                        <a href="#" class="btn btn-info btn-circle btn-sm open">
                            <i class="fas fa-check"></i>
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
          