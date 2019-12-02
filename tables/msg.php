<?php
if($_SESSION['nivel'] == 1){
}
else{
}
$sql="SELECT ul.user, us.nome, bp2.msg, bp2.usuario_remetente, bp2.usuario_destinatario, bp2.data_hora FROM usuario us, bate_papo bp2, (SELECT MAX(bp.data_hora) as mh, u.user FROM bate_papo bp, (SELECT DISTINCT IF(usuario_remetente='{$_SESSION['id']}', usuario_destinatario, usuario_remetente) as user FROM bate_papo WHERE (usuario_remetente = '{$_SESSION['id']}' OR usuario_destinatario = '{$_SESSION['id']}')) u WHERE u.user = bp.usuario_remetente OR u.user = bp.usuario_destinatario GROUP BY u.user) ul WHERE ul.mh = bp2.data_hora AND ((ul.user = bp2.usuario_remetente AND '{$_SESSION['id']}' = bp2.usuario_destinatario) OR (ul.user = bp2.usuario_destinatario AND bp2.usuario_remetente = '{$_SESSION['id']}')) AND us.cod_usuario = ul.user";

$result = $conn->query($sql);
?>
<!-- Page Heading -->
          <p class="mb-4">.</p>

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
                      <th>Última mensagem:</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                      // output data of each row
                      while($row = $result->fetch_assoc()) {
                        echo "<tr onclick=\"openMessages({$_SESSION['id']}, {$row['user']})\">";
                        echo "<td>".$row["nome"]."</td>";
                        echo "<td>".$row["msg"]."</td>";
                        echo "</tr>";
                        }
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>