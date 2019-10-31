<?php
$sql="SELECT * FROM `funcionario` f, `usuario` u, `tipo_funcionario` t WHERE u.`cod_usuario`=f.`usuario_cod_usuario` AND f.`cod_tip_fun`=t.`cod_tip_fun`;";
$result = $conn->query($sql);
?>
<!-- Page Heading -->
          <p class="mb-4">Listagem de funcionários cadastrados.</p>

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
                      <th>Nome</th>
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
                        echo "<td>".$row["nome"]."</td>";
                        echo "<td>".$row["titulo"]."</td>";
                  ?>
                      <td>
                        <a href="#" class="btn btn-info btn-circle btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn-danger btn-circle btn-sm">
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
          