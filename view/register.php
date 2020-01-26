<?php
 session_start();
 ?>
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
  <link href="../vendor/css/personalize.css" rel="stylesheet">
  

</head>

<body class="bg-gradient-primary">

  <div class="container">
    <div class="row justify-content-center">
      <div class="login shadow p-3 mb-5 bg-white rounded col-lg-6 col-12 col-md-8 m-5">
    
        <h3 class="text-dark text-center pt-5 mb-5">Inscreva-se grátis</h3>
           <?php 
              if (isset($_SESSION['message'])): ?> 
                <div class="row justify-content-center">
                <div class=" p-3 alert alert-<?=$_SESSION['msg_type']?> my-3 col-lg-6" data-dismiss="alert" aria-label="Close" >
                  <?php  
                      echo $_SESSION['message'];
                      unset($_SESSION['message']);

                  ?>
                  <span aria-hidden="true" style="float: right; cursor: pointer; ">&times;</span>
                </div>
                </div>
           <?php endif; ?>
       
        <form class="px-lg-5" method="post" action="../controller/UsuarioController.php" enctype="multipart/form-data">
         <div class="row">
          <div class="form-group col-lg-6">
            <input type="text" name="nome" placeholder="Nome" class="form-control" required>
          </div>
          <div class="form-group col-lg-6">
            <input type="text" name="sobrenome" placeholder="Sobrenome" class="form-control" required>
          </div>
         </div>
         <div class="row">
           <div class="form-group col-lg-6">
            <input type="email" name="email" placeholder="Seu email" class="form-control" required>
          </div>
          <div class="form-group col-lg-6">
            <input type="password" name="senha" placeholder="Sua senha" class="form-control" required>
          </div>
         </div>
         <div class="row justify-content-center mb-3" align="center">
           <div class="form-group col-12 col-md-6 col-lg-6">
            <label class="texto" id="texto">Foto</label>
            <img id="preview" class="image-perfil">
            <input type="file" name="foto"  class="form-control custom-file" id="img" required>
          </div>
         </div>
          
          <div class="form-group mb-5 col-lg-12">
            <button class="btn btn-custom btn-block" name="cadastrar_usuario">Cadastre-se</button>
          </div>
        </form>
        <div class="px-lg-5">
          <div class="mt-5">
            <hr>
            <p class="text-center">Já tem conta? <a href="login.php">Faça login</a></p>
          </div>
        </div>
      </div>
    </div>

  </div>

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
    <script>
       $('#preview').click(function(){
            $('#img').click()
        });
       $('#texto').click(function(){
            $('#img').click()
        });
      function readImage() {
       
        if (this.files && this.files[0]) {
            var file = new FileReader();
            file.onload = function(e) {
                document.getElementById("preview").src = e.target.result;
                document.getElementById("img").style.display = 'none';
                document.getElementById("texto").style.display = 'none';
            };       
            file.readAsDataURL(this.files[0]);
        }
      }

      document.getElementById("img").addEventListener("change", readImage, false);
    </script>
</body>

</html>
