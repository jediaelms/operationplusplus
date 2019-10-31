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
          ?> 
              <a href="<?=$link?>" class="primary"><i class="fas fa-plus-circle"></i></a>
          <?php
            }
          ?>
          </h1>
          <?php require($content); ?>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<?php
    require("chat.php");
    require("footer.php");

?>