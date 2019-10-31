<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="main.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Operation <sup>++</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="main.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>
<?php
  if($_SESSION['nivel'] == 1){
?>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="list_fun.php">
          <i class="fas fa-fw fa-user-md "></i>
          <span>Funcionários</span>
        </a>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="list_paci.php">
          <i class="fas fa-fw fa-users"></i>
          <span>Pacientes</span>
        </a>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="list_tip_fun.php">
          <i class="fas fa-fw fa-cog"></i>
          <span>Tipos de Funcionários</span>
        </a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="list_op.php">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Operações</span>
        </a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="list_tip_ops.php">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Tipos de Operações</span>
        </a>
      </li>
<?php
  }
?>
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="list_alertas.php">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Alertas</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
            <?php
              if($_SESSION['nivel'] == 1){
            ?>
            <a class="collapse-item" href="cad_alerta.php">Cadastrar</a>
              <?php } ?>
            <a class="collapse-item" href="list_alertas.php">Listar</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="list_ins.php">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Instruções</span>
        </a>
        <div id="collapseInstru" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
            <?php
              if($_SESSION['nivel'] == 1){
            ?>
            <a class="collapse-item" href="cad_ins.php">Cadastrar</a>
              <?php } ?>
            <a class="collapse-item" href="list_ins.php">Listar</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->