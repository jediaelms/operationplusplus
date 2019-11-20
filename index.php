<?php
require_once ("conexao.php");

// echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
// echo "Host information: " . mysqli_get_host_info($mysqli) . PHP_EOL;

$login_erro = false;
if (!empty($_POST)){
  $email = $_POST['email'];
  $senha = $_POST['password'];
  $sql = "SELECT `cod_usuario`, `email`, `senha`, `nome`, `tipo` FROM `usuario` WHERE `email` = '{$email}' AND `senha` = '{$senha}'";
  var_dump($sql);
  if($query = $mysqli->query($sql)){
    $row_cont = $query->num_rows;
    if($row_cont > 0){
      while($dados = $query->fetch_assoc())
      { 
        session_start();
        $_SESSION['id'] = $_POST['cod_usuario'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['nome'] = $dados['nome'];
        if($dados['tipo'] == 1){
          $_SESSION['nivel'] = 1;
          header("Location: ./main.php");
        }else{
          $_SESSION['nivel'] = 0;
          header("Location: ./main.php");
        }
      }
  }else{
      $login_erro = true;
    }
  }
  else{
    $login_erro = true;
  }
  //var_dump($query);
  
}
mysqli_close($mysqli);

$title = "Operation++ - Login";
require("header.php");
?>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image">
                <img src="https://images.vexels.com/media/users/3/144231/isolated/preview/1b8bdcf6004ed831ea6441af83a38a3e-sinal-de-s--mbolo-de-medicina-by-vexels.png"/>
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Operation++</h1>
                  </div>
                  <form method="POST" name="login" class="user" action="<?=$_SERVER['PHP_SELF']?>">
                    <div class="form-group">
                      <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Senha">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Manter conectado</label>
                      </div>
                    </div>
                    <?php
                    if($login_erro){
?>
                      <div class="text-center">
                        <small style="color: red">Email ou senha incorreto!</small>
                      </div>
                    <?php
                    }
?>
                    <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                    <hr>
                    <a href="javascript: document.login.submit();" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Login com Google
                    </a>
                    <a href="index.php" class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login com Facebook
                    </a>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.php">Esqueceu a senha?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.php">Crie uma conta!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
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

</body>

</html>
