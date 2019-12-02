<?php
// require("validate.php");
require("header.php");

?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php
        require("sidebar.php");
    
?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

<?php
    require("topbar.php");

?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?=$H1_Title?>
          <?php 
            if(isset($table)){
              if($_SESSION['nivel'] == 1){
          ?> 
              <a href="<?=$link?>" class="primary"><i class="fas fa-plus-circle"></i></a>
          <?php
              }
            }
          ?>
          </h1>
          <?php require($content); ?>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <div class="modal fade" id="acaoModal" tabindex="-1" role="dialog" aria-labelledby="acaoModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="acaoTitle"></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body" id="acaoBody"></div>
        <div class="modal-footer">
          <a href="javascript:window.location.reload(true)" class="btn btn-primary">Confirmar</a>
        </div>
      </div>
    </div>
  </div>
<?php
    require("chat.php");
    require("footer.php");

?>