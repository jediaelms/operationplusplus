
<!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>SSCopyright &copy; Operation++ 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tem certeza que deseja sair?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Selecione o botão de "Logout"para sair, do contrário clique em "Cancel".</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="logout.php">Sair</a>
        </div>
      </div>
    </div>
  </div>
 

  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Deseja realmente apagar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-danger" href="delete.php?tabela=<?= $tabela ?>&campo=<?= $campo ?>&id=<?= $id ?>">Apagar</a>
        </div>
      </div>
    </div>
  </div>
  

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script src="js/chat.js"></script>
  <script src="js/chat-manager.js"></script>
  <script src="js/push.js"></script>
  <script src="js/serviceWorker.min.js"></script>
</body>

</html>
<script>
var notificado = localStorage.getItem("notificado");
var hora = 3;
var getNotifications = function(){
  var now = new Date();
  var tempo = 6000;
  if(now.getHours() == hora && notificado != "sim"){
    notificado = "sim";
    localStorage.setItem("notificado", "sim");
    $.ajax({
        url: "tables/get-alerts.php",
        type: 'post',
        dataType: "json",
        data: {
            usuario: <?=$_SESSION['id']?>
        }
    })
        .done(function (msg) {
            console.log(msg);
            for (let i in msg) {
              // alert(i);
              Push.create("Alerta",{
              body: msg[i].descricao,
              icon: 'https://images.vexels.com/media/users/3/144231/isolated/preview/1b8bdcf6004ed831ea6441af83a38a3e-sinal-de-s--mbolo-de-medicina-by-vexels.png',
              timeout: tempo + (i * tempo),
              onClick: function () {
                  window.open("list_alertas.php")
                  this.close();
              }
            });
            }
        })
        .fail(function (jqXHR, textStatus, msg) {
          console.log(textStatus);
        });
  }
  else{
    if(now.getHours() == hora){
      localStorage.setItem("notificado", "nao");
    }
  }
}
setInterval(getNotifications, 200);
</script>
