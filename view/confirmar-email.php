<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Finance - Cadastre-se grátis</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../vendor/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container" style="margin-top: 10%;">
    <div class="row justify-content-center">
      <div class="login shadow p-3 mb-5 bg-white rounded col-lg-6 col-12 col-md-8 m-5">
    
        <h5 class="text-dark text-center pt-5">Obrigado pelo seu interesse em nossa plataforma</h5>
        <p class="text-center mb-2 py-3 px-lg-5" style="text-align: justify!important;">Enviamos um link de confirmação para o email informado. Se o endereço de email <strong><?php echo $_SESSION['emailCad'] ?></strong> estiver correto, por favor, clique no link enviado para ativar sua conta.</p>

      </div>
    </div>

  </div>

  <script>
      setTimeout(function() {
          window.location.href = "http://localhost/Gerenciador/view/login.php";
      }, 30000);
  </script>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../vendor/js/sb-admin-2.min.js"></script>
    <!-- Ícones -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

</body>

</html>
