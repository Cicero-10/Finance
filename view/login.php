<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login - Finance</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../vendor/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../vendor/css/personalize.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">
    <div class="row justify-content-center">
      <div class="login shadow p-3 mb-5 bg-white rounded col-lg-5 col-12 col-md-8 m-5">
    
        <h3 class="text-dark text-center pt-5 mb-5">Faça login</h3>
        <form class="px-lg-5 " method="post" action="../controller/AuthController.php">
          <div class="form-group">
            <input type="email" name="email" placeholder="Seu email" class="form-control" required>
          </div>
          <div class="form-group mb-5">
            <input type="password" name="senha" placeholder="Sua senha" class="form-control" required>
          </div>
          <div class="form-group mb-5">
            <button class="btn btn-custom btn-block">Entrar</button>
          </div>
          <p><a href="" class="text-dark" style="text-decoration: none;">Esqueceu sua senha?</a></p>
        <hr>
        </form>

        <div class="px-lg-5">
          <div class="mt-5">
            <p>Ainda não tem conta? <a href="register.php">Registre-se grátis</a></p>
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
